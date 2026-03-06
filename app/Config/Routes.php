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
$routes->get('/register', 'Auth::register');
$routes->get('/payment', 'Auth::payment');

$routes->get('/shop', 'ShopController::tienda');
$routes->get('/search', 'ShopController::buscar');

// Usuarios

$routes->get('/home', 'UserController::index');
$routes->get('/routines', 'UserController::routine');
$routes->get('/create-routine', 'UserController::createRoutine'); // <-- Editar esta ruta
