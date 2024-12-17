<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Media Sosial
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Beranda</a></li>
        <li class="active">Media Sosial <?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('media_sosial'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Media Sosial</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                    <label for="nama" class="col-sm-4">Nama</label>
                    <div class="col-md-12">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" name="nama" id="nama" value="<?= $nama; ?>" class="form-control input-sm required" placeholder="Nama Media">
                       <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="link" class="col-sm-4">Link</label>
                    <div class="col-md-12">
                       <input type="url" name="link" id="link" value="<?= $link; ?>" class="form-control input-sm required" placeholder="Contoh: https://www.link.com/">
                        <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="file" class="col-sm-4">Icon</label>
                    <div class="col-md-12">
                       <div class="custom-file">
                          <input type="file" id="file" name="file" value="<?= $icon; ?>" class="custom-file-input">
                          <label class="custom-file-label" for="file"></label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tampil" class="col-sm-4">Tampil</label>
                    <div class="col-md-12">
                      <select name="tampil" id="tampil" class="select-filter form-control" style="width: 30%;">
                        <option value="0" <?=($tampil=='0')?'selected="selected"':''?>>Tidak</option>
                        <option value="1" <?=($tampil=='1')?'selected="selected"':''?>>Ya</option>
                      </select>
                    </div>
                  </div>
              </div>
              <br>
              <div class="box-footer">
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

