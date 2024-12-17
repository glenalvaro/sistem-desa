 <div class="form-group">
   <label for="cari_nik" class="col-sm-3">Cari NIK / Nama</label>
      <div class="col-sm-4">
         <select name="cari_nik" id="cari_nik" class="form-control select-input required" style="width: 100%;">
            <option value="">-- Cari NIK/Nama --</option>               
               <?php foreach($list_warga as $main) : ?>
                  <option value="<?= $main->id; ?>">NIK : <?= $main->nik; ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
               <?php endforeach; ?>
         </select>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">NIK / Nama Pemohon</label>
      <div class="col-sm-4">
           <input type="text" name="pend_nik" id="pend_nik" class="form-control input-sm" readonly>   
      </div>
      <div class="col-sm-4">
           <input type="text" name="pend_nama" id="pend_nama" class="form-control input-sm" disabled>  
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Nomor KK</label>
      <div class="col-sm-8">
         <input type="text" name="pend_kk" id="pend_kk" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Tempat / Tanggal Lahir / Jenis Kelamin</label>
      <div class="col-sm-4">
         <input type="text" name="tempat_lahir_pend" id="tempat_lahir_pend" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="tgl_lahir_pend" id="tgl_lahir_pend" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="jk_pend" id="jk_pend" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Alamat</label>
      <div class="col-sm-4">
         <input type="text" name="alamat_pend" id="alamat_pend" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-3">
         <input type="text" name="wilayah_pend" id="wilayah_pend" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Pendidikan / Warga Negara / Agama</label>
      <div class="col-sm-4">
         <input type="text" name="pendidikan_pend" id="pendidikan_pend" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="warga_pend" id="warga_pend" class="form-control input-sm" disabled>
      </div>
      <div class="col-sm-2">
         <input type="text" name="agama_pend" id="agama_pend" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Pekerjaan / Status Perkawinan</label>
      <div class="col-sm-4">
         <input type="text" name="pekerjaan_pend" id="pekerjaan_pend" class="form-control input-sm" disabled>
      </div>
       <div class="col-sm-4">
         <input type="text" name="kawin_status" id="kawin_status" class="form-control input-sm" disabled>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Dokumen Persyaratan</label>
      <div class="col-sm-5">
         <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Daftar Dokumen</a>
         <a href="" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-cogs"></i> Manajemen Dokumen</a>
      </div>
</div>

<div class="form-group show_form" hidden>
   <label for="nomor_surat" class="col-sm-3">Data Keluarga / KK</label>
      <div class="col-sm-8">
         <button type="button" id="daftar_keluarga" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-search"></i> Tampilkan</button>
      </div>
</div>

<div class="form-group show_kk_list" hidden>
   <label class="col-sm-3"></label>
   <div class="col-sm-8">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
        <thead class="bg-gray color-palette">
        <tr>
            <th style="min-width:10px;">No</th>
            <th style="min-width:120px;">NIK</th>
            <th style="min-width:130px;">Nama</th>
            <th style="min-width:120px;">Jenis Kelamin</th>
            <th style="min-width:150px;">Tempat Tanggal Lahir</th>
            <th style="min-width:120px;">Hubungan</th>
            <th style="min-width:120px;">Status Kawin</th>
        </tr>
        </thead>
        <tbody id="record_kk" style="font-size: 10px;">        
        </tbody>
        </table>
        </div>
   </div>
</div>
