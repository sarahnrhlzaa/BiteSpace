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

    // // Menu — GET bisa semua, POST/PUT/DELETE hanya admin
    // $routes->get('menu',               'MenuController::index');
    // $routes->get('menu/(:num)',        'MenuController::show/$1');

    // Menu (admin only)
    $routes->group('menu', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('/',            'MenuController::index');
    $routes->get('create',       'MenuController::create');
    $routes->post('store',       'MenuController::store');
    $routes->get('edit/(:num)',  'MenuController::edit/$1');
    $routes->put('update/(:num)', 'MenuController::update/$1');
    $routes->post('delete/(:num)', 'MenuController::delete/$1');
    $routes->post('toggle/(:num)', 'MenuController::toggle/$1');
});

// ── TABLE ──
$routes->group('table', ['filter' => 'auth'], function ($routes) {
    $routes->get ('/',              'TableController::index');                           // admin + kasir (read only)
    $routes->get ('edit/(:num)',    'TableController::edit/$1',    ['filter' => 'admin']);
    $routes->post('store',          'TableController::store',      ['filter' => 'admin']);
    $routes->post('update/(:num)',  'TableController::update/$1',  ['filter' => 'admin']);
    $routes->post('delete/(:num)',  'TableController::delete/$1',  ['filter' => 'admin']);
    $routes->post('status/(:num)',  'TableController::updateStatus/$1');                // AJAX dari POS (auth)
});
    // Laporan — kasir hanya lihat miliknya, dihandle di controller
    $routes->get('laporan',            'LaporanController::index');
    $routes->get('laporan/income',     'LaporanController::income');
    $routes->get('laporan/detail/(:num)', 'LaporanController::detail/$1');

    // Payment
    $routes->post('payment/process',   'PaymentController::process');
    $routes->get('payment/success/(:num)', 'PaymentController::success/$1');

    // ── Admin-only routes ──
    $routes->group('', ['filter' => 'auth:admin'], function($routes) {

        $routes->get('/',            'MenuController::index');
        $routes->get('create',       'MenuController::create');
        $routes->post('store',       'MenuController::store');
        $routes->get('edit/(:num)',  'MenuController::edit/$1');
        $routes->put('update/(:num)', 'MenuController::update/$1');
        $routes->post('delete/(:num)', 'MenuController::delete/$1');
        $routes->post('toggle/(:num)', 'MenuController::toggle/$1');

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