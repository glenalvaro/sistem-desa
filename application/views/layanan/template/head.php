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
</head>

<style>
   body {
      font-family: Rubik, sans-serif;
      font-weight: 400;
      font-size: 12px !important;
    }

    .tx-rubik{
      font-family: Rubik, sans-serif;
      font-size: 12px !important;
    }

    .btn-sm {
      font-size: 10px !important;
    }

    .head-title{
      font-size: 15px !important;
      font-weight: bold;
    }

    .logo-head {
      margin: -3px;
      width: 22px;
      height: auto;
    }

    .tx-count{
      font-size: 20px !important;
    }

    .tx-info{
      font-size: 20px !important;
    }

    .icon{
      font-size: 60px !important;
      margin-top: 10px;
    }

    .badge-icon{
      font-size: 7px;
    }

    .tx-title{
      font-size: 16px !important;
      font-weight: bold;
    }

    .widget-user-2 .widget-user-image>img {
      width: 50px;
      height: 50px;
      border: 2px solid;
      float: left;
    }

    /* button style */
  .btn-group-sm>.btn, .btn-sm {
    line-height: 1.1;
  }

  .btn-social.btn-sm> :first-child {
    line-height: 21px;
    width: 28px;
    font-size: 1.4em;
  }

  /* css select2 yang digunakan */
    .select-filter {
      height: auto;
      width: auto;
      margin-right: 5px;
      padding: 5px;
      font-size: 10px;
      line-height: 1.5;
      border-radius: 2px;
      border-color: #d2d6de;
  } 

  .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #ccc;
      height: 25px;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 20px !important;
  }

  .select2-container .select2-selection--single .select2-selection__rendered {
      display: block;
      overflow: hidden;
      padding-left: 0;
      padding-right: 20px;
      text-overflow: ellipsis;
  }

  /* Pagination Custom and showing */
  .table-penduduk .dataTables_paginate {
    margin-top: 30px !important;
    position: absolute;
    right: 0;
    margin-right : 10px !important;
  }

  .table-penduduk .dataTables_length {
    margin-top: 30px !important;
    position: absolute;
    left: 0;
    margin-left : 11px !important;
  }

  /* custom lenght, search, pagination dataTables */
  div.dataTables_wrapper div.dataTables_length select 
  {
    height: auto;
    padding: 4px;
    font-size: 10px;
    line-height: 1.1;
    border-radius: 2px;
    border-color: #d2d6de;
 }

 div.dataTables_wrapper div.dataTables_filter input {
    height: auto;
    padding: 5px;
    font-size: 10px;
    line-height: 1.1;
    border-radius: 2px;
    border-color: #d2d6de;
}

 .pagination>li>a, .pagination>li>span {
    height: auto;
    padding: 8px;
    font-size: 10px;
    line-height: 1.2;
}

/*Modifikasi card di view umkm*/
.link a{
   color: #007bff;
   text-decoration: none;
   background-color: transparent;
}
.link a:hover{
   color: #007bff;
   text-decoration: underline;
   background-color: transparent;
}
.thumbnail-desktop{
   background: #fff;
   border: 1px solid #eaedf3;
   box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
   border-radius: 4px;
   margin: 15px 0;
   cursor: pointer;
   width: 245px;
}
.thumbnail-image-desktop {
    height: 135px;
    border-radius: 4px 4px 0 0;
    overflow: hidden;
}
.thumbnail-image-desktop img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}
.thumbnail-content-desktop {
    padding: 15px;
    min-height: 195px;
}
.thumbnail-content-desktop a:hover {
   text-decoration: underline;
   color: #142b72;
}
.thumbnail-title-desktop {
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    color: #142b72;
    height: 50px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.thumbnail-keterangan-desktop {
    color: #ff7d2a;
    font-size: 14px;
    margin-bottom: 15px;
}

.slider {
   width: 100%;
   background-color: #fafafa!important;
}

.slider .slick-prev {
    background-image: url(../assets/img/icon/btn-prev-slide.svg);
    left: -20px;
}

.slider .slick-next {
    background-image: url(../assets/img/icon/btn-next-slide.svg);
    right: -20px;
}

.slick-next, .slick-prev {
    font-size: 0;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
    border: none;
}

.slider .slick-next, .slick-prev {
    width: 30px;
    height: 30px;
    background-size: contain;
    z-index: 2;
}

.slick-list, .slick-slider {
    position: relative;
    display: block;
}
.slider .slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
.slick-initialized .slick-slide {
    display: block;
}

.ui-menu-item .ui-menu-item-wrapper{
   font-family: Rubik;
   font-weight: 500;
}

@media (min-width: 768px) {
.cover-responsive.alt {
    height: 400px;
}
}

/*Modifikasi card di list all umkm*/
.thumbnail-phone{
    display: flex;
    height: 80px !important;
    width: 95%;
    background: #fff;
    border: 1px solid #a8c6df;
    box-sizing: border-box;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
    margin: 0;
    padding: 20px;
    cursor: pointer;
    position: relative;
    transition: all .3s ease-in-out 0s;
    margin-left: 10px;
}
.thumbnail-content-phone{
    width: 100%;
    min-height: auto;
    line-height: 0.7;
    margin-top: -5px;
}
.thumbnail-image-phone{
    width: 100px;
    height: 100px;
    overflow: hidden; 
    margin-top: -11px;
}

.thumbnail-image-phone img{
   object-fit: cover;
   width: 60%;
   height: 60%;
}
.thumbnail-title-phone{
   height: auto;
   font-size: 12px;
   color: #142b72;
}
.thumbnail-content-phone a:hover{
   text-decoration: underline;
   color: #142b72;
}

/*Modifikasi form*/
label {
    font-weight: 500 !important;
}

.input-sm {
    height: 25px;
    padding: 12px;
    font-size: 11px;
    line-height: 1.5;
    border-radius: 2px;
}

.form-group.has-error label {
    color: #dd4b39;
    font-size: 10px;
}

</style>

<body class="hold-transition layout-top-nav <?= $st['tema_modul'] ?>">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a style="font-size: 13px;" href="" class="navbar-brand"><?= $st['sebutan_desa']; ?> <?= $ds['nama_desa']; ?></a>
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
                <span class="label label-danger">10</span>
              </a>
            </li>
          
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= set_ucwords($penduduk['nama_pend']); ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                   <img class="img-circle" src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" class="user-image" alt="User Image">
                  <p style="font-size: 12px;">
                    <?= $penduduk['nama_pend']; ?>
                    <small>Terdaftar <?= date('d F Y', $penduduk['tgl_buat']); ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('/layanan/profil'); ?>" class="btn btn-sm bg-maroon">Profil</a>
                  </div>
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