<div class="content-wrapper">
<section class="content-header">
      <h1 class="tx-judul">
        Reset Password Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Pengaturan</a></li>
        <li><a href="#">Kelola Data Pengguna</a></li>
        <li class="active">Password</li>
      </ol>
</section>

<form method="POST" action="<?= base_url('admin/update_password/'); ?><?= $List['id']; ?>" enctype="multipart/form-data">
<section class="content">
  <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a href="<?php echo base_url('admin'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Pengguna</a>
            </div>
              <div class="box-body" style="margin-left: 10px; margin-right: 10px;">
                  <h6>Reset Kata Sandi Pengguna -- <?= $List['name'] ?></h6><br>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat E-mail</label>
                    <input type="hidden" name="id" value="<?= $List['id']; ?>">
                    <input type="text" class="form-control input-sm" value="<?= $List['email'] ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Kata Sandi</label>
                  <input type="password" name="pas_1" id="pas_1" class="form-control input-sm" placeholder="Kosongkan jika tidak mengganti password">
                  <?= form_error('pas_1', '<span class="help-block">', '</span>'); ?>
                </div>

                <div class="form-group">
                  <label class="control-label" for="inputError">Ulangi Kata Sandi</label>
                  <input type="password" name="pas_2" id="pas_2" class="form-control input-sm" placeholder="Kosongkan jika tidak mengganti password">
                   <?= form_error('pas_2', '<span class="help-block">', '</span>'); ?>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm pull-right"><i class="fa fa-check"></i>Simpan</button>
              </div>
          </div>
        </div>
      </div>
</form>
    </section>
</div>




