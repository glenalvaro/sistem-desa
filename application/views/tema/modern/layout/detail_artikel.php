<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full min-h-screen flex flex-col gap-5 2xl:mt-15 xl:mt-20 lg:mt-20 md:mt-24 sm:mt-24 phone:mt-24 2xl:px-52 xl:px-44 lg:px-36 md:px-28 sm:px-24 phone:px-6 mb-5">
    <nav class="flex mt-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li>
            <div class="flex items-center">
                <a href="#" class="ml-1 text-sm font-medium text-gray-400 hover:text-[#006633] md:ml-2 phone:text-xs">Berita</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400 phone:w-5 phone:h-5" fill="currentColor" viewBox="0 0 20 20"xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" lip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 phone:text-xs">
                <?= set_ucwords($judul); ?></span>
            </div>
        </li>
    </ol>
</nav>
    <div class="w-full h-auto flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col phone:flex-col gap-5 phone:gap-3 items-center">
        <div class="basis-[50%] h-[calc(100vh*0.5)]">
            <img src="<?= base_url('assets/img/foto_artikel/') . $gambar; ?>" alt="<?= $judul; ?>" class="object-contain bg-center w-auto h-full">
        </div>
        <div class="basis-[50%] h-auto flex flex-col gap-5 phone:gap-3 justify-end">
        <h1 class="text-gray-700 2xl:text-5xl xl:text-5xl lg:text-4xl md:text-3xl sm:text-2xl phone:text-xl font-medium capitalize leading-loose 2xl:text-left xl:text-left lg:text-left md:text-center sm:text-center phone:text-center"> <?= set_ucwords($judul); ?></h1>
        <span class="hr_line w-[20%] h-[0.15rem] 2xl:block xl:block lg:block md:hidden sm:hidden phone:hidden"></span>
        <div class="w-full h-auto flex justify-between">
            <p class="text-xs phone:text-xs text-gray-400 mr-5"><i class="fas fa-user"></i>&nbsp; <?= $user; ?></p>
            <p class="text-xs phone:text-xs text-gray-400 mr-5">
            <i class="fas fa-calendar"></i>&nbsp; <?= date('d F Y', $tgl_created); ?></p>   
        </div>
        </div>
    </div>


<div class="w-full h-auto flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col phone:flex-col gap-10">
<!-- Artikel List SIdebar -->
<div class="2xl:basis-[30%] 2xl:self-start xl:basis-[30%] xl:self-start lg:basis-[30%] lg:self-start md:w-[65%] md:self-center sm:w-[80%] sm:self-center phone:w-full phone:self-center h-auto tab md:order-2 2xl:order-1 xl:order-1 lg:order-1 sm:order-2 phone:order-2">
            <ul class="w-full h-auto flex justify-start items-center overflow-auto border-2 border-transparent border-b-[#006633] tabs">
                <li class="w-[calc(100*0.25)] h-full bg-gray-200">
                    <a style="color: black;" href="#" class="w-full h-full 2xl:text-base xl:text-base lg:text-base md:text-base sm:text-sm phone:text-sm hover:text-white p-2 flex justify-center items-center">Artikel Lainnya</a>
                </li>
            </ul>
       <?php $this->load->view('tema/modern/component/artikel_sidebar'); ?>
    </div>
                
    <div class="basis-[70%] flex flex-col 2xl:order-2 xl:order-2 lg:order-2 sm:order-1 phone:order-1 items-center gap-4">
        <div class="text-justify 2xl:text-base xl:text-base lg:text-base md:text-base sm:text-sm phone:text-sm">
        <?= $isi; ?>
        </div>
        <span class="hr_line w-[20%] h-[0.15rem] 2xl:hidden xl:hidden lg:hidden md:block sm:block phone:block"></span>
    </div>
</div>
    
<div class="w-full h-auto flex justify-center">
    <span class="hr_line w-[10%] h-[0.15rem]"></span>
</div>
    
</div>