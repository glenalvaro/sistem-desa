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
                UMKM <?= $sebutan_desa; ?> <?= $nama_desa; ?></span>
            </div>
        </li>
    </ol>
</nav>

<div class="card-box">
<?php if($list_umkm) : ?>
 <?php foreach($list_umkm as $key) : ?>
    <div class="card-content">
        <div class="card-tumb">
            <img src="<?= base_url('assets/img/foto_umkm/') . $key->gambar; ?>" alt="">
        </div>
        <div class="card-details">
            <span class="card-catagory"><?= $key->nama_kat; ?></span>
            <h4><a href="<?= base_url('web/detail_ukm/'.$key->id.'/'.slug_url($key->nama_usaha)); ?>"><?= $key->nama_usaha; ?></a></h4>
            <p><?= $key->deskripsi; ?></p>
            <div class="card-bottom-details">
                <div class="card-price">Rp. <?= $key->harga_produk; ?></div>
                <div class="card-links">
                    <a target="_blank" href="https://wa.me/<?= format_telpon($key->no_tlp); ?>?text=Saya%20Mau%20Beli%20Produk%20UMKM"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php else : ?>
        <div class="w-full sm:w-full phone:w-full h-full p-4 tab">
            <p class="font-medium italic text-gray-500 text-center">UMKM belum tersedia</p>
    </div>
<?php endif; ?>
</div>

<div class="self-center">
    <?= $halaman_data; ?>
</div>
<span class="hr_line w-[10%] h-[0.1rem] self-center m-6"></span>
</div>
