
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Kartu Keluarga | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
	</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/960.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/print-preview.css" type="text/css" media="screen">
	<link href="<?= base_url()?>assets/custom/surat.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/print.css" type="text/css" media="print" />
	<link rel="icon" href="<?= base_url('assets/img/logo/') . $n['logo_desa']; ?>">
	<script src="<?= base_url()?>assets/lib/print/js/jquery.tools.min.js"></script>
	<script src="<?= base_url()?>assets/lib/print/js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function()
		{
			$("#feature > div").scrollable({interval: 2000}).autoscroll();
			$('#aside').prepend('<a class="print-preview">Cetak </a>');
			$('a.print-preview').printPreview();
			var code = 80;
			$.printPreview.loadPrintPreview();
		});
	</script>
	</head>
	<style type="text/css">
		#body
		{
			page-break-after: always;
		}
	</style>
	<body>
		<div id="container">
			<link href="<?= base_url()?>assets/lib/print/report.css" rel="stylesheet" type="text/css">
		<div id="body">
			<div align="center">
				<h3>KARTU KELUARGA</h3>
				<h4>SALINAN</h4>
				<h5>No. <?= $no_kk; ?> </h4>
			</div>
			<br>
			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="100">Kepala Keluarga</td>
					<td width="600">: <?= strtoupper($kepala_kk); ?></td>
					<td width="160">Kecamatan</td>
					<td width="150">: <?= strtoupper($n['nama_kecamatan']); ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?= strtoupper($dusun); ?> </td>
					<td>Kabupaten/Kota</td>
					<td>: <?= strtoupper($n['nama_kabupaten']); ?></td>
				</tr>
				<tr>
					<td>RT / RW</td>
					<td>: 000 / -</td>
					<td>Kode Pos</td>
					<td>: <?= $n['kode_pos']; ?></td>
				</tr>
				<tr>
					<td>Kelurahan/Desa</td>
					<td>: <?= strtoupper($n['nama_desa']); ?></td>
					<td>Provinsi</td>
					<td>: <?= strtoupper($n['nama_provinsi']); ?></td>
				</tr>
			</table>
			<br>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="7">No</th>
					<th class="text-center" width='180'>Nama</th>
					<th class="text-center" width='100'>NIK</th>
					<th class="text-center" width='100'>Jenis Kelamin</th>
					<th class="text-center" width='100'>Tempat Lahir</th>
					<th class="text-center" width='120'>Tanggal Lahir</th>
					<th class="text-center" width='100'>Agama</th>
					<th class="text-center" width='100'>Pendidikan</th>
					<th class="text-center" width='100'>Pekerjaan</th>
					<th class="text-center" width='70'>Golongan darah</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach($list_kk as $data) : 
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= $no++; ?></td>
						<td><?= strtoupper($data->nama_penduduk); ?></td>
						<td><?= $data->nik; ?></td>
						<td><?= $data->sex; ?></td>
						<td><?= strtoupper($data->tempat_lahir); ?></td>
						<td><?= $data->tgl_lahir; ?></td>
						<td><?= $data->agama; ?></td>
						<td><?= $data->pendidikan_kk; ?></td>
						<td><?= $data->pekerjaan; ?></td>
						<td align="center"><?= $data->darah_golongan; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<table class="border thick ">
				<thead>
					<tr class="border thick">
						<th class="text-center" width="7">No</th>
						<th class="text-center" width='150'>Status Perkawinan</th>
						<th class="text-center" width='150'>Tanggal Perkawinan</th>
						<th class="text-center" width="130">Tanggal Perceraian</th>
						<th class="text-center" width='240'>Status Hubungan dalam Keluarga</th>
						<th class="text-center" width='140'>Kewarganegaraan</th>
						<th class="text-center" width='100'>No. Paspor</th>
						<th class="text-center" width='100'>No. KITAS / KITAP</th>
						<th class="text-center" width='170'>Nama Ayah</th>
						<th class="text-center" width='170'>Nama Ibu</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					 	$no=1;
					 	foreach($list_kk as $data) :
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= $no++; ?></td>
						<td><?= $data->status_kawin; ?></td>
						<td class="text-center">-</td>
						<td class="text-center">-</td>
						<td><?= $data->hubungan; ?></td>
						<td><?= $data->status_warganegara; ?></td>
						<td><?= $data->dokumen_paspor; ?></td>
						<td><?= $data->dokumen_kitas; ?></td>
						<td><?= strtoupper($data->nama_ayah); ?></td>
						<td><?= strtoupper($data->nama_ibu); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="25%"></td>
					<td width="50%"></td>
					<td width="25%" align="center"><?= strtoupper($n['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
					</tr>
					<td width="25%" align="center">KEPALA KELUARGA</td>
					<td width="50%"></td>
					<td align="center" width="150">KEPALA <?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%" align="center"><u><?= strtoupper($kepala_kk); ?></u></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150"><u><?= strtoupper($n['nama_kepdes']); ?></u></td>
				</tr>
				<tr>
					<td width="25%" align="center"></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150">NIP. <?= strtoupper($n['nip_kepdes']); ?></td>
				</tr>
			</table>
		</div>
			<div id="aside"></div>
		</div>
        <?php endforeach; ?>
	<?php endforeach; ?>
	</body>
</html>
