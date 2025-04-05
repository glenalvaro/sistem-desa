<?php foreach($kepdes as $main) : ?>
 <div class="form-group" hidden>
   <label for="kepdes" class="col-sm-3">Kepala Desa / NIP</label>
      <div class="col-sm-4">
         <input type="text" name="pamong" id="pamong" value="<?= $main->nama_pegawai; ?>, <?= $main->gelar; ?>" class="form-control input-sm" readonly>
      </div>
      <div class="col-sm-2">
         <input type="text" name="nip_pamong" id="nip_pamong" value="<?= $main->nip; ?>" class="form-control input-sm" readonly>
      </div>
      <div class="col-sm-2">
         <input type="text" name="jabatan_pamong" id="jabatan_pamong" value="<?= $main->jabatan; ?>" class="form-control input-sm" readonly>
      </div>
</div>
<?php endforeach; ?>