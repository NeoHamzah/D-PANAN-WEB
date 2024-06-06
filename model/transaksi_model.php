<?php

include_once 'config/conn.php';

class Transaksi
{
    static function select()
    {
        global $conn;
        $sql = "SELECT * FROM transaksi";
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
        $tanggal_transaksi = htmlspecialchars($data['tanggal_transaksi']); 
        $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
        $barang_disewa = htmlspecialchars($data['barang_disewa']);
        $jumlah_harga = htmlspecialchars($data['jumlah_harga']);
        $nomor_telepon = htmlspecialchars($data['nomor_telepon']);

        $gambar = self::upload();

        if (!$gambar) {
            return false;
        }

        $sql = "INSERT INTO transaksi(tanggal_transaksi, nama_penyewa, barang_disewa, jumlah_harga, nomor_telepon, gambar) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssiss', $tanggal_transaksi, $nama_penyewa, $barang_disewa, $jumlah_harga, $nomor_telepon, $gambar);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }
    static function upload()
    {

        $namaFile = $_FILES["struk"]["name"];
        $ukuranFile = $_FILES["struk"]["size"];
        $error = $_FILES["struk"]["error"];
        $tmpName = $_FILES["struk"]["tmp_name"];

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
                </script>;
                ";
                return false;
            } else if (in_array($ekstensiGambar, $eksentensiGambarValid)) {
                // cek jika ukurannya terlalu besar
                if ($ukuranFile > 1000000) {
                    echo "
                    <script>
                        alert('Ukuran gambar terlalu besar!')
                    </script>;
                    ";
                    return false;
                } else {
                    // generate nama file baru
                    $namaFileBaru = uniqid();
                    $namaFileBaru .= "." . $ekstensiGambar;
                    // lolos pengecekan, gambar siap diupload
                    move_uploaded_file($tmpName, 'img/struk/' . $namaFileBaru);
                    return $namaFileBaru;
                }
            }
        } else {
            return true;
        }
    }

    static function update($data)
    {
        global $conn;
        $id = htmlspecialchars($data['id_transaksi']);
        $tanggal_transaksi = htmlspecialchars($data['tanggal_transaksi']); 
        $nama_penyewa = htmlspecialchars($data['nama_penyewa']);
        $barang_disewa = htmlspecialchars($data['barang_disewa']);
        $jumlah_harga = htmlspecialchars($data['jumlah_harga']);
        $nomor_telepon = htmlspecialchars($data['nomor_telepon']);
        $gambarLama = htmlspecialchars($data['gambarLama']);

        // cek apakah user memilih gambar baru atau tidak
        if ($_FILES['struk']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = self::upload();
        }

        if (!$gambar) {
            return false;
        }

        $stmt = $conn->prepare("UPDATE transaksi set tanggal_transaksi=?, nama_penyewa=?, barang_disewa=?, jumlah_harga=?, nomor_telepon=?, gambar=? WHERE id_transaksi=?");
        $stmt->bind_param("sssissi", $tanggal_transaksi, $nama_penyewa, $barang_disewa, $jumlah_harga, $nomor_telepon, $gambar, $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
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

    static function deleteGambar($id_transaksi)
    {
        global $conn;
        $gambar = 'none';
        $stmt = $conn->prepare("UPDATE transaksi set gambar=? WHERE id_transaksi=" . $id_transaksi);
        $stmt->bind_param("s", $gambar);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }
}
