<style>
  .latar-modul {
    border: 0;
    display: block;
    height: auto;
    width: 100%;
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Aplikasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Aplikasi</a></li>
      </ol>
    </section>

<?php foreach($setting as $st) : ?>
<form action="<?= base_url('admin/update_setting/'); ?><?= $st['id']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title" style="font-size: 14px;">Latar Website</h3>
            </div>
            <div class="box-body">
                <center>
                    <img class="img-preview latar-modul" src="<?= base_url('assets/img/latar_modul/') . $st['latar_website']; ?>" value="<?= $st['latar_website']; ?>">
                </center>
                <br/>  
                <p class="text-muted text-center text-red">(Kosongkan, jika latar website tidak berubah)</p>
                <center>
                  <div class="custom-file">
                       <input type="file" class="custom-file-input" id="image" name="latar_website" onchange="previewGmb()">
                       <label class="custom-file-label" for="image"></label>
                  </div>
                </center>  
           </div>
          </div>

           <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title" style="font-size: 14px;">Latar Login Admin</h3>
            </div>
            <div class="box-body">
              <center>
                    <img class="img-preview latar-modul" src="<?= base_url('assets/img/latar_admin/') . $st['latar_login_admin']; ?>" value="<?= $st['latar_login_admin']; ?>">
                </center>
                <br/>  
                <p class="text-muted text-center text-red">(Kosongkan, jika latar login admin tidak berubah)</p>
                <center>
                  <div class="custom-file">
                       <input type="file" class="custom-file-input" id="image" name="latar_login_admin" onchange="previewGmb()">
                       <label class="custom-file-label" for="image"></label>
                  </div>
                </center>  
           </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title" style="font-size: 14px;">Pengaturan Dasar</h3>
            </div>
            <div class="box-body">
              <div class="col-md-12" style="margin-left: 12px;">
                <div class="form-group">
                    <label>Title Admin :</label>
                      <input type="hidden" name="id" value="<?= $st['id']; ?>">
                      <input type="text" name="title_admin" id="title_admin" class="form-control input-sm" style="width: 90%;" value="<?= $st['title_admin']; ?>" required>
                      <span style="font-size: 10px;" class="help-block">Judul tab browser modul administrasi</span>
                </div>

                <div class="form-group">
                    <label>Title Login :</label>
                      <input type="text" name="title_login" id="title_login" class="form-control input-sm" style="width: 90%;" value="<?= $st['title_login']; ?>" required>
                      <span style="font-size: 10px;" class="help-block">Judul tab browser halaman login modul administrasi</span>
                </div>

                 <div class="form-group">
                    <label>Statistik :</label>
                    <br>
                      <select name="statistik_data" class="form-control select-filter" style="width: 90%" title="<?= $st['statistik_data']; ?>">
                          <option value="Ya" <?= selected($st['statistik_data'], 'Ya'); ?>>Ya</option>
                          <option value="Tidak" <?= selected($st['statistik_data'], 'Tidak'); ?>>Tidak</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Apakah akan menampilkan data statistik ke website</span>
                </div>

                <div class="form-group">
                    <label>Mode Maintenance :</label>
                    <br>
                      <select name="mode_perbaikan" class="form-control select-filter" style="width: 90%">
                          <option value="Ya" <?= selected($st['mode_perbaikan'], 'Ya'); ?>>Ya</option>
                          <option value="Tidak" <?= selected($st['mode_perbaikan'], 'Tidak'); ?>>Tidak</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Jika aktif website utama tidak dapat diakses</span>
                </div>

                <div class="form-group">
                    <label>Notifikasi Internet :</label>
                    <br>
                      <select name="cek_internet" class="form-control select-filter" style="width: 90%">
                           <option value="Ya" <?= selected($st['cek_internet'], 'Ya'); ?>>Ya</option>
                          <option value="Tidak" <?= selected($st['cek_internet'], 'Tidak'); ?>>Tidak</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Ingatkan jika aplikasi tidak terhubung dengan internet.</span>
                </div>

                <div class="form-group">
                    <label>Sebutan Desa :</label>
                      <br>
                      <select name="sebutan_desa" class="form-control select-filter" style="width: 90%">
                        <option value="Desa" <?= selected($st['sebutan_desa'], 'Desa'); ?>>Desa</option>
                          <option value="Kelurahan" <?= selected($st['sebutan_desa'], 'Kelurahan'); ?>>Kelurahan</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Pengganti sebutan wilayah desa</span>
                </div>

                <div class="form-group">
                    <label>Sebutan Dusun :</label>
                      <br>
                      <select name="sebutan_dusun" class="form-control select-filter" style="width: 90%">
                        <option value="Jaga" <?= selected($st['sebutan_dusun'], 'Jaga'); ?>>Jaga</option>
                        <option value="Lingkungan" <?= selected($st['sebutan_dusun'], 'Lingkungan'); ?>>Lingkungan</option>
                        <option value="Dusun" <?= selected($st['sebutan_dusun'], 'Dusun'); ?>>Dusun</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Pengganti sebutan wilayah dusun</span>
                </div>

                <div class="form-group">
                    <label>Warna Tema Admin :</label>
                     <br>
                      <select name="tema_modul" class="form-control select-filter" style="width: 90%">
                        <option selected value="<?= $st['tema_modul']; ?>"><?= $st['tema_modul']; ?></option>
                        <option value="skin-blue">Biru</option>
                        <option value="skin-red">Merah</option>
                        <option value="skin-purple">Ungu</option>
                        <option value="skin-yellow">Kuning</option>
                        <option value="skin-green">Hijau</option>
                        <option value="skin-blue-light">Biru Terang</option>
                        <option value="skin-red-light">Merah Terang</option>
                        <option value="skin-purple-light">Ungu Terang</option>
                        <option value="skin-yellow-light">Kuning Terang</option>
                        <option value="skin-green-light">Hijau Terang</option>
                      </select>
                      <span style="font-size: 10px;" class="help-block">Warna dasar tema komponen Admin</span>
                </div>

                 <div class="form-group">
                    <label>Artikel Per Halaman :</label>
                      <input type="number" name="artikel_page" id="artikel_page" class="form-control input-sm" style="width: 90%;" value="<?= $st['artikel_page']; ?>" required>
                      <span style="font-size: 10px;" class="help-block">Jumlah artikel satu halaman website</span>
                </div>

                 <div class="form-group">
                    <label>Vendor :</label>
                      <input type="text" name="vendor" id="vendor" class="form-control input-sm" style="width: 90%;" value="<?= $st['vendor']; ?>" required>
                      <span style="font-size: 10px;" class="help-block">Developer sistem informasi</span>
                </div>

                <div class='box-footer'>
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" name="btnsimpan" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
              </div>
           </div>
          </div>
        </div>

      </div>
    </form>
  <?php endforeach; ?>
</section>
</div>