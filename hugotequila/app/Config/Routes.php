<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//http://localhost:8080/api/
$routes->group('api', ['namespace' => 'App\Controllers\API'], function($routes){

    //http://localhost:8080/api/trabajador
    $routes->get('trabajador', 'Trabajador::index');
    #########################################################
    //http://localhost:8080/api/trabajador/create
    $routes->post('trabajador/create', 'Trabajador::create');
    #########################################################
    //http://localhost:8080/api/trabajador/update/
    $routes->put('trabajador/update/(:num)', 'Trabajador::update/$1');
    #########################################################
    //http://localhost:8080/api/trabajador/delete/
    $routes->delete('trabajador/delete/(:num)', 'Trabajador::delete/$1');


    //http://localhost:8080/api/comprador
    $routes->get('comprador', 'Comprador::index');
    #########################################################
    //http://localhost:8080/api/comprador/create
    $routes->post('comprador/create', 'Comprador::create');
    #########################################################
    //http://localhost:8080/api/comprador/update/
    $routes->put('comprador/update/(:num)', 'Comprador::update/$1');
    #########################################################
    //http://localhost:8080/api/comprador/delete/
    $routes->delete('comprador/delete/(:num)', 'Comprador::delete/$1');


    //http://localhost:8080/api/catalogo
    $routes->get('catalogo', 'Catalogo::index');
    #########################################################
    //http://localhost:8080/api/catalogo/create
    $routes->post('catalogo/create', 'Catalogo::create');
    #########################################################
    //http://localhost:8080/api/catalogo/update/
    $routes->put('catalogo/update/(:num)', 'Catalogo::update/$1');
    #########################################################
    //http://localhost:8080/api/catalogo/delete/
    $routes->delete('catalogo/delete/(:num)', 'Catalogo::delete/$1');


    //http://localhost:8080/api/producto
    $routes->get('producto', 'Producto::index');
    #########################################################
    //http://localhost:8080/api/producto/create
    $routes->post('producto/create', 'Producto::create');
    #########################################################
    //http://localhost:8080/api/producto/update/
    $routes->put('producto/update/(:num)', 'Producto::update/$1');
    #########################################################
    //http://localhost:8080/api/producto/delete/
    $routes->delete('producto/delete/(:num)', 'Producto::delete/$1');

    
    //http://localhost:8080/api/venta
    $routes->get('venta', 'Venta::index');
    #########################################################
    //http://localhost:8080/api/venta/create
    $routes->post('venta/create', 'Venta::create');
    #########################################################
    //http://localhost:8080/api/venta/update/
    $routes->put('venta/update/(:num)', 'Venta::update/$1');
    #########################################################
    //http://localhost:8080/api/venta/delete/
    $routes->delete('venta/delete/(:num)', 'Venta::delete/$1');


});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
