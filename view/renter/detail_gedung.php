

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
                <input name="tanggal" type="hidden" value="" >
                <button class="create-data">Tambah</button>
        </form>
        <!-- <form action="" method="get"> -->
        <form action="" method="POST" id="jadwal-gedung" >
            <input id="gedung" type="hidden" name="gedung" value="<?= $_GET['gedung'] ?>">
            <input id="tanggal" class="cari-data" type="text" value="" name="tanggal" size="10" placeholder="Masukkan Tanggal" onfocus="(this.type='date')" autocomplete="off" id="tanggal" />
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

        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.create-data').hide();

    $('#buttonCari').click(function(e) {
        e.preventDefault();
        $('.create-data').show();

        var tanggal = $('#tanggal').val();
        var gedung = $('#gedung').val();
        var url = '<?= urlpath("dashboard/ajax?gedung=") ?>' + gedung + '&tanggal=' + tanggal;

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                $('.tabel-k').html(response);
            }
        });
    });
});


$(document).ready(function() {
    $('#jadwal-gedung #tanggal').on('change', function() {
        var tanggalValue = $(this).val();
        $('.aksi-atas input[name="tanggal"]').val(tanggalValue);
    });
});
</script>