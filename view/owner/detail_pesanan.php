<div class="container-bottom" style="display: <?= $_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'renter' ? 'none' : 'block' ?>">
    <h2>Tabel Data Transaksi Sewa</h2>
    <hr />
    <div class="aksi-atas">
        <form action="<?= urlpath('dashboard/detail-gedung/add'); ?>" method="post">
            <input name="gedung" type="hidden" value="<?= $detailGedung[0]['nama_gedung'] ?>">
            <input name="slug" type="hidden" value="<?= $detailGedung[0]['slug'] ?>">
            <input name="an_rek" type="hidden" value="<?= $detailGedung[0]['an_rek'] ?>">
            <input name="no_rek" type="hidden" value="<?= $detailGedung[0]['no_rek'] ?>">
            <input name="harga_lapangan" type="hidden" value="<?= $detailGedung[0]['harga_lapangan'] ?>">
            <input name="nomor_telepon" type="hidden" value="<?= $detailGedung[0]['nomor_telepon'] ?>">
            <input name="tanggal" type="hidden" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>">
            <button class="create-data">Tambah</button>
        </form>
        <form action="" method="get">
            <input class="cari-data" type="text" name="keyword" placeholder="Cari..." size="10" autocomplete="off" id="keyword" />
            <button id="buttonCari" type="submit" class="btnn-cari">Cari Data</button>
        </form>
    </div>
    <div class="tabel">
        <table cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Renter</th>
                <th>Tanggal Sewa</th>
                <th>Jam Sewa</th>
                <th>Nama Lapangan</th>
                <th>Bukti Transfer</th>
                <th>Status</th>
                <th>Terima/Tolak</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1;
            foreach ($transaksi as $row) :
                if (!isset($_GET['keyword']) || $row['nama_lapangan'] == $_GET['keyword'] || $row['status'] == $_GET['keyword']) :
            ?>

                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['jam_sewa'] ?></td>
                        <td><?= $row['nama_lapangan'] ?></td>
                        <td class="gambarTabel"><img src="../img/bukti_transaksi/<?= $row['bukti_transfer'] ?>" alt="bukti transfer"></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="<?= urlpath("dashboard/kontrol-pesanan/terima?id=" . $row['id_transaksi']); ?>">
                                <button class="terima"">
                                        <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>

                                </button>
                            </a>
                            <a href="<?= urlpath("dashboard/kontrol-pesanan/tolak?id=" . $row['id_transaksi']); ?>">
                                <button class="tolak" ">
                                        <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="<?= urlpath("dashboard/kontrol-pesanan/update?id=" . $row['id_transaksi']); ?>">
                                <button class="update"">
                                <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                    </svg>
                                </button>
                            </a>
                            <a href="<?= urlpath("dashboard/kontrol-pesanan/remove?id=" . $row['id_transaksi']); ?>" onclick="return confirm('Apakah anda yakin untuk menghapus transaksi ini?')" >
                                <button class="delete" ">
                                <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>


                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endif ?>
                <?php $i++ ?>
            <?php endforeach ?>
        </table>
    </div>
</div>