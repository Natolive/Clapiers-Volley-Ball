<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**
 * Route group for public views
 */
$routes->group('/', ['namespace' => '\App\Controllers\Public'], static function (RouteCollection $routes) {
    $routes->get('', 'Home');
    $routes->get('teams', 'ControllerPublicTeams');
    $routes->get('serve/(:any)', 'ControllerPublicServe::get/$1');
    $routes->get('events', 'Events');
    $routes->get('rankings', 'ControllerPublicRankings');
});

/**
 * Route group for backend views
 */
$routes->group('/backend', ['namespace' => '\App\Controllers\Backend'], static function (RouteCollection $routes) {
    //auth
    service('auth')->routes($routes);
    
    //backend
    $routes->get('dashboard', 'ControllerBackendDashboard');
    $routes->get('activity', 'ControllerBackendActivity');
    $routes->get('team', 'ControllerBackendTeam');
    $routes->get('calendar', 'ControllerBackendCalendar');

    $routes->group('http', ['namespace' => '\App\Controllers\Backend\Http'], static function ($routes) {
        $routes->get('serve/get/(:any)', 'HttpServe::get/$1');
        
        //teams
        $routes->get('team/getAll', 'HttpTeam::getAll');
        $routes->post('team/add', 'HttpTeam::add');
        $routes->delete('team/delete/(:num)', 'HttpTeam::delete/$1');
        //games
        $routes->get('game/get/(:num)', 'HttpGame::get/$1');
        $routes->get('game/getAll', 'HttpGame::getAll');
        $routes->post('game/add', 'HttpGame::add');
        $routes->post('game/update/(:num)', 'HttpGame::update/$1');
    });
});