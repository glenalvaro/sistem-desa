<style>
  .input-group .input-group-addon {
    border-radius: 0;
    border-color: #d2d6de;
    background-color: #fff; 
    height: 20px;
    font-size: 12px;
    cursor: pointer;
  }

  .input-group span:hover {
    color: #224abe;
  }
</style>
<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Ganti Password<small>user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle-o"></i> &nbsp;Pengguna</a></li>
        <li>Profil</li>
        <li>Ganti Password</li>
      </ol>
    </section>


<section class="content">
  <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?php echo base_url('user'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Profile</a>
            </div>
            <form id="validasi" class="form-horizontal" action="<?= base_url('user/changepassword'); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="current_password" class="col-sm-4">Kata Sandi Lama</label>
                <div class="col-sm-6">
                     <div class="input-group">
                        <input type="password" class="form-control input-sm required" id="current_password" name="current_password" placeholder="Kata Sandi lama">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword1"></i></span>
                     </div>
                     <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
               </div>

                <div class="form-group">
                    <label for="password1" class="col-sm-4">Kata Sandi Baru</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                         <input type="password" id="new_password1" name="new_password1" class="form-control input-sm required" placeholder="Kata Sandi Baru">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword2"></i></span>
                      </div>
                      <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  </div>

                  <div class="form-group">
                  <label for="new_paswword2" class="col-sm-4">Ketik Ulang Kata Sandi</label>
                  <div class="col-sm-6">
                      <div class="input-group">
                          <input type="password" id="new_password2" name="new_password2" class="form-control input-sm required" placeholder="Ketik Ulang Kata Sandi">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword3"></i></span>
                      </div>
                    </div>
                </div>

                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i>Batal</button>
               <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm pull-right"><i class="fa fa-check"></i>Simpan</button>
               <br><br>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

<script>
  //tampil password 1
  $(document).ready(function() {
    const togglePassword = document.querySelector('#togglePassword1');
    const password = document.querySelector('#current_password');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
  });

  //tampil password 2
  $(document).ready(function() {
    const togglePassword = document.querySelector('#togglePassword2');
    const password = document.querySelector('#new_password1');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
  });

   //tampil password 2
  $(document).ready(function() {
    const togglePassword = document.querySelector('#togglePassword3');
    const password = document.querySelector('#new_password2');

    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
  });
</script>
</div>




