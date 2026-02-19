<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Routes básico, hay que cambiarlo
$routes->get('/login' , 'Auth::login');
$routes->get('/register' , 'Auth::register');
$routes->get('/payment' , 'Auth::payment');

$routes->get('/shop', 'ShopController::tienda');
$routes->get('/search', 'ShopController::buscar');
