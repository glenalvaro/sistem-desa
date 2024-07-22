<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
       Buku Administrasi Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Buku Penduduk Asuransi</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
      <?php $this->load->view('buku_desa/bumindes_penduduk'); ?>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
               <a target="_blank" href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

               <a href="" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

               <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
            </div>
            <div class="box-body" style="margin-bottom:100px !important;">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="bg-gray color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:200px;" class="text-center">Nama Lengkap/Panggilan</th>
                  <th style="min-width:200px;" class="text-center">Asuransi Kesehatan</th>
                  <th class="text-center">Nomor Asuransi</th>
                  <th class="text-center">Nomor Identitas</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Tempat dan Tanggal Lahir</th>
                  <th class="text-center">Agama</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Alamat Lengkap</th>
                  <th class="text-center">Tanggal Lapor</th>
                </tr>
                </thead>
                <tbody style="font-size: 10px;">
                    <?php $no = 1; 
                    foreach($ambil_data as $main) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="23%">
                   <?= strtoupper($main->nama_penduduk); ?>
                  </td>
                  <td><?= strtoupper($main->asuransi_kesehatan); ?></td>
                  <td><?= strtoupper($main->no_asuransi); ?></td>
                  <td><?= strtoupper($main->nik); ?></td>
                  <td><?= strtoupper($main->sex); ?></td>
                  <td><?= strtoupper($main->tempat_lahir); ?> , <?= strtoupper($main->tgl_lahir); ?></td>
                  <td><?= strtoupper($main->agama); ?></td>
                  <td><?= strtoupper($main->pekerjaan); ?></td>
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