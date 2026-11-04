<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->set404Override(function () {
    return view('404');
});

// =========================================================================
// ROUTE PUBLIK — Tidak memerlukan autentikasi (TANPA filter sso)
// =========================================================================
// Redirect ke SSO Server untuk login
$routes->get('/sso-login', 'SsoController::login');
// Callback dari SSO Server setelah login berhasil
$routes->get('/sso-callback', 'SsoController::callback');
// Logout: hapus session lokal dan redirect ke SSO logout
$routes->get('/logout', 'SsoController::logout');

// =========================================================================
// ROUTE TERPROTEKSI — Wajib login SSO (filter 'sso' per-route)
// =========================================================================

// Dashboard Utama
$routes->get('/', 'Home::index', ['filter' => 'sso']);
$routes->get('/weeklyStockData', 'Home::weeklyStockData', ['filter' => 'sso']);

// Barcode / QR
$routes->get('/generate-barcode', 'QrCodeController::barcode', ['filter' => 'sso']);

// ASET TETAP
$routes->get('/aset-tetap/dashboard', 'AsetTetap::dashboard', ['filter' => 'sso']);
$routes->get('/aset-tetap/search-last-code/(:segment)', 'AsetTetap::searchLastCode/$1', ['filter' => 'sso']);
$routes->post('/aset-tetap/upload', 'AsetTetap::import', ['filter' => 'sso']);
$routes->resource('AsetTetapAPI', ['filter' => 'sso']);

// ASET BERGERAK
$routes->post('/aset-bergerak/transaksi', 'AsetBergerak::transaction', ['filter' => 'sso']);
$routes->get('/aset-bergerak/dashboard', 'AsetBergerak::dashboard', ['filter' => 'sso']);
$routes->resource('AsetBergerakAPI', ['filter' => 'sso']);

// ASET BANGUNAN
$routes->resource('AsetBangunanAPI', ['filter' => 'sso']);

// MASTER ASET
$routes->get('/master-aset', 'MasterAset::index', ['filter' => 'sso']);
$routes->get('/master-aset/distinct/(:alpha)', 'MasterAset::distinct/$1', ['filter' => 'sso']);
$routes->get('/master-aset/search', 'MasterAset::search', ['filter' => 'sso']);
$routes->get('/master-aset/search-last-code', 'MasterAset::searchLastCode', ['filter' => 'sso']);
$routes->post('/master-aset/store', 'MasterAset::store', ['filter' => 'sso']);

// MasterAsetAPI
$routes->post('/MasterAsetAPI', 'MasterAsetAPI::create', ['filter' => 'sso']);
$routes->put('/MasterAsetAPI/(:any)', 'MasterAsetAPI::update/$1', ['filter' => 'sso']);
$routes->delete('/MasterAsetAPI/(:any)', 'MasterAsetAPI::delete/$1', ['filter' => 'sso']);
$routes->resource('MasterAsetAPI', ['filter' => 'sso']);

// PELAPORAN
$routes->get('/pelaporan', 'Pelaporan::index', ['filter' => 'sso']);
$routes->get('/pelaporan/transaksi-aset', 'Pelaporan::transaksiAset', ['filter' => 'sso']);
$routes->patch('/pelaporan/transaksi-aset', 'Pelaporan::dataTable', ['filter' => 'sso']);
