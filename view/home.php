<?php $title = 'D-PANAN'; ?>

<?php ob_start(); ?>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4 text-center">Welcome to Sewa Kamera App</h1>
        <p class="lead text-center">A simple app to manage your camera transaction.</p>
        <hr class="my-4">
        <p class="text-center">Sebenernya page ini muncul karena web saya ga punya homepage sih, jadinya ini aja jadi homepage awkaowkaowka.</p>
        <div class="btns d-flex justify-content-center">
            <a class="btn btn-primary btn-lg mr-2" href="<?= urlpath('dashboard'); ?>" role="button">Dashboard</a>
            <a class="btn btn-success btn-lg mr-2" href="<?= urlpath('auth'); ?>" role="button">Autorisasi</a>
        </div>
    </div>
</div>
<?php $body = ob_get_clean(); ?>

<?php include 'master.php'; ?>