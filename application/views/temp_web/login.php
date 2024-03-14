 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php foreach($setting as $sn) : ?>
     <?php foreach($desa as $dc) : ?>
    <title>
        <?= $sn['title_login']; ?> <?= $sn['sebutan_desa']; ?> <?= $dc['nama_desa']; ?> | Masuk
    </title>

    <!-- Logo -->
    <link rel="icon" href="<?= base_url('assets/img/logo/') . $dc['logo_desa']; ?>" type="image/x-icon">
    <link href="<?php echo base_url() ?>assets/aset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/aset/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Boostrapp icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/aset/vendor/bootstrap/icons/bootstrap-icons.min.css">
    <style>
        body {
            font-size: 12px;
        }
        .bg-login{
            background: url(<?= base_url('assets/img/latar_admin/') . $sn['latar_login_admin']; ?>);
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
         }

         .login-title {
            font-family: "Rubik", sans-serif;
            font-size: 23px;
            color: #0c83c5;
            margin-top: 5px;
            margin-bottom: 4px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 4px 4px 4px #000;
            -webkit-text-stroke: 1px #fff;
        }

         .login-text{
            font-size: 10px;
            color: #999;
            margin-top: 0;
            text-transform: uppercase;
        }

        .tx-footer{
            text-shadow: 4px 4px 4px #000;
            -webkit-text-stroke: -1px #fff;
        }

        .toast {
            font-size: 11px;
            background-color: #fff;
            width: 300px;
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: #eaecf4;
            opacity: 1;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="bg-gradient-info bg-login">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
           <div class="col-xl-4 col-md-4 col-lg-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                      <img width="25%" src="<?= base_url('assets/img/logo/') . $dc['logo_desa']; ?>">
                                        <h1 class="login-title"><?= $sn['sebutan_desa']; ?> <?= $dc['nama_desa']; ?></h1>
                                            <div class="login-text"><?= $dc['alamat_kantor']; ?></div>
                                            <div class="login-text">kodepos <?= $dc['kode_pos']; ?></div>
                                            <div class="login-text">kecamatan <?= $dc['nama_kecamatan']; ?></div>
                                            <div class="login-text">kabupaten <?= $dc['nama_kabupaten']; ?></div>
                                    </div>
                                    <small><?= $this->session->flashdata('message'); ?></small>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>" autocomplete="on">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="email" placeholder="Email">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-4 form-check">
                                        <center>
                                            <input type="checkbox" class="form-check-input" id="togglePassword">
                                            <label class="form-check-label" for="exampleCheck1"><small>Tampilkan Kata Sandi</small></label>
                                        </center>
                                         </div>
                                            <button id="btnlogin" type="submit" class="btn btn-danger btn-user btn-block">
                                                <b style="font-size: 11pt;">Masuk</b>
                                            </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- internet notification -->
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 25px; right: 25px;">
    <div class="toast-header">
        <i class="bi bi-wifi"></i>&nbsp;&nbsp;&nbsp;
        <strong class="mr-auto"></strong>&nbsp;&nbsp;&nbsp;
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
      
    </div>
</div>

    <div class="container my-auto">
        <div class="copyright text-center my-auto" style="color: #fff; font-size: 8pt">
            <span class="tx-footer">Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi <?= $sn['sebutan_desa']; ?></span>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/aset/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/aset/vendor/jquery-easing/jquery.easing.min.js"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/aset/js/sb-admin-2.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
      });
    </script>


<script>
var status = 'online';
var current_status = 'online';

<?php if ($sn['cek_internet'] == "Ya") : ?>

function check_internet_connection(){
    if(navigator.onLine)
    {
        status = 'online';
    }
    else
    {
        status = 'offline';
    }

    if(current_status != status)
    {
        if(status == 'online')
        {
            $('i.bi').addClass('bi-wifi');
            $('i.bi').removeClass('bi-wifi-off');
            $('.mr-auto').html("<span class='text-success'>Connected</span>");
            $('.toast-body').text('Yeah, Anda kembali online.');
            document.getElementById("email").disabled = false;
            document.getElementById("password").disabled = false;
            document.getElementById("btnlogin").disabled = false;
        }
        else
        {
            $('i.bi').addClass('bi-wifi-off');
            $('i.bi').removeClass('bi-wifi');
            $('.mr-auto').html("<span class='text-danger'>Disconnect</span>");
            $('.toast-body').text('Opps! Harap periksa koneksi internet anda!')
            document.getElementById("email").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("btnlogin").disabled = true;
        }

        current_status = status;

        if(status == 'online')
        {
            $('.toast').toast({
              autohide:true
            });
        } 

        else 
        {
            $('.toast').toast({
                autohide:false
            });
        }

        // panggil modal toast 
        $('.toast').toast('show');
    }
}

// panggil fungsi check_internet_connection
check_internet_connection();

setInterval(function(){
    check_internet_connection();
}, 1000);

<?php endif; ?>
</script>
</body>
 <?php endforeach; ?>
<?php endforeach; ?>
</html>