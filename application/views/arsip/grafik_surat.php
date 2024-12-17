<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Grafik Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Arsip</a></li>
        <li class="active"><a href="#"> Grafik Surat</a></li>
      </ol>
    </section>

     <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                 <a href="<?php echo base_url('arsip_surat'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Arsip Surat</a>
            </div>
         <div class="box-body">
             <figure class="highcharts-figure">
                <div id="graph_surat"></div>
            </figure>
        </div>
        </div>
        </div>
        </div>
    </section>
</div>


<script type="text/javascript">
   Highcharts.chart('graph_surat', {
    chart: {
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik Layanan Surat',
        align: 'center'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Jumlah Surat',
        colorByPoint: true,
        data: [
        <?php
        foreach($list_surat as $val) : ?>
            {
                name: '<h4><b><?= strtoupper($val->nama_surat); ?></b></h4>',
                y: <?= $val->jumlah_surat; ?>,
            },
        <?php endforeach; ?>
        ]
    }]
});
</script>