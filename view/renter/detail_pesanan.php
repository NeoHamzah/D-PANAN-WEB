
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
    <h2 class="text-[24px] font-bold" >Pesanan Saya</h2>
    <hr />
    <div class="aksi-atass">
        <input class="cari-data" type="text" name="keyword" placeholder="Cari..." size="10" autocomplete="off" id="keyword" />
    </div>
    <div class="tabel">
        <table cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Renter</th>
                <th>Tanggal Sewa</th>
                <th>Nama Gedung</th>
                <th>Jam Sewa</th>
                <th>Nama Lapangan</th>
                <th>Bukti Transfer</th>
                <th>Status</th>
            </tr>

            <?php $i = 1;
            foreach ($transaksi as $row) :
            ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['nama_gedung'] ?></td>
                    <td><?= $row['jam_sewa'] ?></td>
                    <td><?= $row['nama_lapangan'] ?></td>
                    <td class="gambarTabel"><img src="img/buktiTransaksi/<?= $row['bukti_transfer'] ?>" alt="bukti transfer"></td>
                    <td><?= $row['status'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </table>
    </div>
</div>
