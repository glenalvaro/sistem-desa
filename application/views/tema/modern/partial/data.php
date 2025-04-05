<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($tampil_statistik == 1) : ?>
<div class="reveal auto w-full relative 2xl:my-10 xl:my-8 lg:my-6 md:my-6 sm:my-6 2xl:pt-10 2xl:px-48 xl:px-44 xl:pt-9 lg:px-20 lg:pt-8 md:px-16 md:pt-7 sm:px-2 sm:pt-5 phone:px-2 phone:pt-5">
    <div class="w-full flex flex-col items-center gap-4 phone:gap-2">
        <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Data <?= $sebutan_desa; ?></p>
        <span class="hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[12%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem]"></span>
        <p class="phone:text-xs text-center reveal-grow-r py-1">Menampilkan informasi terkait dengan jumlah kependudukan</p>
    </div>
<div class="boxStat">
  <div class="box-item">
    <img src="<?= base_url('assets/tema/img/service/penduduk.png'); ?>"> 
    <div>
        <strong><?= $total_pend; ?></strong> 
        <span>Penduduk</span>
    </div>
  </div>
  <div class="box-item">
    <img src="<?= base_url('assets/tema/img/service/keluarga.png'); ?>"> 
    <div>
        <strong><?= $total_kel; ?></strong> 
        <span>Keluarga</span>
    </div>
  </div>
  <div class="box-item">
    <img src="<?= base_url('assets/tema/img/service/pria.png'); ?>"> 
    <div>
        <strong><?= $total_pria; ?></strong> 
        <span>Pria</span>
    </div>
  </div>
  <div class="box-item">
    <img src="<?= base_url('assets/tema/img/service/wanita.png'); ?>"> 
    <div>
        <strong><?= $total_wanita; ?></strong> 
        <span>Wanita</span>
    </div>
  </div>
</div>
</div>
<?php endif; ?>


