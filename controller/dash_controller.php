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
                $gedung = Gedung::selectSatuGedungOwner($_SESSION['user']['id_user']);
                view('owner/layout', [
                    'url' => 'home',
                    // 'transaksi' => Transaksi::selectTransaksiGedungTotal($gedung[0]['slug']),
                    'detailGedung' => Gedung::selectSatuGedung($gedung[0]['slug']),
                    'lapangan' => Gedung::selectLapangan($gedung[0]['slug']),
                    'jam' => Gedung::selectJam(),
                    'transaksi' => Transaksi::selectTransaksiGedung($gedung[0]['slug'])
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
}