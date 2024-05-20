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

$routes->get('/Imanger/Add', 'imdashController::Additemsrequest' );

$routes->get('/Imanger/Additemreq', 'imdashController::Additemsrequesttable' );


$routes->post('imdashController/action', 'imdashController::action');



$routes->post('imdashController/actionquntity', 'imdashController::actionquntity');

$routes->get('Imanger/edit/(:num)','imdashController::edit/$1');

$routes->put('Imanger/update/(:num)','imdashController::update/$1');

$routes->get('Imanger/editq/(:num)','imdashController::quntity/$1');

$routes->put('Imanger/updatet/(:num)','imdashController::insertinventory/$1');


$routes->get('Imanger/Requset', 'imdashController::Requesttable' );
$routes->get('Imanger/requestitems/(:num)/(:num)', 'imdashController::Requestitems/$1/$2' );
$routes->put('Imanger/reupdate/(:num)', 'ImdashController::updaterequestgeneral/$1');
$routes->get('Imanger/requestitemssecond/(:num)', 'imdashController::Requestitemssu/$1' );
$routes->put('Imanger/reupdatesu/(:num)', 'ImdashController::updaterequestsugical/$1');


$routes->get('Imanger/Requsetre', 'imdashController::Requestrepairtable' );// repair
$routes->get('Imanger/requestrepair/(:num)', 'imdashController::Requestrepiritems/$1' );
$routes->put('Imanger/repairupdate/(:num)', 'ImdashController::repairupdate/$1');
$routes->get('Imanger/Purchmentview', 'imdashController::Purchmentview' );
$routes->get('Imanger/Itemsusage/(:num)', 'imdashController::Itemsusage/$1' );
$routes->get('imanger/Purchmentorderview', 'imdashController::Purchmentorder');

$routes->post('Imanger/submit_order', 'imdashController::submitOrder');
$routes->get('Imanger/Prequset', 'imdashController::Requestpurchtable' );// purchmentt
$routes->get('Imanger/viewpurchment/(:any)', 'imdashController::Viewp/$1');
$routes->get('Imanger/addinventoryg/(:num)','imdashController::addgeneralinventory/$1');

$routes->post('Imanger/addginventory','imdashController::storegeneralinventory');

$routes->get('Imanger/Sdistribute/(:num)','imdashController::viewsugicaldistribute/$1');





// general inventory Manger


$routes->get('/generalim', 'imgeneralController::index' );










//Admin Pannel

$routes->get('/Admin', 'AdminController::index');

$routes->get('Admin/Add', 'AdminController::Addinvitemsrequest');

$routes->get('Admin/delete/(:num)','AdminController::delete/$1');

$routes->post('Admin/Additems', 'AdminController::storeitems');



$routes->get('Admin/requestdemand', 'AdminController::demandtable');
$routes->get('Admin/Add-user', 'AdminController::Adduser');

$routes->get('Admin/Add-type', 'AdminController::Addtype');

$routes->post('Admin/Addnewtype', 'AdminController::savetype');

$routes->get('Admin/Add-unit', 'AdminController::Addunit');

$routes->post('Admin/Addunittype', 'AdminController::saveunit');

$routes->get('Admin/itemtypetable', 'AdminController::itemtypetable');

$routes->get('Admin/unittable', 'AdminController::unittable');

$routes->post('Admin/Addnewuser', 'AdminController::saveuser');

$routes->get('Admin/Drequset', 'AdminController::Reqtable' );

$routes->get('Admin/editq/(:num)/(:num)', 'AdminController::viewreq/$1/$2');


$routes->put('Admin/updatet/(:num)/(:num)/(:num)', 'AdminController::updatereq/$1/$2/$3');

$routes->get('Admin/approvalgen/(:num)', 'AdminController::Approvalgen/$1');


$routes->post('Admin/addinventory', 'AdminController::addunutinventory');



$routes->get('Admin/Repair', 'AdminController::Reqreptable' );

$routes->get('Admin/requestrepair/(:num)', 'AdminController::Requestrepiritems/$1' );

$routes->get('Admin/purchment', 'AdminController::Requestpurchtable' );

$routes->get('Admin/viewpurchment/(:num)', 'AdminController::Viewp/$1');

$routes->put('Admin/approvep/(:num)', 'AdminController::Approvalpuc/$1');

$routes->get('Admin/Inreq', 'AdminController::Additemsrequest' );

$routes->get('Admin/viewinventoryreq/(:num)', 'AdminController::Inventoryreqview/$1' );

$routes->put('Admin/Approvalinv/(:num)', 'AdminController::Inventoryupdate/$1');

$routes->get('Admin/addreq', 'AdminController::Addreqtable' );

$routes->post('Admin/adddemandform', 'AdminController::viewdemandform' );

$routes->get('Admin/logintab', 'AdminController::Logintable' );



// unit user 

$routes->get('/Unit', 'UnitController::index');
$routes->get('unit/req', 'UnitController::req');
$routes->post('unit/request', 'UnitController::request');
$routes->get('unit/repairtable', 'UnitController::repairtab');
$routes->get('unit/reqre/(:num)', 'UnitController::reqre/$1');
$routes->post('/unit/requestre', 'UnitController::requestre');
$routes->get('unit/requestrepair/(:num)', 'UnitController::Requestrepiritems/$1' );
$routes->get('unit/requesttable', 'UnitController::requesttable');
$routes->get('unit/fulld/(:num)/(:num)', 'UnitController::unititemfull/$1/$2');


