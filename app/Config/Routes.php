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
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->put('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/generate-pdf', 'Barang::generatePDF');
