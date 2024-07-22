<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Kelompok
       <small>Ubah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Kelompok</a></li>
        <li class="active">Ubah Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('data_kelompok'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kelompok</a>
            </div>
            <form action="<?= site_url('data_kelompok/update_kelompok'); ?>" method="post" class="form-horizontal" autocomplete="off">
              <div class="box-body">
                <?php foreach($kelompok_edit as $val) : ?>
                 <div class="form-group">
                    <label for="nama_kelompok" class="col-sm-4">Nama Kelompok</label>
                    <div class="col-sm-6"> 
                      <input type="hidden" name="id" id="id" value="<?= $val->id; ?>">
                      <input type="text" name="nama_kelompok" id="nama_kelompok" value="<?= $val->nama_kelompok; ?>" class="form-control input-sm" placeholder="Nama Kelompok">
                       <?= form_error('nama_kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kode_kelompok" class="col-sm-4">Kode Kelompok</label>
                    <div class="col-sm-6">
                      <input type="number" name="kode_kelompok" id="kode_kelompok" value="<?= $val->kode_kelompok; ?>" class="form-control input-sm" placeholder="Kode Kelompok">
                      <p class="text-danger">*Pastikan kode belum pernah dipakai di data lembaga / di data kelompok.</p>
                       <?= form_error('kode_kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4">Kategori Kelompok</label>
                    <div class="col-sm-6">
                    <select name="id_kategori" class="select-filter form-control" style="width: 100%;">
                        <option value="">--Pilih Kategori Kelompok--</option>               
                      <?php foreach($data_kategori as $row) : ?>
                           <option value="<?= $row['id']; ?>" <?=($val->id_kategori==$row['id'])?'selected="selected"':''?>><?= strtoupper($row['kategori_kelompok']); ?></option>
                        <?php endforeach; ?>
                      </select>
                       <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4">Ketua Kelompok</label>
                    <div class="col-sm-6">
                    <select name="id_ketua" class="form-control" id="kelompok_penduduk" style="width: 100%;">
                        <option value="">--Pilih Ketua Kelompok--</option>               
                        <?php foreach($kelompok_ketua as $data) : ?>
                           <option value="<?= $data->id; ?>" <?=($val->id_ketua==$data->id)?'selected="selected"':''?>>NIK : <?= $data->nik; ?> - <?= strtoupper($data->nama_penduduk); ?> - <?= strtoupper($data->dusun); ?></option>
                        <?php endforeach; ?>
                      </select>
                       <?= form_error('id_ketua', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-4">Deskripsi Kelompok</label>
                    <div class="col-sm-6">
                      <textarea name="deskripsi_kelompok" class="form-control input-sm" value="<?= $val->deskripsi_kelompok; ?>" placeholder="Deskripsi Kelompok"><?= $val->deskripsi_kelompok; ?></textarea>
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




