<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Lembaga Masyarakat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Lembaga Masyarakat</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="<?= site_url('lembaga_masyarakat/tambah'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:100px; text-align: center;">Aksi</th>
                <th style="min-width:100px; text-align: center;">Nama Lembaga</th>
        		<th style="min-width:100px; text-align: center;">Tanggal Posting</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data_lembaga as $key) { ?>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
    			<td style="text-align:center" width="100px">
    				<?php 
    				echo anchor(site_url('lembaga_masyarakat/edit/'.$key->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-sm"'); 
    				echo '  ';
    				echo anchor(site_url('lembaga_masyarakat/hapus/'.$key->id),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn bg-maroon btn-sm aksi-hapus"');
    				?>
    			</td>
    			<td>
                    <a href="<?= site_url('lembaga_masyarakat/detail/'.$key->id) ?>"><?= $key->nama ?></a>
                </td>
    			<td><?= date('d F Y', $key->tgl_buat); ?></td>
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