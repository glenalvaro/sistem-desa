<style>
.form-horizontal .control-label {
    text-align: left;
}

  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 11px;
}

.input-sm1 {
    height: 35px;
    padding: 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 2px;
}
</style>
<?php foreach($setting as $main) : ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1 class="tx-judul">
        Info <?= $main['sebutan_desa']; ?>
        <small>Ubah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li>&nbsp;Menu</li>
        <li><a href="#">Informasi <?= $main['sebutan_desa']; ?></a></li>
        <li class="active">Ubah Data</li>
      </ol>
    </section>

<?php 
    //ambil dan tampilkan data kepala desa atau kelurahan
    $query = $this->db->query("SELECT * FROM perangkat_desa WHERE jabatan_pegawai =1");
    $get_perdes = $query->row();
?>

<?php foreach($tampilData as $key) : ?>
<form action="<?php echo base_url('identitas_desa/update_identitasDesa'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
<section class="content">
      <div class="row">
         <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body">
             <center><img class="img-thumbnail img-preview" src="<?= base_url('assets/img/logo/') . $key->logo_desa; ?>" width="118px" height="110px" value="<?= $key->logo_desa; ?>">
              </center>
              <br/>  
              <p class="text-center text-bold">Logo <?= $main['sebutan_desa']; ?></p>
              <p class="text-muted text-center text-red">(Kosongkan, jika logo tidak berubah)</p>
              <center>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="logo_desa" onchange="previewGmb()">
                <label class="custom-file-label" for="image">Choose File</label>
              </div>
              </center>  
              <br/>  
            </div>  
          </div>
          <!-- gambar kantor dinas -->
          <div class="box box-primary">
            <div class="box-body">
               <center><img height="110px" src="<?= base_url('assets/img/kantor/') . $key->gambar_desa; ?>" class="img-thumbnail img-preview" value="<?= $key->gambar_desa; ?>">
              </center>
              <br/>
             <p class="text-center text-bold">Kantor <?= $main['sebutan_desa']; ?></p>
              <p class="text-muted text-center text-red">(Kosongkan, jika gambar tidak berubah)</p>
              <center>
                <div class="custom-file">
                   <input type="file" class="custom-file-input" id="image" name="gambar_desa" onchange="previewGmb()">
                  <label class="custom-file-label" for="image">Choose File</label>
              </div> 
            </center>
            <br/>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="box box-primary">
             <div class="box-header with-border">
              <a href="<?php echo base_url('identitas_desa/identitas_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Identitas <?= $main['sebutan_desa']; ?></a>
            </div>
            <div class="box-body" style="margin-left: 10px;">
              <div class="form-group">
                    <label class="col-sm-3 control-label"><u>DATA</u></label>
              </div>
                  
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Nama <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_desa" class="form-control input-sm" value="<?= $key->nama_desa; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Pos</label>
                    <div class="col-sm-2">
                      <input type="hidden" name="id" value="<?= $key->id; ?>">
                      <input type="text" name="kode_pos" class="form-control input-sm" value="<?= $key->kode_pos; ?>">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-3 control-label">Kepala <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control input-sm" value="<?= $get_perdes->nama_pegawai; ?>" readonly>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-3 control-label">NIP Kepala <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" value="<?= $get_perdes->nip; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Alamat Kantor <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                       <input type="text" name="alamat_kantor" class="form-control input-sm" value="<?= $key->alamat_kantor; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">E-mail <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                       <input type="text" name="email_desa" class="form-control input-sm" value="<?= $key->email_desa; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Telepon <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                       <input type="text" name="no_hp" class="form-control input-sm" value="<?= $key->no_hp; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Website <?= $main['sebutan_desa']; ?></label>
                    <div class="col-sm-8">
                       <input type="text" name="website_desa" class="form-control input-sm" value="<?= $key->website_desa; ?>">
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><u>KECAMATAN</u></label>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Kecamatan</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_kecamatan" class="form-control input-sm" value="<?= $key->nama_kecamatan; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Camat</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_camat" class="form-control input-sm" value="<?= $key->nama_camat; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">NIP Camat</label>
                    <div class="col-sm-8">
                      <input type="text" name="nip_camat" class="form-control input-sm" value="<?= $key->nip_camat; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label"><u>KABUPATEN</u></label>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Kabupaten</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_kabupaten" class="form-control input-sm" value="<?= $key->nama_kabupaten; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label"><u>PROVINSI</u></label>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Provinsi</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_provinsi" class="form-control input-sm" value="<?= $key->nama_provinsi; ?>">
                    </div>
                  </div>
              
              <div class='box-footer'>
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" name="btnsimpan" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </form>
<?php endforeach; ?>
</section>
</div>
<?php endforeach; ?>



