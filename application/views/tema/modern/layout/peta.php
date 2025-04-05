<div class="h-full w-full relative">
    <div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
        <div class="w-auto h-auto flex flex-col gap-2 items-center">
            <h1 class="text-center font-semibold text-xl">Peta Wilayah Administrasi <?= $sebutan_desa; ?> <?= $nama_desa; ?></h1>
            <span class="hr_line w-[10%] h-1"></span>
        </div>
        <div id="peta_wilayah" style="height:420px; position: relative; z-index: 1;"></div>
    </div>
</div>


<?= $this->load->view('aplikasi/peta'); ?>

<script type="text/javascript">
 var map = L.map('peta_wilayah', {
    center: [<?= $latitude; ?>, <?= $longitude; ?>],
    zoom: <?= $zoom_peta; ?>,
    <?php if($jenis_peta == 'mapbox') : ?>
        layers: [peta1]
    <?php elseif($jenis_peta == 'leaflet') : ?>
        layers: [peta4]
    <?php endif; ?>
});

L.control.layers(baseMaps).addTo(map);

L.marker([<?= $latitude; ?>, <?= $longitude; ?>], {icon:icon_marker}).addTo(map)
        .bindPopup("Lokasi Kantor <?= $sebutan_desa; ?> <?= $nama_desa; ?>");

L.polygon([
   [<?= $wilayah_desa; ?>],
]).addTo(map).bindPopup('Wilayah Administrasi <?= $sebutan_desa; ?> <?= $nama_desa; ?>');
</script>
