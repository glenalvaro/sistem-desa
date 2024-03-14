<style>
.form-horizontal {
    text-align: left;
}

  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    padding: 5px
    font-weight: bold;
    font-size: 11px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="tx-judul">
        Edit Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle-o"></i> Pengguna</a></li>
        <li><a href="#">Profil</a></li>
        <li class="active">Edit Profil</li>
      </ol>
    </section>

<?= form_open_multipart('user/edit_profile'); ?>

<section class="content form-horizontal">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body">
              <center><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail img-preview" width="150" height="145">
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
                <a href="<?php echo base_url('user'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Profil</a>
              </div>
              <div class="box-body" style="margin-left: 10px; margin-right: 10px;">
                   <div class="form-group">
                    <label class="col-sm-3">Email</label>
                    <div class="col-sm-8">
                      <input type="text" name="email" id="email" class="form-control input-sm" value="<?= $user['email']; ?>" readonly>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label class="col-sm-3">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input type="text" name="name" id="name" class="form-control input-sm" value="<?= $user['name']; ?>">
                       <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Telepon</label>
                    <div class="col-sm-8">
                      <input type="text" name="no_hp" id="no_hp" class="form-control input-sm" value="<?= $user['no_hp']; ?>">
                       <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" name="alamat" id="alamat" class="form-control input-sm" value="<?= $user['alamat']; ?>">
                       <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                <div class='box-footer'>
                  <div class='col-xs-12'>
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                  </div>
                </div> 
            </div>
          </div>
        </div>
      </div>
</form>
</section>
</div>
