<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Surat Keluar | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
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
				<img src="<?= base_url('assets/img/logo/') . $n['logo_desa']; ?>" alt="" style="width:100px; height:auto">
				<h1>PEMERINTAH <?= strtoupper($n['nama_kabupaten']); ?> </h1>
				<h1>KECAMATAN <?= strtoupper($n['nama_kecamatan']); ?> </h1>
				<h1><?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h1>
				<div style="padding: 5px 20px;">
					<hr style="border-bottom: 2px solid #000000; height:0px;">
				</div>
				<h3>DAFTAR SURAT KELUAR</h3>
			</div>
			<br>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="50">No</th>
					<th class="text-center" width='200'>No Surat</th>
					<th class="text-center" width='100'>Nama Surat</th>
					<th class="text-center" width='200'>Tanggal Surat</th>
					<th class="text-center" width='100'>Ditujukan Kepada</th>
					<th class="text-center" width='120'>Perihal</th>
				</tr>
				</thead>
				<tbody>
					<?php
						foreach($surat_keluar as $dt) : 
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= ++$start ?></td>
                        <td width="8%"><?= $dt->no_surat_kel; ?></td>
						<td><?= strtoupper($dt->nama_surat); ?></td>
						<td><?= tgl_indo($dt->tgl_surat); ?></td>
                        <td><?= strtoupper($dt->tujuan); ?></td>
						<td><?= strtoupper($dt->isi_singkat); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="50%"></td>
					<td width="25%" align="center"><?= strtoupper($n['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
					</tr>
					<td width="50%"></td>
					<td align="center" width="150">KEPALA <?= strtoupper($j['sebutan_desa']); ?> <?= strtoupper($n['nama_desa']); ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="50%"></td>
					<td width="25%" align="center" width="150"><u><?= strtoupper($n['nama_kepdes']); ?></u></td>
				</tr>
				<tr>
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
