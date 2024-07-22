<style>
  .table {
    font-size: 12px;
  }

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
</style>
<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Biodata Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Penduduk</a></li>
        <li class="active">Biodata Penduduk</li>
      </ol>
    </section>


<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
              <div class="noprint">
                  <a href="<?= site_url('data_penduduk'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali ke Daftar Penduduk</a>

                  <a href="<?= site_url('data_penduduk/create'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Penduduk</a>

                  <?php if ($hubungan_keluarga_id == 1) : ?>
                    <a href="<?= site_url("data_keluarga/anggota_keluarga/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-users"></i> Anggota Keluarga</a>
                  <?php endif; ?>

                  <a target="_blank" href="<?= site_url('data_penduduk/cetak_biodata/'.$id) ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak Biodata</a>

                  <a href="<?= site_url('data_penduduk/update/'.$id) ?>" class="btn btn-social btn-flat bg-yellow btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Ubah Biodata</a>
              </div>
              <br>
              <h4 style="font-size: 15px;" class="box-title">Biodata Penduduk (NIK : <?= $nik; ?>)</h4>
              <br>
              <p style="font-size: 10px;">Terdaftar pada: &nbsp;<i class="fa fa-clock-o"></i>&nbsp;<?= tgl_indo($tgl_terdaftar); ?>&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;<?= $created_by; ?></p>
            </div>
             <div class="box-body">
                <center>
                      <img style="width: 210px; height: 210px; margin-top: 20px; margin-bottom: 20px;" src="<?= site_url("data_penduduk/ambil_foto?foto={$foto}&sex={$jenis_kelamin}"); ?>" class="img-responsive" alt="Foto Penduduk">
                </center>
              <div class="table-responsive">
              <table class="table table-bordered" style="font-size: 11px !important;">
              <tbody>
                <tr>
                  <td width="200">Status Dasar</td><td width="1">:</td>
                  <td><?= $status_dasar; ?></td>
                </tr>
                 <tr>
                  <td width="200">Nama Penduduk</td><td width="1">:</td>
                  <td><?= $nama_penduduk; ?></td>
                </tr>
                <tr>
                  <td width="200">Nomor Kartu Keluarga</td><td width="1">:</td>
                  <td><?= $no_kk; ?></td>
                </tr>
                 <tr>
                  <td width="200">Hubungan Dalam Keluarga</td><td width="1">:</td>
                  <td><?= $hubungan; ?></td>
                </tr>
                <tr>
                  <td width="200">Jenis Kelamin</td><td width="1">:</td>
                  <td><?= $sex; ?></td>
                </tr>
                <tr>
                  <td width="200">Agama</td><td width="1">:</td>
                  <td><?= $agama; ?></td>
                </tr>
                <tr>
                  <td width="200">Status Penduduk</td><td width="1">:</td>
                  <td><?= $status; ?></td>
                </tr>
                 <tr>
                  <th colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
                </tr>
                <tr>
                  <td width="200">Tempat Lahir</td><td width="1">:</td>
                  <td><?= $tempat_lahir; ?></td>
                </tr>
                <tr>
                  <td width="200">Tanggal Lahir</td><td width="1">:</td>
                  <td><?= $tgl_lahir; ?></td>
                </tr>
                <tr>
                  <td width="200">Umur</td><td width="1">:</td>
                  <td><?= umur($tgl_lahir); ?> Tahun</td>
                </tr>
                <tr>
                  <td width="200">Anak Ke-</td><td width="1">:</td>
                  <td><?= $kelahiran_anak_ke; ?></td>
                </tr>
                <tr>
                  <td width="200">Berat</td><td width="1">:</td>
                  <td>Gram</td>
                </tr>
                <tr>
                  <td width="200">Panjang</td><td width="1">:</td>
                  <td>Cm</td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>PENDIDIKAN DAN PEKERJAAN</strong></th>
                </tr>
                <tr>
                  <td width="200">Pendidikan dalam KK</td><td width="1">:</td>
                  <td><?= $pendidikan_kk ?></td>
                </tr>
                <tr>
                  <td width="200">Pendidikan sedang ditempuh</td><td width="1">:</td>
                  <td><?= $pendidikan_sedang ?></td>
                </tr>
                <tr>
                  <td width="200">Pekerjaan</td><td width="1">:</td>
                  <td><?= $pekerjaan; ?></td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
                </tr>
                <tr>
                  <td width="200">Suku/Etnis</td><td width="1">:</td>
                  <td><?= $suku_penduduk ?></td>
                </tr>
                <tr>
                  <td width="200">Warga Negara</td><td width="1">:</td>
                  <td><?= $status_warganegara ?></td>
                </tr>
                <tr>
                  <td width="200">Negara Asal</td><td width="1">:</td>
                  <td><?= $negara_asal ?></td>
                </tr>
                <tr>
                  <td width="200">Nomor Paspor</td><td width="1">:</td>
                  <td><?= $dokumen_paspor; ?></td>
                </tr>
                <tr>
                  <td width="200">Tgl Berakhir Paspor</td><td width="1">:</td>
                  <td><?= $tgl_paspor; ?></td>
                </tr>
                <tr>
                  <td width="200">Nomor KITAS/KITAP</td><td width="1">:</td>
                  <td><?= $dokumen_kitas; ?></td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>ORANG TUA</strong></th>
                </tr>
                <tr>
                  <td width="200">NIK Ayah</td><td width="1">:</td>
                  <td><?= $nik_ayah ?></td>
                </tr>
                <tr>
                  <td width="200">Nama Ayah</td><td width="1">:</td>
                  <td><?= $nama_ayah ?></td>
                </tr>
                <tr>
                  <td width="200">NIK Ibu</td><td width="1">:</td>
                  <td><?= $nik_ibu; ?></td>
                </tr>
                <tr>
                  <td width="200">Nama Ibu</td><td width="1">:</td>
                  <td><?= $nama_ibu; ?></td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>ALAMAT</strong></th>
                </tr>
                <tr>
                  <td width="200">Alamat</td><td width="1">:</td>
                  <td><?= $alamat_sekarang ?></td>
                </tr>
                <tr>
                  <td width="200">Dusun</td><td width="1">:</td>
                  <td><?= $dusun ?></td>
                </tr>
                <tr>
                  <td width="200">Alamat Sebelumnya</td><td width="1">:</td>
                  <td><?= $alamat_sebelumnya; ?></td>
                </tr>
                <tr>
                  <td width="200">No Telepon</td><td width="1">:</td>
                  <td><?= format_telpon($no_telepon); ?></td>
                </tr>
                <tr>
                  <td width="200">Alamat Email</td><td width="1">:</td>
                  <td><?= email($email); ?></td>
                </tr>
                 <tr>
                  <th colspan="3" class="subtitle_head"><strong>STATUS KAWIN</strong></th>
                </tr>
                <tr>
                  <td width="200">Status Kawin</td><td width="1">:</td>
                  <td><?= $status_kawin ?></td>
                </tr>
                <tr>
                  <td width="200">Tgl Perkawinan</td><td width="1">:</td>
                  <td>-</td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
                </tr>
                <tr>
                  <td width="200">Golongan Darah</td><td width="1">:</td>
                  <td><?= $darah_golongan ?></td>
                </tr>
                <tr>
                  <td width="200">Asuransi Kesehatan</td><td width="1">:</td>
                  <td><?= $asuransi_kesehatan ?></td>
                </tr>
                <tr>
                  <td width="200">Nomor Asuransi Kesehatan</td><td width="1">:</td>
                  <td><?= $no_asuransi ?></td>
                </tr>
                 <tr>
                  <td width="200">BPJS Ketenagakerjaan</td><td width="1">:</td>
                  <td><?= $bpjs_ketenagakerjaan ?></td>
                </tr>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>LAIN LAIN</strong></th>
                </tr>
                <tr>
                  <td width="200">Keterangan</td><td width="1">:</td>
                  <td><?= $keterangan ?></td>
                </tr>
              </tbody>
            </table>
          </div>
              <div class="table-responsive">
               <table class="table table-bordered">
                <thead>
                  <tr>
                  <th colspan="4" class="subtitle_head"><strong>PROGRAM BANTUAN</strong></th>
                </tr>
                <tr style="font-size: 10px;">
                  <th class="padat">NO</th>
                  <th class="text-center">WAKTU / TANGGAL</th>
                  <th class="text-center">NAMA PROGRAM</th>
                  <th class="text-center">KETERANGAN</th>
                </tr>
               </thead>
               <tbody style="font-size: 11px;">
                <?php 
                  //ambil data bantuan berdasarkan sasaran program
                  //sasaran 1 = penduduk
                  $sql = "SELECT u.*, b.id_program as id_prog_ban, y.nama_program as nama_prog, y.sdate as tgl_mulai_prog, y.edate as tgl_akhir_prog, y.keterangan as ket_prog
                      FROM data_penduduk u
                      LEFT JOIN peserta_bantuan b ON u.id = b.id_anggota
                      LEFT JOIN program_bantuan y ON b.id_program = y.id
                      WHERE u.id = $id
                      AND b.id_sasaran = 1";
                  $hasil = $this->db->query($sql)->result_array();
                 ?>
                <?php $no=1;
                foreach($hasil as $main) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td width="20%"><?= tgl_indo($main['tgl_mulai_prog']) ?> - <?= tgl_indo($main['tgl_akhir_prog']) ?></td>
                    <td width="25%"><?= set_ucwords($main['nama_prog']); ?></td>
                    <td><?= set_ucwords($main['ket_prog']); ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
             </table>
             </div>
              <div class="noprint">  
              <div class='box-footer'>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
