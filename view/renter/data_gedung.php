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
                        if (isset($_GET['tanggal'])) {
                            if ($tr['tanggal'] == $_GET['tanggal']) {
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
                        }
                    }
                    ?>
                </td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>