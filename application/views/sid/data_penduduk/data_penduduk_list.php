<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Data Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Penduduk</a></li>
      </ol>
    </section>

    <section class="content">
        <form method="post" action="<?= site_url('data_penduduk/delete_all_penduduk') ?>" id="delete_all">
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                        <a href="<?= site_url('data_penduduk/create'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Penduduk</a>

                        <div class="btn-group-vertical">
                            <a class="btn btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi Lainnya</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?= site_url('data_penduduk/cetak_penduduk'); ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Cetak Penduduk" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                </li>

                                <li>
                                    <button type="submit" name="delete_checklistPend" class="btn btn-social btn-flat btn-block btn-sm" title="Ceklis pada data yang akan dihapus" disabled="">
                                        <i class="fa fa-trash"></i> Hapus Data Terpilih</a>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group-vertical">
                            <a class="btn btn-social btn-flat bg-maroon btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Impor / Ekspor</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?= site_url('data_penduduk/export_excel'); ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Eksport Penduduk"><i class="fa fa-download"></i> Eksport Penduduk</a>
                                </li>

                                <li>
                                    <a href="<?= site_url('data_penduduk/export_PDF'); ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Eksport Penduduk PDF"><i class="fa fa-download"></i> Export Penduduk PDF</a>
                                </li>
                            </ul>
                        </div>

                        <a href="" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-refresh"></i>Bersihkan</a>
                    </div>


        <div class="box-body table-penduduk">
            <div class="row">   
            <div class="col-sm-9">
            <div class="form-inline">
                 <span id="filter_dusun"></span>  
                 <select id="filter_sex" class="form-control select-filter2">
                    <option value="">Jenis Kelamin</option>
                    <?php foreach($list_jenis_kelamin as $row) : ?>
                        <option value="<?= $row['nama']; ?>"><?= set_ucwords($row['nama']); ?></option>
                    <?php endforeach; ?>
                </select>  
                 <span id="filter_status"></span>  
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-group pull-right">
                <input type="search" class="input-cari form-control" id="filterbox" placeholder="Cari Penduduk...">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-default" disabled><i class="fa fa-search"></i></button>
                </span>
            </div>
            </div>
            </div>
            <div class="table-responsive" style="margin-top: 10px;">
                    <table style="width:100%;" id="filtertable" class="table table-bordered dataTable table-striped table-hover no-footer">
                            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
                                <tr>
                                    <th>
                                        <input type="checkbox" id="check_pend">
                                    </th>
                                    <th style="min-width:20px; font-weight: bold;">No</th>
                                    <th style="min-width:50px; text-align: center;">AKSI</th>
                                    <th style="min-width:50px; text-align: center;">FOTO</th>
                                    <th style="min-width:150px; text-align: center;">NIK</th>
                                    <th style="min-width:200px; text-align: center;">NAMA</th>
                                    <th style="min-width:150px; text-align: center;">NO. KK</th>
                                    <th style="min-width:100px; text-align: center;">UMUR</th>
                                    <th style="min-width:150px; text-align: center;">NAMA AYAH</th>
                                    <th style="min-width:150px; text-align: center;">NAMA IBU</th>
                                    <th style="min-width:150px; text-align: center;">ALAMAT</th>
                                    <th style="min-width:100px; text-align: center;">WILAYAH</th>
                                    <th style="min-width:150px; text-align: center;">PENDIDIKAN</th>
                                    <th style="min-width:150px; text-align: center;">PEKERJAAN</th>
                                    <th style="min-width:150px; text-align: center;">KAWIN</th>
                                    <th style="min-width:150px; text-align: center;">JENIS KELAMIN</th>
                                    <th style="min-width:150px; text-align: center;">STATUS PENDUDUK</th>
                                    <th style="min-width:150px; text-align: center;">TANGGAL TERDAFTAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_penduduk_data as $data) : ?>
                                <tr>
                                    <td>
                                        <input id="data_pend" type="checkbox" class="checklist-pend" name="id[]" value="<?= $data->id ?>">
                                    </td>
                                    <td><?php echo ++$start ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi</a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="<?= site_url('data_penduduk/read/'.$data->id) ?>" class="btn btn-social btn-flat btn-block btn-sm" title=" Detail Data Penduduk"><i class="fa fa-eye"></i> Biodata Penduduk</a>
                                                </li>
                                                <li>
                                                    <a href="<?= site_url('data_penduduk/update/'.$data->id) ?>" class="btn btn-social btn-flat btn-block btn-sm" title=" Ubah Data Penduduk"><i class="fa fa-edit"></i> Ubah Biodata Penduduk</a>
                                                </li>
                                                <li>
                                                    <a href="<?= site_url('data_penduduk/delete/'.$data->id) ?>" class="btn btn-social btn-flat btn-block btn-sm aksi-hapus" title="Hapus Data Penduduk"><i class="fa fa-trash"></i> Hapus Data Penduduk</a>
                                                </li>
                                                 <li>
                                                    <a href="<?= site_url('data_penduduk/cetak_biodata/'.$data->id) ?>" class="btn btn-social btn-flat btn-block btn-sm" title="Cetak Data Penduduk" target="_blank"><i class="fa fa-print"></i> Cetak Biodata Penduduk</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <center>
                                        <a href="<?= site_url("data_penduduk/ambil_foto?foto={$data->foto}&sex={$data->jenis_kelamin}"); ?>" class="progressive replace foto_penduduk">
                                        <img class="preview" loading="lazy" src="<?= site_url('assets/img/img-load.gif') ?>" alt="Foto Penduduk"/>
                                        </a>
                                        </center>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('data_penduduk/read/'.$data->id) ?>"><?= $data->nik; ?></a>
                                    </td>
                                    <td><?= set_ucwords($data->nama_penduduk); ?></td>
                                    <td>
                                        <a href=""><?= $data->no_kk; ?></a>
                                    </td>
                                    <td><?= hitung_umur($data->tgl_lahir); ?></td>
                                    <td><?= set_ucwords($data->nama_ayah); ?></td>
                                    <td><?= set_ucwords($data->nama_ibu); ?></td>
                                    <td><?= set_ucwords($data->alamat_sekarang); ?></td>
                                    <td><?= set_ucwords($data->dusun); ?></td>
                                    <td><?= set_ucwords($data->pendidikan_kk); ?></td>
                                    <td><?= set_ucwords($data->pekerjaan); ?></td>
                                    <td><?= set_ucwords($data->status_kawin); ?></td>
                                    <td><?= set_ucwords($data->sex); ?></td>
                                    <td><?= set_ucwords($data->status); ?></td>
                                    <td><?= tgl_indo($data->tgl_terdaftar); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

        <div class="row">
            <div class="col-md-6">  
            </div>
            <div class="col-md-6 text-right" style="margin-top: 20px; margin-bottom: 50px;">
            </div>
        </div>

        </div>
            </div>
            </div>
            </div>
    </section>
</div>

<script>
    $(document).ready(function() {
    var table = $('#filtertable').DataTable({
        "pageLength": 50,
        "ordering" : false,
        'aoColumnDefs':[{
            'bSortable':false,
            'aTargets':['nosort'],
        }],
        "bLengthChange":true,
        "dom":'<"bottom">ct<"bottom"lp><"clear">',
         initComplete: function () {
              this.api().columns([16]).every( function () {
                var column1 = this;
                var select1 = $('<select class="form-control select-filter2"><option value="">Status Penduduk</option></select>')
                    .appendTo($('#filter_status'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column1
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
 
                column1.data().unique().sort().each( function (d, j) {
                    select1.append('<option value="'+d+'">'+d+'</option>')
                });
            });
            this.api().columns([11]).every( function () {
                var column = this;
                var select = $('<select class="form-control select-filter2"><option value="">Pilih Wilayah</option></select>')
                    .appendTo($('#filter_dusun'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
 
                column.data().unique().sort().each( function (d, j) {
                    select.append('<option value="'+d+'">'+d+'</option>')
                });
            });
        }
    });

    //filter search
    $("#filterbox").keyup(function(){
        table.search(this.value).draw();
    });

    //filter berdasarkan jenis kelamin
    $("#filter_sex").on("change", function(){
        var sex = $(this).val();
        // alert(sex);
        $.ajax({
            url:"<?= base_url('data_penduduk/filter_sex'); ?>", 
            type:"POST",
            data:"cek_sex=" + sex,
            success:function(data){
              table.search(sex).draw();
            }
        });
    });
});
</script>