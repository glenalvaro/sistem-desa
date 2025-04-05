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
<section class="content-header">
      <h1 class="tx-judul">
        Pengaturan Database
      </h1>
      <ol class="breadcrumb">
        <li>&nbsp;Pengaturan</a></li>
        <li>Database</li>
      </ol>
</section>


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
                     <a href="<?= base_url('database/backup_database'); ?>" class="btn btn-social btn-flat btn-block btn-info btn-sm btn-unduh aksi-download" title="Unduh database <?= $db_ls['list_db'] ?>"><i class="fa fa-download"></i> Unduh Database  <b><code><?= $db_ls['size_db'] ?> MB</code></b></a>
                  </td>
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




