<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php foreach($setting as $st) : ?>
  <?php foreach($desa as $ds) : ?>
  <title><?= $st['title_login']; ?> <?= $st['sebutan_desa']; ?> <?= $ds['nama_desa']; ?> | <?= $title; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?= base_url('assets/img/logo/') . $ds['logo_desa']; ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/aset/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/aset/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/aset/layanan_penduduk/css/fonts.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/sweet-alert/sweetalert2.min.css">
  <!-- Slick slider-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/aset/layanan_penduduk/slick/slick.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/aset/layanan_penduduk/slick/slick-theme.css">
  <!-- OpenStreet Map CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/leaflet-routing-machine/dist/leaflet-routing-machine.css">
  <script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <!-- OpenStreet Map JS -->
  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4"></script>
  <script src="<?= base_url() ?>assets/vendor/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
  <!-- FullScreen OpenStreetMap -->
  <script src="<?= base_url() ?>assets/vendor/leaflet/fullscreen/leaflet-fullscreen.min.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/leaflet/fullscreen/leaflet-fullscreen.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/layanan_mandiri/style.css">
</head>
<body class="hold-transition layout-top-nav <?= $st['tema_modul'] ?>">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a style="font-size: 13px;" href="<?= base_url('/layanan/beranda') ?>" class="navbar-brand"><?= $st['sebutan_desa']; ?> <?= $ds['nama_desa']; ?></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if ($this->uri->segment('2') == 'beranda') {echo 'active';} ?>"><a href="<?= base_url('/layanan/beranda') ?>">Home</a></li>
            <li class="<?php if ($this->uri->segment('2') == 'permohonan_surat') {echo 'active';} ?>"><a href="<?= base_url('/layanan/permohonan_surat') ?>">Layanan Surat</a></li>
            <li class="<?php if ($this->uri->segment('2') == 'perangkat') {echo 'active';} ?>"><a href="<?= base_url('/layanan/perangkat') ?>">Perangkat</a></li>
            <li class="<?php if ($this->uri->segment('2') == 'umkm') {echo 'active';} ?>"><a href="<?= base_url('/layanan/umkm') ?>">UMKM</a></li>
            <li class="<?php if ($this->uri->segment('2') == 'bantuan') {echo 'active';} ?>"><a href="<?= base_url('/layanan/bantuan') ?>">Bantuan</a></li>
          </ul>
        </div>
        
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label bg-maroon">10</span>
              </a>
            </li>
          
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img style="width: 21px; height: 21px; border: 2px solid #ffffff;" src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" class="img-circle" alt="User Image">
              </a>
              <ul class="dropdown-menu">
                  <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-aqua-active">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" alt="User Avatar">
              </div>
              <h3 style="font-size: 17px; font-weight: 500;" class="widget-user-username"><?= set_ucwords($penduduk['nama_pend']); ?></h3>
              <h5 class="widget-user-desc">NIK. <?= $penduduk['nik_pend']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked" style="font-size: 12px;">
                <li class="<?php if ($this->uri->segment('2') == 'profil') {echo 'active';} ?>"><a style="color: black !important;" href="<?= base_url('/layanan/profil') ?>"><i class="fa fa-user"></i>&nbsp; Profil</a></li>
                <li class="<?php if ($this->uri->segment('2') == 'dokumen') {echo 'active';} ?>"><a style="color: black !important;" href="<?= base_url('/layanan/dokumen') ?>"><i class="fa fa-file-pdf-o"></i>&nbsp; Dokumen</a></li>
                <li><a style="color: black !important;" href="#"><i class="fa fa-key"></i>&nbsp; Ganti PIN</a></li>
              </ul>
            </div>
          </div>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= base_url('/layanan/masuk/sign_out'); ?>" class="btn btn-sm bg-maroon">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
 <?php endforeach; ?>
<?php endforeach; ?>