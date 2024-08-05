

<!-- Ambil data di table setting -->
<?php 
    $get        = $this->db->query('SELECT * FROM setting');
    $getData    = $get->result();
?>


<!-- Buat Fungsi Peta -->
<?php foreach($getData as $main ) : ?>
<script>

    <?php if($main->jenis_peta == 'mapbox') : ?>
     var peta1 = L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=<?= $main->token_peta; ?>", {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
              'Peta © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v12',
           tileSize: 512,
            zoomOffset: -1
          });

        var peta2 = L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=<?= $main->token_peta; ?>", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
              'Peta © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/satellite-streets-v12',
            tileSize: 512,
            zoomOffset: -1
          });

        var peta3 = L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=<?= $main->token_peta; ?>", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
              'Peta © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/outdoors-v12',
            tileSize: 512,
            zoomOffset: -1
          });
    <?php elseif($main->jenis_peta == 'leaflet') : ?>
        var peta4 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          });
    <?php endif; ?>

var baseMaps = {
    <?php if($main->jenis_peta == 'mapbox') : ?>
    "Default": peta1,
    "Satelit": peta2,
    "Medan" : peta3,
    <?php elseif($main->jenis_peta == 'leaflet') : ?>
    "Street View" : peta4,
    <?php endif; ?>
};

var icon_marker = L.icon({
    iconUrl: '<?= base_url('assets/img/icon/').$main->icon_peta; ?>',
    iconSize: [35, 36], 
});

</script>

<?php endforeach; ?>