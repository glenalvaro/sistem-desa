  <div class="col-md-3">
     <?php $data = sebutan_desa(); ?>
            <?php foreach($data as $key): ?> 
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 style="font-size: 14px;" class="box-title">Artikel Dinamis</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                 <li class="<?php if ($this->uri->segment('1') == 'artikel') {echo 'active';} ?>"><a href="<?= site_url('artikel'); ?>"> Berita <?= set_ucwords($key->sebutan_desa); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 style="font-size: 14px;" class="box-title">Artikel Statis</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="<?php if ($this->uri->segment('1') == 'halaman_statis') {echo 'active';} ?>"><a href="<?= site_url('halaman_statis'); ?>"><i class="fa fa fa-circle-o text-yellow"></i> Halaman Statis</a></li>
                <li class="<?php if ($this->uri->segment('1') == 'sambutan') {echo 'active';} ?>"><a href="<?= site_url('sambutan'); ?>"><i class="fa fa fa-circle-o text-blue"></i> Sambutan Kepala <?= set_ucwords($key->sebutan_desa); ?></a></li>
                <li class="<?php if ($this->uri->segment('1') == 'agenda') {echo 'active';} ?>"><a href="<?= site_url('agenda'); ?>"><i class="fa fa fa-circle-o text-red"></i> Agenda <?= set_ucwords($key->sebutan_desa); ?></a></li>
              </ul>
            </div>
          </div>
      <?php endforeach; ?>
</div>