
<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Data Kelompok | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
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
				<h3>DATA KELOMPOK <?= strtoupper($j['sebutan_desa'] . ' ' . $n['nama_desa']); ?></h3>
			</div>
			<br>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="7">No</th>
					<th class="text-center" width='180'>Kode Kelompok</th>
					<th class="text-center" width='100'>Nama Kelompok</th>
					<th class="text-center" width='100'>Ketua Kelompok</th>
					<th class="text-center" width='100'>Kategori Kelompok</th>
					<th class="text-center" width='120'>Jumlah Anggota</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach($list_kelompok as $data) : 
					?>
					<tr class="data">
						<td class="text-center" width="2"><?= $no++; ?></td>
                        <td width="5%"><?= $data->kode_kelompok; ?></td>
						<td><?= strtoupper($data->nama_kelompok); ?></td>
						<td><?= strtoupper($data->nama_ketua); ?></td>
						<td><?= strtoupper($data->nama_kategori); ?></td>
						<td>
						<?php 
                      	//hitung jumlah anggota kelompok
							$query = $this->db->query("SELECT * FROM anggota_kelompok where id_kelompok=$data->id");
							$jml = $query->num_rows();
						?>
							<?= $jml; ?>
						</td>
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
