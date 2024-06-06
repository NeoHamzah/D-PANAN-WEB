<div class="container-bottom">
    <h2 class="text-[24px] font-bold">Tabel Data Gedung</h2>
    <hr />
    <!-- <div class="aksi-atas">
        <a href="<?= urlpath('transaksi/add'); ?>">
            <button class="create-data">Tambah</button>
        </a>
    </div> -->
    <div class="tabel">
        <table cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Gedung</th>
                <th>Nama Pemilik</th>
                <th>Nomor Telepon</th>
                <th>Jumlah Lapangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1;
            foreach ($dataGedung as $row) :
            ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['nama_gedung'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['nomor_telepon'] ?></td>
                    <td><?= $row['jumlah_lapangan'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <?php if ($row['status'] == 'active') : ?>
                            <a href="<?= urlpath("dashboard/data-gedung/deactivate?id=" . $row['id_gedung']); ?>">
                                <button class="edit" onclick="return confirm('Apakah kamu yakin ingin menonaktifkan gedung ini?')">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </button>
                            </a>
                        <?php else : ?>
                            <a href="<?= urlpath("dashboard/data-gedung/activate?id=" . $row['id_gedung']); ?>">
                                <button class="delete" onclick="return confirm('Apakah kamu yakin ingin mengaktifkan gedung ini?')">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>

                                </button>
                            </a>
                        <?php endif ?>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </table>
    </div>
</div>