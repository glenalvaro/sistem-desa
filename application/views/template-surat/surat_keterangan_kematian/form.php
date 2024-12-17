<div class="form-group">
   <label for="hari_kematian" class="col-sm-3">Hari Kematian / Tanggal Kematian / Jam Kematian</label>
      <div class="col-sm-4">
         <input type="text" name="hari_kematian" id="hari_kematian" class="form-control input-sm required">
      </div>
      <div class="col-sm-2">
         <input type="date" name="tgl_kematian" id="waktu_mati" class="form-control input-sm required">
      </div>
      <div class="col-sm-2">
         <input type="time" name="jam_kematian" id="waktu_mati" class="form-control input-sm required">
      </div>
</div>

<div class="form-group">
   <label for="tempat_kematian" class="col-sm-3">Tempat Kematian</label>
      <div class="col-sm-8">
         <input type="text" name="tempat_kematian" id="tempat_kematian" class="form-control input-sm required">
      </div>
</div>

<div class="form-group">
   <label for="penyebab_kematian" class="col-sm-3">Penyebab Kematian</label>
      <div class="col-sm-8">
         <input type="text" name="penyebab_kematian" id="penyebab_kematian" class="form-control input-sm required">
      </div>
</div>

<?php $this->load->view('template-surat/keterangan_pelapor/form'); ?>

<div class="form-group">
   <label for="hubungan_yg_mati" class="col-sm-3">Hubungan dengan yang mati</label>
      <div class="col-sm-8">
         <input type="text" name="hubungan_yg_mati" id="hubungan_yg_mati" class="form-control input-sm required">
      </div>
</div>


