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
    $routes->get('teams', 'Teams');
    $routes->get('events', 'Events');
    $routes->get('rankings', 'Rankings');
});

/**
 * Route group for backend views
 */
$routes->group('/backend', ['namespace' => '\App\Controllers\Backend'], static function ($routes) {
    //auth
    service('auth')->routes($routes);
    
    //backend
    $routes->get('dashboard', 'Dashboard');
    $routes->get('activity', 'Activity');
    $routes->get('team', 'Team');

    $routes->group('http', ['namespace' => '\App\Controllers\Backend\Http'], static function ($routes) {
        $routes->get('team/getAll', 'HttpTeam::getAll');
    });
});