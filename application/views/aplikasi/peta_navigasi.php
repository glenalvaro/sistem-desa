

<!-- Digunakan untuk mencari rute dalam lokasi kordinat peta -->


<!-- Ambil data di table setting -->
<?php 
    $get        = $this->db->query('SELECT * FROM setting');
    $getData    = $get->result();
?>


<!-- Script tampilan peta -->
<script>
<?php foreach($getData as $val ) : ?>

// Mapbox Public Access Key dari database
mapboxgl.accessToken = '<?= $val->token_peta; ?>';

// Search bar
var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    marker: true,
});

// Direction Form
var directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken,
    language: 'id'
});

// Map Render Event Listener
map.on('render', () => {
    // Do Something here
});

function direction_reset() {
    directions.actions.clearOrigin()
    directions.actions.clearDestination()
    directions.container.querySelector('input').value = ''
}
<?php endforeach; ?>
</script>