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

.area-tooltip {
    background: #363636;
    background: rgba(0,0,0,0.5);
    border: none;
    color: #f8d5e4;
 }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="tx-judul">
        Lakasi Wilayah Desa
      </h1>
      <ol class="breadcrumb">
        <li> Menu</li>
        <li><a href="#">Informasi Desa</a></li>
        <li class="active">Wilayah Desa</li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             <div class="box-header with-border">
              <a href="<?php echo base_url('admin/identitas_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Identitas Desa</a>
            </div>
             <form method="POST" action="<?= base_url('admin/wilayah_desa/'); ?><?= $wilayah_edit['id']; ?>" enctype="multipart/form-data" class="form-horizontal">
            <div class="box-body" style="margin-left: 10px;">

             <!-- panggil map leafvar -->
              <div id="map_wilayah1" style="height:420px;"></div>

              <br>
              <input type="hidden" name="id" value="<?= $wilayah_edit['id']; ?>">
              <textarea style="display: none;" name="wilayah_desa"><?= $wilayah_edit['wilayah_desa']; ?></textarea>
              <?= form_error('wilayah_desa', '<small class="text-danger pl-3">', '</small>'); ?>
                 
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


<script type="text/javascript">
   function createAreaTooltip(layer) {
            if(layer.areaTooltip) {
                return;
            }

            layer.areaTooltip = L.tooltip({
                permanent: true,
                direction: 'center',
                className: 'area-tooltip'
            });

            layer.on('remove', function(event) {
                layer.areaTooltip.remove();
            });

            layer.on('add', function(event) {
                updateAreaTooltip(layer);
                layer.areaTooltip.addTo(map);
            });

            if(map.hasLayer(layer)) {
                updateAreaTooltip(layer);
                layer.areaTooltip.addTo(map);
            }
        }

        function updateAreaTooltip(layer) {
            var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
            var readableArea = L.GeometryUtil.readableArea(area, true);
            var latlng = layer.getCenter();

            layer.areaTooltip
                .setContent(readableArea)
                .setLatLng(latlng);
        }


  <?php foreach($desa as $ds) : ?>
    var map = L.map('map_wilayah').setView([<?= $ds['latitude']; ?>, <?= $ds['longitude']; ?>], 14);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

         var drawnItems = L.featureGroup().addTo(map);

        var polygon = L.polygon([
            JSON.parse($("[name=wilayah_desa]").val())
        ]).addTo(drawnItems);

        createAreaTooltip(polygon);

        map.addControl(new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                marker: false,
                circle: false,
                circlemarker: false,
                rectangle: false,
                polyline: false,
                polygon: {
                    allowIntersection: false,
                    showArea: true
                }
            }
        }));

        map.on(L.Draw.Event.CREATED, function(event) {
            var layer = event.layer;
              console.log("Created")
            
            drawnItems.addLayer(layer);
            var latLng = layer.getLatLngs()[0];
            console.log(latLng)

            $("[name=wilayah_desa]").val(JSON.stringify(latLng));
        });

        map.on(L.Draw.Event.EDITED, function(event) {
            event.layers.getLayers().forEach(function(layer) {
              console.log("Edited");

              var latLng = event.layers.getLayers()[0].getLatLngs()[0];
              $("[name=wilayah_desa]").val(JSON.stringify(latLng));
            })
        });

        map.on(L.Draw.Event.DELETED, function(event) {
            event.layers.getLayers().forEach(function(layer) {
              console.log("Deleted");

              $("[name=wilayah_desa]").val("");
            })
        });

  <?php endforeach; ?>
</script>
