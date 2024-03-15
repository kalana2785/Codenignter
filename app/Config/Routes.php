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

$routes->get('Imanger/edit/(:num)','imdashController::edit/$1');

$routes->put('Imanger/update/(:num)','imdashController::update/$1');

$routes->get('Imanger/editq/(:num)','imdashController::quntity/$1');

$routes->put('Imanger/updatet/(:num)','imdashController::updatetotal/$1');