<div class="col-md-3">
   <div class="box box-solid">
         <div class="box-body no-padding">
          <ul class="nav nav-pills nav-stacked">
               <li class="<?php if ($this->uri->segment('2') == 'buku_induk_penduduk') {echo 'active';} ?>"><a href="<?= site_url('bumindes/buku_induk_penduduk'); ?>"> Buku Induk Penduduk</a></li>
               <li class="<?php if ($this->uri->segment('2') == 'rekap_penduduk') {echo 'active';} ?>"><a href="<?= site_url('bumindes/rekap_penduduk'); ?>"> Buku Rekapitulasi Jumlah Penduduk</a></li>
               <li class="<?php if ($this->uri->segment('2') == 'penduduk_sementara') {echo 'active';} ?>"><a href="<?= site_url('bumindes/penduduk_sementara'); ?>"> Buku Penduduk Sementara</a></li>
               <li class="<?php if ($this->uri->segment('2') == 'penduduk_asuransi') {echo 'active';} ?>"><a href="<?= site_url('bumindes/penduduk_asuransi'); ?>"> Buku Penduduk Asuransi Kesehatan</a></li>
               <li class="<?php if ($this->uri->segment('2') == 'buku_ktp_kk') {echo 'active';} ?>"><a href="<?= site_url('bumindes/buku_ktp_kk'); ?>"> Buku KTP dan KK</a></li>
         </ul>
      </div>
   </div>
</div>