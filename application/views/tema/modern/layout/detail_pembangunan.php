<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="w-full min-h-screen flex flex-col gap-5 2xl:mt-15 xl:mt-20 lg:mt-20 md:mt-24 sm:mt-24 phone:mt-24 2xl:px-52 xl:px-44 lg:px-36 md:px-28 sm:px-24 phone:px-6 mb-5">
    <nav class="flex mt-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li>
            <div class="flex items-center">
                <a href="#" class="ml-1 text-sm font-medium text-gray-400 hover:text-[#006633] md:ml-2 phone:text-xs">Pembangunan</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400 phone:w-5 phone:h-5" fill="currentColor" viewBox="0 0 20 20"xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" lip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 phone:text-xs">
                <?= set_ucwords($nama_kegiatan); ?></span>
            </div>
        </li>
    </ol>
</nav>

<div class="w-full h-auto 2xl:px-56 xl:px-44 lg:px-28 md:px-11 sm:px-2 phone:px-1 flex flex-col gap-1 2xl:text-lg xl:text-lg md:text-base sm:text-sm phone:text-sm text-justify gap-5 phone:gap-3 items-center">
    <div class="basis-[50%] h-[calc(100vh*0.5)]">
        <img style="width: 500px !important;" src="<?= base_url('assets/img/pembangunan/') . $gambar_proyek; ?>" alt="<?= $nama_kegiatan; ?>" class="object-contain bg-center w-auto h-full">
    </div>
     <div class="w-auto h-auto flex flex-col gap-2 items-center">
        <h1 class="text-center font-semibold text-xl"><?= $nama_kegiatan; ?></h1>
        <h1 class="text-center text-gray-400 text-md">Sumber Dana <?= $sumber_dana; ?></h1>
        <span class="hr_line w-[10%] h-1"></span>
    </div>
</div>
<div class="table-responsive-vertical mt-6">
    <table id="table" class="table-data table-hover table-mc-light-blue">
        <thead>
            <tr>
                <th>Lokasi</th>
                <th>Lama Kerja</th>
                <th>Anggaran</th>
                <th>Volume</th>
                <th>Tahun</th>
                <th>Pelaksana</th>
                <th>Manfaat</th>
                <th>keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-title='Lokasi'><?= $lokasi_pembangunan; ?></td>
                <td data-title='Lama Kerja'><?= $waktu; ?> <?= $jenis_waktu; ?></td>
                <td data-title='Anggaran'><?= rupiah($total_anggaran); ?></td>
                <td data-title='Volume'><?= $volume; ?></td>
                <td data-title='Tahun'><?= $tahun_anggaran; ?></td>
                <td data-title='Pelaksana'><?= $pelaksana_kegiatan; ?></td>
                <td data-title='Manfaat'><?= $manfaat; ?></td>
                <td data-title='Keterangan'><?= $keterangan; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="w-auto h-auto flex flex-col gap-2 items-center">
    <h1 class="text-center font-semibold text-xl">Foto Dokumentasi</h1>
    <span class="hr_line w-[10%] h-1"></span>
</div>
<?php if($list_dokumentasi) : ?>
 <div class="items slider mt-2">
    <?php foreach ($list_dokumentasi as $main) : ?>
        <div style="width: 100%; padding: 0.5rem !important;" class="slick-slide" tabindex="-1" style="outline: none;">
            <div class="thumbnail-desktop">
                <div class="thumbnail-image-desktop">
                    <img src="<?= base_url('assets/img/pembangunan/dokumentasi/') . $main->foto_dok; ?>">
                </div>
                <div class="thumbnail-content-desktop">
                    <a href="">
                    <div class="thumbnail-title-desktop"><?= $main->ket; ?></div></a>
                    <div class="product-rating d-inline-block">
                        <p class="text-xs phone:text-xs text-gray-400 mt-2">
                            <i class="fas fa-calendar"></i>&nbsp;&nbsp; Presentase <?= $main->presentase; ?>
                        </p>
                    </div>
                <div>
                </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php else : ?>
    <h1 class="text-center text-gray-400 text-md">foto dokumentasi
kegiatan pembangunan ini
belum tersedia.</h1>
<?php endif; ?>

<div class="w-auto h-auto flex flex-col gap-2 items-center">
    <h1 class="text-center font-semibold text-xl">Lokasi Pembangunan</h1>
    <span class="hr_line w-[10%] h-1"></span>
</div>
     <div id="peta_pembangunan" style="height:420px; position: relative; z-index: 1;"></div>
     <br>
</div>

<?= $this->load->view('aplikasi/peta'); ?>

<script type="text/javascript">
 var map = L.map('peta_pembangunan', {
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
        .bindPopup("Lokasi <?= $nama_kegiatan; ?>");
</script>
