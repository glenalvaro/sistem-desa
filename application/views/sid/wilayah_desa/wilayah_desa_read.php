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
        <h2 style="margin-top:0px">Wilayah_desa Read</h2>
        <table class="table">
	    <tr><td>Nama Dusun</td><td><?php echo $nama_dusun; ?></td></tr>
	    <tr><td>Kepala Dusun</td><td><?php echo $kepala_dusun; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah_desa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>