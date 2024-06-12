<?php

include_once 'model/transaksi_model.php';

class TransaksiController
{
    static function detailTransaksi() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'renter') {
                view('renter/layout', [
                    'url' => 'detail_pesanan',
                    'transaksi' => Transaksi::selectTransaksiUser($_SESSION['user']['username'], )
                ]);
            } else {
                header('Location: '.BASEURL.'auth?auth=false');
                exit;
            }
        }
    }

    static function detailPesanan() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'owner') {
                $gedung = Gedung::selectSatuGedungOwner($_SESSION['user']['id_user']);
                view('owner/layout', [
                    'url' => 'detail_pesanan',
                    'transaksi' => Transaksi::selectTransaksiGedungTotal($gedung[0]['slug'])
                ]);
            } else {
                header('Location: '.BASEURL.'auth?auth=false');
                exit;
            }
        }
    }

    static function add()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            if ($_SESSION['user']['role'] === 'renter') {
                $post = array_map('htmlspecialchars', $_POST);
                view('renter/layout', [
                    'url' => 'add',
                    'gedung' => $post['gedung'],
                    'lapangan' => Gedung::selectLapangan($post['slug']),
                    'transaksi' => Transaksi::selectTransaksiGedung($post['slug']),
                    'tanggal' => $post['tanggal'],
                    'an_rek' => $post['an_rek'],
                    'no_rek' => $post['no_rek'],
                    'harga_lapangan' => $post['harga_lapangan'],
                    'nomor_telepon' => $post['nomor_telepon'],
                    'jam' => Gedung::selectJam()
                ]);
            } else {
                header('Location: '.BASEURL.'auth?auth=false');
                exit;
            }
        }
    }

    static function saveAdd()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $bukti_transfer = Transaksi::upload(); 
            if (!$bukti_transfer) {
                return false; 
            }
            foreach ($_POST['pilihJamLap'] as $a) {
                $pieces = explode("_", $a);
                $idJam = $pieces[0];
                $idDetail = $pieces[1];
                $transaksi = Transaksi::create([
                    'detail_id' => $idDetail,
                    'jam_id' => $idJam,
                    'user_id' => $_SESSION['user']['id_user'],
                    'tanggal' => $_POST['tanggal'],
                    'bukti_transfer' => $bukti_transfer, 
                ]);
            }
            echo "<script>
            alert('Transaksi berhasil! Tunggu pesananmu diproses oleh admin');
            window.location.href = '".BASEURL."dashboard/pesanan-saya';
        </script>";
        }
    }

    static function saveTerima()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $updateTransaksi = Transaksi::updateTerima($_GET['id']);

            if ($updateTransaksi) {
                header('Location: ' . BASEURL . 'dashboard/kontrol-pesanan');
            } else {
                echo "<script>
                alert('Terima Gagal!');
                window.location.href = '".BASEURL."dashboard/kontrol-pesanan';
            </script>";
            }
        }
    }

    static function saveTolak()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'auth?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            $updateTransaksi = Transaksi::updateTolak($_GET['id']);

            if ($updateTransaksi) {
                header('Location: ' . BASEURL . 'dashboard/kontrol-pesanan');
            } else {
                echo "<script>
                alert('Tolak Gagal!');
                window.location.href = '".BASEURL."dashboard/kontrol-pesanan';
            </script>";
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
                header('Location: ' . BASEURL . 'dashboard/kontrol-pesanan');
            } else {
                echo "<script>
                alert('Hapus Gagal!');
                window.location.href = '".BASEURL."dashboard/kontrol-pesanan';
            </script>";
            }
        }
    }

    

    // static function edit()
    // {
    //     if (!isset($_SESSION['user'])) {
    //         header('Location: ' . BASEURL . 'auth?auth=false');
    //         exit;
    //     } else {
    //         $gedung = Gedung::selectSatuGedungOwner($_SESSION['user']['id_user']);
    //         view('owner/layout', [
    //             'url' => 'edit',
    //             'trs' => Transaksi::selectForEdit($_GET['id']),
    //             'gedung' => $gedung,
    //             'lapangan' => Gedung::selectLapangan($gedung[0]['slug']),
    //             'jam' => Gedung::selectJam(),
    //         ]);
    //     }
    // }

    // static function saveEdit()
    // {
    //     if (!isset($_SESSION['user'])) {
    //         header('Location: ' . BASEURL . 'auth?auth=false');
    //         exit;
    //     } else {
    //         $post = array_map('htmlspecialchars', $_POST);
    //         $transaksi = Transaksi::update([
    //             'id_transaksi' => $post['id_transaksi'],
    //             'jam_sewa' => $post['jam_sewa'],
    //             'nama_lapangan' => $post['nama_lapangan'],
    //         ]);

    //         if ($transaksi) {
    //             header('Location: ' . BASEURL . 'dashboard');
    //         } else {
    //             header('Location: ' . BASEURL . 'transaksi/edit?id=' . $_GET['id'] . '&editFailed=true');
    //         }
    //     }
    // }

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
