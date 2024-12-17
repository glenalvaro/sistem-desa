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
        <?= $sn['title_admin']; ?> <?= $sn['sebutan_desa']; ?> <?= $dc['nama_desa']; ?> | <?= $title; ?>
    </title>

    <!-- Logo -->
    <link rel="icon" href="<?= base_url('assets/img/logo/') . $dc['logo_desa']; ?>" type="image/x-icon">
    <link href="<?= base_url() ?>assets/aset/layanan_penduduk/css/fonts.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/aset/css/login.min.css" rel="stylesheet">
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
        <div class="row justify-content-center">
           <div class="col-xl-4 col-md-4 col-lg-4">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-3">
                                      <img width="25%" src="<?= base_url('assets/img/logo/') . $dc['logo_desa']; ?>">
                                        <h1 class="login-title"><?= $sn['sebutan_desa']; ?> <?= $dc['nama_desa']; ?></h1>
                                            <div class="login-text"><?= $dc['alamat_kantor']; ?></div>
                                            <div class="login-text">kodepos <?= $dc['kode_pos']; ?></div>
                                            <div class="login-text">kecamatan <?= $dc['nama_kecamatan']; ?></div>
                                            <div class="login-text"><?= $sn['sebutan_kabupaten']; ?> <?= $dc['nama_kabupaten']; ?></div>
                                    </div>
                                    <small><?= $this->session->flashdata('message'); ?></small>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>" autocomplete="off">
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
                                <a target="_blank" href="<?= base_url('/layanan/masuk') ?>" class="tx-13 mg-b-0 tx-semibold">Login Penduduk ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-auto">
        <div class="copyright text-center my-auto" style="color: #fff; font-size: 8pt">
            <span class="tx-footer">Copyright &copy; <?= date('Y'); ?> Sistem Informasi <?= $sn['sebutan_desa']; ?></span>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/aset/js/login.min.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
      });
    </script>
</body>
 <?php endforeach; ?>
<?php endforeach; ?>
</html>