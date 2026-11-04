<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->set404Override(function () {
    return view('404');
});

// =========================================================================
// ROUTE SSO — Publik (dikecualikan dari SsoFilter)
// =========================================================================
// Redirect pengguna ke halaman login SSO Server (auth.poltek-gt.ac.id)
$routes->get('/sso-login', 'SsoController::login');
// Callback setelah login berhasil di SSO Server — menerima ?ticket=...
$routes->get('/sso-callback', 'SsoController::callback');
// Logout: hapus session lokal dan redirect ke SSO logout
$routes->get('/logout', 'SsoController::logout');

// =========================================================================
// ROUTE TERPROTEKSI — Memerlukan session SSO (dilindungi SsoFilter global)
// =========================================================================

// Dashboard Utama
$routes->get('/', 'Home::index');
$routes->get('/weeklyStockData', 'Home::weeklyStockData');

// Barcode / QR
$routes->get('/generate-barcode', 'QrCodeController::barcode');

// ASET TETAP
$routes->get('/aset-tetap/dashboard', 'AsetTetap::dashboard');
$routes->get('/aset-tetap/search-last-code/(:segment)', 'AsetTetap::searchLastCode/$1');
$routes->post('/aset-tetap/upload', 'AsetTetap::import');
$routes->resource('AsetTetapAPI');

// ASET BERGERAK
$routes->post('/aset-bergerak/transaksi', 'AsetBergerak::transaction');
$routes->get('/aset-bergerak/dashboard', 'AsetBergerak::dashboard');
$routes->resource('AsetBergerakAPI');

// ASET BANGUNAN
$routes->resource('AsetBangunanAPI');

// MASTER ASET
$routes->get('/master-aset', 'MasterAset::index');
$routes->get('/master-aset/distinct/(:alpha)', 'MasterAset::distinct/$1');
$routes->get('/master-aset/search', 'MasterAset::search');
$routes->get('/master-aset/search-last-code', 'MasterAset::searchLastCode');
$routes->post('/master-aset/store', 'MasterAset::store');

// Protect MasterAsetAPI write operations (opsional jika ingin role check ditambahkan nanti)
$routes->post('/MasterAsetAPI', 'MasterAsetAPI::create');
$routes->put('/MasterAsetAPI/(:any)', 'MasterAsetAPI::update/$1');
$routes->delete('/MasterAsetAPI/(:any)', 'MasterAsetAPI::delete/$1');
$routes->resource('MasterAsetAPI');

// PELAPORAN
$routes->get('/pelaporan', 'Pelaporan::index');
$routes->get('/pelaporan/transaksi-aset', 'Pelaporan::transaksiAset');
$routes->patch('/pelaporan/transaksi-aset', 'Pelaporan::dataTable');
