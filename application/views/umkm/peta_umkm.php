<style>
#map_umkm{
    width: 100%;
    height: 100vh;
}
.content .peta-title{
    position: absolute;
    top: 0;
    left: 60px;
    z-index: 400;
}
.peta-title h2{
    font-size: 20px !important;
    font-family: 'Rubik', sans-serif;
}
.content .filter-map{
    position: absolute;
    top: 50px;
    left: 60px;
    z-index: 400;
    border-radius: 3px;
    color: rgba(0, 0, 0, 0.5);
    padding: 0px;
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}
.filter-map .form-check label{
    font-family : 'Rubik', sans-serif;
    font-size: 11px;
    font-weight: normal;
}
.filter-map button i{
    font-size: 11px !important;
}
/* custom pop up peta   */
.leaflet-popup-content {
    width: 300px !important;
}
.leaflet-popup-content {
    margin: 13px 5px 13px 5px;
    line-height: 1.3;
    font-size: 12px;
    font-family: Rubik, sans-serif;
    min-height: 1px;
}
.leaflet-routing-container{
    font-size: 12px;
    font-family: Rubik, sans-serif;
    font-weight: normal;
}
.leaflet-control h4{
    margin-left: 10px;
    font-size: 20px;
    font-family: 'Rubik', sans-serif;
}

.leaflet-control h5{
    margin-left: 10px;
    font-size: 15px;
    font-family: 'Rubik', sans-serif;
    font-weight: normal;
    color: #f39c12;
}
.leaflet-control .list-icon .lokUsaha ion-icon{
    color: #1a73e8;
    --ionicon-stroke-width: 20px;
}
#list-foto {
  position: relative;
  padding-top: 0px;
  padding-bottom: 20px;
}

#list-foto img {
  max-width: 110px;
  max-height: 90px;
  height: 100px;
  margin-left: 15px;
  margin-top: 10px;
  border: 1px solid black;
  box-shadow: 6px 6px white;
  transition: left 0.5s, width 0.5s;
}

#list-foto img:hover {
  border: 1px solid black;
}

.icon-map-sidebar{
    font-size: 20px !important;
}
</style>
<div class="content-wrapper">
 
<div id="sidebar">
</div>

<?php foreach($desa as $data ) : ?>
<section class="content">
    <div class="box">
    <div id="map_umkm"></div>
    <div class="peta-title">
        <h2 class="title-map" style="font-size:15px; color: black;">Peta UMKM <?= $data['nama_desa']; ?></h2>
    </div>
    <div class="btn-group-vertical filter-map">
    <a class="btn btn-social btn-sm" data-toggle="dropdown"><i class="fa fa-filter"></i> Filter</a>
        <ul class="dropdown-menu" role="menu">
            <div style="margin-left: 10px;" class="form-check">
                <?php foreach($get_kategori as $main) : ?>
                <div class="col-lg-12 col-sm-6 checkbox">
                    <label style="padding: 5px;">
                        <input type="checkbox" id="cek<?= $main['id']?>" checked><?= $main['nama']; ?>
                    </label>
                </div>
                 <?php endforeach; ?>
            </div>
            <center>
                <button id="filter_umkm" type="button" class="btn btn-social btn-flat btn-primary btn-sm"><i class="fa fa-search"></i> Filter</button>
            </center>
            <br>
        </ul>
    </div>
    </div>
</section>
<?php endforeach; ?>
</div>


<?= $this->load->view('aplikasi/peta'); ?>

<?php foreach($setting as $key ) : ?>
<script>

var isLoading = false;

    $(document).on("click",".foto-umkm",function(){
    var url = "<?= base_url('assets/img/foto_umkm/galeri/'); ?>";
    var dataId = $(this).data('id');
    //alert(dataId);
     if (!isLoading) {
        $("#list-foto").empty();
        isLoading = true;
        $.ajax({
           type: 'post',
           url: "<?= base_url('umkm/get_gambarById'); ?>",
           data:'gambar_id='+dataId,
        }).then(function (response) {
            var hasil_data = JSON.parse(response);
            //console.log(hasil_data);
            for (let i=0;i<hasil_data.length;i++){
                $('#list-foto').append('<img src='+url+''+hasil_data[i].foto+' />');
            } 
            isLoading = false;
        });
      }
    });

<?php foreach($desa as $value ) : ?>
let myJSON=[
  <?php foreach($data_umkm as $data) : ?>
     {
       id          : ['<?= $data->id ?>'],
       nik          : ['<?= $data->nik ?>'],
       no_tlp       : ['<?= format_telpon($data->no_tlp) ?>'],
       alamat       : ['<?= $data->alamat ?>'],
       deskripsi    : ['<?= $data->deskripsi ?>'],
       harga        : ['<?= $data->harga_produk ?>'],
       satuan       : ['<?= $data->satuan_produk ?>'],
       kategori     : ['<?= $data->id_kategori ?>'],
       kat_nama     : ['<?= set_ucwords($data->nama_kat) ?>'],
       nama_pemilik : ['<?= set_ucwords($data->nama_pemilik) ?>'],
       nama_usaha   : ['<?= set_ucwords($data->nama_usaha) ?>'],
       lat          : <?= $data->latitude ?>,
       long         : <?= $data->longitude ?>,
       foto         : ["<img width='300px' height='105px' src='<?= base_url('assets/img/foto_umkm/') . $data->gambar; ?>' />"],
       gambar_url   : ["<?= base_url('assets/img/foto_umkm/') . $data->gambar; ?>"]
     },
  <?php endforeach; ?>
]

var map = L.map('map_umkm', {
    center: [<?= $value['latitude']; ?>,<?= $value['longitude']; ?>],
    zoom: <?= $key['zoom_peta']; ?>,
    <?php if($key['jenis_peta'] == 'mapbox') : ?>
     layers: [peta1]
    <?php elseif($key['jenis_peta'] == 'leaflet') : ?>
     layers: [peta4]
    <?php endif; ?>
});

let myMarkers = L.featureGroup().addTo(map);

filter();
filter_umkm.onclick=()=>filter();

function filter() {

//detail info marker
var sidebar = L.control.sidebar('sidebar', {
    closeButton: true,
    position: 'left',
    autoPan: true
});
map.addControl(sidebar);

  myMarkers.clearLayers();

  let myJSONcopy = JSON.parse(JSON.stringify(myJSON));

  let categories=[];
  
  <?php foreach($data_umkm as $kat) : ?>
  if (cek<?= $kat->id_kategori ?>.checked) {
    categories.push('<?=$kat->id_kategori ?>');
  }
  <?php endforeach; ?>
 
  //looping data
    for (let i=0;i<myJSONcopy.length;i++){
    for (let j=0;j<categories.length;j++){
    for (let f=0;f<myJSONcopy[i].foto.length;f++)
    for (let n=0;n<myJSONcopy[i].nama_usaha.length;n++)
    for (let nk=0;nk<myJSONcopy[i].nik.length;nk++)
    for (let p=0;p<myJSONcopy[i].nama_pemilik.length;p++)
    for (let t=0;t<myJSONcopy[i].no_tlp.length;t++)
    for (let k=0;k<myJSONcopy[i].kategori.length;k++)
    for (let h=0;h<myJSONcopy[i].harga.length;h++)
    for (let s=0;s<myJSONcopy[i].satuan.length;s++)
    for (let kn=0;kn<myJSONcopy[i].kat_nama.length;kn++)
    for (let gb=0;gb<myJSONcopy[i].gambar_url.length;gb++)
    for (let al=0;al<myJSONcopy[i].alamat.length;al++)
    for (let dk=0;dk<myJSONcopy[i].deskripsi.length;dk++)
    for (let iu=0;iu<myJSONcopy[i].id.length;iu++)

     //buat kondisi
    if (categories[j]==myJSONcopy[i].kategori[k] && !myJSONcopy[i].added){
        var marker_hover = L.marker([myJSONcopy[i].lat,myJSONcopy[i].long], {icon:icon_marker}).addTo(myMarkers);
            marker_hover.bindPopup(" " + myJSONcopy[i].foto[f] + "" +
              "<div class='row'>"+
                "<div class='col-md-8'>"+
                    "<p style='font-size: 12px !important;'>"+ myJSONcopy[i].nama_usaha[n]  +"</p>"+
                    "<span>"+ myJSONcopy[i].nama_pemilik[p]  +"</span><br>"+
                    "<span><span class='text-red'>"+ myJSONcopy[i].kat_nama[kn]  +"</span> - Rp. "+ myJSONcopy[i].harga[h]  +"/"+ myJSONcopy[i].satuan[s]  +"</span>"+
                "</div>"+
              "</div>");
           
            marker_hover.on('mouseover', function (e) {
                this.openPopup();
            });
            marker_hover.on('mouseout', function (e) {
                this.closePopup();
            });

            marker_hover.on('click', function(){
            //covert cordinat geojson
            jQuery.get("https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat="+myJSONcopy[i].lat+"&lon="+myJSONcopy[i].long+"", function(data){
            const alamat_lengkap = data.display_name;
            sidebar.show();
            sidebar.setContent(
                "<div class='widget-user-header' style='background: url("+ myJSONcopy[i].gambar_url[gb] +") center center; background-size: cover; height: 200px;'>"+
                "</div>"+
                "<h4>"+ myJSONcopy[i].nama_usaha[n]  +"</h4>"+
                "<h5>"+ myJSONcopy[i].kat_nama[kn]  +"</h5>"+
                "<br>"+
              "<div class='nav-tabs-custom list-menu'>"+
                  "<ul class='nav nav-tabs' style='border-bottom: none !important;'>"+
                    "<li class='active'><a href='#ringkasan' data-toggle='tab'>Ringkasan</a></li>"+
                    "<li><a class='foto-umkm' data-id="+myJSONcopy[i].id[iu]+" href='#umkm_gab' data-toggle='tab'>Foto</a></li>"+
                    "<li><a href='#data' data-toggle='tab'>Data</a></li>"+
                    "<li><a href='#tentang' data-toggle='tab'>Tentang Usaha</a></li>"+
                  "</ul>"+
              "<div class='tab-content'>"+
                "<hr style='border-top: 1px solid #d2d6de;'>"+
                "<div class='tab-pane tab-detail-map active' id='ringkasan'>"+
                  "<div class='row list-icon'>"+
                      "<div class='col-xs-3 text-center'>"+
                          "<a class='lokUsaha' data-lat="+ myJSONcopy[i].lat +" data-long="+ myJSONcopy[i].long +" href='#'><i class='ion-ios-navigate-outline icon-map-sidebar'></i></a>"+
                          "<span>Rute</span>"+
                      "</div>"+
                      "<div class='col-xs-3 text-center'>"+
                           "<a href='#'><i class='ion-ios-pricetag-outline icon-map-sidebar'></i></a>"+
                          "<span>Simpan</span>"+
                      "</div>"+
                      "<div class='col-xs-3 text-center'>"+
                            "<a href='#'><i class='ion-social-rss-outline icon-map-sidebar'></i></a>"+
                            "<span>DiSekitar</span>"+
                      "</div>"+
                      "<div class='col-xs-3 text-center'>"+
                             "<a href='#'><i class='ion-forward icon-map-sidebar'></i></a>"+
                            "<span>Bagikan</span>"+
                      "</div>"+
                  "</div>"+
                  "<br>"+
                  "<hr style='border-top: 1px solid #d2d6de;'>"+
                  "<div class='box-body chat list-detail-map'>"+
                    "<div class='item'>"+
                      "<i class='ion-ios-more-outline icon-map-sidebar'></i>"+
                      "<p class='message'>"+ myJSONcopy[i].alamat[al]  +"</p>"+
                    "</div>"+

                    "<div class='item'>"+
                      "<i class='ion-ios-pricetags-outline icon-map-sidebar'></i>"+
                      "<p class='message'>Rp."+ myJSONcopy[i].harga[h] +"/"+myJSONcopy[i].satuan[s]+"</p>"+
                    "</div>"+

                    "<div class='item'>"+
                      "<i class='ion-ios-telephone-outline icon-map-sidebar'></i>"+
                      "<p class='message'>"+ myJSONcopy[i].no_tlp[t]  +"</p>"+
                    "</div>"+

                    "<div class='item'>"+
                      "<i class='ion-ios-location-outline icon-map-sidebar'></i>"+
                      "<p class='message'>"+ alamat_lengkap +"</p>"+
                    "</div>"+

                    "<div class='item'>"+
                      "<i class='ion-ios-information-outline icon-map-sidebar'></i>"+
                      "<p class='message'><span class='text-red'>Buka</span> - 07.00 - 20.00</p>"+
                    "</div>"+
                 "</div>"+
                "</div>"+

                "<div class='tab-pane' id='data'>"+
                   "<div class='table-responsive'>"+
                    "<table class='table tabel-rincian'>"+
                      "<tbody>"+
                        "<tr>"+
                          "<td>Nama</td><td>:</td>"+
                          "<td>"+ myJSONcopy[i].nama_pemilik[p]  +"</td>"+
                        "</tr>"+
                         "<tr>"+
                          "<td width='200'>Usaha</td><td width='1'>:</td>"+
                          "<td>"+ myJSONcopy[i].nama_usaha[n]  +"</td>"+
                        "</tr>"+
                        "<tr>"+
                          "<td width='200'>NIK</td><td width='1'>:</td>"+
                          "<td>"+ myJSONcopy[i].nik[nk]  +"</td>"+
                        "</tr>"+
                        "<tr>"+
                          "<td width='200'>Telepon</td><td width='1'>:</td>"+
                          "<td>"+ myJSONcopy[i].no_tlp[t]  +"9</td>"+
                        "</tr>"+
                        "<tr>"+
                          "<td width='200'>Alamat</td><td width='1'>:</td>"+
                          "<td>"+ myJSONcopy[i].alamat[al]  +"</td>"+
                        "</tr>"+
                        "<tr>"+
                          "<td width='200'>Kategori</td><td width='1'>:</td>"+
                          "<td>"+ myJSONcopy[i].kat_nama[kn]  +"</td>"+
                        "</tr>"+
                      "</tbody>"+
                     "</table>"+
                    "</div>"+
                "</div>"+
                "<div class='tab-pane' id='tentang'>"+
                  "<h5><b>Fasilitas</b></h5>"+
                    "<div class='item'>"+
                      "<i class='fa fa-check'></i> &nbsp;Tempat Parkir"+
                    "</div>"+
                    "<br>"+
                    "<div class='item'>"+
                      "<i class='fa fa-check'></i> &nbsp;Toilet"+
                    "</div>"+
                  "<hr style='border-top: 1px solid #d2d6de;'>"+
                  "<h5><b>Deskripsi</b></h5>"+
                  "<div class='item'>"+
                      "<p>"+ myJSONcopy[i].deskripsi[dk]  +""+
                  "</div>"+
                  "<hr style='border-top: 1px solid #d2d6de;'>"+
                "</div>"+
                "<div class='tab-pane' id='umkm_gab'>"+
                  "<h5><b>Foto</b></h5>"+
                   "<div id='list-foto'>"+
                   "</div>"+
                "</div>"+
              "</div>"+
            "</div>"
            );      
        });
        });

        myJSONcopy[i].added=true;
        break;
      }
    }
  }
}

//ambil kordinat lokasi user
navigator.geolocation.getCurrentPosition(function(position) {

// console.log(position.coords.latitude, position.coords.longitude)

var control = L.Routing.control({
    waypoints: [
        L.latLng(position.coords.latitude, position.coords.longitude), //kordinat user
    ],
    router: new L.Routing.osrmv1({
        language: 'id',
        profile: 'car'
    }),
    geocoder: L.Control.Geocoder.nominatim(),
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
            urlIcon='<?= base_url('assets/img/icon/location-user.png'); ?>';
        }
        else if((i+1)==n){
            urlIcon='<?= base_url('assets/img/icon/').$key['icon_peta']; ?>';
        }
        else{
            urlIcon='<?= base_url('assets/img/icon/step.png'); ?>';
        }
        const marker = L.marker(waypoint.latLng, {
              draggable: false,
              bounceOnAdd: false,
              bounceOnAddOptions: {
                duration: 800,
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
    });

    $(document).on("click",".lokUsaha",function(){
        var lok_map = [$(this).data('lat'),$(this).data('long')];
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, lok_map);
        control.addTo(map);
    })

    L.control.layers(baseMaps).addTo(map);
    });

<?php endforeach; ?>
</script>
<?php endforeach; ?>

