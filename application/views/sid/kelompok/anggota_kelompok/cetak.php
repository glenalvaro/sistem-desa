<html>
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Anggota Kelompok | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
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
				<h3>DAFTAR ANGGOTA KELOMPOK <?= strtoupper($nama_kelompok); ?></h3>
			</div>
			<br>
            <table>
					<tr>
						<td width="13%"><strong>Nama Kelompok</strong></td>
						<td> : <?= $nama_kelompok; ?></td>
					</tr>
					<tr>
						<td width="13%"><strong>Ketua Kelompok</strong></td>
						<td> : <?= $nama_ketua; ?></td>
					</tr>
					<tr>
						<td width="13%"><strong>Kategori Kelompok</strong></td>
						<td> : <?= $nama_kategori; ?></td>
					</tr>
					<tr>
						<td width="13%"><strong>Keterangan</strong></td>
						<td> : <?= $deskripsi_kelompok; ?></td>
					</tr>
			</table>
			<table class="border thick ">
				<thead>
				<tr class="border thick">
					<th class="text-center" width="50">No</th>
					<th class="text-center" width='180'>No Anggota</th>
					<th class="text-center" width='100'>NIK</th>
					<th class="text-center" width='100'>Nama Lengkap</th>
					<th class="text-center" width='100'>Jenis Kelamin</th>
					<th class="text-center" width='120'>Tempat/Tgl Lahir</th>
					<th class="text-center" width='120'>Alamat</th>
					<th class="text-center" width='120'>Jabatan</th>
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
                        <td width="8%"><?= $data->no_anggota; ?></td>
						<td><?= $data->nik_anggota; ?></td>
						<td><?= strtoupper($data->anggota_nama); ?></td>
						<td><?= $data->anggota_sex; ?></td>
                        <td><?= strtoupper($data->tempat_lahir); ?>/<?= $data->tgl_lahir; ?></td>
						<td><?= strtoupper($data->wilayah_anggota); ?></td>
						<td><?= $data->nama_jabatan; ?></td>
						<td nowrap><?= $data->keterangan; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<?php $get_perangkat = ttd_perangkat(); ?>
			<?php foreach($get_perangkat as $main): ?>
			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="25%"></td>
					<td width="50%"></td>
					<td width="25%" align="center"><?= strtoupper($n['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
					</tr>
					<td width="25%" align="center">KETUA KELOMPOK</td>
					<td width="50%"></td>
					<td align="center" width="150"><?= strtoupper($main->jabatan); ?> <?= strtoupper($n['nama_desa']); ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%" align="center"><u><?= strtoupper($nama_ketua); ?></u></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150"><u><?= strtoupper($main->nama_pegawai); ?></u></td>
				</tr>
				<tr>
					<td width="25%" align="center">NIK. </td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150">NIP. <?= strtoupper($main->nip); ?></td>
				</tr>
			</table>
		<?php endforeach; ?>
		</div>
			<div id="aside"></div>
		</div>
        <?php endforeach; ?>
	<?php endforeach; ?>
	</body>
</html>
