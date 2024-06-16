<div class="content-wrapper">

    <section class="content-header">
       <h1 class="tx-judul">
         Buku Administrasi Desa - Surat Masuk 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Surat Masuk</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('buku_surat_masuk/create'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <a href="<?= site_url('buku_surat_masuk/unduh_pdf'); ?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Download</a>

                        <a href="<?= site_url('buku_surat_masuk/cetak_all'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
                      </div>
                    </div>


        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div style="padding-bottom: 10px;">
	       </div>
            </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('buku_surat_masuk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('buku_surat_masuk'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
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
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>No</th>
                <th style="min-width:200px; text-align: center;">Action</th>
        		<th style="min-width:150px; text-align: center;">Nama Surat</th>
        		<th style="min-width:100px; text-align: center;">Tgl Terima</th>
        		<th style="min-width:115px; text-align: center;">No Surat</th>
        		<th style="min-width:100px; text-align: center;">Tgl Surat</th>
        		<th style="min-width:150px; text-align: center;">Pengirim Surat</th>
        		<th style="min-width:150px; text-align: center;">Disposisi Kepada</th>
            </tr>
            </thead>
            <?php
                foreach ($buku_surat_masuk_data as $data) { ?>
            <tbody>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
                 <td style="text-align:center" width="150px">
                    <a href="<?= site_url('buku_surat_masuk/read/'.$data->id) ?>" class="btn btn-info btn-sm" title="Lihat"><i class="fa fa-eye"></i></a>
                    <a href="<?= site_url('buku_surat_masuk/cetak_disposisi/'.$data->id) ?>" data-remote="false" data-toggle="modal" data-target="#cetak_dispo<?= $data->id; ?>" class="btn bg-maroon btn-sm" title="Cetak Disposisi Surat"><i class="fa fa-file-pdf-o"></i></a>
                    <a href="<?= site_url('buku_surat_masuk/update/'.$data->id) ?>" class="btn bg-orange btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                    <a href="<?= site_url('buku_surat_masuk/delete/'.$data->id) ?>" class="btn btn-danger btn-sm aksi-hapus" title="Hapus Surat"><i class="fa fa-trash-o"></i></a>
                 </td>
    			<td><?= $data->nama_surat ?></td>
    			<td><?= tgl_indo($data->tgl_terima) ?></td>
    			<td><?= $data->no_surat ?></td>
    			<td><?= tgl_indo($data->tgl_surat) ?></td>
    			<td><?= $data->pengirim_surat ?></td>
    			<td>
                <?php
                foreach ($list_jabt as $r) : ?>
                    <?php if($r['id']==$data->disposisi_ke) : ?>
                       <?= $r['nama']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
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
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
</div>


<!-- Modal Cetak -->
<?php $no = 0;
foreach($list_suratID as $row) : $no++; ?>
<div class="modal fade" id="cetak_dispo<?= $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 16px; font-weight: bold;">Cetak Lembar Disposisi Surat</h4>
              </div>
              <form target="_blank" action="<?= base_url('buku_surat_masuk/cetak_disposisi/'); ?><?= $row['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                    <label>Laporan Ditandatangani</label>
                     <select name="lap_di" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                    <option value="">Pilih Staff Pemerintahan</option> 
                        <?php foreach($list_per as $row) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama_pegawai']; ?> (<?= $row['jabatan_pegawai']; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                 </div>

                 <div class="form-group">
                    <label>Laporan Diketahui</label>
                     <select name="lap_dik" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                    <option value="">Pilih Staff Pemerintahan</option> 
                        <?php foreach($list_per as $row) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama_pegawai']; ?> (<?= $row['jabatan_pegawai']; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Cetak</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>