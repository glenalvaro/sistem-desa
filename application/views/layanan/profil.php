
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Biodata Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
     <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
               <a href="<?= base_url('/layanan/profil/cetak') ?>" onclick='window.open(this.href,"popupwindow","status=0,height=800,width=800,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' class="btn btn-social btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Print</a>
            </div>
            <div class="box-body">
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
                  <td><?= $no_telepon; ?></td>
                </tr>
                <tr>
                  <td width="200">Alamat Email</td><td width="1">:</td>
                  <td><?= $email; ?></td>
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
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>