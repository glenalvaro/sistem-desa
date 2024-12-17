<div class="content-wrapper">
  <section class="content-header">
       <h1 class="tx-judul">
       Buku Administrasi Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Buku Penduduk KTP dan KK</a></li>
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
                  <tr>
                        <th rowspan="2">Nomor Urut</th>
                        <th rowspan="2">No. KK</th>
                        <th style="min-width:200px;" rowspan="2" width="20%">Nama Lengkap</th>
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">Jenis Kelamin</th>
                        <th rowspan="2">Tempat / Tanggal Lahir</th>
                        <th rowspan="2">Gol. Darah</th>
                        <th rowspan="2">Agama</th>
                        <th style="min-width:200px;" rowspan="2">Pendidikan</th>
                        <th rowspan="2">Pekerjaan</th>
                        <th style="min-width:200px;" rowspan="2">Alamat</th>
                        <th rowspan="2">Status Perkawinan</th>
                        <th rowspan="2">Status Hub. Keluarga</th>
                        <th rowspan="2">Kewarganegaraan</th>
                        <th colspan="2">Orang Tua</th>
                        <th rowspan="2">Tgl Mulai Tinggal di Desa</th>
                        <th rowspan="2">Ket</th>
                    </tr>
                    <tr>
                        <th>Ayah</th>
                        <th>Ibu</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10px;">
                    <?php $no = 1; 
                    foreach($get_data as $data) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td><?= strtoupper($data->no_kk); ?></td>
                  <td width="23%">
                   <?= strtoupper($data->nama_penduduk); ?>
                  </td>
                  <td><?= strtoupper($data->nik); ?></td>
                  <td><?= strtoupper($data->sex); ?></td>
                  <td><?= strtoupper($data->tempat_lahir); ?> , <?= strtoupper($data->tgl_lahir); ?></td>
                  <td><?= strtoupper($data->darah_golongan); ?></td>
                  <td><?= strtoupper($data->agama); ?></td>
                  <td><?= strtoupper($data->pendidikan_sedang); ?></td>
                  <td><?= strtoupper($data->pekerjaan); ?></td>
                  <td><?= strtoupper($data->alamat_sekarang); ?>, <?= strtoupper($data->dusun); ?></td>
                  <td><?= strtoupper($data->status_kawin); ?></td>
                  <td><?= strtoupper($data->hubungan); ?></td>
                  <td><?= strtoupper($data->status_warganegara); ?></td>
                  <td><?= strtoupper($data->nama_ayah); ?></td>
                  <td><?= strtoupper($data->nama_ibu); ?></td>
                  <td><?= tgl_indo($data->tgl_terdaftar); ?></td>
                  <td><?= strtoupper($data->keterangan); ?></td>
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