<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('auth', 'get', 'AuthController::auth');
Router::url('dashboard/logout', 'get', 'AuthController::logout');




Router::url('dashboard', 'get', 'DashboardController::index');
Router::url('transaksi/add', 'get', 'TransaksiController::add');
Router::url('transaksi/remove', 'get', 'TransaksiController::remove');
Router::url('transaksi/edit', 'get', 'TransaksiController::edit');



#POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('transaksi/add', 'post', 'TransaksiController::saveAdd');
Router::url('transaksi/edit', 'post', 'TransaksiController::saveEdit');


new Router();