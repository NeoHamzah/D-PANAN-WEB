<?php

include_once 'model/gedung_model.php';
include_once 'model/transaksi_model.php';

class GedungController
{
    static function saveActive()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $updateGedung = Gedung::updateActive($_GET['id']);

            if ($updateGedung) {
                header('Location: ' . BASEURL . 'dashboard/data-gedung');
            } else {
                header('Location: ' . BASEURL . 'dashboard/data-gedung/activate?id=' . $_GET['id'] . '&editFailed=true');
            }
        }
    }

    static function saveInactive()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $updateGedung = Gedung::updateInactive($_GET['id']);

            if ($updateGedung) {
                header('Location: ' . BASEURL . 'dashboard/data-gedung');
            } else {
                header('Location: ' . BASEURL . 'dashboard/data-gedung/deactivate?id=' . $_GET['id'] . '&editFailed=true');
            }
        }
    }

    static function detailGedung() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'renter') {
                view('renter/layout', [
                    'url' => 'detail_gedung',
                    'detailGedung' => Gedung::selectSatuGedung($_GET['gedung']),
                    'lapangan' => Gedung::selectLapangan($_GET['gedung']),
                    'jam' => Gedung::selectJam(),
                    'transaksi' => Transaksi::selectTransaksiGedung($_GET['gedung']),
                ]);
            } else {
                header('Location: '.BASEURL.'auth?auth=false');
                exit;
            }
        }
    }

    // static function dGedung() {
    //     if (!isset($_SESSION['user'])) {
    //         header('Location: '.BASEURL.'auth?auth=false');
    //         exit;
    //     } else {
    //         if ($_SESSION['user']['role'] === 'renter') {
    //             view('renter/layout', [
    //                 'url' => 'data_gedung',
    //                 'detailGedung' => Gedung::selectSatuGedung($_GET['gedung']),
    //                 'lapangan' => Gedung::selectLapangan($_GET['gedung']),
    //                 'jam' => Gedung::selectJam(),
    //                 'transaksi' => Transaksi::selectTransaksiGedung($_GET['gedung']),
    //             ]);
    //         } else {
    //             header('Location: '.BASEURL.'auth?auth=false');
    //             exit;
    //         }
    //     }
    // }


}