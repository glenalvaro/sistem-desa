<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>

      <?php foreach($setting as $stg) : ?>
      <?php foreach($desa as $dsa) : ?>
      <?php foreach($mandiri as $main) : ?>
      <title>
        <?= $stg['title_login']; ?> <?= $stg['sebutan_desa']; ?> <?= $dsa['nama_desa']; ?> | <?= $title; ?>
      </title>

      <link rel="icon" href="<?= base_url('assets/img/logo/') . $dsa['logo_desa']; ?>" type="image/x-icon">
      <link href="<?= base_url() ?>assets/aset/layanan_penduduk/css/fonts.css" rel="stylesheet" />
      <link rel="stylesheet" href="<?= base_url() ?>assets/aset/layanan_penduduk/css/style.css"/>
      <link rel="stylesheet" href="<?= base_url() ?>assets/aset/layanan_penduduk/css/login.css"/>
   </head>
   <style>
      .bg-login{ 
          background: url(<?= base_url('assets/img/latar_mandiri/') . $main['latar_mandiri']; ?>) no-repeat center center fixed;
          background-size: cover;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
      }
   </style>
   <body>
   <form action="<?= base_url('/layanan/masuk'); ?>" method="post">
      <div class="ht-100v text-center">
         <div class="row pd-0 mg-0">
            <div class="col-lg-6 bg-login hidden-sm hidden-xs">
               <div class="ht-100v d-flex">
                  <div class="align-self-center">
                     <img style="width: 70px;" src="<?= base_url('assets/img/logo/') . $dsa['logo_desa']; ?>" class="img-fluid" alt="">
                     <h3 class="tx-22 tx-semibold tx-gray-100 pd-t-40 tx-info"><?= strtoupper($stg['title_login']); ?></h3>
                     <h3 class="tx-18 tx-semibold tx-gray-100 tx-info"><?= strtoupper($stg['sebutan_desa']); ?> <?= strtoupper($dsa['nama_desa']); ?></h3>
                     <p class="pd-y-15 pd-x-10 pd-md-x-100 tx-alamat"><?= strtoupper($dsa['alamat_kantor']); ?>, KECAMATAN <?= strtoupper($dsa['nama_kecamatan']); ?>, <?= strtoupper($stg['sebutan_kabupaten']); ?> <?= strtoupper($dsa['nama_kabupaten']); ?></p>
                     <p class="pd-y-15 pd-x-10 pd-md-x-100">Silakan hubungi operator desa untuk mendapatkan kode PIN anda.</p>
                     <p class="pd-y-15 pd-x-10 pd-md-x-100 tx-gray-200">Tanggal : <?= date('d F Y') ?></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 bg-light">
                  <div class="ht-100v d-flex align-items-center justify-content-center">
                     <div class="">
                     <br><br><br><br>
                     <img src="<?= base_url('assets/img/logo/') . $dsa['logo_desa']; ?>" alt="icon" class="img-fluid hidden-lg hidden-sm hidden-md" style="width: 70px; margin-bottom: 30px; margin-top: -20px;">
                     <h4 class="tx-dark mg-b-5 tx-left tx-20 hidden-md hidden-xs">Masuk Akun</h4>
                     <h4 class="tx-dark mg-b-5 tx-left tx-20 hidden-lg hidden-md"> <?= set_ucwords($stg['title_login']); ?></h4>
                     <p class="tx-gray-500 tx-13 mg-b-20 tx-left">Buat kamu yang sudah terdaftar, silakan masuk ke akunmu.</p>
                      <div class="form-group">
                         <div class="d-flex justify-content-between mg-b-5">
                           <label class="tx-gray-500 mg-b-0">Nomor Induk Kependudukan</label>
                        </div>
                        <input type="number" name="nik_pend" value="<?= set_value('nik_pend') ?>" class="form-control" placeholder="NIK">
                        <div class="d-flex justify-content-between mg-t-10">
                            <?= form_error('nik_pend', '<small class="text-danger tx-10">', '</small>'); ?>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                           <label class="tx-gray-500 mg-b-0">PIN</label>
                        </div>
                        <input type="password" name="pin" id="password" class="form-control" placeholder="PIN">
                         <div class="d-flex justify-content-between mg-t-10">
                            <?= form_error('pin', '<small class="text-danger tx-10">', '</small>'); ?>
                        </div>
                     </div>
                     <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="form-check-input" id="tampil_pass">
                           <label class="label tx-gray-500" for="tampil_pass">Tampilkan PIN</label>
                     </div>

                     <!-- Pesan -->
                     <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>

                     <button type="submit" class="btn btn-primary rounded-pill tx-uppercase tx-bold btn-block mg-b-10">Masuk</button>

                       <?php if($main['tampil_layanan']=='Ya') : ?>
                           <button type="button" class="btn btn btn-outline-primary rounded-pill tx-uppercase tx-bold btn-block">LUPA PIN</button>
                       <?php endif; ?>
                     <br>
                     <hr>
                      <?php if($main['tampil_daftar']=='Ya') : ?>
                        <div class="btn-login tx-12 mg-t-20 tx-center tx-gray-500">Belum punya akun? <a href="" class="tx-dark tx-semibold">Daftar Akun</a></div>
                      <?php endif; ?>
                  </div>
               </div>
                  <ul style="margin-top: -40px; margin-right: 16px;">
                     <li class="tx-gray-400 tx-center">&copy; <?= date("Y"); ?>  <?= set_ucwords($stg['sebutan_desa']); ?> Digital</li>
                  </ul>
            </div>
         </div>
      </div>
   </form>
      <script src="<?= base_url() ?>assets/aset/layanan_penduduk/js/jquery.min.js"></script>
      <script src="<?= base_url() ?>assets/aset/layanan_penduduk/js/bootstrap.min.js"></script>
      <script>
         $(document).ready(function () {
             var showPass = document.querySelector('#tampil_pass');
                 var password = document.querySelector('#password');
                 showPass.addEventListener('click', function (e) {
                  // toggle the type attribute
                   var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                   password.setAttribute('type', type);
             });
         });
      </script>
     </body>
    <?php endforeach; ?>
   <?php endforeach; ?>
<?php endforeach; ?>
</html>

