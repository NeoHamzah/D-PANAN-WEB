<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('auth', 'get', 'AuthController::auth');
Router::url('dashboard/logout', 'get', 'AuthController::logout');
Router::url('dashboard', 'get', 'DashboardController::index');

#ADMIN dan RENTER
Router::url('dashboard/data-gedung', 'get', 'DashboardController::dataGedung');


#ADMIN
Router::url('dashboard/data-gedung/activate', 'get', 'GedungController::saveActive');
Router::url('dashboard/data-gedung/deactivate', 'get', 'GedungController::saveInactive');

#OWNER
Router::url('dashboard/kontrol-pesanan', 'get', 'TransaksiController::detailPesanan');
Router::url('dashboard/kontrol-pesanan/terima', 'get', 'TransaksiController::saveTerima');
Router::url('dashboard/kontrol-pesanan/tolak', 'get', 'TransaksiController::saveTolak');
Router::url('dashboard/kontrol-pesanan/remove', 'get', 'TransaksiController::remove');


#RENTER
Router::url('dashboard/detail-gedung', 'get', 'GedungController::detailGedung');
Router::url('dashboard/detail-gedung/add', 'post', 'TransaksiController::add');
Router::url('dashboard/pesanan-saya', 'get', 'TransaksiController::detailTransaksi');
// Router::url('dashboard/dgedung', 'get', 'GedungController::dGedung');




Router::url('transaksi/add', 'get', 'TransaksiController::add');
Router::url('transaksi/remove', 'get', 'TransaksiController::remove');
Router::url('transaksi/edit', 'get', 'TransaksiController::edit');



#POST
Router::url('login', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');

#RENTER
Router::url('dashboard/detail-gedung/addData', 'post', 'TransaksiController::saveAdd');



Router::url('transaksi/add', 'post', 'TransaksiController::saveAdd');
Router::url('transaksi/edit', 'post', 'TransaksiController::saveEdit');


new Router();