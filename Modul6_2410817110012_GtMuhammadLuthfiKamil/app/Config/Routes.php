<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/profil', 'Home::profil');
$routes->get('/detail/(:num)', 'Home::detail/$1');
