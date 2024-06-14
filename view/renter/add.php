<!-- <?php var_dump($tanggall) ?> --> 
<div class="container-form">
    <h1 class="text-[30px]">Tambah Data Transaksi Sewa</h1>
    <form class="form" action="<?= urlpath("dashboard/detail-gedung/addData"); ?>" method="post" enctype="multipart/form-data">

        <h1 class="text-xl">Gedung: <?= $gedung ?> </h1>
        <h1 class="text-xl">Nama: <?= $_SESSION['user']['username'] ?> </h1>
        <h1 class="text-xl">Tanggal: <?= $tanggal ?> </h1>
        <h1 class="text-xl">Harga: Rp. <?= $harga_lapangan ?>/lapangan/jam </h1>
        <h1 class="text-xl">Silahkan melakukan transaksi ke: <?= $an_rek . " (" . $no_rek . ")" ?> </h1>
        <h1 class="text-xl">Perlu Bantuan? Hubungi Pemilik Gedung: <?= $nomor_telepon ?> </h1>

        <input type="hidden" name="nama" id="nama" value="<?= $_SESSION['user']['username'] ?>">
        <input type="hidden" name="gedung" id="gedung" value="<?= $gedung ?>">
        <input type="hidden" name="tanggal" id="tanggal" value="<?= $tanggal ?>">

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
                            <td class="w-[250px] border-2 border-[#ffffff]" onclick="toggleCheckbox(this)">
                                <?php
                                $transactionFound = false;
                                foreach ($transaksi as $tr) {
                                    if ($tr['nama_lapangan'] == $lp['nama_lapangan'] && $tr['jam_sewa'] == $j['jam_sewa'] && $tr['tanggal'] == $tanggal) {
                                        $transactionFound = true;
                                        if ($tr['username'] == $_SESSION['user']['username']) {
                                            echo ($tr['username']);
                                        } else {
                                            echo ('<p class="text-red-600 font-bold" >Sudah Terisi!<p>');
                                        }
                                        break;
                                    }
                                }
                                if (!$transactionFound) {
                                    echo ("<input type='checkbox' name='pilihJamLap[]' id='pilihJamLap' value='{$j['id_jam']}_{$lp['id_detail']}'>");
                                }
                                ?>
                            </td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>


            </table>
        </div>

        <h1 id="total_price" class="text-xl">Total Harga: 0,00</h1>

        <label for="bukti_transfer">Bukti Transfer : </label>
        <input type="file" name="bukti_transfer" id="bukti_transfer" required>

        <button type="submit" name="submit" class="create">Tambah Data</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        var harga_lapangan = <?= $harga_lapangan ?>; 

        $("input[type='checkbox']").change(function() {
            var total_price = 0;

            $("input[type='checkbox']:checked").each(function() {
                total_price += harga_lapangan; 
            });


            $("#total_price").text("Total Harga: Rp. " + Intl.NumberFormat('en-US').format(total_price) + ",00");
        });
    });

    function toggleCheckbox(element) {
        var checkbox = element.querySelector("input[type='checkbox']");
        if (checkbox) {
            checkbox.checked = !checkbox.checked;
            $(checkbox).trigger('change'); 
        }
    }
</script>
