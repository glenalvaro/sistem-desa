<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
       Informasi Publik
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi</a></li>
        <li><a href="#"> Daftar Informasi</a></li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('informasi_publik/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <a href="<?= site_url('informasi_publik/pdf'); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                        <a href="<?= site_url('informasi_publik/word'); ?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Export</a>
                      </div>
                    </div>


        <div class="box-body">
        <div class="table-responsive">
            <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar">
                <thead class="bg-gray disabled color-palette">
                    <tr>
                        <th style="min-width:10px;">No</th>
                		<th style="min-width:160px;">Aksi</th>
                		<th style="min-width:160px;">Judul Dokumen</th>
                		<th>Kategori</th>
                		<th>Tahun</th>
                		<th>Aktif</th>
                		<th>Tgl Muat</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        foreach ($informasi_publik_data as $data) { 
                     ?>
                    <tr>
            			<td width="10px"><?= ++$start ?></td>
                        <td style="text-align:center" width="100px">
                             <a href="<?=site_url('informasi_publik/update/'.$data->id)?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                             <?php if($data->aktif == '0') : ?>
                                <a href="<?=site_url('informasi_publik/unlock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                            <?php elseif($data->aktif == '1') : ?>
                                <a href="<?=site_url('informasi_publik/lock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                            <?php endif; ?>
                            <a href="<?= site_url('folder_arsip/informasi_publik/').$data->dokumen; ?>" class="btn bg-purple btn-sm"  title="Unduh" download><i class="fa fa-download"></i></a>
                            <a href="<?= base_url('informasi_publik/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
            			<td><a href="<?= site_url('folder_arsip/informasi_publik/').$data->dokumen; ?>" class="pdf-preview"><?= $data->judul_dokumen ?></a></td>
            			<td><?= $data->kategori ?></td>
            			<td><?= $data->tahun ?></td>
            			<td> 
                            <?php
                                if ($data->aktif == 1) {
                                     echo "Aktif";
                                 } else {
                                    echo "Tidak Aktif";
                                 } 
                            ?>  
                        </td>
            			<td><?= date('d F Y H:i:s', $data->tgl_muat); ?></td>
		              </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
</div>