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
$session = session();
if(!session()->get('isLoggedIn')){
    $routes->get('/home', 'UserController::index');
    $routes->get('/routines', 'UserController::routine');
    $routes->get('/create-routine', 'UserController::createRoutine'); // <-- Editar esta ruta
    $routes->get('/chats' , 'UserController::chats');
} else
    return redirect()->to('/');
