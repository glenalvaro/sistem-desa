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

                <a href="<?= site_url('umkm/excel'); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                <a href="<?= site_url('umkm/excel'); ?>" class="btn btn-social bg-maroon btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-file-pdf-o"></i> Export</a>

                <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
            </div>


        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
        <thead class="color-palette">
        <tr>
            <th>No</th>
            <th>Action</th>
    		<th>Nama</th>
    		<th>Telepon</th>
    		<th>Usaha Mikro</th>
    		<th>Kategori</th>
    		<th>Tgl Posting</th>
        </tr>
        </thead>
        <tbody>
             <?php
            foreach ($umkm_data as $umkm) { ?>
            <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('umkm/read/'.$umkm->id),'<i class="fa fa-eye fa-sm" aria-hidden="true"></i>','class="btn bg-info btn-flat btn-sm"'); 
                echo '  ';
                echo anchor(site_url('umkm/update/'.$umkm->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-flat btn-sm"'); 
                echo '  ';
                echo anchor(site_url('umkm/delete/'.$umkm->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn bg-maroon btn-flat btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
            </td>
			<td><?php echo $umkm->nama ?></td>
			<td><?php echo $umkm->no_tlp ?></td>
			<td><?php echo $umkm->nama_usaha ?></td>
			<td><?php echo $umkm->id_kategori ?></td>
			<td><?php echo $umkm->tgl_posting ?></td>
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