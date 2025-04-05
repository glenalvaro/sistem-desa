<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Peserta Bantuan | <?= $j['sebutan_desa'] ?> <?= $n['nama_desa'] ?>
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
				<h1>PEMERINTAH <?= strtoupper($j['sebutan_kabupaten']); ?> <?= strtoupper($n['nama_kabupaten']); ?> </h1>
				<h1>KECAMATAN <?= strtoupper($n['nama_kecamatan']); ?> </h1>
				<h1><?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h1>
				<div style="padding: 5px 20px;">
					<hr style="border-bottom: 2px solid #000000; height:0px;">
				</div>
			</div>
			<h3 align="center">DAFTAR PESERTA BANTUAN <?= strtoupper($nama_program); ?></h3>
			<br>
            <table>
					<tr>
						<td width="20%"><strong>Nama Program</strong></td>
						<td> :  <?= strtoupper($nama_program); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Asal Dana</strong></td>
						<td> : <?= $asal_dana; ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Periode Program</strong></td>
						<td> : <?= tgl_indo($sdate); ?> - <?= tgl_indo($edate); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Keterangan</strong></td>
						<td> : <?= $keterangan; ?></td>
					</tr>
			</table>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="50">No</th>
					<th class="text-center" width='180'>Nomor Kartu Peserta</th>
					<th class="text-center" width='100'>NIK Peserta</th>
					<th class="text-center" width='200'>Nama Peserta</th>
					<th class="text-center" width='100'>Jenis Kelamin</th>
					<th class="text-center" width='120'>Tempat/Tgl Lahir</th>
					<th class="text-center" width='120'>Alamat</th>
					<th class="text-center" width='120'>Ket.</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach($anggota_list as $data) : 
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= $no++; ?></td>
                        <td width="8%"><?= $data->no_kartu; ?></td>
						<td><?= $data->nik_peserta; ?></td>
						<td><?= strtoupper($data->nama_peserta); ?></td>
						<td><?= $data->jk; ?></td>
                        <td><?= strtoupper($data->tmp_lahir); ?>/<?= $data->tgl_lahir; ?></td>
						<td><?= strtoupper($data->alamat_peserta); ?></td>
						<td nowrap><?= $data->keterangan; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<table width="100%" cellpadding="3" cellspacing="4">
				 <?php $this->load->view('buku_desa/ttd_single'); ?>
			</table>
		</div>
			<div id="aside"></div>
		</div>
        <?php endforeach; ?>
	<?php endforeach; ?>
	</body>
</html>
