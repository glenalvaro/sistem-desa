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
         background-color: #f2f2f2;
      }

      #laporan th {
         padding-top: 5px;
         padding-bottom: 5px;
         text-align: center;
         background-color: #4CAF50;
         color: white;
      }
      .kode{
         color: skyblue;
      }
   </style>
</head>
<body onLoad="window.print();">
<div class="page-landscape">

   <div class="nobreak">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table-header">
       <tbody><tr>
           <td width="110px" rowspan="6"><img src="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>" width="60px"></td>
          <td align="center">
              <label class="headtitlekop" style="font-size: 16pt; text-transform: uppercase;">PEMERINTAH <?= $s['sebutan_kabupaten'] ?> <?= $p['nama_kabupaten'] ?><br>
               <div style="font-size : 15pt; text-transform: uppercase;">KECAMATAN <?= $p['nama_kecamatan'] ?></div>
               <div style="font-size : 12pt; text-transform: uppercase;"><?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?></div></label>
               <label style="font-size: 8pt;" class="header_address"><?= $p['alamat_kantor'] ?>, Kode Pos : <j class="kode"><?= $p['kode_pos'] ?></j>, E-mail : <j class="kode"><?= $p['email_desa'] ?></j> Telepon : <j class="kode"><?= $p['no_hp'] ?></j></label>
          </td>
           <td width="120px">
              <label style="margin-left: 70px;"><u>SALINAN</u></label><br><br>
              <table border="1" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td width="90px">TGL<br><br><?php echo date('dmY'); ?></td>
                </tr>
              </tbody></table>
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
               <u>DATA WILAYAH ADMINISTRATIF <?= $s['sebutan_dusun'] ?></u>
            </td>
         </tr>
      </tbody>
   </table>
<br>
<br>

      <table class="tabel-common" width="100%" id="laporan">
         <tbody>
         <tr>
            <th>No.</th>
            <th class="text-center">Nama <?= $s['sebutan_dusun'] ?></th>
            <th class="text-center">Kepala <?= $s['sebutan_dusun'] ?></th>
         </tr>
         <?php
         $no = 1;
         foreach ($getData as $g): ?>
         <tr>
            <td align="center" width="8%"><?php echo $no++ ?></td>
            <td class="text-center"><?= $g->nama_dusun; ?></td>
            <td class="text-center"><?= $g->kepala_dusun; ?></td>
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
         <table width="100%" cellpadding="3" cellspacing="4">
             <?php $this->load->view('buku_desa/ttd_single'); ?>
         </table>
      </tr>
   </tbody>
</table>
</div>
<?php }; ?>
</body>
<?php endforeach; ?>
</html>