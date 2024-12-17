<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Album
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li class="active">Galeri <?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('galeri'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Album</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                      <label for="nama_album" class="col-sm-4">Nama Album</label>
                      <div class="col-sm-6">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="aktif" value="<?= $aktif; ?>">
                        <input type="hidden" name="tgl_buat" value="<?= $tgl_buat; ?>">
                        <input type="text" name="nama_album" id="nama_album" value="<?= $nama_album; ?>" class="form-control input-sm required">
                         <?= form_error('nama_album', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                  </div>

                  <?php if($id) : ?>
                     <div class="form-group">
                        <label for="nama_album" class="col-sm-4"></label>
                        <div class="col-sm-6">
                            <img width="200" height="134" class="attachment-img img-responsive" src="<?= site_url('assets/img/galeri/').$gambar; ?>" alt="Gambar Album">
                        </div>
                      </div>
                  <?php endif ?>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Unggah Gambar</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                      <input type="file" id="file" name="file" value="<?= $gambar; ?>" class="custom-file-input">
                      <label class="custom-file-label" for="file"></label>
                    </div>
                     <span>Batas maksimal pengunggahan berkas 2 MB.</span>
                    </div>
                  </div>

              </div>
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

