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
		$(function(){
			$("#feature > div").scrollable({interval: 2000}).autoscroll();
			$('#aside').prepend('<a class="print-preview">Cetak </a>');
			$('a.print-preview').printPreview();

			var code = 80;
			$.printPreview.loadPrintPreview();	
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
					<td width="90%"><?= $penduduk['nik_pend']; ?></td>
				</tr>
				<tr>
					<td width="8%">No.KK</td>
					<td width="2%">:</td>
					<td width="90%"><?= $data_pend->no_kk; ?></td>
				</tr>
			</table>
			<table width="100%" style="border: solid 0px black; text-align: center;">
					<tr>
						<td align="center"><img style="width: 7%;" src="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>" alt="<?= $p['nama_desa']?>"  class="logo_mandiri">
					</tr>
					<tr>
						<td>
							<h4>BIODATA PENDUDUK WARGA NEGARA INDONESIA</h4>
							<h5>Kab/Kota. <?= $p['nama_kabupaten']?>, Kec. <?= $p['nama_kecamatan']?>, <?= $s['sebutan_desa'] ?>. <?= $p['nama_desa']?></h5>
						</td>
					</tr>
			</table>
			<table width="100%" style="border: solid 0px black; padding: 10px;">
					<tr>
						<td><b>DATA PERSONAL</b></td>
					</tr>
					<tr>
						<td width="220">Nama Lengkap</td><td width="2%">:</td>
						<td><?= strtoupper($penduduk['nama_pend'])?> </td>
						<td rowspan="18" style="vertical-align: top;">
							<?php if ($data_pend->foto): ?>
								<img class="pas_foto" src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" style="width: 50%; max-width: 150px; height: auto; border: solid 2px black;"/>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td><td >:</td>
						<td><?= strtoupper($data_pend->tempat_lahir)?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td><td >:</td>
						<td><?= strtoupper($data_pend->tgl_lahir)?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td >:</td>
						<td><?= strtoupper($data_pend->sex)?></td>
					</tr>
					<tr>
						<td>Agama</td><td >:</td>
						<td><?= strtoupper($data_pend->agama)?></td>
					</tr>
					<tr>
						<td>Pendidikan Terakhir</td><td >:</td>
						<td><?= strtoupper($data_pend->pendidikan_kk)?></td>
					</tr>
					<tr>
						<td>Pekerjaan</td><td >:</td>
						<td><?= strtoupper($data_pend->pekerjaan)?></td>
					</tr>
					<tr>
						<td>Golongan Darah</td><td>:</td>
						<td><?= strtoupper($data_pend->darah_golongan)?></td>
					</tr>
					<tr>
						<td>Status Kawin</td><td >:</td>
						<td><?= strtoupper($data_pend->status_kawin)?></td>
					</tr>
					<tr>
						<td>Hubungan dalam Keluarga</td><td >:</td>
						<td><?= strtoupper($data_pend->hubungan)?></td>
					</tr>
					<tr>
						<td>Warga Negara</td><td >:</td>
						<td><?= strtoupper($data_pend->status_warganegara)?></td>
					</tr>
					<tr>
						<td>Suku/Etnis</td><td >:</td>
						<td><?= strtoupper($data_pend->suku_penduduk)?></td>
					</tr>
					<tr>
						<td>NIK Ayah</td><td >:</td>
						<td><?= strtoupper($data_pend->nik_ayah)?></td>
					</tr>
					<tr>
						<td>Nama Ayah</td><td >:</td>
						<td><?= strtoupper($data_pend->nama_ayah)?></td>
					</tr>
					<tr>
						<td>NIK Ibu</td><td >:</td>
						<td><?= strtoupper($data_pend->nik_ibu)?></td>
					</tr>
					<tr>
						<td>Nama Ibu</td><td >:</td>
						<td><?= strtoupper($data_pend->nama_ibu)?></td>
					</tr>
					<tr>
						<td>Status Kependudukan</td><td >:</td>
						<td><?= strtoupper($data_pend->status)?></td>
					</tr>
					<tr>
						<td>Nomor Telpon/HP</td><td >:</td>
						<td><?= $data_pend->no_telepon; ?></td>
					</tr>
					<tr>
						<td>Alamat Email</td><td >:</td>
						<td><?= $data_pend->email; ?></td>
					</tr>
					<tr>
						<td>Alamat</td><td >:</td>
						<td><?= strtoupper($data_pend->alamat_sekarang)?><br>
							<?= ucwords($p['sebutan_dusun'])?> <?= $data_pend->dusun; ?>
						</td>
					</tr>
					<tr>
						<td colspan="4" style="padding-top: 15px;"><strong>DATA KEPEMILIKAN DOKUMEN</strong></td>
					</tr>
					<tr>
						<td>Nomor Kartu Keluarga (No.KK)</td><td >:</td>
						<td><?= $data_pend->no_kk; ?></td>
					</tr>
					<tr>
						<td>Dokumen Paspor</td><td >:</td>
						<td><?= $data_pend->dukumen_paspor; ?></td>
					</tr>
					<tr>
						<td>Dokumen Kitas</td><td >:</td>
						<td><?= $data_pend->dukumen_kitas ?></td>
					</tr>
					<tr>
						<td>Nomor BPJS Ketenagakerjaan</td><td >:</td>
						<td><?= $data_pend->bpjs_ketenagakerjaan?></td>
					</tr>
				</table>
				<?php $get_perangkat = ttd_perangkat(); ?>
				<?php foreach($get_perangkat as $main): ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" scope="col" width="40%">Yang Bersangkutan</td>
						<td align="center" scope="col" width="10%">&nbsp;</td>
						<td align="center" scope="col" width="50%"><?= ucwords($p['sebutan_desa'] . ' ' . $p['nama_desa']) . ', ' . tgl_indo(date('Y m d'))?></td>
					</tr>
					<tr>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center"><?= ucwords($main->jabatan); ?> <?= ucwords($p['nama_desa']); ?></td>
					</tr>
					<tr>
						<td align="center" colspan="3" height="90px">&nbsp;</td>
					</tr>
					<tr>
						<td align="center"><b>( <?= strtoupper($penduduk['nama_pend'])?> )</b></td>
						<td align="center">&nbsp;</td>
						<td align="center"><b>( <?= ucwords($main->nama_pegawai); ?> )</b></td>
					</tr>
				</table>
				<?php endforeach; ?>
				<br>
		</div>
		<div id="aside">
			</div>
	</div>
	<?php endforeach; ?>
<?php endforeach; ?>
</body>
</html>