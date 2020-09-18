<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

// auth
$routes->group('Auth', function ($route) {
	$route->get('/', 'Auth');
	$route->post('login', 'Auth::login');
	$route->post('logout', 'Auth::logout');
});

// PELANGGAN
$routes->group('pelanggan', function ($routes) {
	$routes->get('/', 'Pelanggan');
	$routes->get('tambah', 'Pelanggan::tambah');
	$routes->post('insert', 'Pelanggan::insert');
	$routes->get('ubah/(:any)', 'Pelanggan::ubah/$1');
	$routes->post('update/(:any)', 'Pelanggan::update/$1');
	$routes->post('hapus/(:any)', 'Pelanggan::hapus/$1');
});

// KENDARAAN
$routes->group('Kendaraan', function ($routes) {
	$routes->get('/', 'Kendaraan');
	$routes->get('tambah', 'kendaraan::tambah');
	$routes->post('insert', 'kendaraan::insert');
	$routes->get('ubah/(:any)', 'kendaraan::ubah/$1');
	$routes->post('update/(:any)', 'kendaraan::update/$1');
	$routes->post('hapus/(:any)', 'kendaraan::hapus/$1');
});

// STATUS KENDARAAN
$routes->group('sk', function ($routes) {
	$routes->get('/', 'StatusKendaraan');
	$routes->get('ubah/(:any)', 'StatusKendaraan::ubah/$1');
	$routes->post('update/(:any)', 'StatusKendaraan::update/$1');
});

// SOPIR
$routes->group('driver', function ($routes) {
	$routes->get('/', 'Driver');
	$routes->get('tambah', 'Driver::tambah');
	$routes->post('insert', 'Driver::insert');
	$routes->get('ubah/(:any)', 'Driver::ubah/$1');
	$routes->post('update/(:any)', 'Driver::update/$1');
	$routes->post('hapus/(:any)', 'Driver::hapus/$1');
});

// PENGIRIMAN BARANG
$routes->group('kirim', function ($routes) {
	$routes->get('/', 'KirimBarang');
	$routes->get('tambah', 'KirimBarang::tambah');
	$routes->post('simpan', 'KirimBarang::simpan');
	// $routes->get('ubah/(:any)', 'KirimBarang::ubah/$1');
	// $routes->post('ganti/(:any)', 'KirimBarang::ganti/$1');
});


// BONGKAR MUAT
$routes->group('BM', function ($routes) {
	$routes->add('/', 'BongkarMuat');
	$routes->post('ubah', 'BongkarMuat::ubah');
	$routes->post('ganti/(:any)', 'BongkarMuat::ganti/$1');
	$routes->post('detail', 'BongkarMuat::detail');
	$routes->get('autofill3', 'BongkarMuat::autofill3');
	$routes->post('tambah', 'BongkarMuat::tambah');
	$routes->post('simpan', 'BongkarMuat::simpan');
});


// BATAL MUAT
$routes->group('batal', function ($routes) {
	$routes->get('/', 'BatalMuat');
	$routes->post('batal', 'BatalMuat::batal');
});

// PEMBAYARAN
$routes->group('bayar', function ($routes) {
	$routes->get('/', 'Pembayaran');
	// $routes->get('cariBySo', 'Pembayaran::cariBySo');
	$routes->post('terbilang', 'Pembayaran::terbilang');
	$routes->post('tambah', 'Pembayaran::tambah');
	$routes->post('simpan', 'Pembayaran::simpan');
	$routes->post('detail', 'Pembayaran::detail');
	$routes->post('edit', 'Pembayaran::edit');
	$routes->post('ubah', 'Pembayaran::ubah');
});

// LAPORAN
$routes->group('laporan', function ($routes) {
	$routes->get('Eksterkirim', 'Laporan::ekpedisi');
	$routes->get('pelanggan', 'Laporan::pelanggan');
	$routes->get('kendaraan', 'Laporan::kendaraan');
	$routes->get('supir', 'Laporan::supir');
	$routes->get('sk', 'Laporan::sk'); //status kendaraan
	$routes->post('kirim', 'Laporan::PengirimanPerperiode');
	$routes->post('bayar', 'Laporan::PembayaranPerperiode');
	$routes->post('invoice', 'Laporan::invoice');
	$routes->post('invoicesj', 'Laporan::invoicesj');
});

// LAPORAN PELANGGAN
$routes->group('lapel', function ($routes) {
	$routes->post('cetakSO', 'Laporan::cetakSO');
	$routes->post('cetakPembayaran', 'Laporan::cetakPemb');
});


// USER 
$routes->group('user', function ($routes) {
	$routes->get('/', 'User');
	$routes->post('tambah', 'User::tambah');
	$routes->post('simpan', 'User::simpan');
	// $routes->post('detail', 'User::detail');
	$routes->get('edit/(:num)', 'User::ubah/$1');
	$routes->post('update', 'User::update');
	$routes->get('hapus/(:num)', 'User::hapus/$1');
});


/**
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
