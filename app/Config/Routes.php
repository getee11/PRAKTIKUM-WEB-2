<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Auth routes (public)
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::store');
$routes->get('/logout', 'AuthController::logout');

// Protected routes (require authentication)
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

// Buku CRUD routes (require authentication)
$routes->get('/buku', 'BukuController::index', ['filter' => 'auth']);
$routes->get('/buku/create', 'BukuController::create', ['filter' => 'auth']);
$routes->post('/buku/store', 'BukuController::store', ['filter' => 'auth']);
$routes->get('/buku/show/(:num)', 'BukuController::show/$1', ['filter' => 'auth']);
$routes->get('/buku/edit/(:num)', 'BukuController::edit/$1', ['filter' => 'auth']);
$routes->post('/buku/update/(:num)', 'BukuController::update/$1', ['filter' => 'auth']);
$routes->get('/buku/delete/(:num)', 'BukuController::delete/$1', ['filter' => 'auth']);

// Default redirect to login
$routes->get('/', 'AuthController::login');
