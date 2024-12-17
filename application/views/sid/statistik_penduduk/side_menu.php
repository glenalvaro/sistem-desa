<div class="col-md-4">
    <div class="box box-info">
        <div style="font-size: 12px;" class="box-header with-border">
            Statistik Penduduk
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
          <ul style="font-size: 12px;" class="nav nav-pills nav-stacked">
            <?php foreach($statistik_menu as $stat_menu) : ?>
             <li class="<?php if ($this->uri->segment('3')==$stat_menu['id']) {echo 'active';} ?>"><a href="<?= site_url('statistik/kependudukan/') . $stat_menu['id']; ?>"> <?= $stat_menu['menu']; ?></a></li>
            <?php endforeach; ?>
         </ul>
        </div>
    </div>
</div>