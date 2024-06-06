<?php

include_once 'model/transaksi_model.php';

class DashboardController {
    static function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            view('dash_page/layout', [
                'url' => 'home',
                'transaksi' => Transaksi::select()]);
        }
    }

    // static function admin() {
    //     if (!isset($_SESSION['user'])) {
    //         header('Location: '.BASEURL.'login?auth=false');
    //         exit;
    //     }
    //     else {
    //         view('dash_page/layout', ['url' => 'admin', 'user' => $_SESSION['user']]);
    //     }
    // }

    // static function transaksi() {
    //     view('dash_page/layout', ['url' => 'transaksi', 'transaksi' => Transaksi::select(), 'user' => $_SESSION['user']]);
    // }
}