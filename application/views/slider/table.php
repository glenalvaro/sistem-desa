<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Slide Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Data Slide</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="<?= site_url('slider/tambah'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:150px; text-align: center;">Aksi</th>
                <th style="min-width:150px; text-align: center;">Gambar</th>
        		<th style="min-width:100px; text-align: center;">Nama</th>
                <th style="min-width:100px; text-align: center;">Keterangan</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data_slider as $data) { ?>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
    			<td style="text-align:center" width="150px">
    				<a href="<?= site_url('slider/edit/') . $data->id; ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                    <?php if($data->status == '0') : ?>
                    <a href="<?= base_url('slider/unlock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($data->status == '1') : ?>
                    <a href="<?= base_url('slider/lock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Nonaktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                    <a href="<?= site_url('slider/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
    			</td>
    			<td width="200px" style="text-align:center">
                   <img class="img-thumbnail" width="70" height="70" src="<?= site_url('assets/img/slide/').$data->gambar; ?>">
                </td>
    			<td><?= $data->nama; ?></td>
                <td><?= $data->deskripsi; ?></td>
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