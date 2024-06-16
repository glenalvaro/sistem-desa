<!doctype html>
<html>
    <head>
        <title>Buku Administrasi Desa - Surat Keluar</title>
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
        <h2 style="text-align: center;">Daftar Surat Keluar</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Nama Surat</th>
        		<th>No Surat Kel</th>
        		<th>Tgl Surat</th>
        		<th>DItujukan Kepada</th>
        		<th>Perihal</th>
		
            </tr>
            <?php
            foreach ($buku_surat_keluar_data as $data)
            {
            ?>
            <tr>
		      <td><?= ++$start ?></td>
		      <td><?= $data->nama_surat ?></td>
		      <td><?= $data->no_surat_kel ?></td>
		      <td><?= tgl_indo($data->tgl_surat) ?></td>
		      <td><?= $data->tujuan ?></td>
		      <td><?= $data->isi_singkat ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>