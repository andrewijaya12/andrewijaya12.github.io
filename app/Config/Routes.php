<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Auth
$routes->get('/', 'AuthController::index');
$routes->get('/regis', 'AuthController::regis');
$routes->get('/forgot-password', 'AuthController::forgot');
// Akhir Auth

// Info
$routes->get('/info', 'DashboardController::info', ['filter' => 'authfilter']);
// Akhir Info

// Dashboard
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authfilter']);
// Akhir Dashboard

// Pegawai
$routes->get('/pegawai', 'PegawaiController::index', ['filter' => 'authfilter']);
$routes->get('/edit-pegawai/(:num)', 'PegawaiController::edit/$1', ['filter' => 'authfilter']);
// Akhir Pegawai

// Gaji
$routes->get('/gaji', 'GajiController::index', ['filter' => 'authfilter']);
$routes->get('/edit-gaji/(:num)', 'GajiController::edit/$1', ['filter' => 'authfilter']);
$routes->get('/slip-gaji', 'GajiController::slip_gaji', ['filter' => 'authfilter']);
$routes->get('/detail-slip-gaji/(:num)', 'GajiController::detail_slip/$1', ['filter' => 'authfilter']);
// Akhir Gaji

// Kontrak
$routes->get('/kontrak', 'KontrakController::index', ['filter' => 'authfilter']);
$routes->get('/edit-kontrak/(:num)', 'KontrakController::edit/$1', ['filter' => 'authfilter']);
// Akhir Kontrak

// Pengeluaran
$routes->get('/pengeluaran', 'PengeluaranController::index', ['filter' => 'authfilter']);
$routes->get('/edit-pengeluaran/(:num)', 'PengeluaranController::edit/$1', ['filter' => 'authfilter']);
// Akhir Pengeluaran

// Laporan Keuangan
$routes->get('/laporan-keuangan', 'LaporanController::laporan_keuangan', ['filter' => 'authfilter']);
$routes->get('/cetak-laporan-keuangan/(:any)/(:any)', 'LaporanController::cetak_keuangan/$1/$2', ['filter' => 'authfilter']);
// Akhir Laporan Keuangan

// Laporan Kontrak
$routes->get('/laporan-kontrak', 'LaporanController::laporan_kontrak', ['filter' => 'authfilter']);
$routes->get('/cetak-laporan-kontrak/(:any)/(:any)', 'LaporanController::cetak_kontrak/$1/$2', ['filter' => 'authfilter']);
// Akhir Laporan Kontrak


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
