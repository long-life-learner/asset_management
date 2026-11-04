<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * SsoFilter — Penjaga Autentikasi berbasis SSO Politeknik GT
 *
 * Filter ini HANYA dipasang pada route yang membutuhkan login.
 * Route publik (sso-login, sso-callback, logout) TIDAK menggunakan filter ini.
 */
class SsoFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('sso_logged_in')) {
            // Simpan URL tujuan agar setelah login bisa redirect ke sana
            session()->set('sso_intended_url', (string) current_url(true));

            return redirect()->to(base_url('/sso-login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi post-filter
    }
}
