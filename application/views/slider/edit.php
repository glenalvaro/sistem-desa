<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Edit Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Slider</a></li>
        <li class="active"><a href="#"> Edit Data </a></li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('slider'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Slider</a>
            </div>
            <form id="mainform" action="<?= base_url('slider/update_data/'); ?><?= $id; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="judul_dokumen" class="col-sm-4">Nama Gambar</label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" name="nama" id="nama" value="<?= $nama; ?>" class="form-control input-sm required" placeholder="Nama Gambar">
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="nama_album" class="col-sm-4">Gambar Sebelumnya</label>
                      <div class="col-sm-6">
                          <img width="200" height="134" class="attachment-img img-responsive" src="<?= site_url('assets/img/slide/').$gambar; ?>" alt="<?= $nama; ?>">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Unggah Gambar</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                      <input type="file" id="file" name="file" class="custom-file-input">
                      <label class="custom-file-label" for="file"></label>
                    </div>
                     <span>Batas maksimal pengunggahan gambar 2 MB.</span>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="judul_dokumen" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-6">
                      <textarea name="deskripsi" class="form-control input-sm" placeholder="Deskripsi" rows="3"><?= $deskripsi; ?></textarea>
                    </div>
                  </div>

                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

