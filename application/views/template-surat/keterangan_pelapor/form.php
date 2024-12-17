<div class="form-group">
   <label for="cari_pelapor" class="col-sm-3">Cari NIK / Nama Pelapor</label>
      <div class="col-sm-4">
         <select name="cari_pelapor" id="cari_pelapor" class="form-control select-input required" style="width: 100%;">
            <option value="">-- Cari NIK/Nama Pelapor --</option>               
               <?php foreach($list_warga as $main) : ?>
                  <option value="<?= $main->id; ?>">NIK : <?= $main->nik; ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
               <?php endforeach; ?>
         </select>
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">NIK / Nama Pelapor</label>
      <div class="col-sm-4">
           <input type="text" name="nik_pelapor" id="nik_pelapor" class="form-control input-sm" readonly>   
      </div>
      <div class="col-sm-4">
           <input type="text" name="nama_pelapor" id="nama_pelapor" class="form-control input-sm" readonly>  
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">Nomor KK Pelapor</label>
      <div class="col-sm-8">
         <input type="text" name="kk_pelapor" id="kk_pelapor" class="form-control input-sm" readonly>
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">Tempat / Tanggal Lahir / Jenis Kelamin</label>
      <div class="col-sm-4">
         <input type="text" name="tmp_lahir_pelapor" id="tmp_lahir_pelapor" class="form-control input-sm" readonly>
      </div>
      <div class="col-sm-2">
         <input type="text" name="tgl_lahir_pelapor" id="tgl_lahir_pelapor" class="form-control input-sm" readonly>
      </div>
      <div class="col-sm-2">
         <input type="text" name="jk_pelapor" id="jk_pelapor" class="form-control input-sm" readonly>
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">Alamat Pelapor</label>
      <div class="col-sm-4">
         <input type="text" name="alamat_pelapor" id="alamat_pelapor" class="form-control input-sm" readonly>
      </div>
      <div class="col-sm-3">
         <input type="text" name="wilayah_pelapor" id="wilayah_pelapor" class="form-control input-sm" readonly>
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">Pendidikan / Warga Negara / Agama</label>
      <div class="col-sm-4">
         <input type="text" name="pendidikan_pelapor" id="pendidikan_pelapor" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="warga_pelapor" id="warga_pelapor" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="agama_pelapor" id="agama_pelapor" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form_pelapor" hidden>
   <label for="nomor_surat" class="col-sm-3">Pekerjaan / Status Perkawinan</label>
      <div class="col-sm-4">
         <input type="text" name="pekerjaan_pelapor" id="pekerjaan_pelapor" class="form-control input-sm" readonly>
      </div>
       <div class="col-sm-4">
         <input type="text" name="kawin_pelapor" id="kawin_pelapor" class="form-control input-sm" disabled>
      </div>
</div>

 <?php $this->load->view('template-surat/keterangan_pelapor/ajax_nik_pelapor'); ?>