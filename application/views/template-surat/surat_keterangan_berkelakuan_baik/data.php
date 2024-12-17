<p style="text-align: justify; font-size: 10pt;">
    Dengan ini menerangkan dengan benar kepada :
</p>
<table width="95%" style="font-size: 10pt; margin-bottom: 10px; line-height: 1.5;">
    <tr>
       <td width="30%">Nama Lengkap</td>
       <td width="3%">:</td>
       <td width="77%"><b><?= strtoupper($nama_penduduk); ?></b></td>
    </tr>
    <tr>
        <td>NIK / No. KTP</td>
        <td>:</td>
        <td><?= $nik; ?></td>
    </tr>
    <tr>
    	<td>Tempat / Tanggal Lahir</td>
    	<td>:</td>
    	<td><?= $tempat_lahir; ?>, <?= $tgl_lahir; ?></td>
    </tr>
    <tr>
    	<td>Jenis Kelamin</td>
    	<td>:</td>
    	<td><?= $jenis_kelamin; ?></td>
    </tr>
    <tr>
    	<td>Pekerjaan</td>
    	<td>:</td>
    	<td><?= $pekerjaan; ?></td>
    </tr>
    <tr>
    	<td>Alamat / Tempat Tinggal</td>
    	<td>:</td>
    	<td><?= strtoupper($wilayah); ?> <?= strtoupper($alamat_sekarang); ?></td>
    </tr>
</table>
<p style="text-align: justify; text-indent: 30px; font-size:10pt;">Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di <?= set_ucwords($alamat_sekarang); ?> <?= set_ucwords($sebutan_desa); ?> <?= set_ucwords($nama_desa); ?>. Menurut pengamatan kami yang bersangkutan benar berkelakuan baik dan tidak pernah tersangkut perkara atau tindak Kriminal/Pidana serta tidak pernah ikut perkumpulan organisasi yang di larang pemerintah.</p>
<p style="text-align: justify; font-size:10pt;">
Surat Keterangan ini dibuat untuk Keperluan : <strong><?= strtoupper($keperluan); ?></strong>
</p>
<p style="text-align: justify; font-size:10pt;">Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.<br><br></p>

<?php $this->load->view("layanan_surat/tanda_tangan/ttd_pamong"); ?>