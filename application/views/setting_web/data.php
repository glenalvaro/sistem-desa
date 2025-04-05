<div class="content-wrapper">
<section class="content-header">
  <h1 class="tx-judul">
        Pengaturan <small>Website</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"> Website</a></li>
      <li><a href="#"> Pengaturan</a></li>
  </ol>
</section>

  <!-- Layout Single -->
<?php foreach($data_setting as $data) : ?>
<?php foreach($desa as $ds) : ?>
<?php foreach($setting as $st) : ?>
<form action="<?= base_url('setting_web/update_data/'); ?><?= $data['id']; ?>" method="post" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
           <div class="box-header with-border">
              <b>Pengaturan Dasar</b>
            </div>
            <div class="box-body">
              <div class="form-group">
                   <label for="alamat" class="col-sm-3">Layout Gambar</label>
                    <div class="col-sm-4">
                      <input type="hidden" name="id" value="<?= $data['id']; ?>">
                      <select id="pilih_layout" name="layout_gambar" class="form-control select-filter" style="width: 100%">
                        <option value="1" <?= selected($data['layout_gambar'], '1'); ?>>Hanya gambar saja</option>
                        <option value="2" <?= selected($data['layout_gambar'], '2'); ?>>Gambar dengan slide</option>
                      </select>           
                    </div>
                    <span class="col-sm-4" style="font-size: 10px;">Sesuaikan tata letak gambar website</span>
                </div>
       
                <div class="form-group">
                    <label for="alamat" class="col-sm-3">Tampilkan Statistik</label>
                    <div class="col-sm-4">
                      <select name="tampil_statistik" class="form-control select-filter" style="width: 100%">
                        <option value="1" <?= selected($data['tampil_statistik'], '1'); ?>>Ya</option>
                        <option value="0" <?= selected($data['tampil_statistik'], '0'); ?>>Tidak</option>
                      </select>
                    </div>
                    <span class="col-sm-5" style="font-size: 10px;">Apakah akan menampilkan data statistik di website ?</span>
                </div>

                 <div class="form-group">
                    <label for="alamat" class="col-sm-3">Tampilan Warna</label>
                    <div class="col-sm-4">
                      <div class="input-group input-group-sm input_warna">
                          <div class="input-group-addon">
                            <i style="height: 12px !important;"></i>
                          </div>
                          <input class="form-control input-sm pull-right" name="tema_warna" type="text" value="<?= $data['tema_warna']; ?>">
                      </div>
                    </div>
                    <span class="col-sm-5" style="font-size: 10px;">Ganti warna tampilan pada website</span>
                </div>

                 <div class="form-group">
                    <label for="alamat" class="col-sm-3">Teks Warna</label>
                    <div class="col-sm-4">
                      <div class="input-group input-group-sm input_warna">
                          <div class="input-group-addon">
                            <i style="height: 12px !important;"></i>
                          </div>
                          <input class="form-control input-sm pull-right" name="teks_warna" type="text" value="<?= $data['teks_warna']; ?>">
                      </div>
                    </div>
                    <span class="col-sm-5" style="font-size: 10px;">Ganti warna teks pada website</span>
                </div>
            </div>
            <div class="box-footer">
               <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
             <div class="box-header with-border">
              <b>Tampil di website</b>
            </div>
            <div class="box-body">

            <?php if($data['layout_gambar'] == 1) : ?>
            <div class="box box-widget widget-user tema1">
              <div class="widget-user-header bg-black" style="background: url(<?= base_url('assets/img/latar_modul/') . $st['latar_website']; ?>) center center; height: 300px;">
                <br>
                <h3 style="color: black;" class="widget-user-username">Website Resmi <?= $st['sebutan_desa'] ?> <?= $ds['nama_desa'] ?></h3>
                <h5 style="color: black; font-size: 12px;" class="widget-user-desc">Sumber informasi terbaru tentang pemerintahan.</h5>
              </div>
            </div>
          <?php else : ?>
            <!-- Layout Slide -->
            <div id="layout_gbr" class="carousel slide tema2" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
                foreach ($gbr_slide as $key => $value) {
                  $active = ($key == 0) ? 'active' : '';
                    echo '<li data-target="#layout_gbr" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                   }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                foreach ($gbr_slide as $key => $value) {
                    $active = ($key == 0) ? 'active' : '';
                    echo '<div class="item ' . $active . '">
                     <img style="width:100%; height:300px;" src="' . base_url('assets/img/slide/') . $value->gambar . '" alt="…">
                          <div class="carousel-caption">
                              <h3>' . $value->nama . '</h3>
                          </div>
                    </div>';
                  }
                ?>
            </div>
              <a class="left carousel-control" href="#layout_gbr" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#layout_gbr" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
            </div>
          <?php endif; ?>

           <div id="layout_1" class="box box-widget widget-user" hidden>
              <div class="widget-user-header bg-black" style="background: url(<?= base_url('assets/img/latar_modul/') . $st['latar_website']; ?>) center center; height: 300px;">
                <br>
                <h3 style="color: black;" class="widget-user-username">Website Resmi <?= $st['sebutan_desa'] ?> <?= $ds['nama_desa'] ?></h3>
                <h5 style="color: black; font-size: 12px;" class="widget-user-desc">Sumber informasi terbaru tentang pemerintahan.</h5>
              </div>
            </div>

            <div id="layout_2" class="carousel slide" data-ride="carousel" hidden>
            <ol class="carousel-indicators">
              <?php
                foreach ($gbr_slide as $key => $value) {
                  $active = ($key == 0) ? 'active' : '';
                    echo '<li data-target="#layout_2" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                   }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                foreach ($gbr_slide as $key => $value) {
                    $active = ($key == 0) ? 'active' : '';
                    echo '<div class="item ' . $active . '">
                     <img style="width:100%; height:300px;" src="' . base_url('assets/img/slide/') . $value->gambar . '" alt="…">
                          <div class="carousel-caption">
                              <h3>' . $value->nama . '</h3>
                          </div>
                    </div>';
                  }
                ?>
            </div>
              <a class="left carousel-control" href="#layout_2" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#layout_2" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
            </div>
            <br/>  
              <p class="text-muted text-center text-red">(Jika gambar slide tidak tampil, silakan tambahkan gambar terlebih dahulu di menu <code>website/slider</code>)</p> 
           </div>

          </div>
        </div>
      </div>
    </form>
     <?php endforeach; ?>
         <?php endforeach; ?>
      <?php endforeach; ?>
</section>
</div>
    
<script>
$(function () {
  $('#pilih_layout').on('change', function(){
      if ($("#pilih_layout option:selected").val() == 1) {
        $('#layout_1').prop('hidden', false);
        $('#layout_2').prop('hidden', true);
        $('.tema2').prop('hidden', true);
      } else {
        $('#layout_1').prop('hidden', true);
        $('#layout_2').prop('hidden', false);
        $('.tema1').prop('hidden', true);
      }
    });

  $('.input_warna').colorpicker();
});
</script>