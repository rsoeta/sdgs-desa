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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'register', 'UserController::register', ["filter" => "noauth"]);
// // Admin routes
// $routes->group('admin', ['filter' => 'auth'], function ($routes) {
// 	$routes->get('dashboard', 'Dashboard::index');
// });
// // Editor routes
// $routes->group('user', ['filter' => 'auth'], function ($routes) {
// 	$routes->get('dashboard', 'Dashboard::index');
// });
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('chart', 'Chart::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'individu', 'Individu::index', ['filter' => 'auth']);
$routes->post('get_rt', 'Individu::get_rt', ['filter' => 'auth']);
$routes->get('user', 'User::index', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'update_status/(:num)/(:num)', 'User::update_status/$1/$2', ['filter' => 'auth']);
$routes->get('setting', 'UserController::setting', ['filter' => 'auth']);
$routes->get('individu', 'Individu::index', ['filter' => 'auth']);
$routes->get('tambahindividu', 'Individu::formtambah', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'formview/(:num)', 'Individu::edit/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'individutmb', 'Individu::individutmb', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'individuedit/(:num)', 'Individu::individuedit/$1', ['filter' => 'auth']);
$routes->post('updateData', 'UserController::updateData', ['filter' => 'auth']);

$routes->get('logout', 'UserController::logout');

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
