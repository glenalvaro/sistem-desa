<style>
.form-horizontal .control-label {
    text-align: left;
}

  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-size: 12px;
}

.input-sm1 {
    height: 35px;
    padding: 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 2px;
}
</style>
<div class="content-wrapper">
<?php foreach($setting as $main) : ?>
<section class="content-header">
    <h1 class="tx-judul">
      Lakasi Kantor <?= $main['sebutan_desa']; ?>
    </h1>
    <ol class="breadcrumb">
      <li> Menu</li>
      <li><a href="#"> Informasi <?= $main['sebutan_desa']; ?></a></li>
      <li class="active">Lokasi Kantor <?= $main['sebutan_desa']; ?></li>
    </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             <div class="box-header with-border">
              <a href="<?php echo base_url('identitas_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Identitas <?= $main['sebutan_desa']; ?></a>
            </div>
             <form method="POST" action="<?= base_url('identitas_desa/lokasi_kantor/'); ?><?= $lokasi_edit['id']; ?>" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body" style="margin-left: 10px;">

             <!-- panggil map -->
              <div id="lokasi_kantor" style="height:420px;"></div>

              <br>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Latitude</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="<?= $lokasi_edit['id']; ?>">
                      <input type="text" id="Lat" name="latitude" class="form-control input-sm" value="<?= $lokasi_edit['latitude']; ?>">
                      <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Longitude</label>
                    <div class="col-sm-7">
                      <input type="text" id="Long" name="longitude" class="form-control input-sm" value="<?= $lokasi_edit['longitude']; ?>">
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

<?php endforeach; ?>


<?= $this->load->view('aplikasi/peta'); ?>

<?php foreach($setting as $val ) : ?>
<script>

var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $lokasi_edit['latitude']; ?>, <?= $lokasi_edit['longitude']; ?>]; 
}


 var edit_map = L.map('lokasi_kantor', {
    center: [<?= $lokasi_edit['latitude']; ?>, <?= $lokasi_edit['longitude']; ?>],
    zoom: <?= $val['zoom_peta']; ?>,
    <?php if($val['jenis_peta'] == 'mapbox') : ?>
     layers: [peta1]
    <?php elseif($val['jenis_peta'] == 'leaflet') : ?>
     layers: [peta4]
    <?php endif; ?>
});


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
  $("#Lat").val(position.lat);
  $("#Long").val(position.lng).keyup();
});

$("#Lat, #Long").change(function(){
  var position =[parseInt($("#Lat").val()), parseInt($("#Long").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  edit_map.panTo(position);
});
edit_map.addLayer(marker);

</script>
<?php endforeach; ?>