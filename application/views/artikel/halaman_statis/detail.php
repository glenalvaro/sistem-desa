<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
      <?= set_ucwords($judul); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Artikel</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
       <div class="col-md-12">
          <div class="box box-widget">
            <div class="box-body">
            <div class="col-md-12">
              <h4 style="font-size: 20px; font-weight: bold;"><?= set_ucwords($judul); ?></h4>
              <p class="text-muted" style="font-size: 10px;"><i style="font-size: 12px;" class="fa fa-clock-o"></i><span style="font-size: 11px; font-weight: bold;"><?= date('d F Y', $tgl_posting); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size: 12px;" class="fa fa-user-o"></i>Ditulis oleh<span style="font-size: 11px; font-weight: bold;">&nbsp;<?= $user; ?></span></p>
                <?= $isi; ?>
                <br>
            </div>
            </div>
          </div>   
        </div>
      </div>
    </section>
</div>

