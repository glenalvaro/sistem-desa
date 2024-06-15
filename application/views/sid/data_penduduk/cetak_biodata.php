<!DOCTYPE html>
<html>
<head>
<?php foreach($setting as $s) : ?>
  	<?php foreach($desa as $p) : ?>
	<title>
   		Cetak Biodata Penduduk | <?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/960.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/print-preview.css" type="text/css" media="screen">
	<link href="<?= base_url()?>assets/custom/surat.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url()?>assets/lib/print/css/print.css" type="text/css" media="print" />
	<link rel="icon" href="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>">
	<script src="<?= base_url()?>assets/lib/print/js/jquery.tools.min.js"></script>
	<script src="<?= base_url()?>assets/lib/print/js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript">
			$(function()
			{
				$("#feature > div").scrollable({interval: 2000}).autoscroll();

				$('#aside').prepend('<a class="print-preview">Cetak </a>');
				$('a.print-preview').printPreview();

				//$(document).bind('keydown', function(e) {
				var code = 80;
				//if (code == 80 && !$('#print-modal').length) {
				$.printPreview.loadPrintPreview();
				//return false;
				//}
				//});
			});
		</script>
</head>
<body>
	<div id="content" class="container_12 clearfix">
		<div id="content-main" class="grid_7">
			<table width="100%" style="border: solid 0px black; text-align: left; margin-bottom: -15px;">
				<tr>
					<td width="8%">NIK</td>
					<td width="2%">:</td>
					<td width="90%"><?= $penduduk['nik'] ?></td>
				</tr>
				<tr>
					<td width="8%">No.KK</td>
					<td width="2%">:</td>
					<td width="90%"><?= $penduduk['no_kk'] ?></td>
				</tr>
			</table>
			<table width="100%" style="border: solid 0px black; text-align: center;">
					<tr>
						<td align="center"><img style="width: 15%;" src="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>" alt="<?= $p['nama_desa']?>"  class="logo_mandiri">
					</tr>
					<tr>
						<td>
							<h3>BIODATA PENDUDUK WARGA NEGARA INDONESIA</h3>
							<h5>Kab. <?= $p['nama_kabupaten']?>, Kec. <?= $p['nama_kecamatan']?>, <?= $s['sebutan_desa'] ?>. <?= $p['nama_desa']?></h5>
						</td>
					</tr>
			</table>
			<table width="100%" style="border: solid 0px black; padding: 10px;">
					<tr>
						<td><b>DATA PERSONAL</b></td>
					</tr>
					<tr>
						<td width="220">Nama Lengkap</td><td width="2%">:</td>
						<td><?= strtoupper($penduduk['nama_penduduk'])?> </td>
						<td rowspan="18" style="vertical-align: top;">
							<?php if ($penduduk['foto']): ?>
								<img class="pas_foto" src="<?= AmbilFoto($penduduk['foto'], '', $penduduk['jenis_kelamin'])?>" alt="<?= $penduduk['foto']; ?>" style="width: 100%; max-width: 150px; height: auto; border: solid 2px black;"/>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td><td >:</td>
						<td><?= strtoupper($penduduk['tempat_lahir'])?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td><td >:</td>
						<td><?= strtoupper($penduduk['tgl_lahir'])?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td >:</td>
						<td><?= strtoupper($penduduk['sex'])?></td>
					</tr>
					<tr>
						<td>Agama</td><td >:</td>
						<td><?= strtoupper($penduduk['agama'])?></td>
					</tr>
					<tr>
						<td>Pendidikan Terakhir</td><td >:</td>
						<td><?= strtoupper($penduduk['pendidikan_kk'])?></td>
					</tr>
					<tr>
						<td>Pekerjaan</td><td >:</td>
						<td><?= strtoupper($penduduk['pekerjaan'])?></td>
					</tr>
					<tr>
						<td>Golongan Darah</td><td>:</td>
						<td><?= strtoupper($penduduk['darah_golongan'])?></td>
					</tr>
					<tr>
						<td>Status Kawin</td><td >:</td>
						<td><?= strtoupper($penduduk['status_kawin'])?></td>
					</tr>
					<tr>
						<td>Hubungan dalam Keluarga</td><td >:</td>
						<td><?= strtoupper($penduduk['hubungan'])?></td>
					</tr>
					<tr>
						<td>Warga Negara</td><td >:</td>
						<td><?= strtoupper($penduduk['status_warganegara'])?></td>
					</tr>
					<tr>
						<td>Suku/Etnis</td><td >:</td>
						<td><?= strtoupper($penduduk['suku_penduduk'])?></td>
					</tr>
					<tr>
						<td>NIK Ayah</td><td >:</td>
						<td><?= strtoupper($penduduk['nik_ayah'])?></td>
					</tr>
					<tr>
						<td>Nama Ayah</td><td >:</td>
						<td><?= strtoupper($penduduk['nama_ayah'])?></td>
					</tr>
					<tr>
						<td>NIK Ibu</td><td >:</td>
						<td><?= strtoupper($penduduk['nik_ibu'])?></td>
					</tr>
					<tr>
						<td>Nama Ibu</td><td >:</td>
						<td><?= strtoupper($penduduk['nama_ibu'])?></td>
					</tr>
					<tr>
						<td>Status Kependudukan</td><td >:</td>
						<td><?= strtoupper($penduduk['status'])?></td>
					</tr>
					<tr>
						<td>Nomor Telpon/HP</td><td >:</td>
						<td><?= $penduduk['no_telepon']?></td>
					</tr>
					<tr>
						<td>Alamat Email</td><td >:</td>
						<td><?= $penduduk['email']?></td>
					</tr>
					<tr>
						<td>Alamat</td><td >:</td>
						<td><?= strtoupper($penduduk['alamat_sekarang'])?><br>
							<?= ucwords($p['sebutan_dusun'])?> <?= $penduduk['dusun'] ?>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="padding-top: 15px;"><strong>DATA KEPEMILIKAN DOKUMEN</strong></td>
					</tr>
					<tr>
						<td>Nomor Kartu Keluarga (No.KK)</td><td >:</td>
						<td><?= $penduduk['no_kk']?></td>
					</tr>
					<tr>
						<td>Dokumen Paspor</td><td >:</td>
						<td><?= $penduduk['dukumen_paspor']?></td>
					</tr>
					<tr>
						<td>Dokumen Kitas</td><td >:</td>
						<td><?= $penduduk['dukumen_kitas']?></td>
					</tr>
					<tr>
						<td>Nomor BPJS Ketenagakerjaan</td><td >:</td>
						<td><?= $penduduk['bpjs_ketenagakerjaan']?></td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" scope="col" width="40%">Yang Bersangkutan</td>
						<td align="center" scope="col" width="10%">&nbsp;</td>
						<td align="center" scope="col" width="50%"><?= ucwords($p['sebutan_desa'] . ' ' . $p['nama_desa']) . ', ' . tgl_indo(date('Y m d'))?></td>
					</tr>
					<tr>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center">Kepala Desa <?= ucwords($p['nama_desa']); ?></td>
					</tr>
					<tr>
						<td align="center" colspan="3" height="90px">&nbsp;</td>
					</tr>
					<tr>
						<td align="center"><b>( <?= strtoupper($penduduk['nama_penduduk'])?> )</b></td>
						<td align="center">&nbsp;</td>
						<td align="center"><b>( <?= $p['nama_kepdes']?> )</b></td>
					</tr>
				</table>
				<br>
		</div>
		<div id="aside">
			</div>
	</div>
	<?php endforeach; ?>
<?php endforeach; ?>
</body>
</html>