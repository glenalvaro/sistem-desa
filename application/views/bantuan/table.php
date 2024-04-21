<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Daftar Program Bantuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Bantuan</a></li>
      </ol>
    </section>

<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('program_bantuan/create'); ?>" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Data</a>

                        <a href="<?= site_url('program_bantuan/excel'); ?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                        <a href="<?= site_url('program_bantuan/panduan'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-question-circle"></i> Panduan</a>
                      </div>
                    </div>

        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div class="form-inline">
            <select id="filter-sasaran" class="form-control select-filter2">
                <option value="">Pilih Sasaran</option>
                
            </select>
		    </div>
            </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('program_bantuan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('program_bantuan'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
                                    <?php
                                }
                            ?>
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
        <div class="table-responsive">
        <table class="table table-hover table-bordered" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>No</th>
                <th class="text-center">AKSI</th>
                <th>NAMA PROGRAM</th>
                <th>ASAL DANA</th>
                <th>JUMLAH PESERTA</th>
                <th>MASA BERLAKU</th>
                <th>SASARAN PROGRAM</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($program_bantuan_data as $program_bantuan) : ?>
            <tr>
                <td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="200px">
				<?php 
                    echo anchor(site_url('program_bantuan/update/'.$program_bantuan->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-flat btn-sm"'); 
                    echo '  ';
                    echo anchor(site_url('program_bantuan/delete/'.$program_bantuan->id),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn bg-maroon btn-flat btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    ?>
			    </td>
                <td><?= $program_bantuan->nama_program ?></td>
                <td><?= $program_bantuan->asal_dana ?></td>
                <td>-</td>
                <td><?= tgl_indo($program_bantuan->sdate); ?> - <?= tgl_indo($program_bantuan->edate); ?></td>
                <td><?= $program_bantuan->sasaran_program ?></td>
		</tr>
        <?php endforeach; ?>
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