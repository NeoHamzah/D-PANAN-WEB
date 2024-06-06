<?php

include_once 'model/transaksi_model.php';

class TransaksiController
{
    static function add()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            view('dash_page/layout', ['url' => 'view/transaksi_crud_page/add']);
        }
    }

    static function saveAdd()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $transaksi = Transaksi::create([
                'tanggal_transaksi' => $post['tanggal_transaksi'],
                'nama_penyewa' => $post['nama_penyewa'],
                'barang_disewa' => $post['barang_disewa'],
                'jumlah_harga' => $post['jumlah_harga'],
                'nomor_telepon' => $post['nomor_telepon'],
                'struk' => $post['struk'],
            ]);

            if ($transaksi) {
                header('Location: ' . BASEURL . 'dashboard');
            } else {
                header('Location: ' . BASEURL . 'dashboard/add?addFailed=true');
            }
        }
    }

    static function edit()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            view('dash_page/layout', [
                'url' => 'view/transaksi_crud_page/edit',
                'trs' => Transaksi::selectSatu($_GET['id'])
            ]);
        }
    }

    static function saveEdit()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $transaksi = Transaksi::update([
                'id_transaksi' => $post['id_transaksi'],
                'tanggal_transaksi' => $post['tanggal_transaksi'],
                'nama_penyewa' => $post['nama_penyewa'],
                'barang_disewa' => $post['barang_disewa'],
                'jumlah_harga' => $post['jumlah_harga'],
                'nomor_telepon' => $post['nomor_telepon'],
                'gambarLama' => $post['gambarLama'],
            ]);

            if ($transaksi) {
                header('Location: ' . BASEURL . 'dashboard');
            } else {
                header('Location: ' . BASEURL . 'transaksi/edit?id=' . $_GET['id'] . '&editFailed=true');
            }
        }
    }

    static function remove()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $transaksi = Transaksi::delete($_GET['id']);
            if ($transaksi) {
                header('Location: ' . BASEURL . 'dashboard');
            } else {
                header('Location: ' . BASEURL . 'dashboard?removeFailed=true');
            }
        }
    }

    static function rawQuery($sql) {
        global $conn;
        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $result->free();
        return $rows;
    }
}
