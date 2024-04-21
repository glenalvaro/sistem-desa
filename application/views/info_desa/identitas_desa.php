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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Kelola Profil Desa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Informasi Desa</a></li>
      </ol>
    </section>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
                <a href="<?= base_url('admin/edit_identitas_desa/'). $ids['id']; ?>" class="btn btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Ubah Data Desa</a>

                <a href="<?= base_url('admin/lokasi_kantor/'). $ids['id']; ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-map-marker"></i> Lokasi Kantor Desa</a>

             
                <a href="<?= base_url('admin/wilayah_desa/'). $ids['id']; ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-map"></i> Peta Wilayah Desa</a>
             
            </div>
            <div class="box-body">
              <br/>

              <div class="box-body bg-identitas">
                  <a href="<?= site_url('assets/img/logo/') . $ids['logo_desa']; ?>" class="progressive replace foto_penduduk img-identitas img-responsive">
                  <img class="preview" loading="lazy" src="<?= site_url('assets/img/load-foto.gif') ?>" alt="Foto"/></a>
                  <h3 class="text-identitas">Desa <?= $ids['nama_desa']; ?></h3>
                  <p class="text-identitas"><b>Kecamatan <?= $ids['nama_kecamatan']; ?>, Kabupaten <?= $ids['nama_kabupaten']; ?>, Provinsi <?= $ids['nama_provinsi']; ?></b></p>
              </div>
               
              <div class="box-header with-border">
              </div>
              <br/>
              <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover tabel-rincian">
              <tbody>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>DESA</strong></th>
                </tr>
                <tr>
                  <td width="200">Nama Desa/Kelurahan</td><td width="1">:</td>
                  <td><?= $ids['nama_desa']; ?></td>
                </tr>
                <tr>
                  <td width="200">Kode Pos Desa</td><td width="1">:</td>
                  <td><?= $ids['kode_pos']; ?></td>
                </tr>
                <tr>
                  <td>Nama Kepala Desa</td><td>:</td>
                  <td><?= $ids['nama_kepdes']; ?></td>
                </tr>
                <tr>
                  <td>NIP Kepala Desa </td><td>:</td>
                  <td><?= $ids['nip_kepdes']; ?></td>
                </tr>
                <tr>
                  <td>Alamat Kantor Desa </td><td>:</td>
                  <td><?= $ids['alamat_kantor']; ?></td>
                </tr>
                <tr>
                  <td>E-mail Desa </td><td>:</td>
                  <td><a href="#"><?= $ids['email_desa']; ?></a></td>
                </tr>
                <tr>
                  <td>Nomor Telepon Desa </td><td>:</td>
                  <td><?= $ids['no_hp']; ?></td>
                </tr>
                <tr>
                  <td>Website Desa </td><td>:</td>
                  <td><code><?= $ids['website_desa']; ?></code></td>
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
                  <th colspan="3" class="subtitle_head"><strong>KABUPATEN</strong></th>
                </tr>
                <tr>
                  <td>Kabupaten </td><td>:</td>
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