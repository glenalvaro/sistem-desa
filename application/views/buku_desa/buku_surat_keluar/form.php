<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Surat Keluar
       <small>Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li><a href="#"> Surat Keluar</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('buku_surat_keluar'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Surat Keluar</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_surat" class="col-sm-4">Nama Surat</label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" name="nama_surat" id="nama_surat" value="<?= $nama_surat; ?>" class="form-control input-sm required" placeholder="Nama Surat">
                       <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="file" class="col-sm-4">Berkas Scan Surat Keluar</label>
                    <div class="col-sm-6">
                     <div class="custom-file">
                    	<input type="file" id="file" name="file" value="" class="custom-file-input">
                    	<label class="custom-file-label" for="file"></label>
                	  </div>
                       <p class="text-danger" style="margin-top:10px;">(Kosongkan jika tidak ingin mengubah berkas, Type pdf, jpg)</p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_surat_kel" class="col-sm-4">Nomor Surat</label>
                    <div class="col-sm-6">
                      <input type="text" name="no_surat_kel" id="no_surat_kel" value="<?= $no_surat_kel; ?>" class="form-control input-sm required" placeholder="Nomor Surat">
                       <?= form_error('no_surat_kel', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <label for="tujuan" class="col-sm-4">Tujuan</label>
                    <div class="col-sm-6">
                   	<input type="text" name="tujuan" id="tujuan" value="<?= $tujuan; ?>" class="form-control input-sm required" placeholder="Tujuan">
                       <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="isi_singkat" class="col-sm-4">Isi Singkat/Perihal</label>
                    <div class="col-sm-6">
                      <textarea name="isi_singkat" class="form-control input-sm required" placeholder="Isi Singkat/Perihal" rows="8"><?= $isi_singkat; ?></textarea>
                        <?= form_error('isi_singkat', '<small class="text-danger pl-3">', '</small>'); ?>
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

