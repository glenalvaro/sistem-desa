 <div class="form-group">
      <label for="nomor_surat" class="col-sm-3">Nomor Surat</label>
         <div class="col-sm-4">
            <input type="text" name="nomor_surat" id="nomor_surat" value="<?= $nomor_urut; ?>" class="form-control input-sm required" placeholder="Nomor Surat" readonly>
            <br>
            <span style="font-size: 11px;">Terakhir Untuk Jenis Surat <?= $jenis_surat; ?> Nomor Urut : <?= $nomor_urut_akhir; ?> (tgl: <?= $tgl_surat_akhir; ?>)</span>
         </div>
            <span class="col-sm-5" style="font-size: 10px; font-style: italic;">Format nomor surat: .../[Kode_wilayah]/[singakatan_surat]/[bulan_romawi]/[tahun]</span>
</div>