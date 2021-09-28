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
$routes->setDefaultController('Home');
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
//siswa routes
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');
$routes->get('/siswa/tes', 'siswa/Siswa::tes');
$routes->get('/siswa', 'Siswa::index');
$routes->get('/siswa/edit/(:any)', 'Siswa::edit/$1');
$routes->post('/siswa/update/(:any)', 'Siswa::update/$1');
$routes->get('/siswa/tambah', 'Siswa::create');
$routes->post('/siswa/save', 'Siswa::save');
$routes->delete('/siswa/delete/(:num)', 'Siswa::delete/$1');

//kelas routes
$routes->get('/kelas', 'Kelas::index');
$routes->get('/kelas/tambah', 'Kelas::tambah');
$routes->get('/kelas/edit/$1', 'Kelas::edit/$1');
$routes->get('/kelas/delete/(:num)', 'Kelas::delete/$1');
$routes->get('/kelas/siswa/(:num)', 'Kelas::siswa/$1');



//login logout routes
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
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