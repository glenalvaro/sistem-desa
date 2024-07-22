

<!-- ######################### -->

<!-- view ini tidak digunakan -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1 class="tx-judul">
        Edit Sub Menu<small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-folder"></i> Menu</a></li>
        <li><a href="#">Kelola Sub Menu</a></li>
        <li class="active">Edit Sub Menu</li>
      </ol>
    </section>
<?php foreach($sub_menu as $s) { ?>
<form class="form-horizontal" action="<?= base_url('menu/update_sub'); ?>" method="post" enctype="multipart/form-data">
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header with-border">
              <a href="<?php echo base_url('menu/submenu'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Sub Menu</a>
            </div>
             <div class="box-body">
                 <div class="form-group">
                    <label class="col-sm-1 control-label">Sub Menu :</label>
                    <div class="col-sm-8">
                    <input type="hidden" name="id" value="<?php echo $s->id ?>">
                    <input type="text" name="title" class="form-control input-sm" value="<?php echo $s->title ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-1 control-label">Menu :</label>
                    <div class="col-sm-8">
                    <select name="menu_id" id="menu_id" class="form-control select2 input-sm">
                      <option value="<?php echo $s->menu_id ?>">--Pilih--</option>
                        <?php foreach($menu as $m) : ?>
                          <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                    </select>
                  </div>
                  </div>
               
                   <div class="form-group">
                    <label class="col-sm-1 control-label">Url :</label>
                    <div class="col-sm-8">
                     <input type="text" name="url" class="form-control input-sm" value="<?php echo $s->url ?>" readonly>
                    </div>
                  </div>
                 
                   <div class="form-group">
                    <label class="col-sm-1 control-label">Icon :</label>
                    <div class="col-sm-8">
                      <select name="icon" class="form-control select2-ikon">
                        <option value="<?php echo $s->icon ?>">Referensi Icon</option>
                          <?php foreach ($list_icon as $icon): ?>
                          <option value="fa <?=$icon?>"><?= $icon?></option>
                          <?php endforeach; ?>
                  </select>
                    </div>
                  </div>



                   <div class="form-group">
                    <label class="col-sm-1 control-label">Menu Aktif :</label>
                    <div class="col-sm-8">
                     <select name="is_active" class="form-control input-sm select2">
                       <option value="<?php echo $s->is_active ?>">
                         <?php 
                        if ($s->is_active == 1){
                          echo "Aktif";
                        } elseif ($s->is_active == 0) {
                          echo "Tidak Aktif";
                        }

                      ?>
                       </option>
                       <option value="1">Aktif</option>
                       <option value="0">Non Aktif</option>
                     </select>
                    </div>
                  </div>
                  <div class='box-footer'>
                  <div class='col-xs-12'>
                    <button type="submit" class="btn btn-social btn-flat btn-success btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                  </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</form>
<?php }; ?>
</section>

</div>

