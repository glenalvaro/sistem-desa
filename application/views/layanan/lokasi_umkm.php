<style>
  .leaflet-popup-content {
  width: 300px !important;
}
.leaflet-popup-content {
    margin: 13px 5px 13px 5px;
    line-height: 1.3;
    font-size: 11px;
    font-family: Roboto, sans-serif;
    min-height: 1px;
}
.leaflet-routing-container{
    font-size: 12px;
    font-family: Rubik, sans-serif;
    font-weight: normal;
}
</style>
<div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
         Lokasi UMKM
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daftar Usaha</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?=site_url('/layanan/umkm/list_all')?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Kembali ke UMKM</a>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover tabel-rincian">
                      <tbody style="font-size: 11px;">
                         <tr>
                             <th colspan="3">
                              <center>
                                  <div id="lihat_umkm" style="height:300px;"></div>
                            </center>
                           </th>
                        </tr>
                        <tr>
                          <th colspan="3" class="subtitle_head"><strong>DATA USAHA</strong></th>
                        </tr>
                        <tr>
                          <td>Nama</td><td>:</td>
                          <td><?= strtoupper($nama_pemilik); ?></td>
                        </tr>
                         <tr>
                          <td width="200">Nama Usaha</td><td width="1">:</td>
                          <td><?= strtoupper($nama_usaha); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Telepon</td><td width="1">:</td>
                          <td><?= $no_tlp; ?></td>
                        </tr>
                        <tr>
                          <td width="200">Alamat</td><td width="1">:</td>
                          <td><?= $alamat; ?></td>
                        </tr>
                        <tr>
                          <td width="200">Kategori</td><td width="1">:</td>
                          <td><?= strtoupper($nama_kat); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Harga Produk</td><td width="1">:</td>
                          <td>Rp. <?= strtoupper($harga_produk); ?>/<?= strtoupper($satuan_produk); ?></td>
                        </tr>
                        <tr>
                          <td width="200">Deskripsi</td><td width="1">:</td>
                          <td><?= strtoupper($deskripsi); ?></td>
                        </tr>
                      </tbody>
                     </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>

<!-- Load pengaturan peta -->
<?= $this->load->view('aplikasi/peta'); ?>

<?php foreach($setting as $val ) : ?>
<script>

 var map = L.map('lihat_umkm', {
    center: [<?= $latitude; ?>, <?= $longitude; ?>],
    zoom: <?= $val['zoom_peta']; ?>,
     fullscreenControl: true,
    <?php if($val['jenis_peta'] == 'mapbox') : ?>
     layers: [peta1]
    <?php elseif($val['jenis_peta'] == 'leaflet') : ?>
     layers: [peta4]
    <?php endif; ?>
});

 //ambil kordinat lokasi user
  navigator.geolocation.getCurrentPosition(function(position) {
  const lnglat = new L.LatLng(position.coords.longitude, position.coords.latitude);

L.marker([<?= $latitude; ?>, <?= $longitude; ?>], {icon:icon_marker}).addTo(map)
  .bindPopup("<img width='300px' height='105px' src='<?= base_url('assets/img/foto_umkm/') . $gambar; ?>' />"+
            "<div class='row'>"+
            "<div class='col-md-7'>"+
            "<p style='font-size: 14px !important; font-weight: bold;'><?= set_ucwords($nama_usaha); ?></p>"+
            "<span class='label label-warning'><?= format_telpon($no_tlp); ?></span><br>"+
            "<span><?= set_ucwords($nama_pemilik); ?></span><br>"+
            "<span><span class='text-red'><?= set_ucwords($nama_kat); ?></span> - Rp. <?= $harga_produk; ?>/<?= $satuan_produk; ?></span>"+
            "</div>"+
            "<br>"+
            "<div class='col-md-4' style='float :right;'>"+
            "<button onclick='return rute("+position.coords.latitude+", "+position.coords.longitude+")' class='btn btn-default btn-sm' title='Rute Ke Lokasi Saya'><i class='fa fa-share'></i></button>&nbsp;"+
            "<button type='button' class='btn btn-default btn-sm'><i class='fa fa-bookmark'></i></button>"+
            "</div>"+
          "</div>"    
      );
  });

  var control = L.Routing.control({
    waypoints: [
        L.latLng(<?= $latitude; ?>, <?= $longitude; ?>), //lokasi usaha
    ],
    router: new L.Routing.osrmv1({
        language: 'id',
        profile: 'car'
    }),
    routeWhileDragging: false,
    showAlternatives: true,
    altLineOptions: {
        styles: [
            {color: 'black', opacity: 0.15, weight: 9},
            {color: 'white', opacity: 0.8, weight: 6},
            {color: 'blue', opacity: 0.5, weight: 2}
        ]
    },
    createMarker: function (i, waypoint, n) {
      var urlIcon;
      if(i==0){
        urlIcon='<?= base_url('./assets/img/icon/').$val['icon_peta']; ?>';
      }
      else if((i+1)==n){
        urlIcon='<?= base_url('./assets/img/icon/location-user.png'); ?>';
      }
      else{
        urlIcon='<?= base_url('./assets/img/icon/step.png'); ?>';
      }
        const marker = L.marker(waypoint.latLng, {
              draggable: true,
              bounceOnAdd: false,
              bounceOnAddOptions: {
                duration: 1000,
                height: 800,
                function() {
                  (bindPopup(myPopup).openOn(map))
                }
              },
              icon: L.icon({
                iconUrl: urlIcon,
          iconSize: [35, 36]
              })
            });
          return marker;
        }
  })

  function rute(lat,lng){
    var latLng = L.latLng(lat, lng);
    control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
    control.addTo(map);
  }

  L.control.layers(baseMaps).addTo(map);
</script>
<?php endforeach; ?>