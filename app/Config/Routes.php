<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// user login

$routes->post('user/login','LoginController::index');
$routes->get('user/logout','LoginController::logout');
$routes->get('/forgot','LoginController::forgotview');
$routes->post('user/forgot','LoginController::Forgotpassword');
$route['LoginController/resetpassword/(:any)'] = 'LoginController/resetpassword/$1';

$routes->get('resetp','LoginController::updatepassword');

// inventory Manger
$routes->get('/dashboard', 'imdashController::index' );

$routes->get('/Imanger/Add', 'imdashController::AddForm' );
$routes->get('/test', 'imdashController::testveiw' );

$routes->post('/Imanger/Additems', 'imdashController::store');

$routes->post('imdashController/action', 'imdashController::action');

$routes->get('Imanger/edit/(:num)','imdashController::edit/$1');

$routes->put('Imanger/update/(:num)','imdashController::update/$1');

$routes->get('Imanger/editq/(:num)','imdashController::quntity/$1');

$routes->put('Imanger/updatet/(:num)','imdashController::updatetotal/$1');


//Admin Pannel

$routes->get('/Admin', 'AdminController::index');

$routes->get('Admin/delete/(:num)','AdminController::delete/$1');

$routes->get('Admin/Add-user', 'AdminController::Adduser');

$routes->post('Admin/Addnewuser', 'AdminController::saveuser');


// unit user 

$routes->get('/Unit', 'UnitController::index');
$routes->get('unit/req/(:num)', 'UnitController::req/$1');


