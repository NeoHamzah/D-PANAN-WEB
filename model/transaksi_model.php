<?php

include_once 'config/conn.php';

class Transaksi
{
    static function updateTerima($id_transaksi)
    {
        global $conn;
        $status = 'diterima';
        $stmt = $conn->prepare("UPDATE transaksi set status=? WHERE id_transaksi=" . $id_transaksi);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }

    static function updateTolak($id_transaksi)
    {
        global $conn;
        $status = 'ditolak';
        $stmt = $conn->prepare("UPDATE transaksi set status=? WHERE id_transaksi=" . $id_transaksi);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }

    static function selectTransaksiUser($username)
    {
        global $conn;
        $sql = "SELECT id_transaksi, username, tanggal, nama_gedung, jam_sewa, nama_lapangan, bukti_transfer, transaksi.status FROM `transaksi`
                INNER JOIN users ON user_id = id_user
                INNER JOIN detail_gedung ON detail_id = id_detail
                INNER JOIN gedung ON gedung_id = id_gedung
                INNER JOIN jam ON jam_id = id_jam
                WHERE username = '$username' ORDER BY id_transaksi DESC";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectTransaksiGedung($gedung)
    {
        global $conn;
        $sql = "SELECT id_transaksi, username, tanggal, nama_gedung, jam_sewa, nama_lapangan, bukti_transfer, transaksi.status FROM `transaksi`
                INNER JOIN users ON user_id = id_user
                INNER JOIN detail_gedung ON detail_id = id_detail
                INNER JOIN gedung ON gedung_id = id_gedung
                INNER JOIN jam ON jam_id = id_jam
                WHERE slug = '$gedung' AND transaksi.status = 'diterima' ORDER BY id_transaksi DESC";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectTransaksiGedungTotal($gedung)
    {
        global $conn;
        $sql = "SELECT id_transaksi, username, tanggal, nama_gedung, jam_sewa, nama_lapangan, bukti_transfer, transaksi.status FROM `transaksi`
                INNER JOIN users ON user_id = id_user
                INNER JOIN detail_gedung ON detail_id = id_detail
                INNER JOIN gedung ON gedung_id = id_gedung
                INNER JOIN jam ON jam_id = id_jam
                WHERE slug = '$gedung' ORDER BY id_transaksi DESC";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectSatu($id_transaksi)
    {
        global $conn;
        $sql = "SELECT * FROM transaksi WHERE id_transaksi=" . $id_transaksi;
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }
    static function create($data)
    {
        global $conn;
        $tanggal = htmlspecialchars($data['tanggal']);
        $idJam = htmlspecialchars($data['jam_id']);
        $idDetail = htmlspecialchars($data['detail_id']);
        $idUser = htmlspecialchars($data['user_id']);
        $status = 'diproses';
        $bukti = $data['bukti_transfer'];

        $sql = "INSERT INTO transaksi(detail_id, jam_id, user_id, tanggal, bukti_transfer, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiisss', $idDetail, $idJam, $idUser, $tanggal, $bukti, $status);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }

    static function upload()
    {

        $namaFile = $_FILES["bukti_transfer"]["name"];
        $ukuranFile = $_FILES["bukti_transfer"]["size"];
        $error = $_FILES["bukti_transfer"]["error"];
        $tmpName = $_FILES["bukti_transfer"]["tmp_name"];

        //cek apakah ada gambar yang di upload
        if ($error !== 4) {
            // cek apakah yang diupload gambar
            $eksentensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if (!in_array($ekstensiGambar, $eksentensiGambarValid)) {
                echo "
                <script>
                    alert('Upload hanya gambar, jangan file lain!')
                    window.location.href = '" . BASEURL . "dashboard/pesanan-saya';
                </script>;
                ";
                return false;
            } else if (in_array($ekstensiGambar, $eksentensiGambarValid)) {
                // cek jika ukurannya terlalu besar
                if ($ukuranFile > 1000000) {
                    echo "
                    <script>
                        alert('Ukuran gambar terlalu besar!')
                        window.location.href = '" . BASEURL . "dashboard/pesanan-saya';
                    </script>;
                    ";
                    return false;
                } else {
                    // generate nama file baru
                    $namaFileBaru = uniqid();
                    $namaFileBaru .= "." . $ekstensiGambar;
                    // lolos pengecekan, gambar siap diupload
                    move_uploaded_file($tmpName, 'img/bukti_transaksi/' . $namaFileBaru);
                    return $namaFileBaru;
                }
            }
        } else {
            return true;
        }
    }

    static function delete($id_transaksi)
    {
        global $conn;
        $query = "DELETE FROM transaksi WHERE id_transaksi=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id_transaksi);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }

    static function selectForEdit($id_transaksi)
    {
        global $conn;
        $sql = "SELECT id_transaksi, username, tanggal, nama_lapangan, jam_sewa, bukti_transfer, status FROM transaksi
        INNER JOIN users ON user_id = id_user
        INNER JOIN detail_gedung ON detail_id = id_detail
        INNER JOIN jam ON jam_id = id_jam
        WHERE id_transaksi=" . $id_transaksi;
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function rawQuery($sql)
    {
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
