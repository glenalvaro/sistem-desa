
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Tambah Usaha</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <?php $this->load->view('layanan/template/side'); ?>
       
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
            Tambah Data Usaha
            </div>
            <form id="mainform" action="<?= base_url('/layanan/umkm/tambah_data'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
            <div class="box-body">   
              <small><i>* Tentukan lokasi usaha anda dengan menggeser pin pada map dibawah.</i></small>
                <br/><br/>
                    <div id="umkm_pin" style="height:350px;"></div>
                <br/>
                 <div class="form-group">
                   <input type="hidden" name="tgl_posting" value="<?= date('Y-m-d') ?>">
                   <input type="hidden" name="nik" value="<?= $penduduk['nik_pend'] ?>">
                    <label for="nik" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control required input-sm" value="<?= $penduduk['nama_pend'] ?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_tlp" class="col-sm-3">Telepon</label>
                    <div class="col-sm-5">
                       <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="no_tlp" id="no_tlp" class="form-control input-sm required" placeholder="Telepon">
                    </div>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat" class="col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" name="alamat" id="alamat" class="form-control input-sm required" placeholder="Alamat Usaha">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nama_usaha" class="col-sm-3">Nama Usaha/Produk</label>
                    <div class="col-sm-9">
                      <input type="text" name="nama_usaha" id="nama_usaha" class="form-control input-sm required" placeholder="Nama Usaha/Produk">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="id_kategori" class="col-sm-3">Kategori</label>
                    <div class="col-sm-5">
                    <select name="id_kategori" class="select-filter form-control required" style="width: 100%;">
                        <option>--Pilih Kategori--</option> 
                        <?php foreach($kat_umkm as $row) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="harga_produk" class="col-sm-3">Harga Produk </label>
                   <div class="col-sm-5">
                    <div class="input-group input-group-sm">
                      <span class="input-group-addon">Rp.</span>
                        <input type="text" name="harga_produk" class="form-control input-sm pull-right required">
                    </div>
                  </div>
                  </div>

                   <div class="form-group">
                    <label for="satuan_produk" class="col-sm-3">Satuan Produk</label>
                    <div class="col-sm-5">
                      <select id="satuan_produk" name="satuan_produk" class="select-filter form-control required" style="width: 100%;">
                            <option value="">Pilih Satuan Produk</option>
                            <option value="bungkus">bungkus</option>
                            <option value="gram">gram</option>
                            <option value="gross">gross</option>
                            <option value="kg">kg</option>
                            <option value="lembar">lembar</option>
                            <option value="lusin">lusin</option>
                            <option value="paket">paket</option>
                            <option value="pcs">pcs</option>
                            <option value="rim">rim</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="latitude" class="col-sm-3">Latitude</label>
                    <div class="col-sm-5">
                      <input type="text" id="id_Lat" name="latitude" class="form-control input-sm required" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="longitude" class="col-sm-3">Longitude</label>
                    <div class="col-sm-5">
                      <input type="text" id="id_Long" name="longitude" class="form-control input-sm required" readonly>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="deskripsi" class="col-sm-3">Deskripsi</label>
                    <div class="col-sm-9">
                       <textarea name="deskripsi" class="form-control input-sm" placeholder="Deskripsi" rows="7"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="deskripsi" class="col-sm-3">Gambar Usaha</label>
                    <div class="col-sm-9">
                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                    </div>
                  </div>
                  <br>
                  <div class="box-footer">
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
               </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>


<!-- Load pengaturan peta -->
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

 var edit_map = L.map('umkm_pin', {
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
  $("#id_Lat").val(position.lat).keyup();
  $("#id_Long").val(position.lng).keyup();
});

$("#id_Lat, #id_Long").change(function(){
  var position =[parseInt($("#id_Lat").val()), parseInt($("#id_Long").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  edit_map.panTo(position);
});
edit_map.addLayer(marker);

</script>
<?php endforeach; ?>
