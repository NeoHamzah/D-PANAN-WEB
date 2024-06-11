<?php

include_once 'model/transaksi_model.php';
include_once 'model/gedung_model.php';

class DashboardController {

    static function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'admin') {
                view('admin/layout', [
                    'url' => 'home',
                    'gedung' => Gedung::select()
                ]);
            } elseif ($_SESSION['user']['role'] === 'owner') {
                view('owner/layout', [
                    'url' => 'home',
                ]);
            } elseif ($_SESSION['user']['role'] === 'renter') {
                view('renter/layout', [
                    'url' => 'home',
                    'gedung' => Gedung::select()
                ]);
            }
            
        }
    }

    static function dataGedung() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'admin') {
                view('admin/layout', [
                    'url' => 'data_lapangan',
                    'dataGedung' => Gedung::selectDataGedung()
                ]);
            } else {
                header('Location: '.BASEURL.'auth?auth=false');
                exit;
            }
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