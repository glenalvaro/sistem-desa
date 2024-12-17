
  <div class="col-md-4">
      <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-aqua-active">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= AmbilFoto($penduduk['foto_pend'], '', $penduduk['sex'])?>" alt="User Avatar">
              </div>
              <h3 style="font-size: 17px; font-weight: 500;" class="widget-user-username"><?= set_ucwords($penduduk['nama_pend']); ?></h3>
              <h5 class="widget-user-desc">NIK. <?= $penduduk['nik_pend']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li class="<?php if ($this->uri->segment('2') == 'profil') {echo 'active';} ?>"><a href="<?= base_url('/layanan/profil') ?>"><i class="fa fa-user"></i>&nbsp; Profil</a></li>
                <li><a href="<?= base_url('/layanan/profil/cetak') ?>" onclick='window.open(this.href,"popupwindow","status=0,height=800,width=800,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank'><i class="fa fa-print"></i>&nbsp; Cetak Biodata</a></li>
                <li><a href="#"><i class="fa fa-file-pdf-o"></i>&nbsp; Dokumen</a></li>
                <li><a href="#"><i class="fa fa-key"></i>&nbsp; Ganti PIN</a></li>
                <li><a href="<?= base_url('/layanan/masuk/sign_out'); ?>"><i class="fa fa-sign-out"></i>&nbsp; Keluar</a></li>
              </ul>
            </div>
      </div>
</div>