<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php foreach($setting as $s) : ?>
  <?php foreach($desa as $p) : ?>
<title>
   Cetak Data Penduduk | <?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>">
	<link href="<?= base_url()?>assets/custom/report.css" rel="stylesheet" type="text/css">
	<!-- TODO: Pindahkan ke external css -->
	<style>
		.textx
		{
		  mso-number-format:"\@";
		}
		td,th
		{
		  font-size:6.5pt;
		  mso-number-format:"\@";
		}
	</style>
	</head>
	<body>
		<div id="container">
			<!-- Print Body -->
			<div id="body">
				<div class="header" align="center">
					<label align="left">Desa : <?= $p['sebutan_desa'] ?> Kec. : <?= $p['nama_kecamatan'] ?> Kab. : <?= $p['nama_kabupaten'] ?></label>
					<h3> DATA PENDUDUK </h3>
				</div>
				<br>
				<table class="border thick">
					<thead>
						<tr class="border thick">
							<th>No</th>
							<th>No. KK</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th><?= $s['sebutan_dusun'] ?></th>
							<th>Jenis Kelamin</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Agama</th>
							<th>Pendidikan (dlm KK)</th>
							<th>Pekerjaan</th>
							<th>Kawin</th>
							<th>Hub. Keluarga</th>
							<th>Nama Ayah</th>
							<th>Nama Ibu</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1; 
						foreach ($data_penduduk as $data): ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data->no_kk; ?></td>
							<td><?= $data->nik; ?></td>
							<td><?= strtoupper($data->nama_penduduk)?></td>
							<td><?= strtoupper($data->alamat_sekarang)?></td>
							<td><?= strtoupper($data->dusun)?></td>
							<td><?= $data->sex; ?></td>
							<td><?= $data->tempat_lahir; ?></td>
							<td><?= $data->tgl_lahir; ?></td>
							<td><?= $data->agama; ?></td>
							<td><?= $data->pendidikan_kk; ?></td>
							<td><?= $data->pekerjaan; ?></td>
							<td><?= $data->status_kawin; ?></td>
							<td><?= $data->hubungan; ?></td>
							<td><?= $data->nama_ayah; ?></td>
							<td><?= $data->nama_ibu; ?></td>
							<td><?php if ($data->status_penduduk_id == 1): ?>Tetap<?php else: ?>Pendatang<?php endif; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
   		<label>Tanggal cetak : &nbsp; </label>
			 <?= tgl_indo(date('Y m d'))?>
		</div>
	</body>
	<?php endforeach; ?>
<?php endforeach; ?>
</html>
