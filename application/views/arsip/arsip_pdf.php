<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php foreach($setting as $s) : ?>
   <?php foreach($desa as $p) { ?>
<title>
    Laporan Arsip Surat | <?= $s['sebutan_desa'] ?> <?= $p['nama_desa'] ?>
</title>
<link rel="icon" href="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aset/cetak.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/aset/cetak_dok.css">
<style>
      h1 {
         text-align: center;
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
      }
      .kode{
         color: skyblue;
      }
   </style>
</head>
<body>
<div>
   <div class="nobreak">
   <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table-header">
       <tbody><tr>
           <td width="90px" rowspan="6"><img src="<?= base_url('assets/img/logo/') . $p['logo_desa']; ?>" width="60px"></td>
          <td align="center">
              <label class="headtitlekop" style="font-size: 18pt; text-transform: uppercase;">PEMERINTAH <?= strtoupper($s['sebutan_kabupaten']) ?> <?= strtoupper($p['nama_kabupaten']) ?><br>
               <div style="font-size : 16pt; text-transform: uppercase;">KECAMATAN <?= $p['nama_kecamatan'] ?></div>
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
               <u>LAPORAN ARSIP LAYANAN SURAT</u>
            </td>
         </tr>
      </tbody>
   </table>
<br>
<br>
      <table class="tabel-common" width="100%">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>No</th>
                <th>No Surat</th>
                <th style="min-width:100px;">Jenis Surat</th>
                <th style="min-width:100px;">Pemohon</th>
                <th style="min-width:100px;">Tanggal</th>
                <th style="min-width:100px;">Keterangan</th>
                <th style="min-width:100px;">Ditandatangani Oleh</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php $no = 1; 
                foreach($surat_arsip as $data) : ?>
            <tr>
            <td width="10px"><?= $no++; ?></td>
            <td style="text-align: center;"><?= $data->no_surat; ?></td>
            <td><?= strtoupper($data->nama_surat); ?></td>
            <td><?= strtoupper($data->pemohon); ?></td>
            <td><?= $data->tanggal; ?></td>
            <td>
            <?php 
                if(empty($data->keterangan)) {
                    echo "-";
                } else {
                    echo $data->keterangan;
                }
            ?>
            </td>
            <td><?= $data->pamong; ?></td>
        </tr>
           <?php endforeach; ?>
        </tbody>
        </table>
   </div>
   <br>
<table width="100%" border="0">
    <tbody>
        <tr>
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
                     
                  </td>
               </tr>
               <tr>
                  <td align="center" valign="bottom" nowrap="nowrap" height="81"> <span id=""></span></td>
               </tr>
            </tbody>
            </table>
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