<?php $title = 'Dashboard'; ?>

<?php 
    ob_start();
    include 'style.css';
    $style = ob_get_clean(); 
?>

<?php
    if (isset($_GET['auth'])) {
        echo "<script>alert('Silahkan login terlebih dahulu');</script>";
    }
    if (isset($_GET['loginFailed'])) {
        echo "<script>alert('Login gagal');</script>";
    }
    if (isset($_GET['loginSuccess'])) {
        echo "<script>
            alert('Login berhasil!');
            window.location.href = '".BASEURL."dashboard';
        </script>";
        // header('refresh:0.1;url='.BASEURL.'dashboard');
    }
    if (isset($_GET['registerFailed'])) {
        echo "<script>alert('Register gagal');</script>";
    }
    if (isset($_GET['registerSuccess'])) {
        echo "<script>alert('Register berhasil!');</script>";
    }
    if (isset($_GET['register'])) {
        echo "<script>alert('Register berhasil!');</script>";
    }
    if (isset($url)) {
        include_once $url.'.php';
    }
?>

<?php include 'view/master.php'; ?>