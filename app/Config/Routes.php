<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/barang', 'Barang::index');
$routes->post('/barang/save', 'Barang::save');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');
// $routes->get('edit/(:num)', 'PempekController::edit/$1');
// $routes->post('update/(:num)', 'PempekController::update/$1');
