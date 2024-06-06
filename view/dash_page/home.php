    <div class="container-top">
        <div class="con-detail">
            <p>Sewa Kamera</p>
            <h1>Dashboard</h1>
        </div>
        <div class="con-profile">
            <a href="">
                <h3>Halo, <?= $_SESSION['user']['username'] ?>👋</h3>
                <!-- <img src="img/profil-aril.jpg" alt="user profile" /> -->
            </a>
        </div>
    </div>

    <div class="container-mid" style="display: <?= $_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'renter' ? 'none' : 'block' ?>">
        <h2>Data Hari Ini</h2>
        <div class="data">
            <div class="data1">
                <div class="data1-detail">
                    <p>Total Pendapatan</p>
                    <h2>Rp 12.345.678,00</h2>
                </div>
                <div class="data1-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="none" viewBox="0 0 24 24">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                    </svg>
                </div>
            </div>
            <div class="data2">
                <div class="data2-detail">
                    <p>Total Items Tersewa</p>
                    <h2>38 Items</h2>
                </div>
                <div class="data2-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="white" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="data3">
                <div class="data3-detail">
                    <p>Total Penyewa</p>
                    <h2>25 Orang</h2>
                </div>
                <div class="data3-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="white" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="data4">
                <div class="data4-detail">
                    <p>Total Transaksi</p>
                    <h2>145 Transaksi</h2>
                </div>
                <div class="data4-icon">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="white" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="container-bottom">
        <h2>Tabel Data Transaksi Sewa</h2>
        <hr />
        <div class="aksi-atas">
            <a href="<?= urlpath('transaksi/add'); ?>">
                <button class="create-data">Tambah</button>
            </a>
            <input class="cari-data" type="text" name="keyword" placeholder="Cari..." size="10" autocomplete="off" id="keyword" />
        </div>
        <div class="tabel">
            <table cellspacing="0">
                <tr>
                    <th>Id Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Penyewa</th>
                    <th>Barang Disewa</th>
                    <th>Jumlah Harga</th>
                    <th>Nomor Telepon</th>
                    <th>Struk</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1;
                foreach ($transaksi as $row) :
                ?>

                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['tanggal_transaksi'] ?></td>
                        <td><?= $row['nama_penyewa'] ?></td>
                        <td class="barangDisewa"><?= $row['barang_disewa'] ?></td>
                        <td><?= $row['jumlah_harga'] ?></td>
                        <td><?= $row['nomor_telepon'] ?></td>
                        <td class="gambarTabel"><img src="img/struk/<?= $row['gambar'] ?>" alt=""></td>
                        <td>
                            <a href="<?= urlpath("transaksi/edit?id=" . $row['id_transaksi']); ?>">
                                <button class="edit">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                    </svg>
                                </button>
                            </a>
                            <a href="<?= urlpath("transaksi/remove?id=" . $row['id_transaksi']); ?>">
                                <button class="delete" onclick="return confirm('Apakah kamu yakin ingin menghapus item ini?')">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </a>

                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>