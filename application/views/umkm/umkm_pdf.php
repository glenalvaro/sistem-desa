<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Umkm List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>No Tlp</th>
		<th>Nama Usaha</th>
		<th>Id Kategori</th>
		<th>Deskripsi</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Tgl Posting</th>
		<th>Gambar</th>
		
            </tr><?php
            foreach ($umkm_data as $umkm)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $umkm->nama ?></td>
		      <td><?php echo $umkm->no_tlp ?></td>
		      <td><?php echo $umkm->nama_usaha ?></td>
		      <td><?php echo $umkm->id_kategori ?></td>
		      <td><?php echo $umkm->deskripsi ?></td>
		      <td><?php echo $umkm->latitude ?></td>
		      <td><?php echo $umkm->longitude ?></td>
		      <td><?php echo $umkm->tgl_posting ?></td>
		      <td><?php echo $umkm->gambar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>