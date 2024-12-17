<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Pengaturan Informasi Publik
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi</a></li>
        <li><a href="#"> Daftar Informasi</a></li>
        <li class="active"><?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('informasi_publik'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Informasi Publik</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="judul_dokumen" class="col-sm-4">Judul Dokumen</label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="hidden" name="aktif" value="<?= $aktif; ?>">
                      <input type="hidden" name="tgl_muat" value="<?= $tgl_muat; ?>">
                      <input type="text" name="judul_dokumen" id="judul_dokumen" value="<?= $judul_dokumen; ?>" class="form-control input-sm required" placeholder="Judul Dokumen">
                       <?= form_error('judul_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kategori" class="col-sm-4">Kategori</label>
                    <div class="col-sm-6">
                      <select id="kategori" name="kategori" class="select-filter form-control required" style="width:100%;"> 
                            <option value="">Pilih Kategori Informasi Publik</option>
                            <option value="Informasi Berkala" <?=($kategori=='Informasi Berkala')?'selected="selected"':''?>>Informasi Berkala</option>
                            <option value="Informasi Setiap Saat" <?=($kategori=='Informasi Setiap Saat')?'selected="selected"':''?>>Informasi Setiap Saat</option>
                            <option value="Informasi Serta Merta" <?=($kategori=='Informasi Serta Merta')?'selected="selected"':''?>>Informasi Serta Merta</option>
                      </select>
                       <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Unggah Dokumen</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                    	<input type="file" id="file" name="file" value="<?= $dokumen; ?>" class="custom-file-input">
                    	<label class="custom-file-label" for="file"></label>
                	  </div>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-4" for="tahun">Tahun</label>
        						<div class="col-sm-5">
        							<div class="input-group input-group-sm date">
        								<div class="input-group-addon">
        									<i class="fa fa-calendar"></i>
        								</div>
        								<input class="form-control input-sm pull-right required" name="tahun" type="text" value="<?= $tahun; ?>" placeholder="Contoh:2024">
        							</div>
        						</div>
                       <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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

