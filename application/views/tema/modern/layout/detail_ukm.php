<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full h-full 2xl:mt-24 xl:mt-24 lg:mt-24 md:mt-24 sm:mt-20 phone:mt-20 2xl:px-36 xl:px-28 lg:px-20 md:px-24 sm:px-20 phone:px-6 mb-5 flex flex-col gap-6">
<nav class="flex mt-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li>
            <div class="flex items-center">
                <a href="#" class="ml-1 text-sm font-medium text-gray-400 hover:text-[#006633] md:ml-2 phone:text-xs">UMKM</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400 phone:w-5 phone:h-5" fill="currentColor" viewBox="0 0 20 20"xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" lip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 phone:text-xs">
                <?= $nama_usaha; ?></span>
            </div>
        </li>
    </ol>
</nav>
<div class="grid 2xl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 phone:grid-cols-1 gap-y-5 gap-x-10 place-content-center ">
    <div class="2xl:max-h-[calc(((100vw-18rem-5rem)*9)/21)] xl:max-h-[calc(((100vw-14rem-5rem)*9)/21)] lg:max-h-[calc(((100vw-10rem-5rem)*9)/21)] md:max-h-[calc(((100vw-12rem)*4)/3)] sm:max-h-[calc(((100vw-10rem)*4)/3)] phone:max-h-[calc(((100vw-3rem)*4)/3)] w-full bg-gray-200 relative">
        <img id="main-image" src="<?= base_url('assets/img/foto_umkm/') . $gambar; ?>" alt="<?= $nama_usaha; ?>" class="h-full w-full object-cover object-center rounded-md shadow-menu">
    </div>

<div class="w-full h-full flex flex-col justify-between md:gap-y-3 sm:gap-y-3 phone:gap-y-3 content-center">
<div class="flex flex-col 2xl:gap-6 xl:gap-6 lg:gap-6 md:gap-4 sm:gap-3 phone:gap-3 2xl:order-0 xl:order-0 lg:order-0 md:order-1 sm:order-1 phone:order-1">
    <h1 class="font-medium 2xl:text-3xl xl:text-3xl lg:text-2xl md:text-2xl sm:text-xl phone:text-xl capitalize"><?= $nama_usaha; ?></h1>
    <p class="font-normal 2xl:text-[0.9rem] xl:text-[0.9rem] lg:text-sm md:text-sm sm:text-[0.8rem] phone:text-xs phone:leading-5 text-justify text-gray-800">
        <?= $deskripsi; ?>
    </p>
<div class="flex justify-between items-center">
    <div class="flex flex-col gap-3">
        <ol class="text-gray-800">
            <li><p class="text-xs phone:text-xs text-gray-400">Penjual : <?= $nama_pemilik; ?></p></li>
            <li><p class="text-xs phone:text-xs text-gray-400">Alamat : <?= $alamat; ?></p></li>
        </ol>
        <h4 class="font-semibold">Rp. <?= $harga_produk; ?> / <?= $satuan_produk; ?></h4>
    </div>
    <a href="https://wa.me/<?= format_telpon($no_tlp); ?>?text=Saya%20Mau%20Beli%20Produk%20UMKM" target="_blank"
    class="p-1.5 px-3 color-web rounded-md self-end text-white ease-in-out duration-200 transition-all hover:scale-110 active:scale-100 drop-shadow-md">Beli</a>
</div>
</div>

<div id="thumbnail" class="grid grid-cols-5 phone:grid-cols-4 gap-3 phone:gap-2 2xl:order-1 xl:order-1 lg:order-1 md:order-0 sm:order-0 phone:order-0">
    <?php foreach($foto_ukm as $val) : ?>
    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-200">
        <img src="<?= base_url('assets/img/foto_umkm/galeri/') . $val['foto']; ?>" alt="foto_list" class="h-full w-full object-cover object-center cursor-pointer hover:opacity-75 rounded-sm">
   </div>
    <?php endforeach; ?>
</div>

</div>
</div>
<span class="hr_line w-[10%] h-[0.1rem] self-center m-6"></span>
</div>