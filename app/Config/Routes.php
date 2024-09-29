<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



/**
 * Route group for public views
 */
$routes->group('/', ['namespace' => '\App\Controllers\Public'], static function ($routes) {
    $routes->get('', 'Home');
    $routes->get('public', 'Home');
});

/**
 * Route group for backend views
 */
$routes->group('/backend', ['namespace' => '\App\Controllers\Backend'], static function ($routes) {
    //auth
    service('auth')->routes($routes);
    
    //backend
    $routes->get('', 'Home');
});