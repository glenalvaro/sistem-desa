<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php foreach($setting as $s) : ?>
  <?php foreach($desa as $p) : ?>
<title>
   Cetak Kartu Keluarga | <?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>
</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="icon" href="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>">
	<link href="<?= base_url()?>assets/custom/report.css" rel="stylesheet" type="text/css">
	<!-- TODO: Pindahkan ke external css -->
	<style>
		.textx
		{
		  mso-number-format:"\@";
		}
		td,th
		{
		  font-size:8.5pt;
		  mso-number-format:"\@";
		}
	</style>
	</head>
	<body>
		<div id="container">
			<!-- Print Body -->
			<div id="body">
				<div class="header" align="center">
					<label align="left">Desa : <?= $p['nama_desa'] ?> Kec. : <?= $p['nama_kecamatan'] ?> Kab. : <?= $p['nama_kabupaten'] ?></label>
					<h3> DATA KELUARGA </h3>
				</div>
				<br>
				<table class="border thick">
					<thead>
						<tr class="border thick">
							<th>No</th>
							<th>NO. KK</th>
							<th>KEPALA KELUARGA</th>
							<th>NIK</th>
							<th>JUMLAH KELUARGA</th>
							<th>JENIS KELAMIN</th>
							<th>ALAMAT</th>
							<th><?= $s['sebutan_dusun'] ?></th>
							<th>TGL TERDAFTAR</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1; 
						foreach ($keluarga_list as $data): ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data->no_kk; ?></td>
                            <td><?= strtoupper($data->nama_penduduk)?></td>
							<td><?= $data->nik; ?></td>
                            <td class="text-center">
                            <?php 
                            //hitung jumlah anggota kk
								$query = $this->db->query("SELECT * FROM data_penduduk where no_kk=$data->no_kk");
								$hitung_anggota = $query->num_rows();
							?>
								<?= $hitung_anggota; ?>
                            </td>
                            <td><?= $data->sex; ?></td>
                            <td><?= strtoupper($data->alamat_sekarang)?></td>
							<td><?= strtoupper($data->dusun)?></td>
							<td><?= $data->tgl_terdaftar; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
   		<label>Tanggal cetak : &nbsp; </label>
			 <?= tgl_indo(date('Y m d'))?>
		</div>
	</body>
	<?php endforeach; ?>
<?php endforeach; ?>
</html>
