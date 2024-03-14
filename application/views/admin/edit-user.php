<style>
.form-horizontal {
    text-align: left;
}

  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    padding: 5px
    font-weight: 700;
    font-size: 11px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="tx-judul">
        Edit Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Pengaturan</a></li>
        <li><a href="#">Kelola Data Pengguna</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>


<section class="content form-horizontal">
  <form action=" <?= base_url('admin/edit_UserAdmin/'); ?><?= $user_data['id']; ?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-danger">
            <div class="box-body">
              <center><img src="<?= base_url('assets/img/profile/') . $user_data['image']; ?>" class="img-thumbnail img-preview" width="150" height="145">
              </center>
              <br>  
              <center>
              <p class="text-muted text-center text-red">(Kosongkan, jika foto tidak berubah)</p>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                  <label class="custom-file-label" for="image"></label>
              </div>
              </center>    
            </div>  
          </div>
        </div>
        
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="<?php echo base_url('admin/list_user'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Pengguna</a>
            </div>
            <div class="box-body" style="margin-left: 10px; margin-right: 10px;">
                  <div class="form-group">
                    <label class="col-sm-3">Email</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id" value="<?= $user_data['id']; ?>">
                      <input type="text" name="email" id="email" class="form-control input-sm" value="<?= $user_data['email'] ?>" readonly>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-3">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="text" name="name" id="name" class="form-control input-sm" value="<?= $user_data['name'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Telepon</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_hp" id="no_hp" class="form-control input-sm" value="<?= $user_data['no_hp'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" name="alamat" id="alamat" class="form-control input-sm" value="<?= $user_data['alamat'] ?>">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-3">Group</label>
                    <div class="col-sm-8">
                       <select name="role_id" id="role_id" class="select-filter form-control" style="width: 100%;">
                        <option value="">Pilih Group</option>
                        <?php foreach($akses as $a) : ?>
                           <option value="<?= $a['id'] ?>" <?= selected($user_data['role_id'], $a['id']); ?>><?= $a['role']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <div class='box-footer'>        
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                </div> 
            </div>
          </div>
        </div>
      </div>
</form>
</section>
</div>
