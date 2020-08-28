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
	$routes->get('/', 'BongkarMuat');
	$routes->get('ubah', 'BongkarMuat::ubah');
	$routes->post('ganti/(:any)', 'BongkarMuat::ganti/$1');
	$routes->get('detail', 'BongkarMuat::detail');
	$routes->get('autofill3', 'BongkarMuat::autofill3');
});


// BATAL MUAT
$routes->group('batal', function ($route) {
	$route->get('/', 'BatalMuat');
	$route->get('batal/(:any)', 'BatalMuat::batal/$1');
});

// PEMBAYARAN
$routes->group('bayar', function ($routes) {
	$routes->get('/', 'Pembayaran');
	$routes->get('ubah/(:any)', 'Pembayaran::ubah/$1');
	$routes->post('ganti/(:any)', 'Pembayaran::ganti/$1');
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
