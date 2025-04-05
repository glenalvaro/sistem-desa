<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Arsip Surat | <?= $j['sebutan_desa'] ?> <?= $n['nama_desa'] ?>
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
				<br>
				<h4>ARSIP LAYANAN SURAT</h4>
			</div>
			<br>
			<table class="border thick">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>No</th>
        		<th>No Surat</th>
        		<th style="min-width:100px;">Jenis Surat</th>
                <th style="min-width:100px;">Pemohon</th>
                <th style="min-width:100px;">Tanggal</th>
                <th style="min-width:100px;">Keterangan</th>
                <th style="min-width:100px;">Ditandatangani Oleh</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php $no = 1; 
                foreach($surat_arsip as $data) : ?>
            <tr>
			<td width="10px"><?= $no++; ?></td>
            <td style="text-align: center;"><?= $data->no_surat; ?></td>
            <td><?= strtoupper($data->nama_surat); ?></td>
            <td><?= strtoupper($data->pemohon); ?></td>
            <td><?= $data->tanggal; ?></td>
            <td>
            <?php 
                if(empty($data->keterangan)) {
                    echo "-";
                } else {
                    echo $data->keterangan;
                }
            ?>
            </td>
            <td><?= $data->pamong; ?></td>
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
