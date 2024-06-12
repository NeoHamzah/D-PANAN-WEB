<?php
if (isset($_GET['tanggal'])) {
    $tgll = $_GET['tanggal'];
} else {
    $tgll = '';
};

// var_dump($detailGedung[0]['slug'])
?>

<div class="container-top">
    <div class="con-detail">
        <p class="text-lg font-medium">Sewa Lapangan</p>
        <h1 class="text-[30px]">Dashboard</h1>
    </div>
    <div class="con-profile">
        <a href="">
            <h3>Halo, <?= $_SESSION['user']['username'] ?>👋</h3>
            <!-- <img src="img/profil-aril.jpg" alt="user profile" /> -->
        </a>
    </div>
</div>

<div class="container-bottom">
    <h2 class="text-[24px] font-bold">Gedung <?= $detailGedung[0]['nama_gedung'] ?></h2>
    <hr />
    <div class="aksi-atas">
        <form action="<?= urlpath('dashboard/detail-gedung/add'); ?>" method="post" >
                <input name="gedung" type="hidden" value="<?= $detailGedung[0]['nama_gedung'] ?>" >
                <input name="slug" type="hidden" value="<?= $detailGedung[0]['slug'] ?>" >
                <input name="an_rek" type="hidden" value="<?= $detailGedung[0]['an_rek'] ?>" >
                <input name="no_rek" type="hidden" value="<?= $detailGedung[0]['no_rek'] ?>" >
                <input name="harga_lapangan" type="hidden" value="<?= $detailGedung[0]['harga_lapangan'] ?>" >
                <input name="nomor_telepon" type="hidden" value="<?= $detailGedung[0]['nomor_telepon'] ?>" >
                <input name="tanggal" type="hidden" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>" >
                <button style="display: <?= isset($_GET['tanggal']) ? 'flex' : 'none' ?>;" class="create-data">Tambah</button>
        </form>
        <!-- <form action="<?= urlpath('/dashboard/detail-gedung?' . $_GET['gedung' . '?tanggal=' . $tgll]) ?>" method="post"> -->
        <form action="" method="get">
            <input id="gedung" type="hidden" name="gedung" value="<?= $_GET['gedung'] ?>">
            <input id="tanggal" class="cari-data" type="text" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>" name="tanggal" size="10" placeholder="Masukkan Tanggal" onfocus="(this.type='date')" autocomplete="off" id="tanggal" />
            <button id="buttonCari" type="submit" class="btnn-cari">Cari Data</button>
        </form>
    </div>
    <div class="tabel-k">
        <table cellspacing="0">
            <tr>
                <th class="w-[250px] border-2 border-[#ffffff]"></th>
                <?php foreach ($lapangan as $lap) : ?>
                    <th class="border-2 border-[#ffffff]"><?= $lap['nama_lapangan'] ?></th>
                <?php endforeach ?>
            </tr>

            <?php foreach ($jam as $j) : ?>
                <tr>
                    <td class="border-2 border-[#ffffff]"><?= $j['jam_sewa'] ?></td>
                    <?php foreach ($lapangan as $lp) : ?>
                        <td class="w-[250px] border-2 border-[#ffffff]">
                            <?php
                            foreach ($transaksi as $tr) {
                                if (isset($_GET['tanggal'])) {
                                    if ($tr['tanggal'] == $_GET['tanggal']) {
                                        if ($tr['jam_sewa'] == $j['jam_sewa']) {
                                            if ($tr['nama_lapangan'] == $lp['nama_lapangan']) {
                                                if ($tr['username'] == $_SESSION['user']['username']) {
                                                    echo ($tr['username']);
                                                } else {
                                                    echo ('<p class="text-red-600 font-bold" >Sudah Terisi!<p>');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- <script>
    var tanggal = document.getElementById('tanggal');
    var gedung = document.getElementById('gedung');
    var tombolCari = document.getElementById('buttonCari');
    var container = document.getElementById('tabel-k');

    tombolCari.addEventListener('click', function(){
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= urlpath('dashboard/dgedung?gedung='); ?>' + gedung.value + '&tanggal=' + tanggal.value, true);
        xhr.send();
    })
</script> -->