<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Gambar Album
       <small>Ubah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Galeri</a></li>
        <li class="active">Album</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url("galeri/album_list/{$id_album}"); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Album</a>
            </div>
            <form id="mainform" action="<?= site_url("galeri/update_gambar/{$id_album}"); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <?php foreach($edit_gbr as $main) : ?>
                 <div class="form-group">
                      <label for="nama_gambar" class="col-sm-4">Nama Gambar</label>
                      <div class="col-sm-6">
                         <input type="hidden" name="id" value="<?= $main->id; ?>">
                         <input type="hidden" name="id_album" value="<?= $id_album; ?>">
                         <input type="hidden" name="aktif" value="<?= $main->aktif; ?>">
                         <input type="hidden" name="tgl_dibuat" value="<?= $main->tgl_dibuat; ?>">
                         <input type="text" name="nama_gambar" id="nama_gambar" value="<?= $main->nama_gambar; ?>" class="form-control input-sm required">
                         <?= form_error('nama_gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="nama_album" class="col-sm-4"></label>
                      <div class="col-sm-6">
                            <img width="200" height="134" class="attachment-img img-responsive" src="<?= site_url('assets/img/galeri/album/').$main->gambar; ?>" alt="Gambar Album">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Unggah Gambar</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                      <input type="file" id="file" name="file" value="<?= $main->gambar; ?>" class="custom-file-input">
                      <label class="custom-file-label" for="file"></label>
                    </div>
                     <span>Batas maksimal pengunggahan berkas 2 MB.</span>
                    </div>
                  </div>
                <?php endforeach; ?>
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

