<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  cursor: pointer;
  border-radius: 3px;
}

.btn_cek {
  border: white;
  color: white;
  background-color: #55b0e5;
  padding: 5px 8px;
  font-size: 10px;
  cursor: pointer;
}

.btn_lihat {
  border: white;
  color: white;
  background-color: #1e7fb7;
  padding: 5px 8px;
  font-size: 10px;
  cursor: pointer;
}

.upload-btn-wrapper input[type=file] {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  cursor: pointer;
}
</style>

<div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
        <h1 class="tx-title">
          Layanan Permohonan Surat
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
            <form id="mainform" action="<?= base_url('/layanan/permohonan_surat/buat_permohonan'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
            <div class="box-body">
            <div class="col-md-12">
            <p style="font-size: 12px; font-weight: bold;">BIODATA PEMOHON :</p>
              <hr>
              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Jenis Surat</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id_pemohon" value="<?= $id_pemohon; ?>">
                      <input type="hidden" name="id_surat" value="<?= $id_surat; ?>">
                      <input type="text" name="pend_kk" id="pend_kk" value="<?= $nama_surat; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Nomor Whatsapp</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_hp_aktif" id="no_hp_aktif" value="<?= $no_hp_aktif; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">NIK / Nama Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="pend_nik" value="<?= $nik; ?>" class="form-control input-sm" readonly>   
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="pend_nama" value="<?= $nama_penduduk; ?>" class="form-control input-sm" readonly>  
                    </div>
              </div>

              <div class="form-group">
                 <label for="nomor_surat" class="col-sm-3">Nomor KK</label>
                    <div class="col-sm-8">
                        <input type="text" name="pend_kk" value="<?= $no_kk; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                <label for="nomor_surat" class="col-sm-3">Tempat / Tanggal Lahir / Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <input type="text" name="tempat_lahir_pend" value="<?= $tempat_lahir; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="tgl_lahir_pend" value="<?= $tgl_lahir; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="jk_pend" value="<?= $sex; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                <label for="nomor_surat" class="col-sm-3">Alamat</label>
                    <div class="col-sm-4">
                      <input type="text" name="alamat_pend" value="<?= $alamat_sekarang; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="wilayah_pend" value="<?= $dusun; ?>" class="form-control input-sm" readonly>
                    </div>
                  </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Pendidikan / Warga Negara / Agama</label>
                    <div class="col-sm-4">
                        <input type="text" name="pendidikan_pend" value="<?= $pendidikan_kk; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="warga_pend" value="<?= $status_warganegara; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="agama_pend" value="<?= $agama; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>

              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Pekerjaan / Status Perkawinan</label>
                    <div class="col-sm-4">
                        <input type="text" name="pekerjaan_pend" value="<?= $pekerjaan; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="kawin_status" value="<?= $status_kawin; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>
            </div>
            <div class="col-md-12">
            <p style="font-size: 12px; font-weight: bold;">KEPERLUAN SURAT :</p>
            <hr>
             <div class="form-group">
                  <label for="keperluan" class="col-sm-3">Keperluan</label>
                    <div class="col-sm-8">
                        <textarea name="keperluan" class="form-control input-sm required" rows="4"></textarea>
                        <br>
                        <small style="color: red; font-style: italic;">*Tuliskan dengan lengkap keperluan surat anda.</small>
                    </div>
              </div>
              <p style="font-size: 12px; font-weight: bold;">DOKUMEN PERSYARATAN :</p>
              <hr>
            </div>
             <div class="col-md-8">
              <div class="table-responsive">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th style="width: 100px; text-align: center;">Aksi</th>
                  <th>Jenis Dokumen</th>
                  <th style="width: 20px">Status</th>
                </tr>
                 <?php 
                    //get dokumen id penduduk
                    $query = $this->db->query("SELECT * FROM dokumen_penduduk where id_penduduk=$id_pemohon");
                    $get_dok = $query->result();
                  ?>
                  
                <?php $no=1;
                    foreach ($daftar_dokumen as $data) 
                { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td align="center">
                    <?php foreach($get_dok as $main) : ?>
                        <?php if($data->nama_syarat == $main->nama) : ?>
                            <small> <a href="<?= base_url(); ?>folder_arsip/dokumen/<?= $main->file; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=600,width=600,resizable=0");return false;' rel='noopener noreferrer' target='_blank' class="btn btn-primary btn-sm">Lihat</a></small>
                       <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                  <td class="nama_syr"><?= $data->nama_syarat ?></td>
                  <td align="center">
                    <?php foreach($get_dok as $val) : ?>
                        <?php if($data->nama_syarat == $val->nama) : ?>
                          <i class="fa fa-check" style="color:green"></i>
                        <?php endif; ?>
                  <?php endforeach; ?>
                  </td>
                </tr>
              <?php } ?>
              </table>
            </div>
          </div>

          <div class="col-md-12">
              <h4 style="font-size: 12px;">Keterangan</h4>
              <ul>
                <li>Harap periksa kembali file dokumen yang diunggah</li>
                <li>Jika keterangan dokumen tidak tersedia harap menggungah kembali dokumen yang dibutuhkan sebelum menyimpan.</li>
              </ul>
          </div>

        </div>
         <div class="box-footer">
          <center>
            <a href="<?=site_url('/layanan/permohonan_surat/buat_surat')?>" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> &nbsp;&nbsp;Sebelumnya</a>
            <button type="submit" class="btn btn-success btn-sm">Kirim &nbsp;<i class="fa fa-telegram"></i></button>
          </center>
        </div>
        </div>
        </form>
        </div>
        </div>
      </div>
    </section>
    </div>
  </div>
 

 <script>
   

    var x = $(".nama_syr").text();
    
   console.log(x);
 </script>