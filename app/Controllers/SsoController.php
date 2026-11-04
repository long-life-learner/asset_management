<?php

namespace App\Controllers;

/**
 * SsoController — Integrasi SSO Politeknik GT (auth.poltek-gt.ac.id)
 *
 * Menangani dua endpoint:
 *  1. /sso-login   → Redirect pengguna ke SSO Server
 *  2. /sso-callback → Menerima ticket dari SSO, validasi S2S, buat session lokal
 */
class SsoController extends BaseController
{
    /** URL dasar SSO Server */
    private string $ssoServer;

    /** Identitas client aplikasi ini di SSO */
    private string $clientId;
    private string $clientSecret;

    /** URL callback yang terdaftar di SSO */
    private string $callbackUrl;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ): void {
        parent::initController($request, $response, $logger);

        $this->ssoServer    = rtrim(env('SSO_SERVER_URL', 'http://localhost:8002'), '/');
        $this->clientId     = env('SSO_CLIENT_ID',     'ASET');
        $this->clientSecret = env('SSO_CLIENT_SECRET', 'ASET_SECRET_KEY_DEFAULT');
        $this->callbackUrl  = rtrim(base_url(), '/') . '/sso-callback';
    }

    // =========================================================================
    // STEP 1: Redirect ke SSO Server
    // =========================================================================

    /**
     * /sso-login
     * Alihkan pengguna ke halaman login SSO.
     */
    public function login(): \CodeIgniter\HTTP\RedirectResponse
    {
        $ssoLoginUrl = $this->ssoServer
            . '/login?client_id=' . urlencode($this->clientId)
            . '&redirect_uri='    . urlencode($this->callbackUrl);

        return redirect()->to($ssoLoginUrl);
    }

    // =========================================================================
    // Halaman Akses Ditolak (untuk role Mahasiswa)
    // =========================================================================

    /**
     * /akses-ditolak
     * Ditampilkan setelah SSO logout selesai, khusus untuk user yang tidak diizinkan.
     */
    public function aksesditolak(): string
    {
        return view('auth/akses_ditolak');
    }

    // =========================================================================
    // STEP 2: Terima Ticket dari SSO & Validasi Back-channel
    // =========================================================================

    /**
     * /sso-callback
     * Menerima ?ticket=... dari SSO Server, validasi via cURL S2S, buat session lokal.
     */
    public function callback(): \CodeIgniter\HTTP\RedirectResponse
    {
        $ticket = $this->request->getGet('ticket');

        if (empty($ticket)) {
            return redirect()->to('/sso-login')->with('error', 'Parameter tiket SSO tidak ditemukan.');
        }

        // Panggil endpoint validasi tiket di SSO Server (back-channel)
        $apiUrl   = $this->ssoServer . '/api/validate-ticket';
        $postData = http_build_query([
            'ticket'        => $ticket,
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        $ch = curl_init($apiUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $postData,
            CURLOPT_TIMEOUT        => 10,
            // Aktifkan verify SSL di produksi (HTTPS)
            CURLOPT_SSL_VERIFYPEER => (ENVIRONMENT === 'production'),
            CURLOPT_SSL_VERIFYHOST => (ENVIRONMENT === 'production') ? 2 : 0,
        ]);

        $rawResponse = curl_exec($ch);
        $curlError   = curl_error($ch);
        curl_close($ch);

        if ($rawResponse === false || !empty($curlError)) {
            log_message('error', '[SSO] cURL gagal menghubungi SSO Server: ' . $curlError);
            return redirect()->to('/sso-login')->with('error', 'Tidak dapat terhubung ke server autentikasi SSO.');
        }

        $response = json_decode($rawResponse, true);

        if (!$response || ($response['status'] ?? '') !== 'success') {
            $errMsg = $response['message'] ?? 'Tiket tidak valid atau telah kedaluwarsa.';
            log_message('warning', '[SSO] Validasi tiket gagal: ' . $errMsg);
            return redirect()->to('/sso-login')->with('error', 'SSO Gagal: ' . $errMsg);
        }

        // ---- Tiket Valid → Periksa izin akses berdasarkan role ----
        $profile = $response['user_profile'];

        // Role yang DIIZINKAN mengakses aplikasi Aset (selain Mahasiswa)
        $allowedRoles = ['Admin', 'Dosen', 'Staff', 'Tendik', 'Teknisi'];
        $userRole     = $profile['role'] ?? '';

        if (strtolower($userRole) === 'mahasiswa') {
            log_message('warning', '[SSO] Akses ditolak untuk Mahasiswa: ' . ($profile['email'] ?? '(unknown)'));

            // Redirect ke SSO logout dulu agar session SSO dihapus,
            // sehingga tidak terjadi redirect loop (SSO tidak auto-login lagi).
            // Setelah logout SSO, arahkan ke halaman "Akses Ditolak" lokal.
            $aksesditolakUrl = base_url('/akses-ditolak');
            $ssoLogoutUrl    = $this->ssoServer . '/logout?redirect_uri=' . urlencode($aksesditolakUrl);

            return redirect()->to($ssoLogoutUrl);
        }

        $session = session();
        $session->set([
            'sso_logged_in'    => true,
            'sso_user_id'      => $profile['id']    ?? '',
            'sso_user_name'    => $profile['nama']   ?? $profile['name'] ?? '',
            'sso_user_email'   => $profile['email']  ?? '',
            'sso_user_role'    => $profile['role']   ?? '',
            'sso_user_nim'     => $profile['nim']    ?? null,
            'sso_user_nip'     => $profile['nip']    ?? null,
            'sso_profile_photo'=> $profile['profile_photo'] ?? null,
            // Simpan juga data mentah untuk kemudahan akses
            'sso_profile'      => $profile,
        ]);

        log_message('info', '[SSO] Login berhasil untuk user: ' . ($profile['email'] ?? '(unknown)'));

        // Redirect ke halaman yang awalnya dituju (jika disimpan), atau ke dashboard
        $intended = $session->get('sso_intended_url');
        $session->remove('sso_intended_url');

        return redirect()->to($intended ?: base_url('/'));
    }

    // =========================================================================
    // STEP 3: Logout (hapus session lokal + redirect ke SSO logout)
    // =========================================================================

    /**
     * /logout
     * Hapus session lokal dan redirect ke halaman logout SSO.
     */
    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        $session->destroy();

        // Redirect ke SSO logout agar sesi SSO juga dihancurkan
        $ssoLogoutUrl = $this->ssoServer
            . '/logout?redirect_uri=' . urlencode(base_url('/sso-login'));

        return redirect()->to($ssoLogoutUrl);
    }
}

