<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Usaha Mikro
       <small><?= ($id ? 'Ubah' : 'Tambah') ?> Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Usaha Mikro</a></li>
        <li class="active"><?= ($id ? 'Ubah' : 'Tambah') ?> Data</li>
      </ol>
    </section>

<form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
  <section class="content">
      <div class="row">
        <!-- load peta -->
      <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('umkm'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Usaha Mikro</a>
            </div>
            <div class="box-body">
              <div class="peta-judul">
                  <h2 style="font-size:15px;">Lokasi Usaha Mikro</h2>
              </div>
               <div id="lok_usaha" style="height:350px;"></div>
               <br>
            </div>
        </div>
      </div>
        <div class="col-md-9">
           <div class="box box-primary">
            <div class="box-header with-border">
               <h4 style="font-size: 14px;" class="box-title">Data Usaha</h4>
            </div>
              <div class="box-body">
                 <div class="form-group">
                   <input type="hidden" name="id" value="<?= $id; ?>">
                   <input type="hidden" name="tgl_posting" value="<?= date('Y-m-d') ?>">
                    <label for="nik" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                      <select name="nik" class="select-filter form-control required" style="width: 100%;">
                        <option value="<?= $nik; ?>">-- Pilih Penduduk --</option> 
                        <?php foreach($nama_penduduk as $row) : ?>
                            <option value="<?= $row['nik']; ?>" <?=($nik==$row['nik'])?'selected="selected"':''?>><?= $row['nama_penduduk']; ?></option>
                        <?php endforeach; ?>
                      </select>
                       <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_tlp" class="col-sm-3">Telepon</label>
                    <div class="col-sm-5">
                       <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="no_tlp" id="no_tlp" value="<?= $no_tlp; ?>" class="form-control input-sm required" placeholder="Telepon">
                          <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat" class="col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="alamat" id="alamat" value="<?= $alamat; ?>" class="form-control input-sm required" placeholder="Alamat Usaha">
                       <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_usaha" class="col-sm-3">Nama Usaha/Produk</label>
                    <div class="col-sm-9">
                      <input type="text" name="nama_usaha" id="nama_usaha" value="<?= $nama_usaha; ?>" class="form-control input-sm required" placeholder="Nama Usaha/Produk">
                       <?= form_error('nama_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id_kategori" class="col-sm-3">Kategori</label>
                    <div class="col-sm-5">
                    <select name="id_kategori" class="select-filter form-control required" style="width: 100%;">
                        <option value="<?= $id_kategori; ?>">Pilih Kategori</option> 
                        <?php foreach($kategori_usaha as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($id_kategori==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                        <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="harga_produk" class="col-sm-3">Harga Produk </label>
                   <div class="col-sm-5">
                    <div class="input-group input-group-sm">
                      <span class="input-group-addon">Rp.</span>
                        <input type="text" name="harga_produk" id="tanpa-rupiah" class="form-control input-sm pull-right required" value="<?= $harga_produk; ?>">
                        <?= form_error('harga_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  </div>

                   <div class="form-group">
                    <label for="satuan_produk" class="col-sm-3">Satuan Produk</label>
                    <div class="col-sm-5">
                      <select id="satuan_produk" name="satuan_produk" class="select-filter form-control required" style="width: 100%;">
                            <option value="">Pilih Satuan Produk</option>
                            <option value="bungkus" <?=($satuan_produk=='bungkus')?'selected="selected"':''?>>bungkus</option>
                            <option value="gram" <?=($satuan_produk=='gram')?'selected="selected"':''?>>gram</option>
                            <option value="gross" <?=($satuan_produk=='gross')?'selected="selected"':''?>>gross</option>
                            <option value="kg" <?=($satuan_produk=='kg')?'selected="selected"':''?>>kg</option>
                            <option value="lembar" <?=($satuan_produk=='lembar')?'selected="selected"':''?>>lembar</option>
                            <option value="lusin" <?=($satuan_produk=='lusin')?'selected="selected"':''?>>lusin</option>
                            <option value="paket" <?=($satuan_produk=='paket')?'selected="selected"':''?>>paket</option>
                            <option value="pcs" <?=($satuan_produk=='pcs')?'selected="selected"':''?>>pcs</option>
                            <option value="rim" <?=($satuan_produk=='rim')?'selected="selected"':''?>>rim</option>
                      </select>
                      <?= form_error('satuan_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="latitude" class="col-sm-3">Latitude</label>
                    <div class="col-sm-5">
                      <input type="text" id="Lat_usaha" name="latitude" class="form-control input-sm required" value="<?= $latitude; ?>" readonly>
                      <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="longitude" class="col-sm-3">Longitude</label>
                    <div class="col-sm-5">
                      <input type="text" id="Long_usaha" name="longitude" class="form-control input-sm required" value="<?= $longitude; ?>" readonly>
                      <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="deskripsi" class="col-sm-3">Deskripsi</label>
                    <div class="col-sm-9">
                       <textarea name="deskripsi" class="form-control input-sm" placeholder="Deskripsi" rows="7"><?= $deskripsi; ?></textarea>
                    </div>
                  </div>
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
          </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h4 style="font-size: 14px;" class="box-title">Gambar Utama</h4>
            </div>
            <div class="box-body">
              <center>
                <?php if($id) : ?>
                   <img style="width: 180px;" class="img-preview" src="<?= base_url('assets/img/foto_umkm/') . $gambar; ?>">
                <?php else : ?>
                  <img style="width: 180px;" class="img-preview" src="<?= base_url()?>assets/img/foto_umkm/404-image-not-found.jpg">
                <?php endif; ?>
              </center> 
              <br>
              <center>
                <p class="text-red">(Kosongkan jika tidak menambahkan foto)</p>
              </center>
              <center>
              <div class="col-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                    <label class="custom-file-label" for="image"></label>
                </div>
              </div>
              </center>    
            </div> 
            <br> 
          </div>
        </div>
      </div>
    </section>
  </form>
</div>


<?= $this->load->view('aplikasi/peta'); ?>

<?php foreach($setting as $key ) : ?>
<script>

<?php foreach($desa as $get ) : ?>

<?php if($id) : ?>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $latitude; ?>, <?= $longitude; ?>]; 
}
<?php else : ?>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $get['latitude']; ?>, <?= $get['longitude']; ?>]; 
}
<?php endif; ?>

 var edit_map = L.map('lok_usaha', {
    center: [<?= $get['latitude']; ?>, <?= $get['longitude']; ?>],
    zoom: <?= $key['zoom_peta']; ?>,
    <?php if($key['jenis_peta'] == 'mapbox') : ?>
     layers: [peta1]
    <?php elseif($key['jenis_peta'] == 'leaflet') : ?>
     layers: [peta4]
    <?php endif; ?>
});

<?php endforeach; ?>


L.control.layers(baseMaps).addTo(edit_map);

edit_map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
  draggable:'true',
  icon:icon_marker
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
  draggable : 'true'
  }).bindPopup(position).update();
  $("#Lat_usaha").val(position.lat).keyup();
  $("#Long_usaha").val(position.lng).keyup();
});

$("#Lat_usaha, #Long_usaha").change(function(){
  var position =[parseInt($("#Lat_usaha").val()), parseInt($("#Long_usaha").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  edit_map.panTo(position);
});
edit_map.addLayer(marker);

</script>
<?php endforeach; ?>



