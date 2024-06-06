<!-- <?php 

if(isset($_POST)) {
    var_dump($_POST);
}

?> -->

<div class="container-form">
    <h1>Update Data Transaksi Sewa</h1>
    <form class="form" action="<?= urlpath("transaksi/edit?id=".$trs[0]['id_transaksi']); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="gambarLama" value="<?= $trs[0]['gambar'] ?>">

      <input type="hidden" name="id_transaksi" value="<?= $trs[0]['id_transaksi'] ?>">

      <label for="tanggal_transaksi">Tanggal Transaksi: </label>
      <!-- <?php if ($tanggalKosong == true) : ?>
        <p style="color: red; font-size: 12px; font-weight: 600;">Tanggal tidak boleh kosong!</p>
      <?php endif ?> -->
      <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= $trs[0]['tanggal_transaksi'] ?>">
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
      <input type="text" name="nama_penyewa" id="nama_penyewa" value="<?= $trs[0]['nama_penyewa'] ?>">
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
      <input type="text" name="barang_disewa" id="barang_disewa" value="<?= $trs[0]['barang_disewa'] ?>">
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
      <input type="text" name="jumlah_harga" id="jumlah_harga" value="<?= $trs[0]['jumlah_harga'] ?>">
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
      <input type="text" name="nomor_telepon" id="nomor_telepon" value="<?= $trs[0]['nomor_telepon'] ?>">
      <label for="struk">Struk sebelumnya: </label>
      <img src="/sewa-kamera-mvc/img/struk/<?= $trs[0]['gambar'] ?>" alt=""><br>
      <label for="struk">Struk : </label>
      <input type="file" name="struk" id="struk" value="<?= $trs[0]['gambar'] ?>">
      <div class="actionn">
        <button type="submit" name="submit" class="update">Update Data</button>
        <!-- <button class="deleteGambar" name="deleteGambar" onclick="return confirm('Apakah kamu yakin ingin menghapus struk?')">Hapus Struk</button> -->
      </div>
    </form>
  </div>