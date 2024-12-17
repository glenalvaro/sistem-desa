<div class="content-wrapper">
  <section class="content-header">
    <h1 class="tx-judul">
        Bantuan
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
                        <a href="<?= site_url('program_bantuan/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <a href="<?= site_url('program_bantuan/excel'); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

                        <a href="<?= site_url('program_bantuan/panduan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-question-circle"></i> Panduan</a>

                        <a href="<?= site_url('program_bantuan'); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
                      </div>
                    </div>

        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <form action="" method="get">
            <div class="col-md-9">
            <div class="form-inline">
            <select name="sasaran_prog" class="form-control select-filter2" onchange="this.form.submit()">
                <option hidden selected value="">Pilih Sasaran Program</option>
                <option value="1">Penduduk</option>
                <option value="2">Keluarga/KK</option>
                <option value="3">Kelompok/Organisasi</option>
            </select>
		    </div>
            </div>
          </form>
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
        <table class="table table-hover table-bordered table-daftar" style="margin-bottom: 15px">
            <thead>
            <tr>
                <th style="min-width:10px;">No</th>
                <th style="min-width:150px;" class="text-center">Aksi</th>
                <th style="min-width:200px;">Nama Program</th>
                <th style="min-width:150px;">Asal Dana</th>
                <th style="min-width:50px;">Jumlah Peserta</th>
                <th style="min-width:150px;">Masa Berlaku</th>
                <th style="min-width:150px;">Sasaran Program</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php
                foreach ($program_bantuan_data as $program_bantuan) : ?>
            <tr>
                <td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="200px">
				<?php 
                     echo anchor(site_url('program_bantuan/list_peserta/'.$program_bantuan->id),'<i class="fa fa-bars" aria-hidden="true"></i>','class="btn btn-primary btn-sm" title="Daftar Peserta"');
                    echo ' ';
                    echo anchor(site_url('program_bantuan/update/'.$program_bantuan->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-sm"'); 
                    echo '  ';
                    echo anchor(site_url('program_bantuan/delete/'.$program_bantuan->id),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn bg-maroon btn-sm aksi-hapus"');
                    ?>
			    </td>
                <td><?= strtoupper($program_bantuan->nama_program) ?></td>
                <td><?= $program_bantuan->asal_dana ?></td>
                <td>
                    <?php 
                      //hitung jumlah peserta
                        $query = $this->db->query("SELECT * FROM peserta_bantuan where id_program=$program_bantuan->id");
                        $count_peserta = $query->num_rows();
                    ?>
                    <?= $count_peserta; ?>
                </td>
                <td><?= tgl_indo($program_bantuan->sdate); ?> - <?= tgl_indo($program_bantuan->edate); ?></td>
                <td>
                    <?php 

                        if($program_bantuan->sasaran_program == 1){
                            echo 'Penduduk';
                        } elseif ($program_bantuan->sasaran_program == 2) {
                            echo 'Keluarga/KK';
                        } else {
                            echo 'Kelompok/Organisasi';
                        }

                     ?>
                </td>
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