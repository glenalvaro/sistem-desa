<div class="content-wrapper">
  <section class="content-header">
       <h1 class="tx-judul">
       Buku Administrasi Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Buku Induk Penduduk</a></li>
      </ol>
    </section>


<section class="content">
      <div class="row">
        <?php $this->load->view('buku_desa/bumindes_penduduk'); ?>
      <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
               <a target="_blank" href="<?= base_url('bumindes/cetak_buku_induk'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

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
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Status Pernikahan</th>
                  <th class="text-center">Tempat dan Tanggal Lahir</th>
                  <th class="text-center">Agama</th>
                  <th class="text-center">Pendidikan Terakhir</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Kewarganegaraan</th>
                  <th class="text-center">Alamat Lengkap</th>
                  <th class="text-center">Kedudukan Dalam Keluarga</th>
                  <th class="text-center">NIK</th>
                  <th class="text-center">NO. KK</th>
                  <th class="text-center">Ket</th>
                </tr>
                </thead>
                <tbody style="font-size: 10px;">
                    <?php $no = 1; 
                    foreach($get_data as $val) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="23%">
                   <?= strtoupper($val->nama_penduduk); ?>
                  </td>
                  <td><?= strtoupper($val->sex); ?></td>
                  <td><?= strtoupper($val->status_kawin); ?></td>
                  <td><?= strtoupper($val->tempat_lahir); ?> , <?= strtoupper($val->tgl_lahir); ?></td>
                  <td><?= strtoupper($val->agama); ?></td>
                  <td><?= strtoupper($val->pendidikan_sedang); ?></td>
                  <td><?= strtoupper($val->pekerjaan); ?></td>
                  <td><?= strtoupper($val->status_warganegara); ?></td>
                  <td><?= strtoupper($val->alamat_sekarang); ?>, <?= strtoupper($val->dusun); ?></td>
                  <td><?= strtoupper($val->hubungan); ?></td>
                  <td><?= strtoupper($val->nik); ?></td>
                  <td><?= strtoupper($val->no_kk); ?></td>
                  <td><?= strtoupper($val->keterangan); ?></td>
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