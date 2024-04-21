<div class="content-wrapper">

  <?php foreach($setting as $k) : ?>
    <section class="content-header">
     <h1 class="tx-judul">
       Form Data <?= $k['sebutan_dusun'] ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Wilayah Administratif</a></li>
        <li class="active">Tambah <?= $k['sebutan_dusun'] ?></li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('wilayah_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar <?= $k['sebutan_dusun'] ?></a>
            </div>
            <form id="validasi" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off">
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_dusun" class="col-sm-4">Nama <?= $k['sebutan_dusun'] ?></label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" name="nama_dusun" id="nama_dusun" class="form-control input-sm required" value="<?php echo $nama_dusun; ?>" placeholder="Nama <?= $k['sebutan_dusun'] ?>">
                       <?= form_error('nama_dusun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="kepala_dusun" class="col-sm-4">NIK / Nama Kepala <?= $k['sebutan_dusun'] ?></label>
                    <div class="col-sm-6">
                       <select name="kepala_dusun" id="kepala_dusun" class="form-control select-filter required" style="width:100%;">
                       		<option value="">-- Silakan Masukkan NIK/Nama --</option>
                       		 <?php foreach($list_penduduk as $row) : ?>
                            <option value="<?= $row['nama_penduduk'] ?>" <?=($kepala_dusun==$row['nama_penduduk'])?'selected="selected"':''?>><?= $row['nik']; ?> - <?= $row['nama_penduduk']; ?></option>
                            <?php endforeach; ?>
                       </select>
                    </div>
                  </div>
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-success btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
</div>




