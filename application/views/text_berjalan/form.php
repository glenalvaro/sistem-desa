<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Teks Berjalan
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Beranda</a></li>
        <li class="active">Teks Berjalan <?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('text_berjalan'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Teks Berjalan</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_surat" class="col-sm-4">Isi teks berjalan</label>
                    <div class="col-md-12">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <textarea name="isi" class="form-control input-sm required" placeholder="Isi teks berjalan" rows="8"><?= $isi; ?></textarea>
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4">Tipe</label>
                    <div class="col-md-12">
                     <select id="pilih_tipe" class="select-filter form-control" style="width: 100%;">          
                        <option value="internal">Internal</option>
                        <option value="external">Eksternal</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group external_tipe" hidden>
                    <label for="tautan_artikel" class="col-sm-4">Tautan ke artikel</label>
                    <div class="col-md-12">
                      <input type="text" name="tautan_artikel" id="tautan_artikel" value="<?= $tautan_artikel; ?>" class="form-control input-sm url short_url" placeholder="Contoh: https://www.desadigital.id">
                    </div>
                  </div>

                  <div class="form-group external_tipe" hidden>
                    <label for="judul_tautan" class="col-sm-4">Judul tautan</label>
                    <div class="col-md-12">
                      <input type="text" name="judul_tautan" id="judul_tautan" value="<?= $judul_tautan; ?>" class="form-control input-sm" placeholder="Judul tautan ke artikel atau url">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="status" class="col-sm-4">Status</label>
                    <div class="col-md-12">
                      <select name="status" id="status" class="select-filter form-control" style="width: 30%;">
                        <option value="0" <?=($status=='0')?'selected="selected"':''?>>Tidak</option>
                        <option value="1" <?=($status=='1')?'selected="selected"':''?>>Ya</option>
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

