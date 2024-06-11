<?php
include_once '../../model/transaksi_model.php';
$gedung = $_GET['gedung'];
$tanggal = $_GET["tanggal"];
$query = "SELECT id_transaksi, username, tanggal, nama_gedung, jam_sewa, nama_lapangan, bukti_transfer, transaksi.status FROM `transaksi`
            INNER JOIN users ON user_id = id_user
            INNER JOIN detail_gedung ON detail_id = id_detail
            INNER JOIN gedung ON gedung_id = id_gedung
            INNER JOIN jam ON jam_id = id_jam                
            WHERE slug = '$gedung' AND transaksi.status = 'diterima' AND tanggal = '$tanggal'";
$transaksi = Transaksi::rawQuery($query);
?>

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
                    ?>
                </td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>