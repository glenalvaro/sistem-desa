<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Edit Anggota Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Kelompok</a></li>
        <li class="active">Edit Anggota Kelompok</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url("data_kelompok/anggota_kelompok/{$id_kelompok}"); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Anggota Kelompok</a>
            </div>
            <form id="mainform" action="<?= site_url("data_kelompok/update_anggota/{$id_kelompok}"); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data" >
              <div class="box-body">
              <?php foreach($edit_anggota as $val) : ?>
              <div class="form-group">
              <input type="hidden" name="id" value="<?= $val->id; ?>">
              <input type="hidden" name="id_kelompok" value="<?= $id_kelompok; ?>">
                <label for="id_anggota" class="col-sm-4">Nama Anggota</label>
                    <div class="col-sm-6">
                    <select name="id_anggota" id="kelompok_penduduk" class="select-filter form-control required" style="width: 100%;">
                        <option value="">-- Silakan Masukkan NIK/Nama --</option>               
                      <?php foreach($anggota_lis as $data) : ?>
                           <option value="<?= $data->id; ?>" <?=($val->id_anggota==$data->id)?'selected="selected"':''?>>NIK : <?= $data->nik; ?> - <?= strtoupper($data->nama_penduduk); ?> - <?= strtoupper($data->dusun); ?></option>
                        <?php endforeach; ?>
                      </select>
                       <?= form_error('id_anggota', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_anggota" class="col-sm-4">Nomor Anggota</label>
                    <div class="col-sm-6">
                      <input type="text" name="no_anggota" id="no_anggota" class="form-control input-sm required" placeholder="Nomor Anggota" value="<?= $val->no_anggota; ?>" maxlength="16">
                      <p class="text-danger" style="margin-top:10px;">*Pastikan nomor anggota belum pernah dipakai.</p>
                       <?= form_error('no_anggota', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="jabatan" class="col-sm-4">Jabatan</label>
                    <div class="col-sm-6">
                    <select class="select-filter form-control required" name="jabatan" id="jabatan" style="width: 100%;">               
                        <option option value="">-- Silakan Pilih Jabatan --</option>
                        <?php foreach($jabatan as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($val->jabatan==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                       <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_sk" class="col-sm-4">Nomor SK Jabatan</label>
                    <div class="col-sm-6">
                      <input type="text" name="no_sk" id="no_sk" class="form-control input-sm" placeholder="Nomor SK Jabatan" value="<?= $val->no_sk; ?>" maxlength="16">
                       <?= form_error('no_sk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-4">keterangan</label>
                    <div class="col-sm-6">
                      <textarea name="keterangan" class="form-control input-sm" placeholder="Keterangan" value="<?= $val->keterangan; ?>"><?= $val->keterangan; ?></textarea>
                    </div>
                  </div>
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
              <?php endforeach; ?>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

