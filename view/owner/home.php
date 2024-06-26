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

<!-- <div class="container-mid">
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
</div> -->

<div class="container-bottom">
    <h2 class="text-[24px] font-bold">Jadwal Gedung <?= $detailGedung[0]['nama_gedung'] ?></h2>
    <hr />
    <div class="aksi-atass">
        <!-- <form action="" method="get"> -->
        <form action="" method="POST" id="jadwal-gedung">
            <input id="gedung" type="hidden" name="gedung" value="<?= $detailGedung[0]['slug'] ?>">
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

        $('#buttonCari').click(function(e) {
            e.preventDefault();

            console.log('oke')

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
</script>
</div>