<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Salinan Kartu Keluarga
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Keluarga</a></li>
        <li class="active">Kartu Keluarga</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a target="_blank" href="<?= site_url("data_keluarga/cetak_kk_anggota/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                    <a href="" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                    <a href="<?= site_url("data_keluarga/anggota_keluarga/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Anggota Keluarga</a>

                    <a href="<?= site_url('data_keluarga'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Keluarga</a>
                </div>
                <div class="box-header">
					<h3 class="text-center"><strong>SALINAN KARTU KELUARGA</strong></h3>
					<h5 class="text-center"><strong>No.  <?= $no_kk; ?> </strong></h5>
				</div>
                <div class="box-body">
                    <div class="row" style="text-transform: uppercase;">
						<div class="col-sm-8">
							<div class="form-group">
							<label class="col-sm-3 control-label">ALAMAT</label>
							    <div class="col-sm-8">
								    <p class="text-muted">: <?= $dusun; ?></p>
							    </div>
						    </div>
                         <div class="form-group">
							<label class="col-sm-3 control-label">RT/RW</label>
								<div class="col-sm-9">
									<p class="text-muted">: 001 / -</p>
								</div>
						</div>
						<?php foreach ($desa as $main) : ?>
						<div class="form-group">
							<label class="col-sm-3 control-label">DESA / KELURAHAN</label>
								<div class="col-sm-9">
									<p class="text-muted">: <?= $main['nama_desa']; ?></p>
								</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-3 control-label">KECAMATAN</label>
							    <div class="col-sm-9">
								    <p class="text-muted">: <?= $main['nama_kecamatan']; ?></p>
							    </div>
						</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-5 control-label">KABUPATEN / KOTA</label>
								<div class="col-sm-7">
									<p class="text-muted">: <?= $main['nama_kabupaten']; ?></p>
								</div>
							</div>
						    <div class="form-group">
								<label class="col-sm-5 control-label">KODE POS</label>
								<div class="col-sm-7">
									<p class="text-muted">: <?= $main['kode_pos']; ?></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">PROVINSI</label>
								<div class="col-sm-7">
									<p class="text-muted">: <?= $main['nama_provinsi']; ?></p>
								</div>
							</div>
							<div class="form-group">
							<label class="col-sm-5 control-label">JUMLAH ANGGOTA</label>
								<div class="col-sm-7">
									<p class="text-muted">: 
										<?php 
										 $query = $this->db->query("SELECT * FROM data_penduduk where no_kk=$no_kk");
										 $hasil = $query->num_rows();
										?>
										<?= $hasil; ?>
									</p>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
                        <!-- end box body -->
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead class="bg-gray color-palette" style="font-size: 11px;">
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Nama Lengkap</th>
											<th class="text-center">NIK</th>
											<th class="text-center">Jenis Kelamin</th>
											<th class="text-center">Tempat Lahir</th>
											<th class="text-center">Tanggal Lahir</th>
											<th class="text-center">Agama</th>
											<th class="text-center">Pendidikan</th>
											<th class="text-center">Jenis Pekerjaan</th>
											<th class="text-center">Golongan Darah</th>
										</tr>
										</thead>
										<tbody>
										 <?php 
                                    	 $no = 1;
                                    	 foreach($list_anggota_kk as $data) : ?>
										<tr>
											<td class="text-center"><?= $no++; ?></td>
											<td><?= strtoupper($data->nama_penduduk); ?></td>
											<td><?= $data->nik; ?></td>
											<td><?= $data->sex; ?></td>
											<td><?= strtoupper($data->tempat_lahir); ?></td>
											<td><?= $data->tgl_lahir; ?></td>
											<td><?= $data->agama; ?></td>
											<td><?= $data->pendidikan_kk; ?></td>
											<td><?= $data->pekerjaan; ?></td>
											<td><?= $data->darah_golongan; ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered table-hover ">
									<thead class="bg-gray disabled color-palette">
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Status Perkawinan</th>
											<th class="text-center">Tanggal Perkawinan</th>
											<th class="text-center">Status Hubungan Dalam Keluarga</th>
											<th class="text-center">Kewarganegaraan</th>
											<th class="text-center">No. Paspor</th>
											<th class="text-center">No. KITAS / KITAP</th>
											<th class="text-center">Nama Ayah</th>
											<th class="text-center">Nama Ibu</th>
										</tr>
										</thead>
										<tbody>
											<?php 
                                    	 	$no = 1;
                                    		 foreach($list_anggota_kk as $data) : ?>
										<tr>
											<td class="text-center" ><?= $no++; ?></td>
											<td><?= $data->status_kawin; ?></td>
											<td class="text-center">-</td>
											<td><?= $data->hubungan; ?></td>
											<td><?= $data->status_warganegara; ?></td>
											<td><?= $data->dokumen_paspor; ?></td>
											<td><?= $data->dokumen_kitas; ?></td>
											<td><?= strtoupper($data->nama_ayah); ?></td>
											<td><?= strtoupper($data->nama_ibu); ?></td>
										</tr>
										<?php endforeach ?>					
									</tbody>
								</table>
							</div>
						 </div>
					</div>
					<div class="table-responsive">
						<?php $get_perangkat = ttd_perangkat(); ?>
						<?php foreach($get_perangkat as $main): ?>
						<table class="table no-border">
							<tbody>
							<?php foreach ($desa as $value) : ?>
								<tr>
									<td width="25%">&nbsp;</td>
									<td width="50%">&nbsp;</td>
									<td class="text-center" width="25%"><?= $value['nama_desa']; ?>, <?= tgl_indo(date('Y m d'))?></td>
								</tr>
								<?php foreach ($setting as $data) : ?>
								<tr>
									<td class="text-center">KEPALA KELUARGA</td>
									<td>&nbsp;</td>
									<td class="text-center"><?= strtoupper($main->jabatan); ?> <?= strtoupper($value['nama_desa']); ?></td>
								</tr>
								<?php endforeach; ?>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
								<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
								<tr>
									<td class="text-center"><?= strtoupper($kepala_kk); ?></td>
									<td width="50%">&nbsp;</td>
									<td class="text-center"><?= strtoupper($main->nama_pegawai); ?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
						<?php endforeach; ?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>