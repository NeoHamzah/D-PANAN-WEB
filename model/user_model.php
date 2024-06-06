<?php

include_once 'config/conn.php';

class User {
    static function login($data=[]) {
        extract($data);
        global $conn;
        $error = [];

        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($result) === 1) {
            $result = $result->fetch_assoc();
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) { return $result; }
            else { $error += ['password' => 'Password salah!']; }
        }
        else { 
            $error += ['username' => 'Username anda tidak ditemukan!']; 
        }

        return $error;
    }

    static function register($data=[]) {
        extract($data);
        global $conn;
        $error = [];
        $email = strtolower($email);
        $username = strtolower($username);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = strtolower($role);

        if ($email === "" || $username === "" || $password === ""){
            return false;
        } else {
            $usr = $conn->query("SELECT * FROM users WHERE username = '$username'");
            $eml = $conn->query("SELECT * FROM users WHERE email = '$email'");
            if (mysqli_num_rows($usr) > 0) {
                $error += ['username' => 'Username sudah ada!'];
            }

            if (mysqli_num_rows($eml) > 0) {
                $error += ['email' => 'Email sudah ada!'];
            }

            if (strlen($password) < 8){
                $error += ['password' => 'Password minimal 8 karakter!'];
            }
            
            if ($error != []) {
                return $error;
            } else {
                $sql = "INSERT INTO users SET username = ?, email = ?, password = ?, role = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssss', $username, $email, $hashedPassword, $role);
                $stmt->execute();
    
                $result = $stmt->affected_rows > 0 ? true : false;

                return $result;
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
    // static function getPassword($username) { 
    //     global $conn;
    //     $sql = "SELECT password FROM users WHERE username = ?";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param('s', $username);
    //     $stmt->execute();

    //     $result = $stmt->affected_rows > 0 ? true : false;
    //     return $result;
    // }

    // static function update($data=[]) {}

    // static function delete($id='') {}
}