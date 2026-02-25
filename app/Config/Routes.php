<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ── Public routes (tanpa login) ──
$routes->get('/',      'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/login','LoginController::login');
$routes->get('/logout','LoginController::logout');

// ── Protected routes (wajib login) ──
$routes->group('', ['filter' => 'auth'], function($routes) {

    // Profil (semua role bisa akses)
    $routes->get('profile',                    'ProfileController::index');
    $routes->get('profile/edit',               'ProfileController::edit');
    $routes->post('profile/update',            'ProfileController::update');
    $routes->post('profile/change-password',   'ProfileController::changePassword');

    // Dashboard
    $routes->get('dashboard', 'DashboardController::index');

    // Transaksi (Admin & Kasir)
    $routes->get('transaksi',          'TransaksiController::index');
    $routes->post('transaksi/addCart', 'TransaksiController::addCart');
    $routes->post('transaksi/submit',  'TransaksiController::submit');

    // Menu — GET bisa semua, POST/PUT/DELETE hanya admin
    $routes->get('menu',               'MenuController::index');
    $routes->get('menu/(:num)',        'MenuController::show/$1');

    // Laporan — kasir hanya lihat miliknya, dihandle di controller
    $routes->get('laporan',            'LaporanController::index');
    $routes->get('laporan/income',     'LaporanController::income');
    $routes->get('laporan/detail/(:num)', 'LaporanController::detail/$1');

    // Payment
    $routes->post('payment/process',   'PaymentController::process');
    $routes->get('payment/success/(:num)', 'PaymentController::success/$1');

    // ── Admin-only routes ──
    $routes->group('', ['filter' => 'admin'], function($routes) {

        // Menu CRUD
        $routes->get('menu/create',        'MenuController::create');
        $routes->post('menu/store',        'MenuController::store');
        $routes->get('menu/edit/(:num)',   'MenuController::edit/$1');
        $routes->post('menu/update/(:num)','MenuController::update/$1');
        $routes->post('menu/delete/(:num)','MenuController::delete/$1');
        $routes->post('menu/toggle/(:num)','MenuController::toggle/$1');

        // Category CRUD
        $routes->get('category',               'CategoryController::index');
        $routes->get('category/create',        'CategoryController::create');
        $routes->post('category/store',        'CategoryController::store');
        $routes->get('category/edit/(:num)',   'CategoryController::edit/$1');
        $routes->post('category/update/(:num)','CategoryController::update/$1');
        $routes->post('category/delete/(:num)','CategoryController::delete/$1');

        // Employee CRUD
        $routes->get('employee',               'EmployeeController::index');
        $routes->get('employee/create',        'EmployeeController::create');
        $routes->post('employee/store',        'EmployeeController::store');
        $routes->get('employee/edit/(:num)',   'EmployeeController::edit/$1');
        $routes->post('employee/update/(:num)','EmployeeController::update/$1');
        $routes->post('employee/delete/(:num)','EmployeeController::delete/$1');
        $routes->post('employee/toggle/(:num)','EmployeeController::toggle/$1');
    });
});