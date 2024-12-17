
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Data</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <?php $this->load->view('layanan/template/side'); ?>
       
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
            <?php foreach($setting as $data) : ?>
               Selamat Datang di Aplikasi Layanan <?= $data['title_login']; ?>
             <?php endforeach; ?>
            </div>
            <div class="box-body">
      
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>