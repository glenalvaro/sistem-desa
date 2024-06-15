<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
       Detail Data Perangkat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Buku Desa</a></li>
        <li><a href="#">Perangkat Desa</a></li>
        <li><a href="#">Detail</a></li>
      </ol>
    </section>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
               <a href="<?= site_url('perangkat_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Perangkat</a>
            </div>
            <div class="box-body">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><?= $nik_pegawai; ?></h3>
                  <h5 class="widget-user-desc">
                  	Perangkat Desa
                  </h5>
                  </div>
                  <div class="widget-user-image">
     					 <img src="<?= site_url("perangkat_desa/ambil_foto_perangkat?foto={$foto_pegawai}&sex={$jenis_kelamin}"); ?>" alt="User Pegawai">
                  </div>
            </div>
          <br>
           <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover tabel-rincian">
              <tbody>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>BIODATA</strong></th>
                </tr>
                <tr>
                  <td>Nama</td><td>:</td>
                  <td><?= strtoupper($nama_pegawai); ?>., <?= strtoupper($gelar); ?></td>
                </tr>
                <tr>
                  <td width="200">NIK</td><td width="1">:</td>
                  <td><?= $nik_pegawai; ?></td>
                </tr>
                <tr>
                  <td width="200">NIP</td><td width="1">:</td>
                  <td><?= $nip; ?></td>
                </tr>
                <tr>
                  <td width="200">Tempat Lahir</td><td width="1">:</td>
                  <td><?= $tempat_lahir; ?></td>
                </tr>
                <tr>
                  <td width="200">Tgl Lahir</td><td width="1">:</td>
                  <td><?= $tgl_lahir; ?></td>
                </tr>
                <tr>
                  <td width="200">Jenis Kelamin</td><td width="1">:</td>
                  <td>
                  	 <?php
                        if ($jenis_kelamin == 1) {
                             echo "Laki-Laki";
                         } else {
                            echo "Perempuan";
                         } 
                    ?>   
                  </td>
                </tr>
                <tr>
                  <td width="200">Pendidikan</td><td width="1">:</td>
                  <td><?= $pendidikan; ?></td>
                </tr>
                <tr>
                  <td width="200">Agama</td><td width="1">:</td>
                  <td><?= $agama; ?></td>
                </tr>
                <tr>
                  <td width="200">Pangkat / Golongan</td><td width="1">:</td>
                  <td><?= $pangkat_golongan; ?></td>
                </tr>
                <tr>
                  <td width="200">Jabatan Pegawai</td><td width="1">:</td>
                  <td><?= $jabatan_pegawai; ?></td>
                </tr>
                <tr>
                  <td width="200">Status</td><td width="1">:</td>
                  <td>
                  	 <?php
                        if ($status == 1) {
                             echo "<small class='label label-success'> Aktif</small>";
                         } else {
                            echo "<small class='label label-danger'> Tidak Aktif</small>";
                         } 
                    ?>   
                  </td>
                </tr>
              </tbody>
             </table>
            </div>
           </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>