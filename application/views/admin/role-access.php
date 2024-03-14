

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
         Hak Akses Grup
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Grup</a></li>
        <li class="active">Akses Grup</li>
      </ol>
    </section>

    <!-- table kelola menu -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <a href="<?php echo base_url('admin/role'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Grup</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Nama Grup</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control input-sm" value="<?= $role['role']; ?>" readonly>
                    </div>
                  </div>
                </form>
                <table class="table table-striped table-bordered tabel-daftar" cellspacing="0" width="100%">
                <thead class="bg-gray color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Menu</th>
                  <th class="text-center">Akses Modul</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($menu as $m) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $i; ?></td>
                  <td><?= $m['menu']; ?></td>
                  <td class="text-center">
                          <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']);?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?> ">
                  </td>
                </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <br>
    </div>
</div>
</div>
</div>
</section>

</div>