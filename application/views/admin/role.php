<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Grup
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Grup</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 style="font-size: 14px;" class="box-title">Pengaturan Pengguna</h4>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= base_url('admin/list_user'); ?>"><i class="fa fa-user"></i> Pengguna</a></li>
                <li class="active"><a href="<?= base_url('admin/role'); ?>"><i class="fa fa-list"></i> Pengaturan Grup</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
                <a href="" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#new-role"><i class="fa fa-plus"></i> Tambah Grup Baru</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
              <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" cellspacing="0" width="100%">
                <thead class="bg-gray disabled color-palette">
                <tr>
                  <th width="10%" class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th class="text-center">Grup</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($role as $r) : ?>
                <tr>
                  <td class="text-center"><?= $i; ?></td>
                  <td width="30%">
                      <a href="<?= base_url('admin/roleaccess/') .$r['id']; ?>" class="btn bg-navy btn-flat btn-sm"><i class="fa fa-tv fa-sm" title="Atur Akses Group"></i></a>
                      <a href="" class="btn bg-orange btn-flat btn-sm" data-toggle="modal" data-target="#editRole<?= $r['id']; ?>"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('admin/hapus_role/'.$r['id']) ?>" class="btn bg-maroon btn-flat btn-sm aksi-hapus"><i class="fa fa-trash-o"></i></a>
                  </td>
                  <td><?= $r['role']; ?></td>
                </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>


<!-- Tambah data -->
<div class="modal fade" id="new-role">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Tambah Data Grup</h4>
              </div>
              <form id="validasi" action="<?= base_url('admin/role'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                      <label for="role">Nama Grup</label>
                     <input type="text" id="role" name="role" class="input-sm form-control required" value="" placeholder="Masukkan Grup">
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>

<!-- Modal Edit Data -->
<?php $no = 0;
foreach($getGroup as $gp) : $no++; ?>
<div class="modal fade" id="editRole<?= $gp['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Grup</h4>
              </div>
              <form action="<?= base_url('admin/edit_RoleById/'); ?><?= $gp['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?= $gp['id']; ?>">
                     <input type="text" id="role" name="role" class="input-sm form-control" value="<?= $gp['role']; ?>" placeholder="Masukkan Grup" required>
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
</section>
</div>