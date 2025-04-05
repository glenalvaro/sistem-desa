<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="h-full w-full relative">
    <div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
        <div class="w-auto h-auto flex flex-col gap-2 items-center">
            <h1 class="text-center font-semibold text-2xl">Statistik <?= $jenis_statistik; ?></h1>
            <span class="hr_line w-[10%] h-1"></span>
        </div>
        <figure class="highcharts-figure">
            <div id="chart_front"></div>
        </figure>
    </div>
</div>

<script type="text/javascript">
Highcharts.chart('chart_front', {
    chart: {
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '',
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
        name: 'Jumlah',
        colorByPoint: true,
        data: [
        <?php
        foreach($data_stat as $key) : ?>
            {
                name: '<h4><b><?= strtoupper($key->nama); ?></b></h4>',
                y: <?= $key->jumlah; ?>,
            },
        <?php endforeach; ?>
        ]
    }]
});
</script>