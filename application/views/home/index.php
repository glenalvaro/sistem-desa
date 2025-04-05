<div class="content-wrapper">
  <section class="content-header">
      <h1 class="tx-judul">
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Informasi Sistem</a></li>
      </ol>
    </section>
    <section class="content">
     <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion-man"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Penduduk</span>
              <span class="info-box-number"><?= $total_penduduk; ?></span>
            </div>
        </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Keluarga</span>
              <span class="info-box-number"><?= $total_kk; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-olive"><i class="ion-android-people"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kelompok</span>
              <span class="info-box-number"><?= $total_kelompok; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-gray"><i class="ion-android-map"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Wilayah Desa</span>
              <span class="info-box-number"><?= $total_wilayah; ?></span>
            </div>
          </div>
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion-ios-help-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pengaduan</span>
              <span class="info-box-number">
              
              </span>
            </div>
          </div>
        </div>


         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion-ios-email-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Surat Tercetak</span>
              <span class="info-box-number"><?= $total_surat; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-navy"><i class="ion-ios-person-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengguna</span>
              <span class="info-box-number">
                <?= $total_pengguna; ?>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Layanan Penduduk</span>
              <span class="info-box-number">
              <?= $total_layanan; ?>
              </span>
            </div>
          </div>
        </div>
     </div>
</section>
</div>