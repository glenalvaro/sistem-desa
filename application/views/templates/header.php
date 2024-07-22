<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php foreach($setting as $st) : ?>
  <?php foreach($desa as $ds) : ?>
  <title>
    <?= $st['title_admin']; ?> <?= $st['sebutan_desa']; ?> <?= $ds['nama_desa']; ?> | <?= $title; ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Logo -->
  <link rel="icon" href="<?= base_url('assets/img/logo/') . $ds['logo_desa']; ?>" type="image/x-icon">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
  <!-- Select 2 dan input file-->
  <link href="<?php echo base_url() ?>assets/aset/select2/css/select2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/input-file.css">
  <!-- image -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/custom/jquery.fileupload-ui.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/progressive-image/progressive-image.css">
  <!-- ion icon v7 -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/aset/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Jquery -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/aset/font_family.css">
  <!-- Leaflet Js for maps -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4"></script>
  <!-- Laaflet control for maps -->
  <link rel="stylesheet" type="text/css" href="https://domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css">
  <!-- Leaflet Draw Polygon for maps-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css">
  <script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: Rubik, sans-serif;
      font-weight: 400;
      font-size: 11px !important;
    }

    .fa {
      width: 13px;
    }

    .pagination {
      font-size: 10px;
    }

    .input-cari {
      height: auto;
      padding: 5px 7px;
      font-size: 10px;
      line-height: 1;
      border-radius: 2px;
    } 

    .filter-penduduk{
      display: flex;
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

    .select-filter2 {
      height: auto;
      margin-right: 5px;
      padding: 5px;
      font-size: 10px;
      line-height: 1.5;
      border-radius: 2px;
      border-color: #d2d6de;
    } 

    .btn-sm {
      font-size: 10px !important;
    }

    .btn-social.btn-sm>:first-child {
      line-height: 25px;
      width: 28px;
      font-size: 1.4em;
    }

    .input-sm {
        height: 25px;
        padding: 12px;
        font-size: 11px;
        line-height: 1.5;
        border-radius: 2px;
    }

    .tx-judul {
      font-size: 16px !important;
      font-weight: bold;
    }

    .breadcrumb li{
      font-size: 11px !important;
    }

    .nav-stacked>li.active>a, .nav-stacked>li.active>a:hover {
      background: #3c8dbc;
      color: #fff;
      border-top: 0;
      border-left-color: #3c8dbc;
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

    .control-sidebar.control-sidebar-open {
      right: 0;
      width: 25%;
    }

    @media (max-width: 768px){
      .control-sidebar.control-sidebar-open {
        width: 100%;
      }
    }

    .table-min-height {
    min-height: 350px;
    }

    /* Modifikasi Tabel --- */
    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        padding: 8px;
    }

    /* Modifikasi Header DataTables--- */
    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        vertical-align: middle;
        font-size: 10px;
    }

    table.table-bordered.dataTable th:last-child,
    table.table-bordered.dataTable th:last-child,
    table.table-bordered.dataTable td:last-child,
    table.table-bordered.dataTable td:last-child {
        border-right-width: 1px;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        border-bottom-width: 0px;
    }

    /*  Modifikasi table  */
    th.padat,
    td.padat {
        width: 1%;
        white-space: nowrap;
        text-align: center;
    }

    td.aksi {
        width: 1%;
        white-space: nowrap;
        text-align: left;
    }

    .tabel-daftar>thead>tr>th {
        text-align: center;
        white-space: nowrap;
        text-transform: uppercase;
    }

    td.nostretch,
    th.nostretch {
        width: 1%;
        white-space: nowrap;
    }

    /* Foto Penduduk Kecil (Mini) */

   .table-penduduk .foto_penduduk {
        width: auto;
        max-width: 30px;
        height: auto;
        border-radius: 10%;
    }

    @media (max-width: 780px){
      .btn-group-vertical {
        display: block;
      }
    }

    @media (min-width: 768px) {
      .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
      }
    }

    .img-penduduk {
      width: auto;
      max-height: 250px;
      max-width: 200px;
      border-radius: 15px;
      display: block;
      margin: 0 auto;
      padding: 2px;
      border: 2px solid #d2d6de;
   }

   .subtitle_head {
    padding: 10px 50px 10px 5px;
    background-color: #a2f2ef;
    margin: 15px 0px 10px 0px;
    text-align: left;
    color: #111;
  }

  .form-group {
    margin-bottom: 10px;
  }

  .parsley-errors-list{
    font-size: 10px;
  }

  .error-input-label{
    color: #dc3545;
  }

  .help-block{
    color: #dc3545 !important;
  }

  .alert-icon img{
    width: 13px;
    cursor: pointer;
  }

  .show-info-paspor{
    width: 70%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 2px solid red;
    padding: 10px;
    border-radius: 25px;
  }

  .modal-deskripsi{
    font-size: 14px;
    text-align: center;
    padding: 10px 10px 10px 5px;
    color: #111;
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

  div.dataTables_wrapper div.dataTables_length select 
  {
    height: auto;
    padding: 7px;
    font-size: 10px;
    line-height: 1.1;
    border-radius: 2px;
    border-color: #d2d6de;
 }

 /* pagination */
 .pagination>li>a, .pagination>li>span {
    height: auto;
    padding: 8px;
    font-size: 10px;
    line-height: 1.2;
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

  /* input group */
  .input-group-sm>.form-control, .input-group-sm>.input-group-addon, .input-group-sm>.input-group-btn>.btn {
    height: 25px;
    padding: 5px 10px;
    font-size: 11px;
    line-height: 1.2;
  }

  /* modifikasi css has error */
  .form-group.has-error label {
    color: #dd4b39;
    font-size: 10px;
  }

  /* ukuran gambar */
  img.penduduk_kecil {
    width: auto;
    max-width: 45px;
    height: auto;
    border-radius: 10%;
    margin: 5px 0;
  }

  /* ukuran text card menu pada view umkm  */
  .progress-description, .info-box-text {
    font-size: 12px;
  }
 
  </style> 
</head>

<body class="hold-transition sidebar-mini fixed <?= $st['tema_modul'] ?>">

<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
<?php if ($this->session->flashdata('flash-error')) : ?>
<?php endif; ?>


<div class="wrapper">

<!-- Internet notifications -->
<div id="notif-internet" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="font-size: 12px; font-weight: bold;" class="modal-title text-red"><i class="fa fa-warning"></i>&nbsp;&nbsp;Sambungkan ke internet</h4>
      </div>
      <div class="modal-body">
        <center>
           <img src="<?= base_url('assets/img/icon/offline-icon.png'); ?>">
           <p style="margin-top: 15px;">Anda sedang offline. Periksa koneksi internet Anda!</p>
        </center> 
      </div>
    </div>
  </div>
</div>

  <?php
    date_default_timezone_set("Asia/Makassar");
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a style="font-size: 15px;" href="#" class="logo">
      <span class="logo-mini"><b>S</b>I</span>
      <span class="logo-lg"><p style="font-weight: bold; font-size: 17px;"><?= $st['sebutan_desa']; ?> Digital</p></span>
   </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="notifications-menu">
            <a href="#" title="Cetak Surat">
              <i class="fa fa-print"></i>
              <span class="label bg-olive">2</span>
            </a>
          </li>

          <li class="notifications-menu">
            <a href="#" title="Pesan">
              <i class="fa fa-comments-o"></i>
              <span class="label label-warning">8</span>
            </a>
          </li>

          <li class="notifications-menu">
            <a href="#" title="Pemberitahuan">
              <i class="fa fa-bell-o"></i>
              <span class="label bg-maroon">10</span>
            </a>
          </li>


          <li style="font-size: 11px;" class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $user['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image">
                <p style="font-size: 11px;"><?= $user['name']; ?><br>
                 Terdaftar Tgl <?= date('d F Y', $user['date_created']); ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('user'); ?>" class="btn bg-maroon btn-sm">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout'); ?>" class="btn bg-maroon btn-sm">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php endforeach; ?>
<?php endforeach; ?>