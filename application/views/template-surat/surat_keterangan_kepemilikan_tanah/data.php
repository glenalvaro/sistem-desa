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
<p style="text-align: justify; text-indent: 30px; font-size:10pt;">Orang tersebut di atas adalah benar-benar warga kami yang bertempat tinggal di <?= set_ucwords($alamat_sekarang); ?> <?= set_ucwords($sebutan_desa); ?> <?= set_ucwords($nama_desa); ?>, yang memiliki/menguasai tanah/lahan berupa <?= $jenis_tanah; ?> atas nama <?= $atas_nama; ?>, yang berada di <?= set_ucwords($sebutan_desa); ?> <?= set_ucwords($nama_desa); ?>. Tercatat dalam <?= $bukti_kepemilikan; ?>, Nomor : <?= $nomor_bukti_kepemilikan; ?>, Luas :<?= $luas_tanah; ?>M2, dengan batas-batas :
</p>
<table width="95%" style="font-size: 10pt; margin-bottom: 10px; line-height: 1.5;">
    <tr>
        <td width="30%">Sebelah Utara</td>
        <td width="3%">:</td>
        <td width="77%"><?= $batas_sebelah_utara; ?></td>
    </tr>
    <tr>
        <td>Sebelah Timur</td>
        <td>:</td>
        <td><?= $batas_sebelah_timur; ?></td>
    </tr>
    <tr>
        <td>Sebelah Selatan</td>
        <td>:</td>
        <td><?= $batas_sebelah_selatan; ?></td>
    </tr>
    <tr>
        <td>Sebelah Barat</td>
        <td>:</td>
        <td><?= $batas_sebelah_barat; ?></td>
    </tr>
</table>
<ol style="text-align: justify; font-size:10pt; line-height: 2;">
    <li>Tanah tersebut benar-benar MILIK yang bersangkutan dan <strong>tidak dalam keadaan sengketa</strong>.</li>
    <li>Tanah tersebut berasal dari <?= $asal_kepemilikan; ?> dan sampai dengan sekarang belum terdaftar / didaftarkan Hak nya ke BPN (belumditerbitkan : SIIM / SIIGB / SIIGU / LAINNYA)</li>
    <li>Bukti pendukung kepemilikan sementara ini berupa <?= $bukti_kepemilikan; ?>.
</li>
</ol>

<p style="text-align: justify; font-size:10pt;">Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.<br><br></p>

<?php $this->load->view("layanan_surat/tanda_tangan/ttd_pemohon"); ?>
