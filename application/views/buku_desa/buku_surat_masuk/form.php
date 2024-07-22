<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Surat Masuk
      <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li><a href="#"> Surat Masuk</a></li>
        <li class="active"><?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('buku_surat_masuk'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Surat Masuk</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <label for="nama_surat" class="col-sm-4">Nama Surat</label>
                    <div class="col-sm-6">
                      <input type="text" name="nama_surat" id="nama_surat" value="<?= $nama_surat; ?>" class="form-control input-sm required" placeholder="Nama Surat">
                       <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-4" for="tgl_terima">Tanggal Penerimaan</label>
        						<div class="col-sm-3">
        							<div class="input-group input-group-sm date">
        								<div class="input-group-addon">
        									<i class="fa fa-calendar"></i>
        								</div>
        								<input class="form-control input-sm pull-right required" id="tgl_1" name="tgl_terima" type="text" value="<?= $tgl_terima; ?>">
        							</div>
        						</div>
                       <?= form_error('tgl_terima', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Berkas Scan Surat Masuk</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                    	<input type="file" id="file" name="file" value="" class="custom-file-input">
                    	<label class="custom-file-label" for="file"></label>
                	  </div>
                       <span class="help-block" style="margin-top:10px;">(Kosongkan jika tidak ingin mengubah berkas, Type pdf, jpg)</span>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label for="no_surat" class="col-sm-4">Nomor Surat</label>
                    <div class="col-sm-6">
                      <input type="text" name="no_surat" id="no_surat" value="<?= $no_surat; ?>" class="form-control input-sm required" placeholder="Nomor Surat">
                       <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-4" for="tgl_surat">Tanggal Surat</label>
        						<div class="col-sm-3">
        							<div class="input-group input-group-sm date">
        								<div class="input-group-addon">
        									<i class="fa fa-calendar"></i>
        								</div>
        								<input class="form-control input-sm pull-right required" id="tgl_surat" name="tgl_surat" type="text" value="<?= $tgl_surat; ?>">
        							</div>
        						</div>
                       <?= form_error('tgl_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                   <div class="form-group">
                    <label for="pengirim_surat" class="col-sm-4">Pengirim</label>
                    <div class="col-sm-6">
                   	<input type="text" name="pengirim_surat" id="pengirim_surat" value="<?= $pengirim_surat; ?>" class="form-control input-sm required" placeholder="Pengirim">
                       <?= form_error('pengirim_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="perihal" class="col-sm-4">Isi Singkat/Perihal</label>
                    <div class="col-sm-6">
                      <textarea name="perihal" class="form-control input-sm required" placeholder="Isi Singkat/Perihal" rows="8"><?= $perihal; ?></textarea>
                        <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="disposisi_ke" class="col-sm-4">Disposisi Kepada</label>
                    <div class="col-sm-6">
                    	 <div id="op_item" class="input-group checkbox-group">
                    	 	<?php foreach ($list_jab as $prd) : ?>
                    	 		<div class="col-sm-12 col-lg-6 checkbox">
                                	<label style="padding: 5px;">
                                    <input type="checkbox" name="disposisi_ke" class="akas required" value="<?= $prd['id']; ?>" <?=($disposisi_ke==$prd['id'])?'checked="checked"':''?>><?= $prd['nama']; ?>
                                	</label>
                            	</div>
                             <?php endforeach;  ?>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="isi_disposisi" class="col-sm-4">Isi Disposisi</label>
                    <div class="col-sm-6">
                      <textarea name="isi_disposisi" class="form-control input-sm required" placeholder="Isi Disposisi" rows="8"><?= $isi_disposisi; ?></textarea>
                        <?= form_error('isi_disposisi', '<small class="text-danger pl-3">', '</small>'); ?>
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

