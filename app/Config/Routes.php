<?php namespace Config;

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
$routes->get('/alumni', 'Alumni::login');
$routes->get('/alumni/p/(:num)', 'Alumni::index/$1');
$routes->get('/berita', 'Berita::index/1');
$routes->get('/berita/p/(:num)', 'Berita::index/$1');
$routes->get('/berita/id/(:num)', 'Berita::detail/$1');
//$routes->post('/alumni/show_detail', 'Alumni::show_detail');
$routes->get('/admin', 'Admin::berita/1');
$routes->get('/admin/berita', 'Admin::berita/1');
$routes->get('/admin/alumni', 'Admin::alumni/1');
$routes->get('/admin/kegiatan', 'Admin::kegiatan/1');

$routes->get('/admin/alumni/p/(:num)', 'Admin::alumni/$1');
$routes->post('/admin/alumni/update/(:num)', 'Admin::setting_alumni/$1');
$routes->get('/admin/alumni/update/(:num)', 'Admin::setting_alumni/$1');
$routes->get('/admin/berita/p/(:num)', 'Admin::berita/$1');
$routes->post('/admin/berita/update/(:num)', 'Admin::setting_berita/$1');
$routes->get('/admin/berita/update/(:num)', 'Admin::setting_berita/$1');
$routes->post('/admin/berita/tambah', 'Admin::tambah_berita');
$routes->get('/admin/berita/tambah', 'Admin::tambah_berita');
$routes->get('/admin/kegiatan/p/(:num)', 'Admin::kegiatan/$1');
$routes->get('/admin/kegiatan/update/(:num)', 'Admin::setting_kegiatan/$1');
$routes->post('/admin/kegiatan/update/(:num)', 'Admin::setting_kegiatan/$1');
$routes->get('/admin/kegiatan/tambah', 'Admin::tambah_kegiatan');
$routes->post('/admin/kegiatan/tambah', 'Admin::tambah_kegiatan');
$routes->get('/admin/kegiatan/delete/(:num)', 'Admin::delete_kegiatan/$1');

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
