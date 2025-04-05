<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Dokumentasi Pembangunan | <?= $j['sebutan_desa'] ?> <?= $n['nama_desa'] ?>
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
				<h3>DOKUMENTASI <?= strtoupper($nama_kegiatan); ?></h3>
			</div>
			<br>
            <table>
			 <tr>
                 <td width="20%">Nama Kegiatan</td>
                 <td width="1%">:</td>
                 <td><?= set_ucwords($nama_kegiatan); ?></td>
             </tr>
             <tr>
             	<td>Alamat</td>
             	<td>:</td>
             	<td><?= set_ucwords($lokasi_pembangunan); ?></td>
             </tr>
             <tr>
             	<td>Sumber Dana</td>
             	<td>:</td>
             	<td><?= set_ucwords($sumber_dana); ?></td>
             </tr>
             <tr>
             	<td>Anggaran</td>
             	<td>:</td>
             	<td><?= rupiah($total_anggaran) ?></td>
             </tr>
             <tr>
             	<td>Volume</td>
             	<td>:</td>
             	<td><?= set_ucwords($volume) ?></td>
             </tr>
             <tr>
             	<td>Pelaksana</td>
             	<td>:</td>
             	<td><?= set_ucwords($pelaksana_kegiatan) ?></td>
             </tr> 
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= set_ucwords($tahun_anggaran) ?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?= set_ucwords($keterangan); ?></td>
              </tr>
			</table>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="10">No</th>
					<th class="text-center" width='200'>Presentase Pembangunan</th>
					<th class="text-center" width='100'>Tanggal Rekam</th>
					<th class="text-center" width='200'>Ket.</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach($get_data_dok as $data) : 
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= $no++; ?></td>
                        <td width="30%"><?= $data->presentase; ?></td>
						<td><?= tgl_indo($data->tgl_rekam); ?></td>
						<td><?= $data->ket; ?></td>
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
