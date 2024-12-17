<!DOCTYPE html>
<html lang="en">
<head>
	<title>404 Halaman Tidak di Temukan</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
</head>
<body>
<div class="container">
	<div class="error-page">
		<h2 class="headline text-yellow">404</h2>

		<div class="error-content">
			<h3><i class="fa fa-warning text-yellow"></i> The page you requested was not found.</h3>
			<p>
				Kami tidak dapat menemukan halaman yang Anda inginkan.
				Untuk sementara Anda dapat kembali ke halaman <a href="<?= base_url('auth') ?>">awal</a> atau ke <a href="javascript:history.go(-1)">halaman sebelumnya.</a>
			</p>
		</div>
	</div>
</div>
</body>
</html>
