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

                        <a href="<?= site_url('program_bantuan'); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
                      </div>
                    </div>

        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <form action="" method="get">
            <div class="col-md-9">
            <div class="form-inline">
            <select name="sasaran_prog" class="form-control select-filter2" onchange="this.form.submit()">
                <option hidden selected value="">Pilih Sasaran Program</option>
                <option value="1">Penduduk Perorangan</option>
                <option value="2">Keluarga/KK</option>
                <option value="3">Kelompok/Organisasi</option>
            </select>
		    </div>
            </div>
          </form>
            <div class="col-md-3">
            <form action="<?php echo site_url('program_bantuan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
<<<<<<< HEAD
                        <input type="text" class="input-cari input-sm form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
=======
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
>>>>>>> 985fb331d309cc195f7522724352eb5afd8d9c3d
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
                <th style="min-width:10px; text-align: center;">No</th>
                <th style="min-width:150px; text-align: center;" class="text-center">AKSI</th>
                <th style="min-width:200px; text-align: center;">NAMA PROGRAM</th>
                <th style="min-width:150px; text-align: center;">ASAL DANA</th>
                <th style="min-width:50px; text-align: center;">JUMLAH PESERTA</th>
                <th style="min-width:150px; text-align: center;">MASA BERLAKU</th>
                <th style="min-width:150px; text-align: center;">SASARAN PROGRAM</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($program_bantuan_data as $program_bantuan) : ?>
            <tr>
                <td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="200px">
				<?php 
<<<<<<< HEAD
                    echo anchor(site_url('program_bantuan/update/'.$program_bantuan->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-sm"'); 
                    echo '  ';
                    echo anchor(site_url('program_bantuan/delete/'.$program_bantuan->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn bg-maroon btn-sm aksi-hapus"');
                    echo ' ';
                     echo anchor(site_url('program_bantuan/list_peserta/'.$program_bantuan->id),'<i class="fa fa-th-list" aria-hidden="true"></i>','class="btn btn-primary btn-sm" title="Daftar Peserta"');
=======
                    echo anchor(site_url('program_bantuan/update/'.$program_bantuan->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn bg-orange btn-flat btn-sm"'); 
                    echo '  ';
                    echo anchor(site_url('program_bantuan/delete/'.$program_bantuan->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn bg-maroon btn-flat btn-sm aksi-hapus"');
                    echo ' ';
                     echo anchor(site_url('program_bantuan/list_peserta/'.$program_bantuan->id),'<i class="fa fa-th-list" aria-hidden="true"></i>','class="btn btn-primary btn-flat btn-sm" title="Daftar Peserta"');
>>>>>>> 985fb331d309cc195f7522724352eb5afd8d9c3d
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
                            echo 'Penduduk Perorangan';
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