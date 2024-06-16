<!doctype html>
<html>
    <head>
        <title>Buku Administrasi Desa - Surat Masuk</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Buku Administrasi Desa - Surat Masuk</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Nama Surat</th>
        		<th>Tgl Terima</th>
        		<th>No Surat</th>
        		<th>Tgl Surat</th>
        		<th>Pengirim Surat</th>
        		<th>Perihal</th>
            </tr>
            <?php
            foreach ($buku_surat_masuk_data as $buku_surat_masuk)
            {
                ?>
            <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $buku_surat_masuk->nama_surat ?></td>
		      <td><?php echo $buku_surat_masuk->tgl_terima ?></td>
		      <td><?php echo $buku_surat_masuk->no_surat ?></td>
		      <td><?php echo $buku_surat_masuk->tgl_surat ?></td>
		      <td><?php echo $buku_surat_masuk->pengirim_surat ?></td>
		      <td><?php echo $buku_surat_masuk->perihal ?></td>
            </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>