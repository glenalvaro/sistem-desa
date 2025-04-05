<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Artikel
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Artikel</a></li>
        <li class="active"><?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('artikel'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Artikel</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="judul_dokumen">Judul Artikel</label>
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="hidden" name="user" value="<?= $user['name']; ?>">
                      <input type="text" name="judul" id="judul" value="<?= set_ucwords($judul); ?>" class="form-control input-sm required" placeholder="Judul Artikel">
                       <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="file">Gambar Artikel</label>
                     <div class="custom-file">
                    	<input type="file" id="file" name="file" value="<?= $gambar; ?>" class="custom-file-input">
                    	<label class="custom-file-label" for="file"></label>
                	  </div>
                    <?php if($id) : ?>
                      <small class="text-red">* Kosongkan jika tidak mengubah gambar</small>
                      <p>Gambar Sebelumnya :</p>
                      <img style="width: 150px;" class="img-preview" src="<?= base_url('assets/img/foto_artikel/') . $gambar; ?>">
                    <?php endif; ?>
                  </div>

                   <div class="form-group">
                    <label for="file">Isi Artikel</label>
                  		 <textarea class="form-control input-sm required" name="isi" id="editor-text" placeholder="Isi"><?= $isi; ?></textarea>
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

