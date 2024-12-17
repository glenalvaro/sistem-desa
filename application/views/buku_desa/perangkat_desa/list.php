<div class="content-wrapper">
  <section class="content-header">
       <h1 class="tx-judul">
        Administrasi Umum <small>Perangkat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li><a href="#"> Perangkat</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php $this->load->view('buku_desa/bumindes_umum'); ?>
            <div class="col-md-9">
                <div class="box box-primary">
                   <div class="box-header with-border">
                      <div class="btn-group-vertical">
                        <a href="<?= site_url('perangkat_desa/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                      </div>

                       <div class="btn-group-vertical">
                            <a class="btn btn-social bg-navy btn-sm" data-toggle="dropdown"><i class='fa fa-download'></i> Download</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?= site_url('perangkat_desa/excel'); ?>" class="btn btn-social btn-block btn-sm bg-gray" title="Eksport Penduduk"><i class="fa fa-file-excel-o bg-olive"></i> Download Excel</a>
                                </li>

                                <li>
                                    <a href="<?= site_url('perangkat_desa/pdf'); ?>" class="btn btn-social btn-block btn-sm bg-gray" title="Eksport Penduduk PDF"><i class="fa fa-file-pdf-o bg-maroon"></i> Download PDF</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group-vertical">
                            <a href="<?= site_url('perangkat_desa'); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
                        </div>

                         <div class="btn-group-vertical">
                            <a href="<?= site_url('perangkat_desa/kelola_jabatan'); ?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-list"></i>  Jabatan</a>
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
        <table class="table table-bordered table-striped table-hover table-daftar" style="margin-bottom: 15px">
            <thead class="color-palette">
            <tr>
                <th style="min-width:10px; text-align: center;">No</th>
                <th style="min-width:150px; text-align: center;">Aksi</th>
                <th style="min-width:30px; text-align: center;">Foto</th>
        		<th style="min-width:250px; text-align: center;">Nama, NIPD/NIP, NIK</th>
        		<th style="min-width:150px; text-align: center;">Tempat, Tanggal Lahir</th>
                <th style="min-width:150px; text-align: center;">Jenis Kelamin</th>
        		<th style="min-width:150px; text-align: center;">Agama</th>
                <th style="min-width:150px; text-align: center;">Jabatan</th>
        		<th style="min-width:50px; text-align: center;">Status</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php if($perangkat_desa_data) : ?>
            <?php foreach ($perangkat_desa_data as $data) : ?>
            <tr>
    			<td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="150px">
                        <a href="<?= base_url('perangkat_desa/update/') . $data->id; ?>" class="btn bg-orange btn-sm"  title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <?php if($data->status == 0) : ?>
                        <a href="<?= base_url('perangkat_desa/perangkat_unlock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($data->status == 1) : ?>
                        <a href="<?= base_url('perangkat_desa/perangkat_lock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Nonaktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                    <?php if($data->jabatan_pegawai != 1) : ?>
                        <a href="<?= base_url('perangkat_desa/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
                    <?php endif; ?>
            </td>
                <td>
                    <center>
                        <a href="<?= site_url("perangkat_desa/ambil_foto_perangkat?foto={$data->foto_pegawai}&sex={$data->jenis_kelamin}"); ?>" class="progressive replace foto_penduduk">
                        <img class="preview" loading="lazy" src="<?= site_url('assets/img/img-load.gif') ?>" alt="Foto Pegawai"/>
                        </a>
                    </center>
                </td>
    			<td>
                    <a href="<?= base_url('perangkat_desa/read/') . $data->id; ?>">
                        <span style="color: black; font-size: 11px;"><?= set_ucwords($data->nama_pegawai); ?>., <?= $data->gelar ?></span><br>
                        NIP : <?= $data->nip ?><br>
                        NIK : <?= $data->nik_pegawai ?>
                    </a>
                </td>
    			<td><?= set_ucwords($data->tempat_lahir); ?>, <?= $data->tgl_lahir; ?></td>
                <td> 
                    <?php
                        if ($data->jenis_kelamin == 1) {
                             echo "Laki-Laki";
                         } else {
                            echo "Perempuan";
                         } 
                    ?>  
                </td>
                <td><?= set_ucwords($data->agama); ?></td>
    			<td><?= strtoupper($data->jabatan); ?></td>
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
            <?php endforeach; ?>
             <?php else : ?>
                 <tr>
                    <td class="text-center" colspan="10">Data Tidak Tersedia</td>
                </tr>
            <?php endif; ?>
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