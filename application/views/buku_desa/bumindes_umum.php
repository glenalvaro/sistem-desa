<div class="col-md-3">
   <div class="box box-solid">
      <div class="box-body no-padding">
         <ul class="nav nav-pills nav-stacked">
         <?php $data = sebutan_desa(); ?>
            <?php foreach($data as $key): ?> 
            <li class="<?php if ($this->uri->segment('1') == 'buku_surat_keluar') {echo 'active';} ?>"><a href="<?= site_url('buku_surat_keluar'); ?>"> Buku Surat Keluar</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'buku_surat_masuk') {echo 'active';} ?>"><a href="<?= site_url('buku_surat_masuk'); ?>"> Buku Surat Masuk</a></li>
            <li class="<?php if ($this->uri->segment('1') == 'perangkat_desa') {echo 'active';} ?>"><a href="<?= site_url('perangkat_desa'); ?>"> Buku Pemerintah <?= set_ucwords($key->sebutan_desa); ?></a></li>
            <li class="<?php if ($this->uri->segment('1') == 'inventaris') {echo 'active';} ?>"><a href="<?= site_url('inventaris'); ?>"> Buku Inventaris  <?= set_ucwords($key->sebutan_desa); ?></a></li>
            <li class="<?php if ($this->uri->segment('1') == 'agenda') {echo 'active';} ?>"><a href="<?= site_url('agenda'); ?>"> Buku Agenda</a></li>
         <?php endforeach; ?>
         </ul>
      </div>
   </div>
</div>