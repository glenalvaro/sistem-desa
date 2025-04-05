<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full min-h-0 flex flex-col">
    <div class="flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-col sm:flex-col phone:flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center w-full h-auto 2xl:py-10 2xl:px-56 xl:px-56 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5"> 
       <div class="w-auto h-auto flex flex-col 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center gap-1 mt-5">
            <h2 class="text-web 2xl:text-2xl xl:text-xl lg:text-lg md:text-2xl sm:text-xl phone:text-lg uppercase font-medium phone:text-center">Struktur Organisasi Tata Kerja <?= $sebutan_desa; ?> <?= $nama_desa; ?></h2>
            <span class="hr_line w-[calc(100vw*0.04)] phone:w-[calc(100vw*0.1)] h-1 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center mb-2"></span>
            <p class="phone:text-sm phone:text-center">Kepala <?= $sebutan_desa; ?> dan Staf <?= $sebutan_desa; ?> <?= $nama_desa; ?></p>
        </div>
    </div>
<div class="w-full min-h-0 flex flex-col 2xl:items-start xl:items-start lg:items-start md:items-center sm:items-center phone:items-center 2xl:py-10 2xl:px-56 xl:px-56 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5 gap-4">
         <div class="w-full h-auto flex flex-wrap 2xl:justify-start xl:justify-start lg:justify-start md:justify-start sm:justify-start phone:justify-center 2xl:gap-10 xl:gap-9 lg:gap-5 md:gap-4 sm:gap-4 phone:gap-2">
            <figure class="highcharts-figure">
                <div id="bagan_desa"></div>
            </figure>
        </div>

        <div class="w-auto h-auto flex flex-col 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center gap-1">
            <h2 class="2xl:text-2xl xl:text-xl lg:text-lg md:text-2xl sm:text-xl phone:text-lg uppercase font-medium text-web">Kepala <?= $sebutan_desa; ?></h2>
            <span class="hr_line w-[calc(100vw*0.04)] phone:w-[calc(100vw*0.1)] h-1 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center"></span>
        </div>

        <div class="w-full h-auto flex flex-wrap 2xl:justify-start xl:justify-start lg:justify-start md:justify-start sm:justify-start phone:justify-center 2xl:gap-10 xl:gap-9 lg:gap-5 md:gap-4 sm:gap-4 phone:gap-2">
        <?php foreach($data_staff as $data) : ?>
           <?php if($data->jabatan_pegawai == 1) : ?>
              <?php if($data->status == 1) : ?>
                <div class="2xl:w-[calc(100%/4-2rem)] 2xl:h-[calc(((100vw-28rem-2rem)/4)*(4/3)*1.25)] xl:w-[calc(100%/4-1.75rem)] xl:h-[calc(((100vw-28rem-1.75rem)/4)*(4/3)*1.25)] lg:w-[calc(100%/3.9-1.5rem)] lg:h-[calc(((100vw-10rem-1.5rem)/3.9)*(4/3)*1.25)] md:w-[calc(100%/3-0.75rem)] md:h-[calc(((100vw-8rem-0.75rem)/3)*(4/3)*1.25)] sm:w-[calc(100%/2-0.75rem)] sm:h-[calc(((100vw-5rem-0.75rem)/2)*(4/3)*1.25)] phone:w-[60%] phone:h-[calc((100vw-1rem)*0.6*(4/3)*1.25)] flex flex-col">
                    <div class="w-full h-[75%]">
                        <img class="h-full w-full bg-cover bg-center self-center rounded-lg shadow-product" src="<?= site_url("web/ambil_foto_perangkat?foto={$data->foto_pegawai}&sex={$data->jenis_kelamin}"); ?>" alt="">
                    </div>
                    <div class="w-full h-[25%] flex flex-col items-center p-3">
                        <p class="text-web text-sm font-medium"><?= $data->jabatan; ?></p>
                        <h2 class="font-semibold"><?= $data->nama_pegawai; ?>, <?= $data->gelar; ?></h2>
                    </div>
                </div>
            <?php endif; ?>
           <?php endif; ?>
        <?php endforeach; ?>
        </div>

        <div class="w-auto h-auto flex flex-col 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center gap-1">
            <h2 class="2xl:text-2xl xl:text-xl lg:text-lg md:text-2xl sm:text-xl phone:text-lg uppercase font-medium text-web">Staff</h2>
            <span class="hr_line w-[calc(100vw*0.04)] phone:w-[calc(100vw*0.1)] h-1 2xl:self-start xl:self-start lg:self-start md:self-center sm:self-center phone:self-center"></span>
        </div>
        <div class="w-full h-auto flex flex-wrap 2xl:justify-start xl:justify-start lg:justify-start md:justify-start sm:justify-start phone:justify-center 2xl:gap-10 xl:gap-9 lg:gap-5 md:gap-4 sm:gap-4 phone:gap-2">
        <?php foreach($data_staff as $data) : ?>
           <?php if($data->jabatan_pegawai != 1) : ?>
              <?php if($data->status == 1) : ?>
                <div class="2xl:w-[calc(100%/4-2rem)] 2xl:h-[calc(((100vw-28rem-2rem)/4)*(4/3)*1.25)] xl:w-[calc(100%/4-1.75rem)] xl:h-[calc(((100vw-28rem-1.75rem)/4)*(4/3)*1.25)] lg:w-[calc(100%/3.9-1.5rem)] lg:h-[calc(((100vw-10rem-1.5rem)/3.9)*(4/3)*1.25)] md:w-[calc(100%/3-0.75rem)] md:h-[calc(((100vw-8rem-0.75rem)/3)*(4/3)*1.25)] sm:w-[calc(100%/2-0.75rem)] sm:h-[calc(((100vw-5rem-0.75rem)/2)*(4/3)*1.25)] phone:w-[60%] phone:h-[calc((100vw-1rem)*0.6*(4/3)*1.25)] flex flex-col">
                    <div class="w-full h-[75%]">
                        <img class="h-full w-full bg-cover bg-center self-center rounded-lg shadow-product" src="<?= site_url("web/ambil_foto_perangkat?foto={$data->foto_pegawai}&sex={$data->jenis_kelamin}"); ?>" alt="">
                    </div>
                    <div class="w-full h-[25%] flex flex-col items-center p-3">
                        <p class="text-web text-sm font-medium"><?= $data->jabatan; ?></p>
                        <h2 class="font-semibold"><?= $data->nama_pegawai; ?>, <?= $data->gelar; ?></h2>
                    </div>
                </div>
            <?php endif; ?>
           <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
</div>


