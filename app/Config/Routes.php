<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas Stripe, gestion de suscripciones , pagos unicos, y resultados
$routes->post('stripe/subscription', 'StripeController::subscription');
$routes->get('pago-exito', 'StripeController::pagoExito');
$routes->get('pago-cancelado', 'StripeController::pagoCancelado');
$routes->post('webhooks/stripe', 'WebhookController::index');
// Routes básico, hay que cambiarlo
$routes->get('/login', 'Auth::login');
$routes->post('auth/processLogin', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->get('/payment', 'Auth::payment');
$routes->post('auth/processRegister', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');
// Vista al borrar la cuenta con stripe 
$routes->get('/shop', 'ShopController::tienda');
$routes->get('/search', 'ShopController::buscar');

// Usuarios
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('home', 'UserController::index');
    $routes->get('routine', 'UserController::routine');
    // Rutinas
    $routes->get('routine/new', 'UserController::createRoutine');
    $routes->post('routine/store', 'UserController::storeExercise');
    $routes->get('routine/edit/(:num)', 'UserController::editExercise/$1');
    $routes->post('routine/update/(:num)', 'UserController::updateExercise/$1');
    // Chats
    $routes->get('chats', 'Chat::index');
    $routes->get('chats/(:num)', 'Chat::index/$1');
    $routes->post('chat/sendMessage', 'Chat::sendMessage');
    $routes->get('chats/nuevo', 'Chat::nuevo');
    // Clases
    $routes->get('clases', 'UserController::clases');
    $routes->get('clases/reservar/(:num)', 'UserController::reservar/$1');
    $routes->get('misClases', 'UserController::misClases');
    $routes->get('clases/cancelar/(:num)', 'UserController::cancelarReserva/$1');
    // Cuenta
    $routes->get('cuenta', 'UserController::cuenta');
    $routes->get('portal-suscripcion', 'StripeController::portalSuscripcion');
});

// Administrador
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('setTask', 'Admin::getTrabajadores');
    $routes->post('saveTask', 'Admin::saveTask');
    $routes->get('usersAdmin', 'Admin::getUsers');
    $routes->get('editUser/(:num)', 'Admin::editUser/$1');
    $routes->post('updateUser/(:num)', 'Admin::updateUser/$1');
    $routes->get('clasesAdmin', 'Admin::getClases');
    $routes->get('createClase', 'Admin::createClase');
    $routes->post('saveClase', 'Admin::saveClase');
    $routes->get('createUser', 'Admin::createUser');
    $routes->post('saveUser', 'Admin::saveUser');
    $routes->post('deleteUser/(:num)', 'Admin::deleteUser/$1');
});

//Trabajador
$routes->group('worker', ['filter' => 'worker'], function ($routes) {
    $routes->get('myTasks', 'Worker::myTasks');
    $routes->post('completeTask/(:num)', 'Worker::completeTask/$1');
});

// Tickets

$routes->group('tickets', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'TicketsController::index');             
    $routes->get('nuevo', 'TicketsController::crear');         
    $routes->post('guardar', 'TicketsController::guardar');    
    $routes->get('ver/(:num)', 'TicketsController::ver/$1');  
});

// Soporte
$routes->group('soporte', ['filter' => 'support'], function($routes) {
    $routes->get('pendientes', 'SoporteController::pendientes'); 
    $routes->get('tomar/(:num)', 'SoporteController::asignar/$1');
    $routes->get('mis-casos', 'SoporteController::misCasos');
    $routes->post('resolver/(:num)', 'SoporteController::resolver/$1');
});