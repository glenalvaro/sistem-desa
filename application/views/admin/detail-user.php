<style>
.form-horizontal {
    text-align: left;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    padding: 5px
    font-weight: bold;
    font-size: 11px;
}
</style>
<div class="content-wrapper">
<section class="content-header">
  <h1 class="tx-judul">
     Data Pengguna
  </h1>
  <ol class="breadcrumb">
      <li><a href="#">Pengaturan</a></li>
      <li><a href="#">Kelola Data Pengguna</a></li>
      <li class="active">Detail</li>
  </ol>
</section>

<?php foreach($detailUser as $ds) : ?>
<section class="content form-horizontal">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-danger">
            <div class="box-header with-border">
                <h4 style="font-size: 14px;" class="box-title">Foto Pengguna</h4>
            </div>
            <div class="box-body">
              <center>
              <a style="width: 150px; height: 145px;" href="<?= site_url('assets/img/profile/') . $ds->image; ?>" class="progressive replace foto_penduduk img-thumbnail">
              <img class="preview" loading="lazy" src="<?= site_url('assets/img/load-foto.gif') ?>" alt="Foto"/></a>
              </center>
              <br>     
            </div>  
          </div>
        </div>
        
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Pengguna</a>
            </div>
            <div class="box-body" style="margin-left: 10px; margin-right: 10px;">
                  <div class="form-group">
                    <label class="col-sm-3">Email</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= $ds->email ?>" readonly>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label class="col-sm-3">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= $ds->name ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Telepon</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= $ds->no_hp ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= $ds->alamat ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Tgl Terdaftar</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= date('d F Y', $ds->date_created); ?>" disabled>
                    </div>
                  </div> 
            </div>
            <br>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
</form>
</section>
</div>
