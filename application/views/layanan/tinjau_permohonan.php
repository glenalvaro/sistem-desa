<style>
  .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  float: right;
}

.btn_unggah {
  border: white;
  color: white;
  background-color: #55b0e5;
  padding: 5px 8px;
  font-size: 10px;
}

.upload-btn-wrapper input[type=file] {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}


</style>

<div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
        <h1 class="tx-title">
          Unggah Dokumen
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#"> Layanan Surat</a></li>
          <li class="active">Tinjau Surat</li>
        </ol>
      </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
             <p style="font-size: 12px; font-weight: bold;">Unggah Dokumen Persyaratan Surat <?= $nama_surat; ?></p>
            </div>
             <form id="mainform" action="<?= base_url('/layanan/permohonan_surat/simpan_permohonan'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <input type="hidden" name="id_surat" value="<?= $id_surat; ?>">
                 <textarea name="keterangan" hidden><?= $keterangan; ?></textarea>
                 <input type="hidden" name="no_hp_aktif" value="<?= $no_hp_aktif; ?>">

            <div class="col-sm-9">
              <table class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px;">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th>No</th>
                    <th>Jenis Dokumen</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
                </thead>
                  <tbody style="font-size: 11px;">
                    <?php $no=1;
                        foreach ($daftar_dokumen as $data) 
                    { ?>
                    <tr>
                      <td width="1%"><?= $no++; ?></td>
                      <td><?= $data->nama_syarat ?></td>
                      <td width="200px"> 
                         <!-- <div class="upload-btn-wrapper">
                            <button class="btn_unggah">Lihat</button>
                            <input type="file" name="myfile" />
                        </div> -->
                        <div class="upload-btn-wrapper">
                            <button class="btn_unggah">Unggah</button>
                            <input type="file" name="myfile" />
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
              </div>
              <div class="box-footer">
                 <a href="<?=site_url('/layanan/permohonan_surat/buat_surat')?>" class="btn btn-social bg-yellow btn-sm"><i class="fa fa-reply"></i> Kembali</a>
                 <button type="submit" class="btn btn-social btn-primary btn-sm"  style="float: right;"><i class="fa fa-share"></i> Lanjut</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>