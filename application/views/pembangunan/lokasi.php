<div class="content-wrapper">
    <section class="content-header">
      <h1 class="tx-judul">
        Lokasi Pembangunan <?= ucwords($nama_kegiatan); ?>
      </h1>
      <ol class="breadcrumb">
        <li> Menu</li>
        <li><a href="#"> Pembangunan</a></li>
        <li class="active">Lokasi</li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             <div class="box-header with-border">
              <a href="<?php echo base_url('pembangunan'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Pembangunan</a>
            </div>
             <form id="mainform" method="POST" action="<?= base_url('pembangunan/update_lokasi/'); ?><?= $id; ?>" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body" style="margin-left: 10px;">

             <!-- panggil map -->
              <div id="lok_pembangunan1" style="height:420px;"></div>

              <br>
                  <div class="form-group">
                    <label for="latitude" class="col-sm-3 control-label">Latitude</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" id="Lok1" name="latitude" class="form-control input-sm required" value="<?= $latitude; ?>">
                       <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="longitude" class="col-sm-3 control-label">Longitude</label>
                    <div class="col-sm-7">
                      <input type="text" id="Lok2" name="longitude" class="form-control input-sm required" value="<?= $longitude; ?>">
                       <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
            <div class='box-footer'>
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
            </div>
            </div>
          </form>
          </div>
        </div>
      </div>    
</section>
</div>

<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $latitude; ?>, <?= $longitude; ?>]; 
}

var edit_map = L.map('lok_pembangunan').setView([<?= $latitude; ?>, <?= $longitude; ?>], 14);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>,' +
      'Sistem Desa © <a href="https://www.mapbox.com/">Mapbox</a>'
}).addTo(edit_map);

edit_map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
  draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
  draggable : 'true'
  }).bindPopup(position).update();
  $("#Lok1").val(position.lat);
  $("#Lok2").val(position.lng).keyup();
});

$("#Lok1, #Lok2").change(function(){
  var position =[parseInt($("#Lok1").val()), parseInt($("#Lok2").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  edit_map.panTo(position);
});
edit_map.addLayer(marker);
</script>