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

// Database
$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('yukNikah')) {
        echo 'Database created!';
    }
});

// Routes login
$routes->get('login', 'Auth::login');

$routes->post('gawe', 'Gawe::store');
// $routes->get('/', 'Home::index');
$routes->addRedirect('/', 'home');
$routes->get('gawe/edit/(:any)', 'Gawe::edit/$1');
$routes->put('gawe/(:any)', 'Gawe::update/$1');
$routes->delete('gawe/(:num)', 'Gawe::delete/$1');

$routes->get('groups/trash', 'Groups::trash');
$routes->get('groups/restore/(:num)', 'Groups::restore/$1');
$routes->get('groups/restore', 'Groups::restore');
$routes->delete('groups/delete2/(:any)', 'Groups::delete2/$1');
$routes->delete('groups/delete2', 'Groups::delete2');
// Routes presenter
$routes->presenter('groups', ['filter' => 'isLoggedIn']);

// Routes controller
$routes->resource('contacts', ['filter' => 'isLoggedIn']);

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