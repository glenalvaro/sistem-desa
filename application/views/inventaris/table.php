<div class="content-wrapper">
  <section class="content-header">
       <h1 class="tx-judul">
         Data Inventaris
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li class="active"><a href="#"> Data Inventaris</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php $this->load->view('buku_desa/bumindes_umum'); ?>
            <div class="col-md-9">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('inventaris/tambah'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <a target="_blank" href="<?= site_url('inventaris/cetak_data'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
                      </div>
                    </div>

        <div class="box-body">
        <div class="table-responsive" style="margin-bottom: 10px;">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead style="font-size: 10px;">
             <tr>
                <th rowspan="2" class="padat" style="min-width:10px;">No</th>
                <th rowspan="2" class="padat" style="min-width:150px;">Aksi</th>
                <th rowspan="2" class="padat" style="min-width:150px;">Jenis Barang</th>
                <th rowspan="2" class="padat" style="min-width:100px;">Kode Barang</th>
                <th rowspan="2" class="padat" style="min-width:150px;">Identitas Barang</th>
                <th colspan="3" style="text-align: center;">Asal Usul Barang</th>
            </tr>
             <tr>
                <th style="min-width:30px;">APB Desa/Kelurahan (Rp.)</th>
                <th style="min-width:30px;">Perolehan Lain Yang Sah (Rp.)</th>
                <th style="min-width:30px;">Kekayaan Asli Desa/Kelurahan (Rp.)</th>
                <th style="min-width:100px;">Tanggal Perolehan/Pembelian</th>
                <th style="min-width:100px;">KET.</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php
                $no=1;
                foreach ($data_inventaris as $data) : ?>
            <tr>
    			<td nowrap="" width="5px"><?= $no++; ?></td>
                <td nowrap="" style="text-align:center" width="250px">
                    <a href="" data-toggle="modal" data-target="#lihatInventaris<?= $data->id; ?>" class="btn btn-info btn-sm" title="Lihat"><i class="fa fa-eye"></i></a>
                    <a href="<?= site_url('inventaris/edit_data/'.$data->id) ?>" class="btn bg-orange btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                    <a href="<?= site_url('inventaris/delete/'.$data->id) ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus Surat"><i class="fa fa-trash"></i></a>
                 </td>
    			<td nowrap="" width="100px"><?= $data->jenis_barang; ?></td>
    			<td nowrap=""><?= $data->kode_barang; ?></td>
    			<td nowrap=""><?= $data->identitas_barang; ?></td>
    			<td nowrap=""><?= $data->apb_desa; ?></td>
    			<td nowrap=""><?= $data->perolehan_lain; ?></td>
                <td nowrap=""><?= $data->kekayaan_desa; ?></td>
                <td nowrap=""><?= tgl_indo($data->tgl_perolehan); ?></td>
                <td nowrap=""><?= $data->keterangan; ?></td>
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


<!-- Modal Detail Data -->
<?php $no = 0;
foreach($data_inventaris as $main) : $no++; ?>
<div class="modal fade" id="lihatInventaris<?= $main->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Detail Data</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                <label for="nama_agenda">Jenis Barang</label>
                     <input type="text" value="<?= $main->jenis_barang; ?>" class="input-sm form-control required" placeholder="Nama kegiatan" disabled>
               </div>

               <div class="form-group">
               <label for="nama_agenda">Kode Barang</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-code"></i>
                        </div>
                        <input class="form-control input-sm pull-right required" value="<?= $main->kode_barang; ?>" type="text" disabled>
                    </div>
                </div>

               <div class="form-group">
               <label for="nama_agenda">Identitas Barang</label>
                   <input type="text" value="<?= $main->identitas_barang; ?>" class="input-sm form-control required" disabled>
                </div>

               <div class="form-group">
               <label for="nama_agenda">Asal Usul Barang</label>
               <div class="row">
                    <div class="col-md-4">
                    <label>APBD :</label>
                        <input type="text" value="<?= $main->apb_desa; ?>" class="input-sm form-control required" disabled>
                    </div>
                    <div class="col-md-4">
                    <label>Perolehan Lain :</label>
                        <input type="text" value="<?= $main->perolehan_lain; ?>" class="input-sm form-control required" disabled>
                    </div>
                    <div class="col-md-4">
                    <label>Kekayaan Asli :</label>
                         <input type="text" value="<?= $main->kekayaan_desa; ?>" class="input-sm form-control required" disabled>
                    </div>
                </div>
               </div>

               <div class="form-group">
               <label for="nama_agenda">Tanggal Perolehan/Pembelian</label>
                   <input type="text" value="<?= tgl_indo($main->tgl_perolehan); ?>" class="input-sm form-control required" disabled>
                </div>

               <div class="form-group">
               <label for="nama_agenda">Keterangan</label>
                  <textarea class="input-sm form-control" disabled><?= $main->keterangan; ?></textarea>
                </div>
               
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
              </div>
          </div>
      </div>
</div>
<?php endforeach; ?>