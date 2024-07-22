<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Pembangunan
        <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Pembangunan</a></li>
        <li class="active"><?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

  <section class="content">
  	<form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('pembangunan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembangunan</a>
            </div>
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_kegiatan" class="col-sm-4">Nama Kegiatan</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="status" value="1">
                      <?php foreach ($data_desa as $value) : ?>
                      <input type="hidden" name="latitude" value="<?= $value['latitude']; ?>">
                      <input type="hidden" name="longitude" value="<?= $value['longitude']; ?>">
                      <?php endforeach; ?>
                      <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control input-sm required" value="<?= $nama_kegiatan; ?>" placeholder="Nama Kegiatan Pembangunan">
                       <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="volume" class="col-sm-4">Volume</label>
                    <div class="col-sm-8">
                      <input type="text" name="volume" id="volume" class="form-control input-sm required" value="<?= $volume; ?>" placeholder="Volume Pembangunan">
                       <?= form_error('volume', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="waktu" class="col-sm-4">Waktu</label>
                    <div class="col-sm-6">
                      <input type="text" name="waktu" id="waktu" class="form-control input-sm required" value="<?= $waktu; ?>" placeholder="Lamanya Pembangunan">
                       <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-2">
                       <select name="jenis_waktu" id="jenis_waktu" class="form-control select2">
                          <option value="Hari" <?=($jenis_waktu=='Hari')?'selected="selected"':''?>>Hari</option>
                          <option value="Minggu" <?=($jenis_waktu=='Minggu')?'selected="selected"':''?>>Minggu</option>
                          <option value="Bulan" <?=($jenis_waktu=='Bulan')?'selected="selected"':''?>>Bulan</option>
                       </select>
                       <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sumber_dana" class="col-sm-4">Sumber Dana</label>
                    <div class="col-sm-8">
                       <select name="sumber_dana" id="sumber_dana" class="form-control select2 required">
                       	<?php foreach ($dana_sumber as $value) : ?>
                            <option <?= $value['nama'] === $sumber_dana ? 'selected' : '' ?> value="<?= $value['nama'] ?>"><?= $value['nama'] ?></option>
                        <?php endforeach; ?>
                       </select>
                       <?= form_error('sumber_dana', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="sifat_proyek" class="col-sm-4">Sifat Proyek</label>
                    <div class="col-sm-8">
                       <select name="sifat_proyek" id="sifat_proyek" class="form-control select2 required">
                       	  <option value="">-- Pilih Sifat Proyek --</option>
                          <option value="BARU" <?=($sifat_proyek=='BARU')?'selected="selected"':''?>>BARU</option>
                          <option value="LANJUTAN" <?=($sifat_proyek=='LANJUTAN')?'selected="selected"':''?>>LANJUTAN</option>
                       </select>
                       <?= form_error('sifat_proyek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pelaksana_kegiatan" class="col-sm-4">Pelaksana Kegiatan</label>
                    <div class="col-sm-8">
                      <input type="text" name="pelaksana_kegiatan" id="pelaksana_kegiatan" class="form-control input-sm required" value="<?= $pelaksana_kegiatan; ?>" placeholder="Pelaksana Kegiatan Pembangunan">
                       <?= form_error('pelaksana_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="lokasi_pembangunan" class="col-sm-4">Lokasi Pembangunan</label>
                    <div class="col-sm-8">
                       <select name="lokasi_pembangunan" id="lokasi_pembangunan" class="form-control select2 required">
                       	  <option value="">-- Lokasi Pembangunan --</option>
                        <?php foreach ($wilayah as $value) : ?>
                            <option <?= $value['nama_dusun'] === $lokasi_pembangunan ? 'selected' : '' ?> value="<?= $value['nama_dusun'] ?>"><?= $value['nama_dusun'] ?></option>
                        <?php endforeach; ?>
                       </select>
                       <?= form_error('lokasi_pembangunan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="col-md-6">
                  	<div class="form-group">
                    <label for="tahun_anggaran">Tahun Anggaran</label>
                       <select name="tahun_anggaran" id="tahun_anggaran" class="form-control select-filter required" style="width: 90%;">
                       	 <?php foreach (tahun(1999) as $value) : ?>
							               <option value="<?= $value ?>" <?= selected($value, $tahun_anggaran) ?>><?= $value ?></option>
						              <?php endforeach; ?>
                       </select>
                       <?= form_error('tahun_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="biaya_provinsi">Sumber Biaya Provinsi</label>
                      <input type="text" name="biaya_provinsi" id="biaya_provinsi" class="form-control input-sm required" value="<?= $biaya_provinsi; ?>" placeholder="Sumber Biaya Provinsi" style="width: 90%;" onkeyup="hitung();">
                       <?= form_error('biaya_provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                  	</div>

                  	<div class="form-group">
                      <label for="biaya_swadaya">Sumber Biaya Swadaya</label>
                       <input type="text" name="biaya_swadaya" id="biaya_swadaya" class="form-control input-sm required" value="<?= $biaya_swadaya; ?>" placeholder="Sumber Biaya Swadaya" style="width: 90%;" onkeyup="hitung();">
                       <?= form_error('biaya_swadaya', '<small class="text-danger pl-3">', '</small>'); ?>
                  	</div>
                  </div>

                  <div class="col-md-6">
                  	<div class="form-group">
                      <label for="biaya_pemerintah">Sumber Biaya Pemerintah</label>
                       <input type="text" name="biaya_pemerintah" id="biaya_pemerintah" class="form-control input-sm required" value="<?= $biaya_pemerintah; ?>" placeholder="Sumber Biaya Pemerintah" style="width: 90%;" onkeyup="hitung();">
                       <?= form_error('biaya_pemerintah', '<small class="text-danger pl-3">', '</small>'); ?>
                  	</div>

                  	<div class="form-group">
                      <label for="biaya_kab">Sumber Biaya Kab/Kota</label>
                       <input type="text" name="biaya_kab" id="biaya_kab" class="form-control input-sm required" value="<?= $biaya_kab; ?>" placeholder="Sumber Biaya Kab/Kota" style="width: 90%;" onkeyup="hitung();">
                       <?= form_error('biaya_kab', '<small class="text-danger pl-3">', '</small>'); ?>
                  	</div>

                  	<div class="form-group">
                      <label for="total_anggaran">Total Anggaran</label>
                       <input type="text" name="total_anggaran" id="total_anggaran" class="form-control input-sm required" value="<?= $total_anggaran; ?>" style="width: 90%;" readonly>
                       <?= form_error('total_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
                  	</div>
                  </div>

                  <div class="form-group">
                    <label for="manfaat" class="col-sm-4">Manfaat</label>
                    <div class="col-sm-8">
                      <textarea name="manfaat" class="form-control input-sm required" placeholder="Manfaat" rows="3"><?= $manfaat; ?></textarea>
                        <?= form_error('manfaat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="keterangan" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-8">
                      <textarea name="keterangan" class="form-control input-sm required" placeholder="Keterangan" rows="3"><?= $keterangan; ?></textarea>
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                 <button type="reset" class="btn btn-social btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-success btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
          </div>
        </div>


        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
             	<p>Gambar Utama</p>
            </div>
            <div class="box-body">
              <center>
                <?php if($id) : ?>
                   <img style="width: 180px;" class="img-preview" src="<?= base_url('assets/img/pembangunan/') . $gambar_proyek; ?>">
                <?php else : ?>
                  <img style="width: 180px;" class="img-preview" src="<?= base_url()?>assets/img/pembangunan/404-image-not-found.jpg">
                <?php endif; ?>
              </center> 
              <br>
              <center>
              <div class="col-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()" value="<?= $gambar_proyek; ?>">
                    <label class="custom-file-label" for="image"></label>
                </div>
              </div>
              </center>    
            </div> 
           </div>
         </div>
      </div>
     </form>
    </section>
</div>

<script>
//hitung biaya di program pembangunan
function hitung()
{
  var biaya1 = document.getElementById('biaya_provinsi').value;
  var biaya2 = document.getElementById('biaya_pemerintah').value;
  var biaya3 = document.getElementById('biaya_kab').value;
  var biaya4 = document.getElementById('biaya_swadaya').value;
  var result = parseInt(biaya1) + parseInt(biaya2) + parseInt(biaya3) + parseInt(biaya4);
  if(!isNaN(result)){
    document.getElementById('total_anggaran').value = result;
  }

}
</script>

