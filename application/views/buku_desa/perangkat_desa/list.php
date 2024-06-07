<div class="content-wrapper">

    <section class="content-header">
       <h1 class="tx-judul">
        Data Perangkat Desa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Desa</a></li>
        <li><a href="#"> Perangkat Desa</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                   <div class="box-header with-border">
                      <div class="btn-group-vertical">
                        <a href="<?= site_url('perangkat_desa/create'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Data Perangkat</a>
                      </div>

                       <div class="btn-group-vertical">
                            <a class="btn btn-social btn-flat bg-navy btn-sm" data-toggle="dropdown"><i class='fa fa-download'></i> Download</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?= site_url('perangkat_desa/excel'); ?>" class="btn btn-social btn-flat btn-block btn-sm bg-gray" title="Eksport Penduduk"><i class="fa fa-file-excel-o bg-olive"></i> Download Excel</a>
                                </li>

                                <li>
                                    <a href="<?= site_url('perangkat_desa/pdf'); ?>" class="btn btn-social btn-flat btn-block btn-sm bg-gray" title="Eksport Penduduk PDF"><i class="fa fa-file-pdf-o bg-maroon"></i> Download PDF</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group-vertical">
                            <a href="<?= site_url('perangkat_desa'); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
                        </div>

                         <div class="btn-group-vertical">
                            <a href="<?= site_url('perangkat_desa/kelola_jabatan'); ?>" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-gear"></i> Kategori Jabatan</a>
                        </div>
                    </div>


        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div style="padding-bottom: 10px;">
                <form action="" method="get">
                <div class="form-inline">
                    <select name="status_peg"class="form-control select-filter2" onchange="this.form.submit()">
                        <option value="">Status</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
                    </select> 
                </div>
                </form>
	       </div>
            </div>
            <div class="col-md-3">
            <form action="<?= site_url('perangkat_desa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('perangkat_desa'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
                                    <?php
                                }
                            ?>
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
        <div class="table-responsive" style="margin-bottom: 10px;">
        <table class="table table-bordered table-striped table-hover no-footer" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th style="min-width:10px; text-align: center;">No</th>
                <th style="min-width:150px; text-align: center;">ACTION</th>
                <th style="min-width:50px; text-align: center;">FOTO</th>
        		<th style="min-width:250px; text-align: center;">NAMA PERANGKAT DESA</th>
        		<th style="min-width:200px; text-align: center;">NIK</th>
        		<th style="min-width:180px; text-align: center;">NIP</th>
        		<th style="min-width:150px; text-align: center;">PANGKAT / GOLONGAN</th>
        		<th style="min-width:150px; text-align: center;">JABATAN</th>
        		<th style="min-width:50px; text-align: center;">STATUS</th>
            </tr>
            </thead>
               <?php
                foreach ($perangkat_desa_data as $data)
                    {
                ?>
            <tbody style="font-size: 11px;">
            <tr>
    			<td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('perangkat_desa/read/'.$data->id),'<i class="fa fa-eye fa-sm" aria-hidden="true"></i>','class="btn bg-olive btn-flat btn-sm"'); 
                echo '  ';
                echo anchor(site_url('perangkat_desa/update/'.$data->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-flat btn-sm"'); 
                echo '  ';
                echo anchor(site_url('perangkat_desa/delete/'.$data->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn bg-maroon btn-flat btn-sm aksi-hapus"');
                ?>
            </td>
                <td>
                    <center>
                        <a href="<?= site_url("perangkat_desa/ambil_foto_perangkat?foto={$data->foto_pegawai}&sex={$data->jenis_kelamin}"); ?>" class="progressive replace foto_penduduk">
                        <img class="preview" loading="lazy" src="<?= site_url('assets/img/img-load.gif') ?>" alt="Foto Pegawai"/>
                        </a>
                    </center>
                </td>
    			<td><?= strtoupper($data->nama_pegawai); ?>., <?= $data->gelar ?></td>
    			<td><?= $data->nik_pegawai ?></td>
    			<td><?= $data->nip ?></td>
    			<td><?= strtoupper($data->pangkat_golongan); ?></td>
    			<td><?= strtoupper($data->jabatan_pegawai); ?></td>
    			<td>
                   <?php
                        if ($data->status == 1) {
                             echo "<small class='label label-success'> Aktif</small>";
                         } else {
                            echo "<small class='label label-danger'> Tidak Aktif</small>";
                         } 
                    ?>     
                </td>
		 </tr>
                <?php } ?>
        </tbody>
        </table>
    </div>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?= $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>