<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
       Buku Administrasi Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Buku Penduduk Sementara</a></li>
      </ol>
    </section>

    <!-- menu -->
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 style="font-size: 14px;" class="box-title">Menu</h4>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?= base_url('bumindes/buku_induk_penduduk'); ?>"><i class="fa fa-book"></i> Buku Induk Penduduk</a></li>
                <li><a href=""><i class="fa fa-pie-chart"></i> Buku Rekapitulasi Jumlah Penduduk</a></li>
                <li><a href="<?= base_url('bumindes/penduduk_sementara'); ?>"><i class="fa fa-list"></i> Buku Penduduk Sementara</a></li>
                <li><a href="<?= base_url('admin/role'); ?>"><i class="fa fa-money"></i> Buku Penduduk Asuransi</a></li>
                <li><a href="<?= base_url('admin/role'); ?>"><i class="fa fa-id-card"></i> Buku KTP dan KK</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
               <a target="_blank" href="<?= base_url('bumindes/cetak_buku_induk'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

               <a href="" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

               <a href="" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
            </div>
            <div class="box-body" style="margin-bottom:100px !important;">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="bg-gray disabled color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:200px;" class="text-center">Nama Lengkap/Panggilan</th>
                  <th class="text-center">Nomor Identitas</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Tempat dan Tanggal Lahir</th>
                  <th class="text-center">Agama</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Kewarganegaraan</th>
                  <th class="text-center">Alamat Lengkap</th>
                  <th class="text-center">Tanggal Lapor</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach($get_penduduk as $main) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="23%">
                   <?= strtoupper($main->nama_penduduk); ?>
                  </td>
                  <td><?= strtoupper($main->nik); ?></td>
                  <td><?= strtoupper($main->sex); ?></td>
                  <td><?= strtoupper($main->tempat_lahir); ?> , <?= strtoupper($main->tgl_lahir); ?></td>
                  <td><?= strtoupper($main->agama); ?></td>
                  <td><?= strtoupper($main->pekerjaan); ?></td>
                  <td><?= strtoupper($main->status_warganegara); ?></td>
                  <td><?= strtoupper($main->alamat_sekarang); ?>, <?= strtoupper($main->dusun); ?></td>
                  <td><?= tgl_indo($main->tgl_terdaftar); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
</section>
</div>