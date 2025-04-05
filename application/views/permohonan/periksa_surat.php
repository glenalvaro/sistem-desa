<div class="content-wrapper tx-rubik">
    <section class="content-header">
       <h1 class="tx-judul">
        Periksa Permohonan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Permohonan</a></li>
        <li><a href="#"> Periksa</a></li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <form id="mainform" action="" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
            <div class="box-body">
            <div class="col-md-12">
            <p style="font-size: 12px; font-weight: bold;">BIODATA PEMOHON :</p>
              <hr>
              <div class="form-group">
                  <label for="nomor_surat" class="col-sm-3">Jenis Surat</label>
                    <div class="col-sm-8">
                      <input type="hidden" value="<?= $id; ?>">
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
                        <input type="text" value="<?= $nik; ?>" class="form-control input-sm" readonly>   
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
                  <label for="nomor_surat" class="col-sm-3">Pekerjaan / Status Perkawinan</label>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $pekerjaan; ?>" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" value="<?= $status_kawin; ?>" class="form-control input-sm" readonly>
                    </div>
              </div>
            </div>
            <div class="col-md-12">
            <p style="font-size: 12px; font-weight: bold;">DOKUMEN & KEPERLUAN SURAT :</p>
            <hr>
                <h4 style="font-size: 14px; font-weight: bold;">Keperluan Surat :</h4>
                <p style="font-size: 12px;"><?= $keperluan; ?></p>
            <br>
                
            <div class="table-responsive">
               <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th style="width: 100px; text-align: center;">Aksi</th>
                  <th>Jenis Dokumen</th>
                </tr>
                 <?php 
                    //get dokumen id penduduk
                    $query = $this->db->query("SELECT * FROM dokumen_penduduk where id_penduduk=$id_pemohon");
                    $get_dok = $query->result();
                  ?>
                  
                <?php $no=1;
                    foreach ($dok_syarat as $data) 
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
                  <td><?= $data->nama_syarat ?></td>
                </tr>
              <?php } ?>
              </table>
            </div>
            </div>

            <div class="col-md-12">
            <h4 style="font-size: 12px;">Ketentuan Periksa Surat</h4>
                <ul>
                    <li>Harap periksa kembali file dokumen yang diunggah oleh pemohon</li>
                    <li>Jika tombol "Lihat" pada surat tidak tersedia dokumen tersebut tidak lengkap atau dokumen tidak diunggah oleh pemohon.</li>
                </ul>
            </div>
        </div>
         <div class="box-footer">
          <center>
           <a href="#" data-toggle="modal" data-target="#tolak_surat<?= $id; ?>" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-info"></i> Tolak</a>
           <a href="<?= site_url("permohonan/buat_surat_permohonan/{$id}/{$id_pemohon}/{$id_surat}"); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-check"></i> Terima</a>
          </center>
        </div>
        </div>
        </form>
        </div>
        </div>
      </div>
    </section>
  </div>
 

<div class="modal fade" id="tolak_surat<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px;">Form Tolak Surat</h4>
            </div>
             <form id="validasi" action="<?= base_url('permohonan/tolak_permohonan/'); ?><?= $id; ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="hidden" name="user" value="<?= $user['name']; ?>">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control input-sm required" rows="4"></textarea>
                    <br>
                    <span style="color: #bd2323; font-style: italic;">*Tuliskan keterangan surat ditolak.</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-social btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-primary btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </div>
    </form>
    </div>   
</div>