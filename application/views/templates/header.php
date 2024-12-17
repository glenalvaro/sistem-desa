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
<!-- Responsive Web -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Logo -->
<link rel="icon" href="<?= base_url('assets/img/logo/') . $ds['logo_desa']; ?>" type="image/x-icon">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
<!-- Select 2 dan input file-->
<link rel="stylesheet" href="<?= base_url() ?>assets/aset/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/input-file.css">
<!-- image -->
<link rel="stylesheet" href="<?= base_url() ?>assets/custom/jquery.fileupload-ui.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/progressive-image/progressive-image.css">
<!-- Datatables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/aset/dataTables.bootstrap.min.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Sweet Alert -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/sweet-alert/sweetalert2.min.css">
<!-- Jquery -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Dropzone File -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/dropzone/min/dropzone.min.css">
<script src="<?= base_url() ?>assets/vendor/dropzone/min/dropzone.min.js"></script>
<!-- Font Sistem -->
<link rel="stylesheet" href="<?= base_url() ?>assets/aset/font_family.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
<!-- Font Icon -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- OpenStreetMap CSS-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.css">
<link rel='stylesheet' href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css'/>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css'/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/leaflet-routing-machine/dist/leaflet-routing-machine.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/custom/control-sidebar-map.css">

<!-- OpenStreetMap JS -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4"></script>
<script src="https://unpkg.com/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="<?= base_url() ?>assets/custom/control-sidebar-map.js"></script>

<!-- Modification Admin Style -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/custom/admin_style.css">

<!-- Highcharts -->
<script src="<?= base_url() ?>assets/js/highcharts/highcharts.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/highcharts-3d.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/sankey.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/organization.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/accessibility.js"></script>

</head>

<body class="hold-transition sidebar-mini fixed <?= $st['tema_modul'] ?>">
<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
<?php if ($this->session->flashdata('flash-error')) : ?>
<?php endif; ?>

 <?php
    date_default_timezone_set("Asia/Makassar");
  ?>
<div class="wrapper">
  <header class="main-header">
    <a style="font-size: 15px;" href="#" class="logo">
      <span class="logo-mini"><b>S</b>I</span>
      <span class="logo-lg"><p style="font-weight: bold; font-size: 16px;"><?= $st['sebutan_desa']; ?> Digital</p></span>
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

<?php $this->load->view('aplikasi/cek_internet'); ?>
