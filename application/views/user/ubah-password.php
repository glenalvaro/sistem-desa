<style>
  .table {
    font-size: 12px;
  }

  .subtitle_head {
    padding: 10px 50px 10px 5px;
    background-color: #a2f2ef;
    margin: 15px 0px 10px 0px;
    margin-top: 15px;
    margin-right: 0px;
    margin-bottom: 10px;
    margin-left: 0px;
    text-align: left;
    color: #111;
  }

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
    <!-- Content Header (Page header) -->
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

<form class="form-horizontal" action="<?= base_url('user/changepassword'); ?>" method="post">
<section class="content">

  <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?php echo base_url('user'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Profile</a>
            </div>
            <div class="box-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                 <tr>
                  <td width="20%">Kata Sandi Lama </td><td width="2%">:</td>
                  <td>
                     <div class="input-group">
                        <input type="password" class="form-control input-sm" id="current_password" name="current_password" placeholder="Kata Sandi lama">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword1"></i></span>
                     </div>
                       <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </td>
                </tr>
                <tr>
                  <td>Kata Sandi Baru</td><td>:</td>
                  <td> 
                    <div class="input-group">
                         <input type="password" id="new_password1" name="new_password1" class="form-control input-sm" placeholder="Kata Sandi Baru">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword2"></i></span>
                     </div>
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </td>
                </tr>
                <tr>
                  <td>Ulangi Kata Sandi</td><td>:</td>
                  <td> 
                    <div class="input-group">
                        <input type="password" id="new_password2" name="new_password2" class="form-control input-sm" placeholder="Ketik Ulang Kata Sandi">
                        <span class="input-group-addon"><i class="fa fa-eye" id="togglePassword3"></i></span>
                     </div>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
              <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i>Batal</button>
               <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm pull-right"><i class="fa fa-check"></i>Simpan</button>
            <br><br>
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




