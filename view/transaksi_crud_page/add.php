<div class="container-form">
        <h1>Tambah Data Transaksi Sewa</h1>
        <form class="form" action="<?= urlpath("transaksi/add"); ?>" method="post" enctype="multipart/form-data">
            <label for="tanggal_transaksi">Tanggal Transaksi: </label>
            <!-- <?php if ($tanggalKosong == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Tanggal tidak boleh kosong!</p>
            <?php endif ?> -->
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="<?php if (isset($_POST['submit'])) {echo($_POST['tanggal_transaksi']);} ?>">
            <label for="nama_penyewa">Nama Penyewa: </label>
            <!-- <?php if ($namaKosong == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nama tidak boleh kosong!</p>
            <?php endif ?>
            <?php if ($namaPendek == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nama harus memiliki minimal 3 karakter!</p>
            <?php endif ?>
            <?php if ($namaPanjang == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nama maksimal 50 karakter!</p>
            <?php endif ?> -->
            <input type="text" name="nama_penyewa" id="nama_penyewa" value="<?php if (isset($_POST['submit'])) {echo($_POST['nama_penyewa']);} ?>">
            <label for="barang_disewa">Barang Disewa: </label>
            <!-- <?php if ($barangKosong == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Barang tidak boleh kosong!</p>
            <?php endif ?>
            <?php if ($barangPendek == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Barang harus memiliki minimal 5 karakter!</p>
            <?php endif ?>
            <?php if ($barangPanjang == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Barang maksimal 200 karakter!</p>
            <?php endif ?> -->
            <input type="text" name="barang_disewa" id="barang_disewa" value="<?php if (isset($_POST['submit'])) {echo($_POST['barang_disewa']);} ?>">
            <label for="jumlah_harga">Harga: </label>
            <!-- <?php if ($hargaKosong == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Harga tidak boleh kosong!</p>
            <?php endif ?>
            <?php if ($hargaStr == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Harga harus berisi angka!</p>
            <?php endif ?>
            <?php if ($hargaMin == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Harga minimal 1000!</p>
            <?php endif ?>
            <?php if ($hargaMax == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Harga maximal 9.999.999!</p>
            <?php endif ?> -->
            <input type="text" name="jumlah_harga" id="jumlah_harga" value="<?php if (isset($_POST['submit'])) {echo($_POST['jumlah_harga']);} ?>">
            <label for="nomor_telepon">Nomor telepon : </label>
            <!-- <?php if ($nomorKosong == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nomor tidak boleh kosong!</p>
            <?php endif ?>
            <?php if ($nomorPendek == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nomor minimal 10 karakter!</p>
            <?php endif ?>
            <?php if ($nomorPanjang == true) : ?>
                <p style="color: red; font-size: 12px; font-weight: 600;">Nomor maksimal 20 karakter!</p>
            <?php endif ?> -->
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="<?php if (isset($_POST['submit'])) {echo($_POST['nomor_telepon']);} ?>">
            <label for="struk">Struk : </label>
            <input type="file" name="struk" id="struk">

            <button type="submit" name="submit" class="create">Tambah Data</button>
        </form>
    </div>