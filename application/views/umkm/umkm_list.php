<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Usaha Mikro
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Usaha Mikro</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
        <?php $this->load->view('umkm/menu'); ?>
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                <a href="<?= site_url('umkm/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                <a target="_blank" href="<?= site_url('umkm/cetak'); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
            </div>


        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
        <thead class="color-palette">
        <tr>
            <th style="min-width:10px; text-align: center;">No</th>
            <th style="min-width:150px; text-align: center;">Action</th>
    		<th style="min-width:200px; text-align: center;">Nama</th>
    		<th style="min-width:100px; text-align: center;">Telepon</th>
    		<th style="min-width:200px; text-align: center;">Usaha Mikro</th>
    		<th style="min-width:100px; text-align: center;">Kategori</th>
    		<th style="min-width:100px; text-align: center;">Tgl Posting</th>
        </tr>
        </thead>
        <tbody>
             <?php
            foreach ($umkm_data as $umkm) : ?>
            <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td style="text-align:center" width="200px">
                <?php  
                echo anchor(site_url('umkm/unggah_gambar/'.$umkm->id),'<i class="fa fa-image fa-sm" aria-hidden="true"></i>','class="btn bg-purple btn-sm"'); 
                echo '  ';
                echo anchor(site_url('umkm/read/'.$umkm->id),'<i class="fa fa-eye fa-sm" aria-hidden="true"></i>','class="btn btn-info btn-sm"'); 
                echo '  ';
                echo anchor(site_url('umkm/update/'.$umkm->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-sm"'); 
                echo '  ';
                echo anchor(site_url('umkm/delete/'.$umkm->id),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn bg-maroon btn-sm aksi-hapus" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
            </td>
			<td><?= set_ucwords($umkm->nama_pemilik); ?></td>
			<td><?= format_telpon($umkm->no_tlp); ?></td>
			<td><?= set_ucwords($umkm->nama_usaha); ?></td>
			<td><?= set_ucwords($umkm->nama_kat); ?></td>
			<td><?= tgl_indo($umkm->tgl_posting); ?></td>
		</tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
</div>