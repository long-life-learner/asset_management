<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * SsoFilter — Penjaga Autentikasi berbasis SSO Politeknik GT
 *
 * Melindungi route yang membutuhkan login SSO.
 * Jika pengguna belum login (tidak ada sso_logged_in di session),
 * simpan URL yang dituju lalu redirect ke /sso-login.
 */
class SsoFilter implements FilterInterface
{
    /**
     * Jalankan sebelum controller dieksekusi.
     * Jika session SSO tidak ada → simpan intended URL & redirect ke login.
     */
    /**
     * Route-route yang tidak memerlukan autentikasi SSO.
     */
    private array $publicRoutes = [
        '/sso-login',
        '/sso-callback',
        '/logout',
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah path saat ini adalah route publik
        $currentPath = '/' . ltrim(uri_string(), '/');
        foreach ($this->publicRoutes as $publicRoute) {
            if (str_starts_with($currentPath, $publicRoute)) {
                return; // Izinkan tanpa autentikasi
            }
        }

        $session = session();

        if (!$session->get('sso_logged_in')) {
            // Simpan URL tujuan agar setelah login bisa redirect ke sana
            $session->set('sso_intended_url', (string) current_url(true));

            return redirect()->to(base_url('/sso-login'));
        }
    }

    /**
     * Jalankan setelah controller selesai (tidak ada aksi khusus).
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi post-filter
    }
}
