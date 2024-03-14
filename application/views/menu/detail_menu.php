<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Sub Modul
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Modul</a></li>
        <li class="active"><a href="#"> Sub Modul</a></li>
      </ol>
    </section>

    <!-- table kelola menu -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
               <a href="<?php echo base_url('menu'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Menu</a>

               <a href="" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#new-modul"><i class="fa fa-plus"></i> Tambah Modul</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h5 style="margin-bottom: 15px;">Menu : <?= $nama_menu['menu']; ?></h5>
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="bg-gray disabled color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th style="min-width:100px;" class="text-center">Sub Menu</th>
                  <th style="min-width:150px;" class="text-center">Url</th>
                  <th style="min-width:100px;" class="text-center">Icon</th>
                  <th style="min-width:50px;" class="text-center">Tampil</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($sub_Modul as $smd) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $i; ?></td>
                  <td width="15%">
                      <?php if($smd->is_active == '0') : ?>
                        <a href="<?=site_url('menu/submodul_unlock/'.$smd->id)?>" class="btn bg-navy btn-flat btn-sm"  title="Aktifkan Menu"><i class="fa fa-lock">&nbsp;</i></a>
                      <?php elseif($smd->is_active == '1') : ?>
                        <a href="<?=site_url('menu/submodul_lock/'.$smd->id)?>" class="btn bg-navy btn-flat btn-sm"  title="Non Aktifkan Menu"><i class="fa fa-unlock"></i></a>
                      <?php endif; ?>
                        <a href="#" class="btn bg-orange btn-flat btn-sm" data-toggle="modal" data-target="#editModul<?= $smd->id; ?>"><i class="fa fa-edit"></i></a>
                        <a href="<?= site_url('menu/hapus_submodul/'.$smd->id)  ?>" class="btn bg-maroon btn-flat btn-sm aksi-hapus"><i class="fa fa-trash-o"></i></a>
                  </td>
                  <td><?= $smd->title; ?></td>
                  <td><code><?= $smd->url; ?></code></td>
                  <td class="text-center"><?= $smd->icon; ?></td>
                  <td class="text-center"><i style="font-size: 18px;" class="<?= $smd->icon; ?>"></i></td>
                </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Tambah Modul -->
<div class="modal fade" id="new-modul">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Tambah Sub Modul</h4>
              </div>
              <form action="<?= base_url('menu/tambah_modul'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                    <label>Nama Modul :</label>
                    <input type="hidden" id="menu_id" name="menu_id" class="form-control input-sm" value="<?= $nama_menu['id']; ?>">
                     <input type="text" id="title" name="title" class="form-control input-sm" value="" placeholder="Nama Submenu" required>
               </div>
               <div class="form-group">
                    <label>Link :</label>
                     <input type="text" id="url" name="url" class="form-control input-sm" value="" placeholder="Link Submenu" required>
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
             <!--  <div class="form-group">
                    <label for="is_active">Aktif Sub Menu ?</label>
                    <br>
                     <div class="checkbox-inline">
                      <label><input type="checkbox" name="is_active" id="is_active" value="1" checked>Ya</label>
                    </div>
                </div> -->
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat bg-navy btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
      </div>
</div>

<!-- Edit Sub Modul -->
<?php $no = 0;
foreach($SubModul as $s) : $no++; ?>
<div class="modal fade" id="editModul<?= $s['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Modul</h4>
              </div>
              <form action="<?= base_url('menu/edit_ModulById/'); ?><?= $s['id']; ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                    <label>Nama Modul :</label>
                    <input type="hidden" name="id" value="<?= $s['id']; ?>">
                     <input type="text" id="title" name="title" class="form-control input-sm" value="<?= $s['title']; ?>" required>
               </div>
               <div class="form-group">
                    <label>Link :</label>
                     <input type="text" id="url" name="url" class="form-control input-sm" value="<?= $s['url']; ?>" placeholder="Link Submenu" readonly>
               </div>
               <div class="form-group">
                    <label>Icon :</label>
                    <br>
                    <select name="icon" class="form-control select2-ikon input-sm" style="width: 100%">
                        <option value="<?= $s['icon']; ?>"><?= $s['icon']; ?></option>
                          <?php foreach ($list_icon as $icon): ?>
                          <option value="fa <?=$icon?>"><?= $icon?></option>
                          <?php endforeach; ?>
                  </select>
               </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat bg-navy btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
      </div>
</div>
<?php endforeach; ?>
</div>
</div>
</section>

</div>