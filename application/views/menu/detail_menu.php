<div class="content-wrapper">
<section class="content-header">
       <h1 class="tx-judul">
        Sub Modul<small style="font-size :14px;"><?= $nama_menu['menu']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Modul</a></li>
        <li class="active"><a href="#"> Sub Menu</a></li>
      </ol>
    </section>

    <!-- table kelola menu -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
               <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#new-modul"><i class="fa fa-plus"></i> Tambah</a>
               <a href="<?php echo base_url('menu'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Modul</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th style="min-width:100px;" class="text-center">NAMA</th>
                  <th style="min-width:150px;" class="text-center">URL</th>
                  <th style="min-width:50px;" class="text-center">ICON</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($sub_Modul as $smd) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $i; ?></td>
                  <td width="15%" class="text-center">
                  <?php if($smd->title != 'Modul') : ?>
                    <a href="#" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#editModul<?= $smd->id; ?>"><i class="fa fa-edit"></i></a>
                      <?php if($smd->is_active == '0') : ?>
                        <a href="<?=site_url('menu/submodul_unlock/'.$smd->id)?>" class="btn bg-navy btn-sm"  title="Aktifkan Menu"><i class="fa fa-lock">&nbsp;</i></a>
                      <?php elseif($smd->is_active == '1') : ?>
                        <a href="<?=site_url('menu/submodul_lock/'.$smd->id)?>" class="btn bg-navy btn-sm"  title="Non Aktifkan Menu"><i class="fa fa-unlock"></i></a>
                      <?php endif; ?>
                        <a href="<?= site_url('menu/hapus_submodul/'.$smd->id)  ?>" class="btn bg-maroon btn-sm aksi-hapus"><i class="fa fa-trash"></i></a>
                  <?php endif; ?>
                  </td>
                  <td><?= $smd->title; ?></td>
                  <td>
                     <a href="<?= base_url($smd->url); ?>"><?= base_url($smd->url); ?></a>
                  </td>
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
              <form id="validasi" action="<?= base_url('menu/tambah_modul'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                    <label for="menu_id">Nama Sub Modul :</label>
                    <input type="hidden" id="menu_id" name="menu_id" class="form-control input-sm" value="<?= $nama_menu['id']; ?>">
                     <input type="text" id="title" name="title" class="form-control input-sm required" placeholder="Judul">
               </div>
               <div class="form-group">
                    <label for="url">Link :</label>
                     <input type="text" id="url" name="url" class="form-control input-sm required" value="" placeholder="Link">
               </div>
               <div class="form-group">
                    <label for="icon">Icon :</label>
                    <br>
                     <select name="icon" id="icon" class="form-control select2-ikon input-sm required" style="width: 100%;">
                       <option value="">-- Pilih Icon Modul --</option>
                          <?php foreach ($list_icon as $icon): ?>
                          <option value="fa <?=$icon?>"><?=$icon?></option>
                          <?php endforeach; ?>
                    </select>
               </div>
              <div class="form-group">
                    <label for="is_active">Aktif Sub Modul ?</label>
                    <br>
                     <div class="checkbox-inline">
                      <label><input type="checkbox" name="is_active" id="is_active" value="1" checked>Ya</label>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat bg-maroon btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-times"></i> Batal</button>
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
                <button class="btn btn-social btn-flat bg-maroon btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
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