<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- View Mobile -->
<?php if($galeri_data) : ?>
<div class="reveal 2xl:hidden xl:hidden lg:hidden md:hidden 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
        <div class="flex flex-col items-center mb-2">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Galeri</p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem] mb-2"></span>
            <p class="phone:text-xs text-center reveal-grow-r py-1">Menampilkan kegiatan-kegiatan yang sedang berlangsung</p>
        </div>
          <div class="items slider mt-2">
    <?php foreach ($galeri_data as $main) : ?>
    <?php if($main->aktif == 1) : ?>
        <div style="width: 100%; padding: 0.5rem !important;" class="slick-slide" tabindex="-1" style="outline: none;">
            <div class="thumbnail-desktop">
                <div class="thumbnail-image-desktop">
                    <img src="<?= site_url('assets/img/galeri/').$main->gambar; ?>" alt="<?= $main->nama_album; ?>">
                </div>
                <div class="thumbnail-content-desktop">
                    <a href="<?= base_url('web/detail_album/'.$main->id.'/'.slug_url($main->nama_album)); ?>">
                        <div class="thumbnail-title-desktop">Album <?= $main->nama_album; ?></div></a>
                        <div class="product-rating d-inline-block">
                        <p class="text-xs phone:text-xs text-gray-400 mt-2">
                            <i class="fas fa-calendar"></i>&nbsp;&nbsp; <?= date('d F Y', $main->tgl_buat); ?>
                        </p>
                        </div>
                <div>
                </div>
                </div>
            </div>
        </div>
     <?php endif; ?>
    <?php endforeach ?>
</div>
<?php if($galeri_data) : ?>
 <a href="" class="btn_more txt_more reveal-d p-2 self-center ease-in-out duration-300 phone:text-xs">Lihat Semua</a>
<?php endif; ?>
</div>
</div>
<?php endif; ?>


<?php if($galeri_data) : ?>
<div class="reveal galeri-list phone:hidden auto w-full relative 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
        <div class="flex flex-col items-center">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Galeri</p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem]"></span>
        </div>
    <div class="gap-6 my-6 2xl:columns-4 xl:columns-3 lg:columns-3 md:columns-2 sm:columns-2 gap-4 p-6 phone:p-3 bg-gray-50 rounded-md">
        <?php foreach($galeri_data as $data_galeri) : ?>
        <?php if($data_galeri->aktif == 1) : ?>
            <a href="<?= base_url('web/detail_album/'.$data_galeri->id.'/'.slug_url($data_galeri->nama_album)); ?>" class="reveal w-full inline-block group rounded 2xl:aspect-[4/3] xl:aspect-[4/3] lg:aspect-[4/3] md:aspect-[4/3] mb-2">
            <img src="<?= site_url('assets/img/galeri/').$data_galeri->gambar; ?>" alt="<?= $data_galeri->nama_album; ?>" class="rounded w-full h-full object-cover group-hover:opacity-100 group-hover:scale-110 group-hover:shadow-menu opacity-80 ease-in-out duration-300 transition-all">
            <div class="w-full h-auto absolute 2xl:bottom-[21%] xl:bottom-[21%] lg:bottom-[21%] md:bottom-[15%] sm:bottom-[15%] phone:bottom-[15%] left-0 flex flex-col p-2">
            <p style="font-size: 14px; -webkit-text-stroke: 1px #fff;  text-shadow: 4px 4px 4px #000;" class="text-white tracking-wider 2xl:text-base xl:text-base lg:text-base md:text-sm sm:text-base phone:text-base">Album <?= $data_galeri->nama_album; ?></p>
            <p class="text-white 2xl:text-base xl:text-base lg:text-base md:text-sm sm:text-base phone:text-base"><?= date('d F Y', $data_galeri->tgl_buat); ?></p>
        </div>
        </a>
    <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>
</div>
<?php else : ?>  
    <div class="flex flex-col items-center">
        <p class="reveal font-medium italic text-gray-500 text-center">-- Galeri belum tersedia --</p>
    </div>
<?php endif; ?>


