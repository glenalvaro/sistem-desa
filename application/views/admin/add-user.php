<style>
 label {
    font-size: 11px;
    }
</style>
<div class="content-wrapper">
   <section class="content-header">
       <h1 class="tx-judul">
        Pengguna
         <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Pengaturan</a></li>
        <li><a href="#"> Pengguna</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

<form id="validasi" action="<?= base_url('admin/add_user'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 style="font-size: 14px;" class="box-title">Foto Pengguna</h4>
            </div>
            <div class="box-body">
              <center>
                <img class="profile-user-img img-responsive img-preview" src="<?= base_url()?>assets/img/profile/default.png">
              </center> 
              <br>
              <center>
                <p class="text-red">(Kosongkan jika tidak menambahkan foto)</p>
              </center>
              <center>
              <div class="col-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                    <label class="custom-file-label" for="image"></label>
                </div>
              </div>
              </center>    
            </div> 
            <br> 
          </div>
        </div>

        <!-- Form Daftar User -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Pengguna</a>
            </div>
            <div class="box-body" style="margin-left: 10px; margin-right: 10px;">
              
                <div class="form-group">
                    <label for="name">Nama Lengkap :</label>
                     <input type="hidden" name="date_created" class="form-control"> 
                     <input type="hidden" name="is_active" class="form-control">
                     <input type="text" name="name" id="name" class="form-control input-sm required" placeholder="Nama">
                     <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                 </div>
                   
                <div class="form-group">
                    <label for="no_hp">Nomor Telepon :</label>
                      <input type="text" name="no_hp" id="no_hp" class="form-control input-sm required" placeholder="Telepon">
                      <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                      <input type="text" name="alamat" id="alamat" class="form-control input-sm required" placeholder="Alamat">
                     <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>  
             
                  <div class="form-group">
                    <label for="email">E-mail :</label>              
                      <input type="text" name="email" id="email" class="form-control input-sm required" placeholder="Email">
                   <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div> 
                  
                  <div class="form-group">
                    <label for="password">Kata Sandi :</label> 
                      <input type="password" name="password" id="password" class="form-control input-sm required" placeholder="Kata Sandi">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
               
               <div class="form-group">
                 <label for="role_id">Group :</label>
                      <br>
                      <select name="role_id" id="role_id" class="select-filter form-control required" style="width: 100%;">
                        <option disabled selected>--Pilih Group--</option>               
                       <?php foreach($role as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row['role']; ?></option>
                      <?php endforeach; ?>
                      </select>
                      <br>
                       <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

              <div class='box-footer'>       
                  <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
</form>
</section>
</div>







