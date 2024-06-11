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

<div class="container-gedung">
    <h2 class="text-[24px] font-bold">Silahkan Pilih Gedung Yang Anda Ingin Sewa!</h2>
    <hr /> <?php  ?>
    <div class="flex flex-col justify-center items-center">
        <?php foreach ($gedung as $gd) : ?>
            <a href="<?= urlpath("dashboard/detail-gedung?gedung=" . $gd['slug']); ?>">
                <div class="group relative overflow-hidden border-2 border-white/50 rounded-xl mb-[50px] w-[80vw] h-[300px]">
                    <div class="group-hover:bg-black/70 w-full h-full absolute z-40 transition-all duration-300"></div>
                    <img class="group-hover:scale-125 transition-all duration-500 object-cover w-full h-full" src="img/gedung/<?= $gd['gambar_gedung'] ?>" alt="Gambar Gedung">
                    <div class="text-[32px] text-[#2d9596] font-bold absolute -bottom-full left-12 group-hover:bottom-[160px] transition-all duration-500 z-50"><?= $gd['nama_gedung'] ?></div>
                    <div class="absolute text-white -bottom-full left-12 group-hover:bottom-[90px] transition-all duration-700 z-50">
                        <span class="text-sm text-gradient"><?= $gd['deskripsi_gedung'] ?></span>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>
