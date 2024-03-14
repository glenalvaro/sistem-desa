<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php foreach($setting as $s) : ?>
   <?php foreach($desa as $p) { ?>
<title>
    <?= $title; ?> | <?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>
</title>
<link rel="icon" href="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aset/cetak.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aset/cetak_dok.css">
<link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url() ?>assets/aset/media_print.css">
<style>
      h1 {
         text-align: center;
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
      }

      #laporan {
         font-family: Arial, Helvetica, sans-serif;
         border-collapse: collapse;
         width: 100%;
         font-size: 12px;
      }

      #laporan td,
      #laporan th {
         border: 1px solid #ddd;
         padding: 4px;
      }

      #laporan tr:nth-child(even) {
         background-color: #d2d6de;
      }

      #laporan th {
         padding-top: 5px;
         padding-bottom: 5px;
         text-align: center;
         background-color: #d2d6de;
      }
      .kode{
         color: skyblue;
      }
   </style>
</head>
<body>
<div class="page-landscape">

   <div class="nobreak">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table-header">
       <tbody><tr>
           <td width="110px" rowspan="6"><img src="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>" width="60px"></td>
          <td align="center">
              <label class="headtitlekop" style="font-size: 16pt; text-transform: uppercase;">PEMERINTAH KABUPATEN <?= $p['nama_kabupaten'] ?><br>
               <div style="font-size : 15pt; text-transform: uppercase;">KECAMATAN <?= $p['nama_kecamatan'] ?></div>
               <div style="font-size : 12pt; text-transform: uppercase;"><?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?></div></label>
               <label style="font-size: 8pt;" class="header_address"><?= $p['alamat_kantor'] ?>, Kode Pos : <j class="kode"><?= $p['kode_pos'] ?></j>, E-mail : <j class="kode"><?= $p['email_desa'] ?></j> Telepon : <j class="kode"><?= $p['no_hp'] ?></j></label>
          </td>
           <td width="120px">
              <label style="margin-left: 70px;"><u>SALINAN</u></label><br><br>
            </td>
       </tr>
   </tbody>
</table>
      <table width="100%" border="0">
         <tbody>
         <tr>
            <td colspan="2">
               <hr class="hrKop">
            </td>
         </tr>
         <tr>
            <td style="text-transform: uppercase;" colspan="2" class="judul">
               <br>
               <u>DATA PENDUDUK DESA <?= set_ucwords($p['nama_desa']); ?></u>
            </td>
         </tr>
      </tbody>
   </table>
<br>
<br>

      <table class="tabel-common" width="100%" id="laporan">
      <thead>
         <tr>
            <th>No.</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Penduduk</th>
            <th class="text-center">Nomor KK</th>
            <th class="text-center">Hubungan Keluarga</th>
            <th class="text-center">Agama</th>
            <th class="text-center">Status Penduduk</th>
            <th class="text-center">Tempat Lahir</th>
            <th class="text-center">Tgl Lahir</th>
            <th class="text-center">Anak Ke-</th>
            <th class="text-center">Pendidikan KK</th>
            <th class="text-center">Pekerjaan</th>
            <th class="text-center">Suku</th>
            <th class="text-center">Warganegara</th>
            <th class="text-center">NIK Ayah</th>
            <th class="text-center">Nama Ayah</th>
            <th class="text-center">NIK Ibu</th>
            <th class="text-center">Nama Ibu</th>
            <th class="text-center">Wilayah</th>
            <th class="text-center">Alamat</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $no = 1;
         foreach ($list_penduduk as $row): ?>
         <tr>
            <td align="center" width="8%"><?php echo $no++ ?></td>
            <td class="text-center"><?= $row->nik; ?></td>
            <td class="text-center"><?= $row->nama_penduduk; ?></td>
            <td class="text-center"><?= $row->no_kk; ?></td>
            <td class="text-center"><?= $row->hubungan; ?></td>
            <td class="text-center"><?= $row->agama; ?></td>
            <td class="text-center"><?= $row->status; ?></td>
            <td class="text-center"><?= $row->tempat_lahir; ?></td>
            <td class="text-center"><?= $row->tgl_lahir; ?></td>
            <td class="text-center"><?= $row->kelahiran_anak_ke; ?></td>
            <td class="text-center"><?= $row->pendidikan_kk; ?></td>
            <td class="text-center"><?= $row->pekerjaan; ?></td>
            <td class="text-center"><?= $row->suku_penduduk; ?></td>
            <td class="text-center"><?= $row->status_warganegara; ?></td>
            <td class="text-center"><?= $row->nik_ayah; ?></td>
            <td class="text-center"><?= $row->nama_ayah; ?></td>
            <td class="text-center"><?= $row->nik_ibu; ?></td>
            <td class="text-center"><?= $row->nama_ibu; ?></td>
            <td class="text-center"><?= $row->dusun; ?></td>
            <td class="text-center"><?= $row->alamat_sekarang; ?></td>
         </tr>

      <?php endforeach; ?>
      </tbody>
   </table>
   </div>
   <br>
   <span>
   Catatan : <br>
      1. Apabila terdapat kesalahan data silakan hubungi admin desa. 
   </span>
   <br>
   <table class="tabelFooter" width="100%" border="0">
      <tbody><tr>
         <td width="19%" valign="top">
         </td>
         <td width="26%">
         </td>
         <td width="30%"> 
           <table width="100%">
               <tbody><tr>
                  <td align="center">
                     <br>
                     <br>
                     <span id=""></span>
                  </td>
               </tr>
               <tr>
                  <td align="center" valign="bottom" nowrap="nowrap" height="81"> <span id=""></span></td>
               </tr>
            </tbody></table>
         </td>
         <td width="25%">
         <br>
         <table width="100%">
               <tbody><tr>
                  <td align="left">
                  <span id="" style="display:none"></span>
                  <span><?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>, <?php echo date('d M Y'); ?></span>
                     <br>
                     <span>Kepala <?= $s['sebutan_desa'] ?>, </span><br>
                  </td>
               </tr>
               <tr>
                  <td align="left" valign="bottom" nowrap="nowrap" height="81">
                     <span><u><?= $p['nama_kepdes'] ?></u></span><br>
                     <span>NIP. <?= $p['nip_kepdes'] ?></span>
                  </td>
               </tr>
            </tbody>
         </table>

         
         </td>
      </tr>
   </tbody>
</table>
</div>
<?php }; ?>
</body>
<?php endforeach; ?>
</html>