<?php foreach($identitas as $ids) : ?>
<style>
  .subtitle_head {
    padding: 10px 50px 10px 5px;
    background-color: #a2f2ef;
    margin: 15px 0px 10px 0px;
    margin-top: 15px;
    margin-right: 0px;
    margin-bottom: 10px;
    margin-left: 0px;
    text-align: left;
    color: #111;
  }

  .bg-identitas {
    width: 100%;
    height: 300px;
    background: url(<?= base_url('assets/img/kantor/') . $ids['gambar_desa']; ?>);
    background-repeat: no-repeat;
    background-position: center center;
  }

  .img-identitas {
    margin: 30px auto;
    width: 100px;
    padding: 3px;
  }

  .text-identitas {
    text-align: center;
    font-weight: bold;
    color: #fff;
    text-shadow: 2px 2px 2px #0c83c5;
  }
</style>
<?php foreach($setting as $stg) : ?>
<div class="content-wrapper">
<section class="content-header">
    <h1 class="tx-judul">
      Info <?= $stg['sebutan_desa']; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Informasi <?= $stg['sebutan_desa']; ?></a></li>
    </ol>
</section>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">

   <?php 
    //cek apakah data kepala desa atau kelurahan sudah tersedia di buku pemerintah desa
    $query = $this->db->query("SELECT * FROM perangkat_desa WHERE jabatan_pegawai =1");
    $cek_jab = $query->row();
   ?>

<?php if($cek_jab->jabatan_pegawai != 1) : ?>
<div class="col">
  <div class="callout callout-danger">
      <h4>Perhatian !</h4>
      <p>Data Kepala <?= $stg['sebutan_desa']; ?> belum terdaftar pada buku pemerintah desa, silakan isi terlebih dahulu. <a href="<?= base_url('perangkat_desa'); ?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Buku Pemerintah Desa</a></p>
  </div>
</div>
<?php endif; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
                <a href="<?= base_url('identitas_desa/edit_identitas_desa/'). $ids['id']; ?>" class="btn btn-social btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Ubah Data <?= $stg['sebutan_desa']; ?></a>

                <a href="<?= base_url('identitas_desa/lokasi_kantor/'). $ids['id']; ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-map-marker"></i> Lokasi Kantor <?= $stg['sebutan_desa']; ?></a>

             
                <a href="<?= base_url('identitas_desa/wilayah_desa/'). $ids['id']; ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-map"></i> Peta Wilayah <?= $stg['sebutan_desa']; ?></a>
             
            </div>
            <div class="box-body">
              <br/>

              <div class="box-body bg-identitas">
                  <a href="<?= site_url('assets/img/logo/') . $ids['logo_desa']; ?>" class="progressive replace foto_penduduk img-identitas img-responsive">
                  <img class="preview" loading="lazy" src="<?= site_url('assets/img/load-foto.gif') ?>" alt="Foto"/></a>
                  <h3 class="text-identitas"><?= $stg['sebutan_desa']; ?> <?= $ids['nama_desa']; ?></h3>
                  <p style="font-size: 13px;" class="text-identitas"><b>Kecamatan <?= $ids['nama_kecamatan']; ?>, <?= $stg['sebutan_kabupaten']; ?> <?= $ids['nama_kabupaten']; ?>, Provinsi <?= $ids['nama_provinsi']; ?></b></p>
              </div>
               
              <div class="box-header with-border">
              </div>
              <br/>
              <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover tabel-rincian">
              <tbody>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>DATA <?= strtoupper($stg['sebutan_desa']); ?></strong></th>
                </tr>
                <tr>
                  <td width="200">Nama <?= $stg['sebutan_desa']; ?></td><td width="1">:</td>
                  <td><?= $ids['nama_desa']; ?></td>
                </tr>
                <tr>
                  <td width="200">Kode Pos</td><td width="1">:</td>
                  <td><?= $ids['kode_pos']; ?></td>
                </tr>
                <tr>
                  <td>Nama Kepala <?= $stg['sebutan_desa']; ?></td><td>:</td>
                  <td><?= set_ucwords($cek_jab->nama_pegawai) ?>, <?= $cek_jab->gelar ?></td>
                </tr>
                <tr>
                  <td>NIP Kepala <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><?= strtoupper($cek_jab->nip) ?></td>
                </tr>
                <tr>
                  <td>Alamat Kantor <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><?= $ids['alamat_kantor']; ?></td>
                </tr>
                <tr>
                  <td>E-mail <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><a href="#"><?= $ids['email_desa']; ?></a></td>
                </tr>
                <tr>
                  <td>Nomor Telepon <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><?= format_telpon($ids['no_hp']); ?></td>
                </tr>
                <tr>
                  <td>Website <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><code><?= $ids['website_desa']; ?></code></td>
                </tr>
                <tr>
                  <td>Kode Wilayah <?= $stg['sebutan_desa']; ?> </td><td>:</td>
                  <td><code><?= $ids['kode_wilayah']; ?></code></td>
                </tr>

                <tr>
                  <th colspan="3" class="subtitle_head"><strong>KECAMATAN</strong></th>
                </tr>
                 <tr>
                  <td>Kecamatan </td><td>:</td>
                  <td><?= $ids['nama_kecamatan']; ?></td>
                </tr>
                 <tr>
                  <td>Nama Camat </td><td>:</td>
                  <td><?= $ids['nama_camat']; ?></td>
                </tr>
                 <tr>
                  <td>NIP Camat </td><td>:</td>
                  <td><?= $ids['nip_camat']; ?></td>
                </tr>
               
                <tr>
                  <th colspan="3" class="subtitle_head"><strong><?= strtoupper($stg['sebutan_kabupaten']); ?></strong></th>
                </tr>
                <tr>
                  <td><?= $stg['sebutan_kabupaten']; ?> </td><td>:</td>
                  <td><?= $ids['nama_kabupaten']; ?></td>
                </tr>
  
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>PROVINSI</strong></th>
                </tr>
                <tr>
                  <td>Provinsi </td><td>:</td>
                  <td><?= $ids['nama_provinsi']; ?></td>
                </tr>
              </tbody>
             </table>
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