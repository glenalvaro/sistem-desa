<!-- Buat style peta.css -->
<?php foreach($setting as $val ) : ?>
<style>
/* custom pop up peta	*/
.leaflet-popup-content {
	width: 300px !important;
}
.leaflet-popup-content {
    margin: 13px 5px 13px 5px;
    line-height: 1.3;
    font-size: 12px;
    font-family: Roboto, sans-serif;
    min-height: 1px;
}

.mapbox-directions-instructions {
    overflow: auto !important;
}

div#geocoder-search {
    width: 25em;
}

.marker {
    font-size: 3em;
    color: #bb0000;
    cursor: pointer;
}

.mapboxgl-popup {
    max-width: 200px;
    border-radius: 1px;
}

.mapboxgl-popup-content {
	width: 300px;
	font-size: 11px !important;
    font-family: 'Rubik', sans-serif;
}

.rute{
	position: absolute;
    top: 160px;
    right: 0;
    padding-right: 25px;
    line-height: 26px;
    display: block;
    text-align: center;
    text-decoration: none;
    color: black;
    z-index: 100;
}

.rute button{
	border: 1px;
}

 #icon-map {
    background-image: url(<?= base_url('assets/img/icon/').$val['icon_peta']; ?>);
    background-size: cover;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
 }

 .img-map{
 	margin-bottom: 10px;
 }
 .leaflet-routing-container{
    font-size: 12px;
    font-family: Rubik, sans-serif;
    font-weight: normal;
}

.gallery-foto {
  position: relative;
  padding-top: 0px;
  padding-bottom: 20px;
}

.gallery-foto img {
  max-width: 150px;
  max-height: 140px;
  height: 150px;
  margin-left: 15px;
  margin-top: 10px;
  border: 1px solid black;
  box-shadow: 6px 6px white;
}

.gallery-foto img:hover {
  border: 1px solid black;
  box-shadow: 3px 3px 3px #3a3a3a;
}
</style>
<?php endforeach; ?>
<div class="content-wrapper">
<section class="content-header">
    <h1 class="tx-judul">
       Usaha Mikro <?= set_ucwords($nama_usaha); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Detail</a></li>
    </ol>
</section>

  <section class="content">
    <div class="row">
		<div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
            	<a href="<?= site_url('umkm'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Usaha Mikro</a>
            </div>
               <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#data_umkm" data-toggle="tab">Data</a></li>
	              <li><a href="#gal" data-toggle="tab">Galeri UMKM</a></li>
	            </ul>
	            <div class="tab-content">
	              <div class="tab-pane active" id="data_umkm">
	                <div class="post">
                  <div class="user-block">
                    <?php if($id) : ?>
	                 <img class="img-circle img-bordered-sm" src="<?= base_url('assets/img/foto_umkm/') . $gambar; ?>" alt="gambar umkm">
	                <?php else : ?>
	                  <img class="img-circle img-bordered-sm" src="<?= base_url()?>assets/img/foto_umkm/404-image-not-found.jpg" alt="gambar umkm">
	                <?php endif; ?>
                        <span class="username">
                          <a href="#"><?= set_ucwords($nama_pemilik); ?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span style="font-size: 11px;" class="description">Tgl Terdaftar - <?= tgl_indo($tgl_posting); ?></span>
                  </div>
                 	<div class="table-responsive">
		            <table class="table table-bordered table-striped table-hover tabel-rincian">
		              <tbody>
		                <tr>
		                 <th colspan="3">
			                <center>
			                    <div id="detail_umkm" style="height:500px;"></div>
			                    <div class="rute">
						            <button class="btn btn-sm btn-default bg-light" id="get-origin"><i class="fa fa-share"></i> Rute</button>
						            <button class="btn btn-sm btn-default bg-light hidden" id="get-destination"><i class="fa fa-times"></i> Hapus Rute</button>
						        </div>
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
		                  <td width="200">NIK</td><td width="1">:</td>
		                  <td><?= $nik; ?></td>
		                </tr>
		                <tr>
		                  <td width="200">Telepon</td><td width="1">:</td>
		                  <td><?= format_telpon($no_tlp); ?></td>
		                </tr>
		                <tr>
		                  <td width="200">Alamat</td><td width="1">:</td>
		                  <td><?= strtoupper($alamat); ?></td>
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
	              <div class="tab-pane" id="gal">
                  	<div class="gallery-foto">
                  		<?php foreach($get_foto as $data) : ?>
						    <a target="_blank" href="<?= base_url('assets/img/foto_umkm/galeri/') . $data['foto']; ?>">
						        <img src="<?= base_url('assets/img/foto_umkm/galeri/') . $data['foto']; ?>" alt="<?= $data['foto']; ?>">
						    </a>
						<?php endforeach; ?>
    				</div>
	          	 </div>
	            </div>
          	   </div>
            </div>
          </div>
  	</div>
</section>
 </div>


<?php foreach($setting as $key ) : ?>

<?php if($key['jenis_peta'] == 'mapbox') : ?>

<!-- jika peta yang dipilih mapbox -->

<?= $this->load->view('aplikasi/peta_navigasi'); ?>

	<script>
		<?php foreach($desa as $data ) : ?>

		var map = new mapboxgl.Map({
		    // Map Cotainer ID
		    container: 'detail_umkm',
		    // Mapbox Style URL
		    style: 'mapbox://styles/glenalvaro09/clz3sdq0l00ni01pcekkx3xxa',
		    zoom: <?= $key['zoom_peta']; ?>, // Default Zoom
		    center: [<?= $data['longitude']; ?>,<?= $data['latitude']; ?>] // Default centered coordinate
		});

		// Adding navigation control on Map
		map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');

		// Map Loaded 
		map.on('load', function() {
			// create the popup
			var popup = new mapboxgl.Popup({ offset: 25 }).setHTML(
			 "<img class='img-map' width='280px' height='105px' src='<?= base_url('assets/img/foto_umkm/') . $gambar; ?>' />"+
			    "<div class='row'>"+
			        "<div class='col-md-8'>"+
			            "<p style='font-size: 12px !important; font-weight: bold;'><?= set_ucwords($nama_usaha); ?></p>"+
			                "<span class='label label-warning'><?= format_telpon($no_tlp); ?></span><br>"+
			                "<span><?= set_ucwords($nama_pemilik); ?></span><br>"+
			                "<span><span class='text-red'><?= set_ucwords($nama_kat); ?></span> - Rp. <?= $harga_produk; ?>/<?= $satuan_produk; ?></span>"+
			         "</div>"+
			          "<div class='col-md-4' style='float :right;'>"+
			                "<button class='btn btn-default btn-sm bg-light'><i class='fa fa-share'></i></button>&nbsp;"+
			                "<button class='btn btn-default btn-sm'><i class='fa fa-bookmark'></i></button>"+
			           "</div>"+
			    "</div>");

			// create icon map
			var el = document.createElement('div');
			el.id = 'icon-map';

			// create the marker
			new mapboxgl.Marker(el)
			    .setLngLat([<?= $longitude; ?>, <?= $latitude; ?>])
			    .setPopup(popup) // sets a popup on this marker
			    .addTo(map);

				//load search peta
				geocoder.container.setAttribute('id', 'geocoder-search')
				
			});

		$(function() {
		  //ambil kordinat lokasi saya
		  navigator.geolocation.getCurrentPosition(function(location) {
		  const lnglat = new L.LatLng(location.coords.longitude, location.coords.latitude);

		    $('#get-origin').click(function() {
		        // Adding Direction form and instructions on map
		        map.addControl(directions, 'top-left');
		        directions.setOrigin([location.coords.longitude, location.coords.latitude]) //dari lokasi saya
		    	directions.setDestination([<?= $longitude; ?>, <?= $latitude; ?>]) // ke lokasi usaha terdaftar
		        $(geocoder.container).hide()
		        $(this).hide()
		        $('#get-destination').removeClass('hidden')
		        $('#icon-map').hide()

		    });
		    $('#get-destination').click(function() {
		        direction_reset()
		        $(this).addClass('hidden')
		        $('#get-origin').show()
		        $(geocoder.container).show()
		        map.removeControl(directions)
		        $('#icon-map').show()
		    });
		  });
		});

		<?php endforeach; ?>
	</script>

<?php elseif($key['jenis_peta'] == 'leaflet') : ?>

	<!-- Kalau peta yang dipilih leaflet -->
	<?= $this->load->view('aplikasi/peta'); ?>

	<script>
	<?php foreach($desa as $main ) : ?>
	 var map = L.map('detail_umkm', {
	    center: [<?= $main['latitude']; ?>,<?= $main['longitude']; ?>],
	    zoom: <?= $key['zoom_peta']; ?>,
	    <?php if($key['jenis_peta'] == 'mapbox') : ?>
	     layers: [peta1]
	    <?php elseif($key['jenis_peta'] == 'leaflet') : ?>
	     layers: [peta4]
	    <?php endif; ?>
	});

	//ambil kordinat lokasi user
	navigator.geolocation.getCurrentPosition(function(position) {
	const lnglat = new L.LatLng(position.coords.longitude, position.coords.latitude);

	L.marker([<?= $latitude; ?>, <?= $longitude; ?>], {icon:icon_marker}).addTo(map)
	    .bindPopup(
	              "<img width='300px' height='105px' src='<?= base_url('assets/img/foto_umkm/') . $gambar; ?>' />"+
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

	<?php endforeach; ?>

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
    		urlIcon='<?= base_url('assets/img/icon/').$key['icon_peta']; ?>';
    	}
    	else if((i+1)==n){
    		urlIcon='<?= base_url('assets/img/icon/location-user.png'); ?>';
    	}
    	else{
    		urlIcon='<?= base_url('assets/img/icon/step.png'); ?>';
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


<?php endif; ?>
<?php endforeach; ?>