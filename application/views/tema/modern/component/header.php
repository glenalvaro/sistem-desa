
<?php if($layout_gambar == 1) : ?>
<!-- Layout Gambar Saja -->
 <div class="h-screen w-full relative bg-center bg-cover bg-no-repeat bg-fixed latar-web opacity-80 ease-in-out duration-300 transition-all">
    <div class="absolute top-[45%] left-1/2 -translate-y-[45%] -translate-x-1/2 h-auto w-full flex flex-col justify-center items-center">
        <h1 class="txt_head scale-up-horizontal-left text-gray-100 2xl:text-6xl 2xl:leading-4 xl:text-6xl xl:leading-4 lg:text-6xl lg:leading-4 md:text-5xl md:leading-4 sm:text-4xl sm:leading-4 phone:text-2xl phone:leading-4">Selamat datang di</h1>
        <h1 class="txt_head scale-up-horizontal-left text-gray-100 2xl:text-[5rem] xl:text-[5rem] lg:text-[5rem] md:text-[4.4rem] sm:text-[3.65rem] phone:text-[2.15rem] font-semibold text-center">Wesbite Resmi <?= $sebutan_desa; ?> <?= $nama_desa; ?></h1>
        <p class="scale-up-vertical-center text-gray-100 2xl:text-lg xl:text-lg font-normal italic md:text-base sm:text-sm phone:text-xs phone:text-center sm:text-center">Sumber informasi terbaru tentang pemerintahan <?= $sebutan_desa; ?> <?= $nama_desa; ?>
        </p>
    </div>
  </div>
<?php else : ?>
<!-- Layout Slider -->
<div class="h-full w-full relative">
    <div class="w-full h-[calc(100vh*0.50)] 2xl:h-[calc((100vw-24rem)*9/21)] xl:h-[calc((100vw-22rem)*9/19)] lg:h-[calc((100vw-10rem)*9/19)] md:h-[calc((100vw-8rem)*9/16)] sm:h-[calc((100vw-5rem)*4/3)] bg-center bg-cover bg-no-repeat bg-fixed relative">
        <div class="w-full h-full absolute top-0 left-0 flex flex-col items-center justify-center">
            <div class="swiper header-slider h-screen">
            <div class="swiper-wrapper">
            <?php foreach($data_slide as $slider) : ?>
                <?php if($slider->status == 1) : ?>
                <div class="swiper-slide opacity-80 ease-in-out duration-300 transition-all">
                <p class="title_slide md:text-4xl sm:text-sm phone:text-xl"><?= $slider->nama; ?></p>
                <p class="desc_slide md:text-2xl sm:text-sm phone:text-xs"><?= $slider->deskripsi; ?></p>
                  <img src="<?= base_url('assets/img/slide/') . $slider->gambar; ?>">
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $this->load->view('tema/modern/partial/informasi'); ?>

   