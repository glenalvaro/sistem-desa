<style>
  select {
    font-family: fontAwesome
  }
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-size: 12px;
    padding: 5px 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
       Kelola sub menu
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-folder"></i> Menu</a></li>
        <li><a href="#">Kelola sub menu</a></li>
      </ol>
    </section>

    <!-- table kelola menu -->
<section class="content">
  <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

   <small><?= $this->session->flashdata('message'); ?></small>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
            <div>
               <a href="" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#new-submenu"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                 <table id="datatables" class="table table-striped table-hover table-bordered">
                <thead class="bg-gray disabled color-palette">
                <tr style="text-transform: uppercase;">
                  <th class="text-center">No</th>
                  <th class="text-center">Aksi</th>
                  <th class="text-center">Nama Sub Menu</th>
                  <th class="text-center">Menu</th>
                  <th class="text-center">Url</th>
                  <th class="text-center">Icon</th>
                  <th class="text-center">Tampil</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($subMenu as $sm) : ?>
                <tr>
                  <td width="2%" class="text-center"><?= $i; ?></td>
                  <td width="10%" class="text-center">
                      <a href="edit_Submenu/<?php echo $sm['id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                      <?php if($sm['is_active'] == '0') : ?>
                        <a href="<?=site_url('menu/submenu_unlock/'.$sm['id'])?>" class="btn bg-navy btn-xs"  title="Aktifkan Menu"><i class="fa fa-lock">&nbsp;</i></a>
                      <?php elseif($sm['is_active'] == '1') : ?>
                        <a href="<?=site_url('menu/submenu_lock/'.$sm['id'])?>" class="btn bg-navy btn-xs"  title="Non Aktifkan Menu"><i class="fa fa-unlock"></i></a>
                      <?php endif; ?>
                      <a onclick="deleteConfirm('<?= site_url('menu/hapus_sub/'.$sm['id'])  ?>')"
                      href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                  </td>
                  <td><?= $sm['title']; ?></td>
                  <td class="text-center"><?= $sm['menu']; ?></td>
                  <td><?= $sm['url']; ?></td>
                  <td class="text-center"><?= $sm['icon']; ?></td>
                  <td class="text-center"><i style="font-size: 18px;" class="<?= $sm['icon']; ?>"></i></td>
                </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Tambah data -->
<div class="modal fade" id="new-submenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Tambah Menu</h4>
              </div>
              <form action="<?= base_url('menu/submenu'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                    <label>Sub Menu :</label>
                     <input type="text" id="title" name="title" class="form-control input-sm" value="" placeholder="Submenu title">
               </div>
               <div class="form-group">
                    <label>Menu :</label>
                    <select name="menu_id" id="menu_id" class="form-control select2 input-sm">
                        <option disabled selected>--Pilih--</option>
                        <?php foreach($menu as $m) : ?>
                          <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                    </select>
               </div>
               <div class="form-group">
                    <label>Link :</label>
                     <input type="text" id="url" name="url" class="form-control input-sm" value="" placeholder="Submenu url">
               </div>
               <div class="form-group">
                    <label>Icon :</label>
                    <br>
                     <select name="icon" id="icon" class="form-control select2-ikon input-sm" style="width: 100%;">
                       <option selected="selected">Pilih Icon</option>
                          <?php foreach ($list_icon as $icon): ?>
                          <option value="fa <?=$icon?>"><?=$icon?></option>
                          <?php endforeach; ?>
                    </select>
               </div>
              <div class="form-group">
                    <label for="is_active">Aktif Menu ?</label>
                    <br>
                     <div class="checkbox-inline">
                      <label><input type="checkbox" name="is_active" id="is_active" value="1" checked>Ya</label>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-default btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
            </div>
          </div>
        </div>

<!--MODAL HAPUS-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
              </div>
              <form class="form-horizontal">
                <div class="modal-body">
                  <input type="hidden" name="kode" id="id_cus" value="">
                  <p>Apakah Anda yakin mau menghapus data ini?</p>   
                </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-hapus" class="btn btn-danger" href="#">Delete</a>
              </div>
              </form>
          </div>
      </div>
  </div>
<script>
function deleteConfirm(url){
  $('#btn-hapus').attr('href', url);
  $('#deleteModal').modal();
}
</script>
</div>
</div>
</section>

</div>