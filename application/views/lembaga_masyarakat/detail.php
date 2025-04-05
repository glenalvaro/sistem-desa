<div class="content-wrapper">
  <section class="content-header">
    <h1 class="tx-judul">
      Lembaga Masyarakat
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"> Website</a></li>
      <li><a href="#">  <?= $nama; ?></a></li>
      <li class="active">Detail</li>
    </ol>
    </section>

  <section class="content">
      <div class="row">
       <div class="col-md-12">
          <div class="box box-widget">
            <div class="box-body">
            <div class="col-md-12">
              <br>
              <p style="font-size: 15px; font-weight: bold;">LEMBAGA <?= strtoupper($nama); ?></p style="font-size: 20px; font-weight: bold;">
              <p class="text-muted" style="font-size: 10px;"><i style="font-size: 12px;" class="fa fa-clock-o"></i><span style="font-size: 11px; font-weight: bold;"><?= date('d F Y', $tgl_buat); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 12px;" class="fa fa-user-o"></i>Ditulis oleh<span style="font-size: 11px; font-weight: bold;">&nbsp;<?= $user; ?></span></p>
                <?= $isi; ?>
            </div>
            </div>
            <br>
          </div>   
        </div>
      </div>
    </section>
</div>

