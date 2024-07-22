<div class="content-wrapper">
    <section class="content-header">
      <h1 class="tx-judul">
        Detail <?= ucwords($nama_kegiatan); ?>
      </h1>
      <ol class="breadcrumb">
        <li> Menu</li>
        <li><a href="#"> Pembangunan</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             <div class="box-header with-border">
              <a href="<?php echo base_url('pembangunan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Pembangunan</a>
            </div>
            <div class="box-body">
             <div class="col-md-7">
             	<h4>Data Pembangunan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover tabel-rincian">
                        <tbody>
                        	<tr>
			                  <th colspan="3">
			                    <center>
			                    <img style="width: 100%;" src="<?= base_url('assets/img/pembangunan/') . $gambar_proyek; ?>" alt="Foto Pembangunan">
			                  </center>
			                 </th>
			                </tr>
                            <tr>
                               <td width="20%">Nama Kegiatan</td>
                               <td width="1%">:</td>
                               <td><?= set_ucwords($nama_kegiatan); ?></td>
                             </tr>
                             <tr>
                               <td>Alamat</td>
                               <td>:</td>
                               <td><?= set_ucwords($lokasi_pembangunan); ?></td>
                             </tr>
                             <tr>
                               <td>Sumber Dana</td>
                               <td>:</td>
                               <td><?= set_ucwords($sumber_dana); ?></td>
                             </tr>
                             <tr>
                               <td>Anggaran</td>
                               <td>:</td>
                               <td><?= rupiah($total_anggaran) ?></td>
                             </tr>
                             <tr>
                               <td>Volume</td>
                               <td>:</td>
                               <td><?= set_ucwords($volume) ?></td>
                             </tr>
                             <tr>
                               <td>Pelaksana</td>
                               <td>:</td>
                               <td><?= set_ucwords($pelaksana_kegiatan) ?></td>
                             </tr> 
                             <tr>
                               <td>Tahun</td>
                               <td>:</td>
                               <td><?= set_ucwords($tahun_anggaran) ?></td>
                             </tr>
                             <tr>
                               <td>Keterangan</td>
                               <td>:</td>
                               <td><?= set_ucwords($keterangan); ?></td>
                             </tr>
                        </tbody>
                    </table>
                 </div>
             </div>
             <div class="col-md-5">
             	<h4>Dokumentasi Pembangunan</h4>
             	<?php 
                	//get dokumentasi
               	 	$query = $this->db->query("SELECT * FROM dokumentasi_pembangunan where id_pembangunan=$id ORDER BY id DESC");
                	$get_hasil = $query->result();
             	?>
                  <div class="row">
                  	<?php foreach($get_hasil as $main) : ?>
                     <div class="col-sm-6">
                      <!-- jika foto tidak sama dengan default tampil true -->
                      <?php if($main->foto_dok != '404-image-not-found.jpg') : ?>
                       <img style="width: 100%; height: 100px;" class="img-responsive" src="<?= base_url('assets/img/pembangunan/dokumentasi/') . $main->foto_dok; ?>" alt="Dokumentasi">
                      <?php else : ?>
                        <img style="width: 100%; height: 100px;" class="img-responsive" src="<?= base_url()?>assets/img/pembangunan/404-image-not-found.jpg" alt="Dokumentasi">
                      <?php endif; ?>
                      <p style="margin-top: 10px; font-weight: bold;">Foto Pembangunan <?= $main->presentase; ?></p>
                     </div>
                    <?php endforeach; ?>
                  </div>

              <h4>Lokasi Pembangunan</h4>
               <!-- panggil map -->
              <div id="detail_lok1" style="height:300px;"></div>

             </div>
            </div>
          </form>
          </div>
        </div>
      </div>    
</section>
</div>


<script>
  var map = L.map('detail_lok1').setView([<?= $latitude; ?>,<?= $longitude; ?>], 14);

  var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 14,
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>,' +
      'Sistem Desa © <a href="https://www.mapbox.com/">Mapbox</a>',
  }).addTo(map);

  var marker = L.marker([<?= $latitude; ?>,<?= $longitude; ?>]).addTo(map)
    .bindPopup("<b>Nama Kegiatan : <?= $nama_kegiatan; ?></b><br/>"+
    "Alamat : <?= $lokasi_pembangunan; ?><br>"+
    "Volume Pembangunan : <?= $volume; ?>");
</script>