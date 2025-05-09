<div class="content-wrapper">
  <section class="content-header">
      <h1 class="tx-judul">
        Modul
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Modul</a></li>
      </ol>
</section>

<!-- table kelola menu -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
               <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#new-menu"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th class="text-center">Modul</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($menu as $m) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $i; ?></td>
                  <td width="10%" class="text-center">
                      <a href="menu/sub_modul/<?php echo $m['id']; ?>" class="btn bg-purple btn-sm" title="Lihat Sub Modul"><i class="fa fa-bars"></i></a>
                      <a href="" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#editMenu<?= $m['id']; ?>" title="Edit Modul"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('menu/hapus_menu/'.$m['id']) ?>" class="btn bg-maroon btn-sm aksi-hapus disabled"><i class="fa fa-trash"></i></a>
                  </td>
                  <td><?= $m['menu']; ?></td>
                </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Tambah data -->
<div class="modal fade" id="new-menu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Tambah Modul</h4>
              </div>
              <form id="validasi" action="<?= base_url('menu'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                <label for="menu">Nama Modul</label>
                     <input type="text" id="menu" name="menu" class="input-sm form-control required" value="" placeholder="Nama Modul">
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
            </div>
      </div>
  </div>

<!-- Modal Edit Data -->
<?php $no = 0;
foreach($getMenu as $gm) : $no++; ?>
<div class="modal fade" id="editMenu<?= $gm['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Modul</h4>
              </div>
              <form action="<?= base_url('menu/updateMenu/'); ?><?= $gm['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?= $gm['id']; ?>">
                     <input type="text" id="menu" name="menu" class="input-sm form-control" value="<?= $gm['menu']; ?>" placeholder="Masukkan Group" required>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
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