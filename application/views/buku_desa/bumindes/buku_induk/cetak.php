<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Buku Induk Penduduk | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
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
				<img src="<?= base_url('assets/img/logo/') . $n['logo_desa']; ?>" alt="" style="width:70px; height:auto">
				<h1>PEMERINTAH <?= strtoupper($n['nama_kabupaten']); ?> </h1>
				<h1>KECAMATAN <?= strtoupper($n['nama_kecamatan']); ?> </h1>
				<h1><?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h1>
				<div style="padding: 5px 20px;">
					<hr style="border-bottom: 2px solid #000000; height:0px;">
				</div>
				<h3 style="font-size: 14px;">BUKU INDUK PENDUDUK <?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h3>
			</div>
			<br>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
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
				<tbody>
					<?php
						$no=1;
						foreach($list_penduduk as $data) : 
					?>
					<tr class="data">
						 <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="23%">
                   <?= strtoupper($data->nama_penduduk); ?>
                  </td>
                  <td><?= strtoupper($data->sex); ?></td>
                  <td><?= strtoupper($data->status_kawin); ?></td>
                  <td><?= strtoupper($data->tempat_lahir); ?> , <?= strtoupper($data->tgl_lahir); ?></td>
                  <td><?= strtoupper($data->agama); ?></td>
                  <td><?= strtoupper($data->pendidikan_sedang); ?></td>
                  <td><?= strtoupper($data->pekerjaan); ?></td>
                  <td><?= strtoupper($data->status_warganegara); ?></td>
                  <td><?= strtoupper($data->alamat_sekarang); ?>, <?= strtoupper($data->dusun); ?></td>
                  <td><?= strtoupper($data->hubungan); ?></td>
                  <td><?= strtoupper($data->nik); ?></td>
                  <td><?= strtoupper($data->no_kk); ?></td>
                  <td><?= strtoupper($data->keterangan); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<table width="100%" cellpadding="3" cellspacing="4">
				 <?php $this->load->view('buku_desa/ttd_lengkap'); ?>
			</table>
		</div>
			<div id="aside"></div>
		</div>
        <?php endforeach; ?>
	<?php endforeach; ?>
	</body>
</html>
