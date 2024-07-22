<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Kelompok
       <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Kelompok</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('data_kelompok'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kelompok</a>
            </div>
            <form id="mainform" action="<?= site_url('data_kelompok/tambah_kelompok'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_kelompok" class="col-sm-4">Nama Kelompok</label>
                    <div class="col-sm-6">
                      <input type="text" name="nama_kelompok" id="nama_kelompok" class="form-control input-sm required" placeholder="Nama Kelompok" maxlength="50">
                       <?= form_error('nama_kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kode_kelompok" class="col-sm-4">Kode Kelompok</label>
                    <div class="col-sm-6">
                      <input type="text" name="kode_kelompok" id="kode_kelompok" class="form-control input-sm required" placeholder="Kode Kelompok" maxlength="16">
                      <p class="text-danger" style="margin-top:10px;">*Pastikan kode belum pernah dipakai di data lembaga / di data kelompok.</p>
                       <?= form_error('kode_kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id_kategori" class="col-sm-4">Kategori Kelompok</label>
                    <div class="col-sm-6">
                    <select class="form-control select-filter required" name="id_kategori" id="id_kategori" style="width: 100%;">
                        <option value="">-- Masukkan Kategori Kelompok --</option>               
                       <?php foreach($data_kategori as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row['kategori_kelompok']; ?></option>
                      <?php endforeach; ?>
                      </select>
                       <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id_ketua" class="col-sm-4">Ketua Kelompok</label>
                    <div class="col-sm-6">
                    <select name="id_ketua" id="kelompok_penduduk" class="form-control required" style="width: 100%;">
                        <option value="">-- Silakan Masukkan NIK/Nama --</option>               
                       <?php foreach($kelompok_ketua as $main) : ?>
                        <option value="<?= $main->id; ?>">NIK : <?= $main->nik; ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
                      <?php endforeach; ?>
                      </select>
                       <?= form_error('id_ketua', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-4">Deskripsi Kelompok</label>
                    <div class="col-sm-6">
                      <textarea name="deskripsi_kelompok" class="form-control input-sm" placeholder="Deskripsi Kelompok"></textarea>
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

