<?php

include_once 'config/conn.php';

class Gedung
{
    static function select()
    {
        global $conn;
        $sql = "SELECT * FROM gedung WHERE status = 'active'";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectDataGedung()
    {
        global $conn;
        $sql = "SELECT id_gedung, nama_gedung, username, nomor_telepon, COUNT(nama_lapangan) AS jumlah_lapangan, status 
                FROM `gedung` 
                INNER JOIN users ON user_id = id_user 
                INNER JOIN detail_gedung ON id_gedung = gedung_id
                GROUP BY nama_gedung, username, status, nomor_telepon, id_gedung;";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectSatuGedung($slug)
    {
        global $conn;
        $sql = "SELECT * FROM gedung WHERE slug = '$slug'";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectLapangan($slug)
    {
        global $conn;
        $sql = "SELECT * FROM detail_gedung INNER JOIN gedung ON gedung_id = id_gedung WHERE slug = '$slug'";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function selectJam()
    {
        global $conn;
        $sql = "SELECT * FROM jam";
        $result = mysqli_query($conn, $sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($a = $result->fetch_array()) {
                $data[] = $a;
            }
        }
        return $data;
    }

    static function updateActive($id_gedung)
    {
        global $conn;
        $status = 'active';
        $stmt = $conn->prepare("UPDATE gedung set status=? WHERE id_gedung=" . $id_gedung);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }    

    static function updateInactive($id_gedung)
    {
        global $conn;
        $status = 'inactive';
        $stmt = $conn->prepare("UPDATE gedung set status=? WHERE id_gedung=" . $id_gedung);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        return $result;
    }
}