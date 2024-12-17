<div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        UMKM
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daftar Usaha</li>
      </ol>
    </section>
    <?php foreach($setting as $s) : ?>
    <?php foreach($desa as $p) : ?>
      <section class="content">
      <div class="row">
        <?php $this->load->view('layanan/template/side'); ?>
       
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
             <a href="<?=site_url('/layanan/umkm')?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-left"></i> Kembali ke data UMKM</a>
            </div>
            <div class="box-body">
                <div class="row clearfix">
                     <?php foreach($list_umkm as $data) : ?>
                         <div style="width: 100%; padding: 5px;">
                           <div class="thumbnail-phone">
                           <div class="thumbnail-image-phone">
                              <img src="<?= base_url('assets/img/foto_umkm/') . $data->gambar; ?>">
                           </div>
                           <div class="thumbnail-content-phone">
                              <a href="<?= site_url('/layanan/umkm/detail/') . $data->id; ?>"><div class="thumbnail-title-phone"><?= $data->nama_pemilik; ?></div></a>
                                <div class="thumbnail-ket">
                                    <p class="tx-12" style="margin-top: 10px;">Usaha : <?= $data->nama_usaha; ?></p>
                                    <p class="tx-12">Harga : Rp. <?= $data->harga_produk; ?></p>
                                </div>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <?= $pagination; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
  <?php endforeach; ?>
    </div>
  </div>