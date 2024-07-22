
<div class="content-wrapper">
<?php foreach($setting as $dta) : ?>
    <section class="content-header">
       <h1 class="tx-judul">
        Wilayah Administratif <?= $dta['sebutan_dusun'] ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Wilayah Administratif</a></li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
            <div class="col-xs-12">
               <div class="box box-info">
                 <div class="box-header with-border">
                    <div>
                        <a href="<?= site_url('wilayah_desa/create'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah <?= $dta['sebutan_dusun'] ?></a>

                         <a target="_blank" href="<?= site_url('wilayah_desa/cetak'); ?>" class="btn btn-social btn-flat bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                          <a href="<?= site_url('wilayah_desa'); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
                  </div>
            </div>
        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div style="padding-bottom: 10px;"></div>
            </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('wilayah_desa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('wilayah_desa'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
                                    <?php
                                }
                            ?>
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
        <table class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray color-palette">
            <tr>
                <th>No</th>
        		<th>Aksi</th>
        		<th>Nama <?= $dta['sebutan_dusun'] ?></th>
                <th>Kepala <?= $dta['sebutan_dusun'] ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($wilayah_desa_data as $wilayah_desa) {
                ?>
            <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td style="text-align:center" width="100px">
                <a href="<?= site_url('wilayah_desa/update/'.$wilayah_desa->id) ?>" class="btn bg-orange btn-flat btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                <a href="<?php echo site_url('wilayah_desa/delete/'.$wilayah_desa->id) ?>"
                class="btn bg-maroon btn-flat btn-sm aksi-hapus"><i class="fa fa-trash"></i></a>
            </td>
			<td><?php echo $wilayah_desa->nama_dusun ?></td>
			<td><?php echo $wilayah_desa->kepala_dusun ?></td>
		    </tr>
                <?php } ?>
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
</section>
<?php endforeach; ?>
</div>