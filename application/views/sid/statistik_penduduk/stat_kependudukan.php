<div class="content-wrapper">
<section class="content-header">
       <h1 class="tx-judul">
       Statistik Kependudukan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Statistik Penduduk</a></li>
      </ol>
</section>

<section class="content">
    <div class="row">
    <?php $this->load->view('sid/statistik_penduduk/side_menu'); ?>

     <div class="col-md-8">
        <div class="box box-info">
               <div class="box-header with-border">
                    <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i>Cetak </a>

                    <a href="" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i>Unduh </a>

                    <a href="#" class="btn btn-social bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" id="grafikType" onclick="grafikType();"><i class="fa fa-bar-chart"></i>Grafik Data </a>

                    <a href="#" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" id="pieType" onclick="pieType();"><i class="fa fa-pie-chart"></i>Pie Data </a>

                    <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
            </div>
        <div class="box-body">
        <?php foreach($setting as $d) : ?>
            <?php foreach($desa as $ds) : ?>
                <h4 style="font-size:15px;" class="box-title text-center"><b>Jumlah dan Persentase Penduduk Berdasarkan <?= $nama_table; ?> yang Dicatat dalam Kartu Keluarga di <?= $d['sebutan_desa'] ?> <?= $ds['nama_desa'] ?>, 
                <?= date('Y') ?></b></h4>
        <?php endforeach; ?>
        <?php endforeach; ?>

        <figure class="highcharts-figure">
            <div id="chart"></div>
        </figure>

        <hr class="statistik_line">

        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
            <thead class="bg-gray color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:200px;" class="text-center">Jenis Kelompok<i class='fa fa-sort fa-sm'></i></th>
                  <th class="text-center">Jumlah<i class='fa fa-sort fa-sm'></i></th>
                  <th class="text-center">Laki-laki<i class='fa fa-sort fa-sm'></i></th>
                  <th class="text-center">Perempuan<i class='fa fa-sort fa-sm'></i></th>
                </tr>
            </thead>
            <tbody style="font-size: 11px;">
                <?php $no = 1; 
                foreach($pendidikan_kk as $data) : ?>
                <tr>
                  <td width="1%" class="text-center"><?= $no++; ?></td>
                  <td width="20%">
                   <?= strtoupper($data->nama); ?>
                  </td>
                  <td width="15%">
                     <?= $data->jumlah; ?>
                  </td>
                  <td width="10%">
                    <?= $data->laki; ?>
                  </td>
                  <td width="10%">
                    <?= $data->perempuan; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td width="1%" class="text-center"></td>
                  <td width="20%">JUMLAH</td>
                  <td width="15%"><?= $jumlah_data; ?></td>
                  <td width="10%"><?= $jumlah_pria; ?></td>
                  <td width="10%"><?= $jumlah_wanita; ?></td>
                </tr>
                <tr>
                  <td width="1%" class="text-center"></td>
                  <td width="20%">BELUM MENGISI</td>
                  <td width="15%"><?= $jumlah_null; ?></td>
                  <td width="10%"><?= $null_pria; ?></td>
                  <td width="10%"><?= $null_wanita; ?></td>
                </tr>
                <tr>
                  <td width="1%" class="text-center"></td>
                  <td width="20%"><b>TOTAL</b></td>
                  <td width="15%"><?= $total_data; ?></td>
                  <td width="10%"><?= $total_pria; ?></td>
                  <td width="10%"><?= $total_wanita; ?></td>
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

<script type="text/javascript">
    var chart;

    function grafikType() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'chart',
                defaultSeriesType: 'column'
            },
            title: 0,
            xAxis: {
                title: {
                    text: '<?= $nama_table; ?>'
                },
                categories: [
                    <?php $i = 0;

                    foreach ($pendidikan_kk as $data) : $i++; ?>
                        <?php if ($data->id != '-') : ?><?= "'{$i}',"; ?><?php endif; ?>
                    <?php endforeach; ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Jumlah Populasi'
                }
            },
            legend: {
                layout: 'vertical',
                enabled: false
            },
            plotOptions: {
                series: {
                    colorByPoint: true
                },
                column: {
                    pointPadding: 0,
                    borderWidth: 0
                }
            },
            series: [{
                shadow: 1,
                border: 1,
                data: [
                    <?php
                    foreach($pendidikan_kk as $key) : ?>
                    {
                        name: '<h4><b><?= strtoupper($key->nama); ?></b></h4>',
                        y: <?= $key->jumlah; ?>,
                    },
                <?php endforeach; ?>
                ]
            }]
        });

        $('#chart').removeAttr('hidden');
    }

    function pieType() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'chart',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: 0,
            plotOptions: {
                index: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'right',
                verticalAlign: 'top',
                x: -30,
                y: 0,
                floating: true,
                shadow: true,
                enabled: true
            },
            series: [{
                type: 'pie',
                name: 'Populasi',
                data: [
                    <?php
                    foreach($pendidikan_kk as $key) : ?>
                    {
                        name: '<h4><b><?= strtoupper($key->nama); ?></b></h4>',
                        y: <?= $key->jumlah; ?>,
                    },
                    <?php endforeach; ?>
                ]
            }]
        });

        $('#chart').removeAttr('hidden');
    }
</script>