
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
				<img src="<?= base_url('assets/img/logo/') . $n['logo_desa']; ?>" alt="" style="width:100px; height:auto">
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
						<td><?= strtoupper($data->ketua_kelompok); ?></td>
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
				<tr>
					<td width="25%"></td>
					<td width="50%"></td>
					<td width="25%" align="center"><?= strtoupper($n['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
					</tr>
					<td width="25%" align="center">KETUA KELOMPOK</td>
					<td width="50%"></td>
					<td align="center" width="150">KEPALA <?= strtoupper($j['sebutan_desa']); ?> 
					<?= strtoupper($n['nama_desa']); ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%" align="center"><u>........</u></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150"><u><?= strtoupper($n['nama_kepdes']); ?></u></td>
				</tr>
				<tr>
					<td width="25%" align="center">NIP.</td>
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
