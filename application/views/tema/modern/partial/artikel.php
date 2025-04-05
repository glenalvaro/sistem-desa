<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- View Mobile -->
<?php if($artikel) : ?>
<div class="reveal 2xl:hidden xl:hidden lg:hidden md:hidden 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
        <div class="flex flex-col items-center mb-2">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Berita <?= $sebutan_desa; ?></p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem] mb-2"></span>
            <p class="phone:text-xs text-center reveal-grow-r py-1">Menyajikan informasi terbaru tentang peristiwa, berita, dan artikel-artikel jurnalistik lainnya</p>
        </div>
          <div class="items slider mt-2">
    <?php foreach ($artikel as $data) : ?>
    <?php if($data->aktif == 1) : ?>
        <div style="width: 100%; padding: 0.5rem !important;" class="slick-slide" tabindex="-1" style="outline: none;">
            <div class="thumbnail-desktop">
                <div class="thumbnail-image-desktop">
                    <img src="<?= base_url('assets/img/foto_artikel/') . $data->gambar; ?>" alt="<?= $data->judul ?>">
                </div>
                <div class="thumbnail-content-desktop">
                    <a href="<?= base_url('web/detail_artikel/'.$data->id.'/'.slug_url($data->judul)); ?>">
                    <div class="thumbnail-title-desktop"><?= $data->judul; ?></div></a>
                    <div class="product-rating d-inline-block">
                         <p class="text-xs phone:text-xs text-gray-400 mt-2">
                            <i class="fas fa-user"></i>&nbsp;&nbsp; <?= $data->user; ?>
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
<?php if($artikel) : ?>
 <a href="<?= base_url('web/data_berita') ?>" class="btn_more txt_more reveal-d p-2 self-center ease-in-out duration-300 phone:text-xs">Lihat Semua</a>
<?php endif; ?>
</div>
</div>


<div class="artikel-list reveal 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:py-10 2xl:px-48 xl:px-44 xl:py-9 lg:px-20 lg:py-8 md:px-16 md:py-7 sm:px-10 sm:py-6 phone:px-2 phone:py-5">
    <div class="w-full flex flex-col gap-6 phone:gap-3">
          <div class="flex flex-col items-center mb-2">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Berita <?= $sebutan_desa; ?></p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem] mb-2"></span>
            <p class="phone:text-xs text-center reveal-grow-r py-1">Menyajikan informasi terbaru tentang peristiwa, berita, dan artikel-artikel jurnalistik lainnya</p>
        </div>
    <div class="artikel-list">
    <?php foreach ($artikel as $data) : ?>
    <?php if($data->aktif == 1) : ?>
    <figure class="artikel-box">
      <div class="image"><img src="<?= base_url('assets/img/foto_artikel/') . $data->gambar; ?>" alt="sample69"/></div>
      <figcaption>
        <div class="date"><span class="day"><?= date('d M', $data->tgl_created) ?></span><span class="month"><?= date('Y', $data->tgl_created) ?></span></div>
        <h3 style="font-size: 12px !important;"><a href="<?= base_url('web/detail_artikel/'.$data->id.'/'.slug_url($data->judul)); ?>"><?= $data->judul; ?></a></h3>
        <p class="text-sm">
         <?= word_limiter($data->isi, 25, '...') ?>
        </p>
      </figcaption>
      <footer>
      <div><i class="fa fa-user"></i>&nbsp; <?= $data->user; ?></div>
    </footer>
    </figure>
    <?php endif; ?>
    <?php endforeach ?>
</div>
</div>
</div>
<?php endif; ?>