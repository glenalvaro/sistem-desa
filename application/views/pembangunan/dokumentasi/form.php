<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Pembangunan <small><?= ($id ? 'Tambah' : 'Ubah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Pembangunan</a></li>
        <li class="active"><?= ($id ? 'Tambah' : 'Ubah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url("pembangunan/dokumentasi_pembangunan/{$id}"); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Dokumentasi Pembangunan</a>
            </div>
            <form id="mainform" action="<?= site_url("pembangunan/tambah_dokumentasi/{$id}"); ?>" method="post" class="form-horizontal form-dokumentasi" autocomplete="off" enctype="multipart/form-data" >
              <div class="box-body">
                    <input type="hidden" name="id_pembangunan" value="<?= $id; ?>">
                    <input type="hidden" name="tgl_rekam" value="<?= date('Y-m-d'); ?>">
            <div class="form-group">
               <label for="presentase" class="col-sm-4">Persentase Pembangunan</label>
                  <div class="col-sm-6">
                      <div class="pilih_persentase1"> 
                      <select name="presentase" id="presentase" class="select-filter form-control required" style="width: 100%;">
                        <option value="">-- Pilih Presentase Pembangunan --</option>               
                        <option value="0%">0%</option>
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                        <option value="70%">70%</option>
                        <option value="80%">80%</option>
                        <option value="90%">90%</option>
                        <option value="100%">100%</option>                         
                      </select>
                     </div>
                    </div>
                </div>

                  <div class="form-group">
                    <label for="presentase" class="col-sm-4">Unggah Dokumentasi</label>
                    <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" id="image" name="image" value="" class="custom-file-input">
                      <label class="custom-file-label" for="file"></label>
                    </div>
                      <span class="help-block"><code>(Kosongkan jika tidak ingin mengubah gambar)</code></span>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="ket" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-6">
                      <textarea name="ket" class="form-control input-sm required" placeholder="Keterangan"></textarea>
                       <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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

