<div class="col-md-3">
   <div class="box box-solid">
         <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
               <li class="<?php if ($this->uri->segment('1') == 'perangkat_desa') {echo 'active';} ?>"><a href="<?= site_url('perangkat_desa'); ?>"> Buku Pemerintah Desa</a></li>
               <li class="<?php if ($this->uri->segment('1') == 'buku_surat_keluar') {echo 'active';} ?>"><a href="<?= site_url('buku_surat_keluar'); ?>"> Buku Administrasi - Surat Keluar</a></li>
               <li class="<?php if ($this->uri->segment('1') == 'buku_surat_masuk') {echo 'active';} ?>"><a href="<?= site_url('buku_surat_masuk'); ?>"> Buku Administrasi - Surat Masuk</a></li>
         </ul>
      </div>
   </div>
</div>