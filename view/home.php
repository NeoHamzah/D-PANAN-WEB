<?php $title = 'D-PANAN'; ?>

<?php ob_start(); ?>

<nav class="fixed bg-[#2d9596f2] w-[100vw] h-[8vh] flex justify-end items-center" >
<a href="<?= urlpath('auth') ?>" class="hover:text-white" ><button class="text-white mr-[50px] bg-[#ffffff59] w-[100px] h-[50px] text-[20px] rounded-[10px] decoration-inherit hover:bg-[#2d9596] hover:text-[#ffffff]" >Login</button></a>
</nav>

<div class="bg-[url(img/assets/bca.png)] h-[100vh] overflow-x-hidden flex justify-between items-center">
    <div class="kiri mx-[100px] mt-[100px]">
    <div class="main-text flex flex-col gap-[30px] justify-center bg-[#2d959685] border-solid border-[2px] border-[ffffff80] text-white rounded-[20px] w-[50vw] h-[70vh] backdrop-blur-[20px] p-[100px]">
            <h2 class="text-[40px] font-medium" >Boost Your Performance</h2>
            <h1 class="text-[60px] font-bold">Health and Fitness</h1>
            <p class="text-[20px] font-medium">Rent High-Quality Sports Venues to Elevate Your Performance.</p>
            <a href="<?= urlpath('dashboard') ?>" class="hover:text-white" ><button class="bg-[#ffffff59] w-[200px] h-[50px] text-[20px] rounded-[10px] decoration-inherit hover:bg-[#2d9596] hover:text-[#ffffff]" >Get Started</button></a>
        </div>
    </div>
    <div class="kanan mr-[200px] mt-[100px] flex flex-col gap-[70px]">
        <div class="bg-white p-[10px] rounded-[50%]" ><img class="w-[40px]" src="img/assets/wa.png" alt="Whatsapp"></div>
        <div class="bg-white p-[10px] rounded-[50%]" ><img class="w-[40px]" src="img/assets/gmail.png" alt="Gmail"></div>
        <div class="bg-white p-[10px] rounded-[50%]" ><img class="w-[40px]" src="img/assets/inq.png" alt="Instagram"></div>
    </div>
</div>

</section>
<main>
    <div class="content">

    </div>
</main> 
<?php $body = ob_get_clean(); ?>

<?php include 'master.php'; ?>