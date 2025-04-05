<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Halaman Statis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Halaman Statis</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
       <?= $this->load->view('artikel/menu'); ?>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="<?= site_url('halaman_statis/tambah'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:170px; text-align: center;">Aksi</th>
        		<th style="min-width:100px; text-align: center;">Judul</th>
        		<th style="min-width:100px; text-align: center;">Tanggal Posting</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($statis_list as $data) { ?>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
    			<td style="text-align:center" width="170px">
                     <a href="<?=site_url('halaman_statis/update/'.$data->id)?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <?php if($data->status == '0') : ?>
                        <a href="<?=site_url('halaman_statis/unlock_statis/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($data->status == '1') : ?>
                        <a href="<?=site_url('halaman_statis/lock_statis/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                     <a href="<?=site_url('halaman_statis/delete/'.$data->id)?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                     <a href="<?=site_url('halaman_statis/lihat/'.$data->id)?>" class="btn btn-success btn-sm" title="Lihat"><i class="fa fa-eye"></i></a>
    			</td>
    			<td>
                   <?= set_ucwords($data->judul); ?></a>
                </td>
    			<td><?= date('d F Y', $data->tgl_posting); ?></td>
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