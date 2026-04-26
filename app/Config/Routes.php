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
// Routes básico, hay que cambiarlo
$routes->get('/login', 'Auth::login');
$routes->post('auth/processLogin', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->get('/payment', 'Auth::payment');
$routes->post('auth/processRegister', 'Auth::processRegister');

$routes->get('/shop', 'ShopController::tienda');
$routes->get('/search', 'ShopController::buscar');

// Usuarios
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('home', 'UserController::index');
    $routes->get('routines', 'UserController::routine');
    $routes->get('create-routine', 'UserController::createRoutine');
    $routes->get('chats', 'Chats::chats');
});

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
});
