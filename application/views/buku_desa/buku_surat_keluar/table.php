<div class="content-wrapper">
  <section class="content-header">
       <h1 class="tx-judul">
     Administrasi Umum <small>Surat Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li class="active"><a href="#"> Surat Keluar <?= $tipe; ?></a></li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
            <?php $this->load->view('buku_desa/bumindes_umum'); ?>
            <div class="col-md-9">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('buku_surat_keluar/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <a href="<?= site_url('buku_surat_keluar/pdf'); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                        <a target="_blank" href="<?= site_url('buku_surat_keluar/cetak'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
                      </div>
                </div>

        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div style="padding-bottom: 10px;">
		    </div>
            </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('buku_surat_keluar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('buku_surat_keluar'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
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
        <table class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray color-palette" style="font-size: 10px;">
            <tr>
                <th>No.</th>
                <th style="min-width:170px; text-align: center;">Aksi</th>
        		<th style="min-width:100px; text-align: center;">Nomor Surat</th>
                <th style="min-width:150px; text-align: center;">Nama Surat</th>
        		<th style="min-width:40px; text-align: center;">Tgl Surat</th>
        		<th style="min-width:100px; text-align: center;">DItujukan Kepada</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php if($buku_surat_keluar_data) : ?>
            <?php
                foreach ($buku_surat_keluar_data as $data) {
            ?>
            <tr>
    			<td style="text-align:center"><?= ++$start ?></td>
                <td style="text-align:center" width="150px">
                    <a href="<?= site_url('buku_surat_keluar/read/'.$data->id) ?>" class="btn btn-info btn-sm" title="Lihat"><i class="fa fa-eye"></i></a>
                    <a href="<?= base_url(); ?>/folder_arsip/surat_keluar/<?= $data->file_surat; ?>" class="btn bg-maroon btn-sm pdf-preview" title="Lihat Surat"><i class="fa fa-file-pdf-o"></i></a>
                    <a href="<?= site_url('buku_surat_keluar/update/'.$data->id) ?>" class="btn bg-orange btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                    <a href="<?= site_url('buku_surat_keluar/delete/'.$data->id) ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus Surat"><i class="fa fa-trash"></i></a>
                 </td>
    			<td><?= $data->no_surat_kel ?></td>
                <td><?= $data->nama_surat ?></td>
    			<td><?= tgl_indo($data->tgl_surat) ?></td>
    			<td><?= $data->tujuan ?></td>
		      </tr>
                <?php } ?>
            <?php else : ?>
                 <tr>
                    <td class="text-center" colspan="12">Data Tidak Tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
    </div>
            </div>
            </div>
            </div>
    </section>
</div>