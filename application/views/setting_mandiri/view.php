<style>
  .latar-modul {
    border: 0;
    display: block;
    height: auto;
    width: 100%;
}
</style>
<div class="content-wrapper">
<section class="content-header">
  <h1 class="tx-judul">
        Pengaturan <small>Layanan Penduduk</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"> Layanan Penduduk</a></li>
      <li><a href="#"> Pengaturan</a></li>
  </ol>
</section>


<?php foreach($mandiri as $key) : ?>
<form action="<?= base_url('setting_mandiri/update_man/'); ?><?= $key['id']; ?>" method="post" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
             <div class="box-header with-border">
              <b>Latar Login Mandiri</b>
            </div>
            <div class="box-body">
                <center>
                    <img class="img-preview latar-modul" src="<?= base_url('assets/img/latar_mandiri/') . $key['latar_mandiri']; ?>" value="<?= $key['latar_mandiri']; ?>">
                </center>
                <br/>  
                <p class="text-muted text-center text-red">(Kosongkan, jika latar website tidak berubah)</p>
                <center>
                  <div class="custom-file">
                       <input type="file" class="custom-file-input" id="image" name="latar_mandiri" onchange="previewGmb()">
                       <label class="custom-file-label" for="image"></label>
                  </div>
                </center>  
           </div>
          </div>
        </div>

        <div class="col-md-9">
        <div class="box box-primary">
           <div class="box-header with-border">
              <b>Pengaturan Dasar</b>
            </div>
            <div class="box-body">
              <div class="form-group">
                   <label for="alamat" class="col-sm-3">Lupa PIN</label>
                    <div class="col-sm-4">
                      <input type="hidden" name="id" value="<?= $key['id']; ?>">
                      <select name="tampil_layanan" class="form-control select-filter" style="width: 100%">
                        <option value="Ya" <?= selected($key['tampil_layanan'], 'Ya'); ?>>Ya</option>
                        <option value="Tidak" <?= selected($key['tampil_layanan'], 'Tidak'); ?>>Tidak</option>
                      </select>           
                    </div>
                    <span class="col-sm-4" style="font-size: 10px;">Apakah layanan lupa PIN penduduk ditampilkan atau tidak</span>
                </div>
       
                <div class="form-group">
                    <label for="alamat" class="col-sm-3">Tampilkan Pendaftaran</label>
                    <div class="col-sm-4">
                      <select name="tampil_daftar" class="form-control select-filter" style="width: 100%">
                        <option value="Ya" <?= selected($key['tampil_daftar'], 'Ya'); ?>>Ya</option>
                        <option value="Tidak" <?= selected($key['tampil_daftar'], 'Tidak'); ?>>Tidak</option>
                      </select>
                    </div>
                    <span class="col-sm-5" style="font-size: 10px;">Aktifkan / Non Aktifkan Pendaftaran Layanan Penduduk</span>
                </div>

                 <div class="form-group">
                    <label for="alamat" class="col-sm-3">Pendaftar UMKM</label>
                    <div class="col-sm-4">
                      <select name="daftar_umkm" class="form-control select-filter" style="width: 100%">
                        <option value="Ya" <?= selected($key['daftar_umkm'], 'Ya'); ?>>Ya</option>
                        <option value="Tidak" <?= selected($key['daftar_umkm'], 'Tidak'); ?>>Tidak</option>
                      </select>
                    </div>
                    <span class="col-sm-5" style="font-size: 10px;">Aktifkan / Non Aktifkan Pendaftaran UMKM di modul administrasi penduduk</span>
                </div>
            </div>
            <div class="box-footer">
               <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </div>
        </div>


      </div>
    </form>
     <?php endforeach; ?>
</section>
</div>