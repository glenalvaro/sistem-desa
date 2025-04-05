<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
    <div class="w-auto h-auto flex flex-col gap-2 items-center">
        <h1 class="text-center font-semibold text-xl">Album <?= $nama_album; ?></h1>
        <span class="hr_line w-[10%] h-1"></span>
    </div>
</div>

<div class="auto w-full relative 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
    <div class="2xl:columns-4 xl:columns-3 lg:columns-3 md:columns-2 sm:columns-2 gap-4 p-6 phone:p-3 bg-gray-50 rounded-md">
        <?php foreach($album_id as $data) : ?>
        <?php if($data) : ?>
            <a data-fancybox="gallery-a" href="<?= site_url('assets/img/galeri/album/').$data->gambar; ?>" class="reveal w-full inline-block group rounded 2xl:aspect-[4/3] xl:aspect-[4/3] lg:aspect-[4/3] md:aspect-[4/3] mb-2">
            <img src="<?= site_url('assets/img/galeri/album/').$data->gambar; ?>" alt="<?= $data->nama_album; ?>" class="rounded w-full h-full object-cover group-hover:opacity-100 group-hover:scale-110 group-hover:shadow-menu opacity-80 ease-in-out duration-300 transition-all">
            <div class="w-full h-auto absolute 2xl:bottom-[21%] xl:bottom-[21%] lg:bottom-[21%] md:bottom-[15%] sm:bottom-[15%] phone:bottom-[15%] left-0 flex flex-col p-2">
            <p style="font-size: 14px; -webkit-text-stroke: 1px #fff;  text-shadow: 4px 4px 4px #000;" class="text-white tracking-wider 2xl:text-base xl:text-base lg:text-base md:text-sm sm:text-base phone:text-base"><?= $data->nama_gambar; ?></p>
            <p class="text-white 2xl:text-base xl:text-base lg:text-base md:text-sm sm:text-base phone:text-base"><?= date('d F Y', $data->tgl_dibuat); ?></p>
        </div>
            </a>
    <?php else : ?>  
        <div class="flex flex-col items-center">
            <p class="reveal font-medium italic text-gray-500 text-center">-- Album tidak tersedia --</p>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>
</div>