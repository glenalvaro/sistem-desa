<!doctype html>
<html>
    <head>
        <title>Informasi Publik</title>
        <style>
            h2{
                font-size: 13px;
            }
            table{
                font-size: 11px;
            }
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
        <h2>Daftar Informasi Publik</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Judul Dokumen</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Aktif</th>
                <th>Tgl Muat</th>
            </tr>
            <?php
                foreach ($informasi_publik_data as $informasi_publik) { ?>
            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $informasi_publik->judul_dokumen ?></td>
              <td><?php echo $informasi_publik->kategori ?></td>
              <td><?php echo $informasi_publik->tahun ?></td>
              <td>
                <?php
                   if ($informasi_publik->aktif == 1) {
                        echo "Aktif";
                    } else {
                        echo "Tidak Aktif";
                    } 
                ?>       
              </td>
              <td><?= date('d F Y H:i:s', $informasi_publik->tgl_muat); ?></td>
            </tr>
                <?php } ?>
        </table>
    </body>
</html>