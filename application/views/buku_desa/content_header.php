
<!-- panggil class dari helper sid-helper.php -->
 <section class="content-header">
       <h1 class="tx-judul">
         <?php echo set_ucwords($title); ?> <small><?= nama_class($this->router->fetch_class()) ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"><?= nama_class($this->router->fetch_class()) ?></a></li>
      </ol>
    </section>