<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Program_bantuan Read</h2>
        <table class="table">
	    <tr><td>Nama Program</td><td><?php echo $nama_program; ?></td></tr>
	    <tr><td>Sasaran Program</td><td><?php echo $sasaran_program; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Asal Dana</td><td><?php echo $asal_dana; ?></td></tr>
	    <tr><td>Waktu Program</td><td><?php echo $waktu_program; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('program_bantuan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>