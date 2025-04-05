<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Buku Inventaris | <?= $j['sebutan_desa'] ?> <?= $n['nama_desa'] ?>
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
				<img src="<?= base_url('assets/img/logo/') . $n['logo_desa']; ?>" alt="" style="width:70px; height:auto; margin-bottom: 10px;">
				<h1>PEMERINTAH <?= strtoupper($j['sebutan_kabupaten']); ?> <?= strtoupper($n['nama_kabupaten']); ?> </h1>
				<h1>KECAMATAN <?= strtoupper($n['nama_kecamatan']); ?> </h1>
				<h1><?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h1>
				<div style="padding: 5px 20px;">
					<hr style="border-bottom: 2px solid #000000; height:0px;">
				</div>
				<h3>DAFTAR INVENTARIS <?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h3>
			</div>
			<br>
			<table class="border thick ">
			 <thead style="font-size: 10px;">
             <tr>
                <th rowspan="2" class="padat" style="min-width:10px;">No</th>
                <th rowspan="2" class="padat" style="min-width:150px;">Jenis Barang</th>
                <th rowspan="2" class="padat" style="min-width:100px;">Kode Barang</th>
                <th rowspan="2" class="padat" style="min-width:150px;">Identitas Barang</th>
                <th colspan="3" style="text-align: center;">Asal Usul Barang</th>
            </tr>
             <tr>
                <th style="min-width:30px;">APB Desa/Kelurahan (Rp.)</th>
                <th style="min-width:30px;">Perolehan Lain Yang Sah (Rp.)</th>
                <th style="min-width:30px;">Kekayaan Asli Desa/Kelurahan (Rp.)</th>
                <th style="min-width:100px;">Tanggal Perolehan/Pembelian</th>
                <th style="min-width:100px;">KET.</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php
                $no=1;
                foreach ($inventaris_list as $data) : ?>
            <tr>
    			<td nowrap="" width="5px"><?= $no++; ?></td>
    			<td nowrap="" width="100px"><?= $data->jenis_barang; ?></td>
    			<td nowrap=""><?= $data->kode_barang; ?></td>
    			<td nowrap=""><?= $data->identitas_barang; ?></td>
    			<td nowrap=""><?= $data->apb_desa; ?></td>
    			<td nowrap=""><?= $data->perolehan_lain; ?></td>
                <td nowrap=""><?= $data->kekayaan_desa; ?></td>
                <td nowrap=""><?= tgl_indo($data->tgl_perolehan); ?></td>
                <td nowrap=""><?= $data->keterangan; ?></td>
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
