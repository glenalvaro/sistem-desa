<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="reveal 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
        <div class="flex flex-col items-center mb-2">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">SOTK</p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem] mb-2"></span>
            <p class="phone:text-xs text-center reveal-grow-r py-1">Struktur Organisasi dan Tata Kerja <?= $sebutan_desa; ?> <?= $nama_desa; ?></p>
        </div>
          <div class="items slider mt-2">
    <?php foreach ($sotk_data as $key) : ?>
    <?php if($key->status == 1) : ?>
        <div style="width: 100%; padding: 0.5rem !important;" class="slick-slide" tabindex="-1" style="outline: none;">
            <div class="thumbnail-staff">
                <div class="thumbnail-image-staff">
                <img class="bg-center self-center z-10 relative" src="<?= site_url("web/ambil_foto_perangkat?foto={$key->foto_pegawai}&sex={$key->jenis_kelamin}"); ?>" alt="">
                </div>
                <div class="thumbnail-content-staff">
                   <div class="thumbnail-title-staff"><?= $key->nama_pegawai; ?></div>
                    <div class="product-rating d-inline-block">
                         <p class="thumbnail-keterangan-staff text-xs phone:text-xs mt-2">
                            <?= $key->jabatan; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
     <?php endif; ?>
    <?php endforeach ?>
</div>
<?php if($sotk_data) : ?>
 <a href="<?= base_url('web/struktur_organisasi'); ?>" class="btn_more txt_more reveal-d p-2 self-center ease-in-out duration-300 phone:text-xs">Lihat Semua</a>
<?php endif; ?>
</div>
</div>