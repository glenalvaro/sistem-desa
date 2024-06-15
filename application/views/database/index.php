<style>
  .table {
    font-size: 11px;
    margin-left: 0;
    margin-right: 0;
  }
  .tx-atas{
    font-size: 15px; 
    font-weight: bold; 
    margin-left: 15px;
  }
  .tx-desk{
    font-size: 12px;
    margin-top: 25px;
    margin-left: 10px;
    margin-bottom: 30px;
  }
  .tx-desk li{
    margin-left: 10px;
  }

  .btn-group-sm>.btn, .btn-sm {
    line-height: 1;
  }

  .btn-social.btn-sm> :first-child {
    line-height: 21px;
    width: 28px;
    font-size: 1.4em;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Database
      </h1>
      <ol class="breadcrumb">
        <li>&nbsp;Pengaturan</a></li>
        <li>Database</li>
      </ol>
    </section>

<!-- Hitung size folder -->
<!-- <?php
    function sizeFormat($bytes){
      $kb = 1024;
      $mb = $kb * 1024;
      $gb = $mb * 1024;
      $tb = $gb * 1024;

      if (($bytes >= 0) && ($bytes < $kb)) {
      return $bytes . ' B';

      } elseif (($bytes >= $kb) && ($bytes < $mb)) {
      return ceil($bytes / $kb) . ' KB';

      } elseif (($bytes >= $mb) && ($bytes < $gb)) {
      return ceil($bytes / $mb) . ' MB';

      } elseif (($bytes >= $gb) && ($bytes < $tb)) {
      return ceil($bytes / $gb) . ' GB';

      } elseif ($bytes >= $tb) {
      return ceil($bytes / $tb) . ' TB';
      } else {
      return $bytes . ' B';
      }
      }
    function folderSize($dir){
      $count_size = 0;
      $count = 0;
      $dir_array = scandir($dir);
        foreach($dir_array as $key=>$filename){
          if($filename!=".." && $filename!="."){
             if(is_dir($dir."/".$filename)){
                $new_foldersize = foldersize($dir."/".$filename);
                $count_size = $count_size+ $new_foldersize;
              }else if(is_file($dir."/".$filename)){
                $count_size = $count_size + filesize($dir."/".$filename);
                $count++;
              }
         }
       }
        return $count_size;
      }

      //ambil nama file di folder xampp\htdocs
      $link_file  = "\\". str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $result = str_replace('/','',$link_file);

      $dir = "C:xampp\htdocs";
      $folder_name = $dir.$result;
?> -->

<?php foreach($database_list as $db_ls) : ?>    
<section class="content">
  <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
               <h3 class="box-title" style="font-size: 14px;">Backup Database dan Folder</h3>
            </div>
            <div class="box-body">
              <h3 class="box-title tx-atas">Keterangan</h3>
              <div class="col-sm-8">
              <form class="form-horizontal">
              <table class="table table-bordered">
              <tbody>
                 <tr>
                  <td class="col-sm-10"><b>Backup Seluruh Database SID (.sql)</b></td>
                  <td class="col-sm-2">
                     <a href="<?= base_url('admin/backup_database'); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm btn-unduh aksi-download" title="Unduh database <?= $db_ls['list_db'] ?>"><i class="fa fa-download"></i> Unduh Database  <b><code><?= $db_ls['size_db'] ?> MB</code></b></a>
                  </td>
                </tr>

                <tr>
                  <td class="col-sm-10"><b>Backup Seluruh Folder SID (.zip)</b></td>
                 <!--  <td class="col-sm-2">
                     <a href="<?= base_url('admin/backup_files_sid'); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm btn-unduh aksi-download" title="Folder desa dalam format zip berukuran <?= sizeFormat(folderSize($folder_name)); ?> "><i class="fa fa-download"></i> Unduh Folder Desa  <b><code><?= sizeFormat(folderSize($folder_name)); ?></code></b></a>
                  </td> -->
                </tr>
              </tbody>
            </table>
          </form>
            <div class="tx-desk">
              <p>Proses Unduh akan mengunduh keseluruhan database SID anda.</p>
              <li>Usahakan untuk melakukan backup secara rutin dan terjadwal.</li>
              <li>Backup yang dihasilkan sebaiknya disimpan di komputer terpisah dari server.</li>
            </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
   <?php endforeach; ?>
</div>




