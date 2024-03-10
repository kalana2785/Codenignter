<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'imdashController::index' );

$routes->get('/Imanger/Add', 'imdashController::AddForm' );
$routes->get('/test', 'imdashController::testveiw' );

$routes->post('/Imanger/Additems', 'imdashController::store');

$routes->post('imdashController/action', 'imdashController::action');
