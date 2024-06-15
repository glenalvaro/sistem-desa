<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Manajemen Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li class="active"><a href="#"> Kelola Data Pengguna</a></li>
      </ol>
    </section>
    <!-- table kelola menu -->
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
                <li class="active"><a href="<?= base_url('admin/list_user'); ?>"><i class="fa fa-user"></i> Pengguna</a></li>
                <li><a href="<?= base_url('admin/role'); ?>"><i class="fa fa-list"></i> Pengaturan Grup</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
               <a href="<?= base_url('admin/add_user'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Pengguna Baru</a>
            </div>
            <div class="box-body" style="margin-bottom:100px !important;">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="bg-gray disabled color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Grup</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach($userList as $d) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="23%">
                    <!-- Hilangkan aksi untuk admin -->
                    <?php if($d['id']!=1) : ?>
                      <?php if($d['is_active'] == '0') : ?>
                        <a href="<?=site_url('admin/user_unlock/'.$d['id'])?>" class="btn bg-navy btn-flat btn-sm"  title="Aktifkan Pengguna"><i class="fa fa-lock">&nbsp;</i></a>
                      <?php elseif($d['is_active'] == '1') : ?>
                        <a href="<?=site_url('admin/user_lock/'.$d['id'])?>" class="btn bg-navy btn-flat btn-sm"  title="Non Aktifkan Pengguna"><i class="fa fa-unlock"></i></a>
                      <?php endif; ?>
                      <a href="<?= site_url("admin/hapus_user/"). $d['id']; ?>" class="btn bg-maroon btn-flat btn-sm aksi-hapus" title="Hapus Pengguna"><i class="fa fa-trash-o"></i></a>
                       <a href="<?= base_url('admin/update_password/') . $d['id']; ?>" class="btn bg-olive btn-flat btn-sm" title="Reset Password"><i class="fa fa-key"></i></a>
                      <?php endif; ?>
                      <a href="<?= base_url('admin/edit_UserAdmin/') . $d['id']; ?>" class="btn bg-orange btn-flat btn-sm" title="Edit Pengguna"><i class="fa fa-edit"></i></a>
                  </td>
                  <td width="5%" class="text-center">
                    <a href="<?= base_url('assets/img/profile/') . $d['image']; ?>" class="progressive replace">
                        <img class="preview" loading="lazy" src="<?= base_url('assets/img/img-load.gif') ?>" alt="Foto Penduduk"/>
                      </a>
                  </td>
                  <td><a href="<?= base_url('admin/detail_user/').$d['id']; ?>"><?= $d['name']; ?></a></td>
                  <td><?= $d['email']; ?></td>
                  <td class="text-center"><?= $d['akses']; ?></td>
                </tr>
                    <?php endforeach; ?>
            </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
</section>
</div>