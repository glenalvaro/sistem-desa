<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="w-full min-h-0 flex flex-col">
    <div class="flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col phone:flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center w-full h-auto 2xl:py-10 2xl:px-56 xl:px-56 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
        <div class="2xl:w-[65%] xl:w-[65%] lg:w-[60%] md:w-full sm:w-full phone:w-full h-full flex flex-col justify-start items-start p-5 2xl:pr-20 xl:pr-10 lg:pr-8 gap-2 2xl:order-1 xl:order-1 lg:order-1 md:order-2 sm:order-2 phone:order-2">
            <div class="w-auto h-auto flex flex-col 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center gap-1">
                <h2 class="2xl:text-2xl xl:text-xl lg:text-lg md:text-2xl sm:text-xl phone:text-lg uppercase font-medium phone:text-center">Sambutan Kepala <?= $sebutan_desa; ?> <?= $nama_desa; ?></h2>
                <span class="hr_line w-[calc(100vw*0.04)] phone:w-[calc(100vw*0.1)] h-1 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center"></span>
            </div>
                <h1 style="font-size: 16px;" class="2xl:text-4xl xl:text-4xl lg:text-4xl md:text-md sm:text-md phone:text-xl font-semibold uppercase 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center"><?= $kepala_desa; ?></h1>
           <div class="mt-2 font-light text-justify text-base">
               <?= $sambutan_isi; ?>
           </div>
            </div>
            <div class="2xl:w-[35%] xl:w-[35%] lg:w-[40%] md:w-[40%] sm:w-[40%] phone:w-[75%] h-full flex flex-col p-10 md:order-1 sm:order-1 phone:order-1">
                <img style="width: 240px !important;" class="h-full w-full bg-cover bg-center self-center rounded-lg shadow-product" src="<?= base_url("web/ambil_foto_perangkat?foto={$foto_kepdes}&sex={$sex}"); ?>" alt="<?= $kepala_desa; ?>" alt="">
            </div>
    </div>
</div>

