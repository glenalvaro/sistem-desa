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
      <section class="content">
      <div class="row">
        <?php $this->load->view('layanan/template/side'); ?>
       
        <div class="col-md-8">
          <!-- Pesan tambah data -->
          <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>
          <div class="box box-primary">
            <div class="box-header with-border">
            <?php foreach($set_mandiri as $man) : ?>
              <?php if($man['daftar_umkm']=='Ya') : ?>
              <a href="<?=site_url('/layanan/umkm/tambah')?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            <?php endif; ?>
            <?php endforeach; ?>
              <a href="<?=site_url('/layanan/umkm/list_all')?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Lihat Semua</a>
            </div>
            <div class="box-body">
              <div class="items slider">
                  <?php foreach($data_umkm as $val) : ?>
                  <div>
                     <div style="width: 100%; padding: 0.5rem !important;" class="slick-slide" tabindex="-1" style="width: 245px; outline: none;">
                       <div class="thumbnail-desktop">
                          <div class="thumbnail-image-desktop">
                           <img src="<?= base_url('assets/img/foto_umkm/') . $val->gambar; ?>" alt="<?= $val->nama_usaha; ?>">
                          </div>
                          <div class="thumbnail-content-desktop">
                             <a href="#" data-toggle="modal" data-target="#umkm_data<?= $val->id; ?>"><div class="thumbnail-title-desktop"><?= $val->nama_usaha; ?></div></a>
                             <p><?= $val->nama_pemilik; ?></p>
                              <div class="product-rating d-inline-block">
                                  <p style="color: #ffa811;">Rp. <?= $val->harga_produk; ?>/<small><?= $val->satuan_produk; ?></small></p>
                              </div>
                              <div>
                                <p><?= $val->alamat; ?></p>
                              </div>
                          </div>
                       </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>



  <!-- Detail UMKM -->
<?php $no = 0;
foreach($data_umkm as $row) : $no++; ?>
<div class="modal fade" id="umkm_data<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Data Usaha</h4>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover tabel-rincian">
                      <tbody>
                        <tr>
                          <th colspan="3" class="subtitle_head"><strong>DATA USAHA</strong></th>
                        </tr>
                        <tr>
                          <td>Nama</td><td>:</td>
                          <td><?= strtoupper($row->nama_pemilik); ?></td>
                        </tr>
                         <tr>
                          <td width="200">Nama Usaha</td><td width="1">:</td>
                          <td><?= strtoupper($row->nama_usaha); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Telepon</td><td width="1">:</td>
                          <td><?= $row->no_tlp; ?></td>
                        </tr>
                        <tr>
                          <td width="200">Alamat</td><td width="1">:</td>
                          <td><?= $row->alamat; ?></td>
                        </tr>
                        <tr>
                          <td width="200">Kategori</td><td width="1">:</td>
                          <td><?= strtoupper($row->nama_kat); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Harga Produk</td><td width="1">:</td>
                          <td>Rp. <?= strtoupper($row->harga_produk); ?>/<?= strtoupper($row->satuan_produk); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Deskripsi</td><td width="1">:</td>
                          <td><?= strtoupper($row->deskripsi); ?></td>
                        </tr>
                      </tbody>
                     </table>
                    </div>
              </div>
              <div class="modal-footer">
                <a href="<?= site_url('/layanan/umkm/detail/') . $row->id; ?>" class="btn btn-social btn-primary btn-sm"><i class="fa fa-map-marker"></i> Lihat Lokasi</a>
                <button class="btn btn-social btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Tutup</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>