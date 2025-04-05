<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full h-full 2xl:mt-24 xl:mt-24 lg:mt-24 md:mt-24 sm:mt-20 phone:mt-20 2xl:px-36 xl:px-28 lg:px-20 md:px-24 sm:px-20 phone:px-6 mb-5 flex flex-col gap-6">
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
                Berita Terkini</span>
            </div>
        </li>
    </ol>
</nav>
<?php if($list_berita) : ?>
<div class="card-berita">
<?php foreach ($list_berita as $data) : ?>
    <?php if($data->aktif == 1) : ?>
    <figure class="card-box-berita">
      <div class="img_berita"><img src="<?= base_url('assets/img/foto_artikel/') . $data->gambar; ?>" alt="sample69"/></div>
      <figcaption>
        <div class="date_berita"><span class="day"><?= date('d M', $data->tgl_created) ?></span><span class="month_berita"><?= date('Y', $data->tgl_created) ?></span></div>
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
<?php endif; ?>

<div class="self-center">
    <?= $halaman_data; ?>
</div>
<span class="hr_line w-[10%] h-[0.1rem] self-center m-6"></span>
</div>
