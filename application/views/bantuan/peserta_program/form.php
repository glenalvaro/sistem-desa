<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
      Peserta Program Bantuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Bantuan</a></li>
        <li class="#">Peserta</li>
        <li class="active">Tambah Peserta</li>
      </ol>
    </section>

<?php foreach($detailProgram as $dp) : ?>
    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url('program_bantuan'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Program Bantuan</a>
                     <a href="<?= site_url('program_bantuan/list_peserta/') . $dp->id; ?>" class="btn btn-social btn-flat btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Rincian Program</a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian Program</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Sasaran Peserta</td>
                                    <td width="1">:</td>
                                    <td style="text-transform: uppercase;">
                                    <?php 

                                        if($dp->sasaran_program == 1){
                                                echo 'Penduduk Perorangan';
                                        } elseif ($dp->sasaran_program == 2) {
                                                echo 'Keluarga/KK';
                                        } else {
                                            echo 'Kelompok/Organisasi';
                                        }

                                         ?> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Program</td>
                                    <td>:</td>
                                    <td style="text-transform: uppercase;"><?= strtoupper($dp->nama_program); ?></td>
                                </tr>
                                <tr>
                                    <td>Masa Berlaku</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($dp->sdate); ?> - <?= tgl_indo($dp->edate); ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td style="font-size: 10px;"><?= strtoupper($dp->keterangan); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                <h5><b>Tambah Peserta Program</b></h5>
                <hr>
                  <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
                    <?php if($dp->sasaran_program == 1) : ?>
                      <div class="form-group">
                         <label class="col-sm-3">Cari NIK / Nama Penduduk</label>
                            <div class="col-sm-9">
                            <select name="no_nik" id="kelompok_penduduk" class="form-control" style="width: 100%;" onchange="this.form.submit()">
                                <option value="">NIK : <?= $nik; ?> - <?= $nama_penduduk; ?> -</option>
                                  <?php foreach($get_penduduk as $main) : ?>
                                    <option value="<?= $main->id; ?>">NIK : <?= $main->nik; ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
                                  <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                    <?php elseif($dp->sasaran_program == 2) : ?>
                      <div class="form-group">
                         <label class="col-sm-3">Cari NO.KK / Nama Keluarga</label>
                            <div class="col-sm-9">
                            <select name="nomor_kk" id="" class="form-control select2" style="width: 100%;" onchange="this.form.submit()">
                                <option value="">- Silakan Masukan No.KK / Nama Keluarga -</option>
                                  <?php foreach($list_kel as $main) : ?>
                                    <option value="<?= $main->no_kk; ?>">NO.KK:<?= $main->no_kk; ?> - NIK:<?= strtoupper($main->nik); ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
                                  <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                    <?php else : ?>
                    <div class="form-group">
                         <label class="col-sm-3">Cari Nama Kelompok / Nama Ketua Kelompok</label>
                            <div class="col-sm-9">
                            <select name="no_klompok" id="" class="form-control select2" style="width: 100%;" onchange="this.form.submit()" required>
                                <option value="">- Silakan Pilih Nama Kelompok / Nama Ketua Kelompok -</option>
                                  <?php foreach($list_klpk as $row) : ?>
                                    <option value="<?= $row->id; ?>">NAMA KELOMPOK : <?= strtoupper($row->nama_kelompok); ?> - KETUA KELOMPOK : <?= strtoupper($row->nama_ketua); ?></option>
                                  <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                    <?php endif; ?>
                 </form>
                 <hr>
                    <div class="col">
                        <div class="col-md-6">
                             <div class="box box-default">
                                <div class="box-header with-border">
                                    Detail Peserta
                                </div>
                                <div class="box-body">
                                <form class="form-horizontal">
                                    <?php if($dp->sasaran_program == 1) : ?>
                                    <div class="form-group">
                                        <label class="col-sm-5">NIK Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nik; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Nama Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nama_penduduk; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Alamat Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $alamat_sekarang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Tempat, Tgl Lahir Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $tempat_lahir; ?>, <?= $tgl_lahir; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Jenis Kelamin Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $sex; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Pendidikan Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $pendidikan_sedang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Warga Negara/Agama Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $status_warganegara; ?>/<?= $agama; ?>" disabled>
                                        </div>
                                    </div>
                                     <?php elseif($dp->sasaran_program == 2) : ?>
                                     <div class="form-group">
                                        <label class="col-sm-5">Nomor KK</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $no_kk; ?>" disabled>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-5">Nama Kepala Keluarga</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nama_penduduk; ?>" disabled>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-5">Status KK</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $hubungan; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">NIK Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nik; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Nama Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nama_penduduk; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Alamat Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $alamat_sekarang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Tempat, Tgl Lahir Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $tempat_lahir; ?>, <?= $tgl_lahir; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Jenis Kelamin Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $sex; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Pendidikan Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $pendidikan_sedang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Warga Negara/Agama Penduduk</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $status_warganegara; ?>/<?= $agama; ?>" disabled>
                                        </div>
                                    </div>
                                    <?php else : ?>
                                    <div class="form-group">
                                        <label class="col-sm-5">Nama Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nama_kelompok; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Nama Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $nama_penduduk; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Alamat Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $alamat_sekarang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Tempat, Tgl Lahir Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $tempat_lahir; ?>, <?= $tgl_lahir; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Jenis Kelamin Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $sex; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Pendidikan Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $pendidikan_sedang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Warga Negara/Agama Ketua Kelompok</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="<?= $wg_ketua; ?>/<?= $agama_ketua; ?>" disabled>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                   Identitas Kartu Peserta
                                </div>
                                <div class="box-body">
                                 <form id="mainform" action="" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="id_program" value="<?= $dp->id; ?>">
                                    <input type="hidden" name="id_anggota" value="<?= $id; ?>">
                                    <input type="hidden" name="id_sasaran" value="<?= $dp->sasaran_program; ?>">
                                    <input type="hidden" name="keterangan" value="<?= $status_dasar; ?>">
                                    <div class="form-group">
                                        <label class="col-sm-5">Nomor kartu Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="no_kartu" id="no_kartu" class="form-control input-sm required" value="" placeholder="Nomor Kartu Peserta">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Nama Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama_peserta" id="nama_peserta" class="form-control input-sm required" value="<?= $nama_penduduk; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-5">NIK Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nik_peserta" id="nik_peserta" class="form-control input-sm required" value="<?= $nik; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Tempat Lahir</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control input-sm required" value="<?= $tempat_lahir; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Tgl Lahir Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control input-sm required" value="<?= $tgl_lahir; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Jenis Kelamin Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="jk" id="jk" class="form-control input-sm required" value="<?= $sex; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Alamat Peserta</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="alamat_peserta" id="alamat_peserta" class="form-control input-sm required" value="<?= $dusun; ?>">
                                        </div>
                                    </div>
                                     <div class="box-footer">
                                        <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
  	  </div>
  	</div>
 </section>
<?php endforeach; ?>
</div>