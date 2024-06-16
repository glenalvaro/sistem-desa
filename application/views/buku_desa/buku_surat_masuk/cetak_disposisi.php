<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    <?php foreach($setting as $j) : ?>
  	<?php foreach($desa as $n) : ?>
	<title>
   		Cetak Surat Disposisi | <?= $j['sebutan_desa'] ?> <?= $j['nama_desa'] ?>
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
					<hr style="border-bottom: 1px solid #000000; height:0px;">
				</div>
			</div>
			<br>
			 <table class="border thick">
			 	<tr>
			 		<th colspan="12">LEMBAR DISPOSISI</th>
			 	</tr>
			 	<?php foreach($detailSurat as $row) : ?>
			 		<tr>
						<td width="20%"><strong>Nama Surat</strong></td>
						<td> :  <?= strtoupper($row->nama_surat); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Nomor Surat</strong></td>
						<td> :  <?= strtoupper($row->no_surat); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Tanggal Surat</strong></td>
						<td> : <?= tgl_indo($row->tgl_surat); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Dari</strong></td>
						<td> : <?= strtoupper($row->pengirim_surat); ?></td>
					</tr>
					<tr>
						<td width="20%"><strong>Perihal</strong></td>
						<td> : <?= strtoupper($row->perihal); ?></td>
					</tr>
				<tr>
			 		<th colspan="12">DISPOSISI KEPADA</th>
			 	</tr>
			 	<tr>
                   <td colspan="6">
                   	<table>
					<tbody>
                   	<?php foreach($list_jab as $main) : ?>
                     <tr>
                       <td class="nostretch no-border-kanan" style="vertical-align: text-top;">
                            <?= $main['nama'] ?>
                       </td>
                       <td class="no-border-kiri" style="vertical-align: text-top;">
                        	<input type="checkbox" style="zoom: 2; padding: 10px" disabled="disabled" <?=($row->disposisi_ke==$main['id'])?'checked="checked"':''?>>
                       </td>
                     </tr>
                     <?php endforeach; ?>
                 	</tbody>
             		</table>
             		</td>
                 </tr>
                 <tr>
                    <td colspan="6" height="100px;" style="vertical-align: text-top;">
                       <span style="text-decoration: underline;">Isi Disposisi</span><br>
                         <p style="margin: 5px 0 0 10px;"><?= $row->isi_disposisi; ?></p>
                     </td>
                  </tr>
                <?php endforeach; ?>
			</table>
			<br>
			<?php 
		        if (isset($_POST['lap_di'])) {
		            $id_l=$_POST['lap_di'];
		            $sql = "SELECT * FROM perangkat_desa WHERE id={$id_l}";
		            $query = $this->db->query($sql);
		            $pamong_1 = $query->row_array();
		        }

		         if (isset($_POST['lap_dik'])) {
		            $id_l=$_POST['lap_dik'];
		            $sql = "SELECT * FROM perangkat_desa WHERE id={$id_l}";
		            $query = $this->db->query($sql);
		            $pamong_2 = $query->row_array();
		        }

		        print_r($list);


			 ?>
			<table width="100%" cellpadding="3" cellspacing="4">
				<tr>
					<td width="25%" align="center">MENGETAHUI</td>
					<td width="50%"></td>
					<td width="25%" align="center"><?= strtoupper($n['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
					</tr>
					<td width="25%" align="center"><?= strtoupper($pamong_2['jabatan_pegawai']); ?></td>
					<td width="50%"></td>
					<td align="center" width="150"><?= strtoupper($pamong_1['jabatan_pegawai']); ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%" align="center"><u><?= strtoupper($pamong_2['nama_pegawai']); ?></u></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150"><u><?= strtoupper($pamong_1['nama_pegawai']); ?></u></td>
				</tr>
				<tr>
					<td width="25%" align="center">NIP. <?= strtoupper($pamong_2['nip']); ?></td>
					<td width="50%"></td>
					<td width="25%" align="center" width="150">NIP. <?= strtoupper($pamong_1['nip']); ?></td>
				</tr>
			</table>
			<br>
			<br>
		</div>
			<div id="aside"></div>
		</div>
        <?php endforeach; ?>
	<?php endforeach; ?>
	</body>
</html>