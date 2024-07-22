<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Pembangunan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Pembangunan</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('pembangunan/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                      </div>
                    </div>
            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                <div class="col-md-9">
                <div style="padding-bottom: 10px;"></div>
                </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('pembangunan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pembangunan'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
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
        <table class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="color-palette">
            <tr>
                <th style="min-width:10px; text-align: center;">No</th>
                <th style="min-width:250px; text-align: center;">Aksi</th>
        		<th style="min-width:150px; text-align: center;">Nama Kegiatan</th>
        		<th style="min-width:150px; text-align: center;">Sumber Dana</th>
        		<th style="min-width:120px; text-align: center;">Anggaran</th>
        		<th style="min-width:130px; text-align: center;">Presentase</th>
        		<th style="min-width:100px; text-align: center;">Volume</th>
        		<th style="min-width:70px; text-align: center;">Tahun</th>
        		<th style="min-width:100px; text-align: center;">Pelaksana</th>
        		<th style="min-width:100px; text-align: center;">Lokasi</th>
        		<th style="min-width:100px; text-align: center;">Gambar</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php if($pembangunan_data) : ?>
            <?php
            foreach ($pembangunan_data as $pembangunan) : ?>
            <tr>
			<td width="10px"><?= ++$start ?></td>
            <td style="text-align:center" width="250px">
                <a href="<?= base_url('pembangunan/update/') . $pembangunan->id; ?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('pembangunan/lokasi/') . $pembangunan->id; ?>" class="btn bg-olive btn-sm" title="Lokasi Pembangunan"><i class="fa fa-map"></i></a>
                <a href="<?= base_url('pembangunan/dokumentasi_pembangunan/') . $pembangunan->id; ?>" class="btn bg-purple btn-sm" title="Dokumentasi"><i class="fa fa-list-ol"></i></a>
                <?php if($pembangunan->status == '0') : ?>
                <a href="<?= base_url('pembangunan/status_unlock/') . $pembangunan->id; ?>" class="btn bg-navy btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                <?php elseif($pembangunan->status == '1') : ?>
                <a href="<?= base_url('pembangunan/status_lock/') . $pembangunan->id; ?>" class="btn bg-navy btn-sm"  title="Nonaktifkan"><i class="fa fa-unlock"></i></a>
                <?php endif; ?>
                <a href="<?= base_url('pembangunan/delete/') . $pembangunan->id; ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                <a href="<?= base_url('pembangunan/read/') . $pembangunan->id; ?>" class="btn btn-primary btn-sm" title="Edit Pengguna"><i class="fa fa-eye"></i></a>
            </td>
			<td><?= set_ucwords($pembangunan->nama_kegiatan) ?></td>
			<td><?= $pembangunan->sumber_dana ?></td>
			<td><?= rupiah($pembangunan->total_anggaran) ?></td>
			<td align="center">
             <?php 
                //get persentase
                $query = $this->db->query("SELECT * FROM dokumentasi_pembangunan where id_pembangunan=$pembangunan->id ORDER BY id DESC LIMIT 1");
                $count = $query->row();
             ?>
             <?= $count->presentase; ?>         
            </td>
			<td><?= $pembangunan->volume ?></td>
			<td><?= $pembangunan->tahun_anggaran ?></td>
			<td><?= $pembangunan->pelaksana_kegiatan ?></td>
			<td><?= $pembangunan->lokasi_pembangunan ?></td>
			<td class="text-center">
                <img class="penduduk_kecil" src="<?= base_url('assets/img/pembangunan/') . $pembangunan->gambar_proyek; ?>" alt="Foto Pembangunan"/>
                </a>         
            </td>
		</tr>
         <?php endforeach; ?>
          <?php else : ?>
                 <tr>
                    <td class="text-center" colspan="12">Data Tidak Tersedia</td>
                </tr>
            <?php endif; ?>
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