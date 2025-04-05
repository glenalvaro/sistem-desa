<div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Jenis Surat</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="hidden" value="<?= $id_pemohon; ?>">
                      <input type="hidden" value="<?= $id_surat; ?>">
                      <input type="text" value="<?= $jenis_surat; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Nomor Whatsapp</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?= $no_hp_aktif; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">NIK / Nama Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="nik_pen" value="<?= $nik; ?>" class="form-control input-sm" readonly>   
                    </div>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $nama_penduduk; ?>" class="form-control input-sm" readonly>  
                    </div>
              </div>

              <div class="form-group">
                 <label for="nomor_surat" class="col-sm-3">Nomor KK</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?= $no_kk; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                <label for="nomor_surat" class="col-sm-3">Tempat / Tanggal Lahir / Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $tempat_lahir; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" value="<?= $tgl_lahir; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" value="<?= $sex; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

            <div class="form-group">
                <label for="nomor_surat" class="col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                      <input type="text" value="<?= $alamat_sekarang; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" value="<?= $dusun; ?>" class="form-control input-sm" readonly>
                    </div>
            </div>

            <div class="form-group">
                <label for="nomor_surat" class="col-sm-3">Pendidikan / Warga Negara / Agama</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pendidikan_kk; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" value="<?= $status_warganegara; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" value="<?= $agama; ?>" class="form-control input-sm" readonly>
                    </div>
            </div>

            <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Keperluan Surat</label>
                    <div class="col-sm-8">
                      <textarea type="text" value="<?= $keperluan; ?>" class="form-control input-sm" rows="4" readonly><?= $keperluan; ?></textarea>
                    </div>
            </div>