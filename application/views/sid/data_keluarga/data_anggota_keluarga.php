<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Daftar Anggota Keluarga
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Keluarga</a></li>
        <li class="active">Anggota Keluarga</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url("data_keluarga/form_peristiwa/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Anggota</a>

                    <a href="<?= site_url("data_keluarga/kartu_keluarga/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Kartu Keluarga</a>

                    <a href="<?= site_url('data_keluarga'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Keluarga</a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian Keluarga</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Nomor Kartu Keluarga (KK)</td>
                                    <td width="1%">:</td>
                                    <td><?= $no_kk; ?></td>
                                </tr>
                                <tr>
                                    <td>Kepala Keluarga</td>
                                    <td>:</td>
                                    <td style="text-transform: uppercase;"><?= $nama_penduduk; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>RT 000 / RW 000 - <?= $dusun; ?></td>
                                </tr>
                                <tr>
                                    <td>Program Bantuan</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5><b>Daftar Anggota Keluarga</b></h5>
                    <div class="table-responsive">
                    <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
								<thead class="bg-gray disabled color-palette" style="font-size: 10px;">
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tanggal Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Hubungan</th>
									</tr>
								</thead>
								<tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($anggota_list as $data) : ?>
									<tr>
										<td class="padat"><?= $no++; ?></td>
										<td class="aksi">
											<a href="<?= site_url('data_penduduk/update/'.$data->id) ?>" class="btn bg-orange btn-flat btn-sm" title="Ubah Biodata Penduduk"><i class="fa fa-edit"></i></a>
											<a href="" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Keluarga" title="Ubah Hubungan Keluarga" class="btn bg-navy btn-flat btn-sm"><i class='fa fa-link'></i></a>
										</td>
										<td><?= $data->nik; ?></td>
										<td nowrap width="45%"><?= set_ucwords($data->nama_penduduk); ?></td>
										<td nowrap><?= $data->tgl_lahir; ?></td>
										<td><?= set_ucwords($data->sex); ?></td>
										<td nowrap><?= set_ucwords($data->hubungan); ?></td>
									</tr>
                                    <?php endforeach; ?>
								</tbody>
							</table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
  	  </div>
  	</div>
  </form>
 </section>
</div>