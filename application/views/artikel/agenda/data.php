<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Agenda
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Data</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
       <?= $this->load->view('artikel/menu'); ?>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="" data-toggle="modal" data-target="#new-agenda" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:170px; text-align: center;">Aksi</th>
        		<th style="min-width:100px; text-align: center;">Nama Agenda</th>
        		<th style="min-width:100px; text-align: center;">Tanggal Agenda</th>
                <th style="min-width:100px; text-align: center;">Kordinator Lapangan</th>
                <th style="min-width:100px; text-align: center;">Lokasi Kegiatan</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach ($data_agenda as $data) { ?>
            <tr>
    			<td width="10px"><?= $no++; ?></td>
    			<td style="text-align:center" width="170px">
                     <a href="" data-toggle="modal" data-target="#editAgenda<?= $data->id; ?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                     <a href="<?=site_url('agenda/delete/'.$data->id)?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
    			</td>
    			<td>
                   <?= set_ucwords($data->nama_agenda); ?></a>
                </td>
    			<td><?= tgl_indo($data->tgl_agenda); ?>, <?= $data->jam; ?></td>
                <td><?= $data->kordinator_lapangan ?></td>
                <td><?= $data->lokasi_kegiatan ?></td>
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


<!-- Tambah data -->
<div class="modal fade" id="new-agenda">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Tambah Data</h4>
              </div>
              <form id="validasi" action="<?= base_url('agenda/tambah_data'); ?>" method="post" autocomplete="off">
              <div class="modal-body">
               <div class="form-group">
                <label for="nama_agenda">Nama Agenda</label>
                     <input type="text" id="nama_agenda" name="nama_agenda" class="input-sm form-control required" placeholder="Nama kegiatan">
               </div>

               <div class="form-group">
               <label for="nama_agenda">Tanggal Agenda</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control input-sm pull-right required" id="tgl-agenda" name="tgl_agenda" placeholder="Tgl. Agenda" type="text">
                    </div>
                </div>

               <div class="form-group">
               <label for="nama_agenda">Jam Agenda</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-clock-o"></i>
                        </div>
                        <input class="form-control input-sm pull-right" id="jam-agenda" name="jam" type="text">
                    </div>
                </div>

                <div class="form-group">
                <label for="kordinator_lapangan">Kordinator</label>
                     <input type="text" id="kordinator_lapangan" name="kordinator_lapangan" class="input-sm form-control required" placeholder="Kordinator kegiatan">
               </div>

                <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Agenda</label>
                     <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" class="input-sm form-control required" placeholder="Lokasi kegiatan">
               </div>
               </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
            </div>
      </div>
  </div>


<!-- Modal Edit Data -->
<?php $no = 0;
foreach($data_agenda as $main) : $no++; ?>
<div class="modal fade" id="editAgenda<?= $main->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Modul</h4>
              </div>
              <form action="<?= base_url('agenda/edit_data/'); ?><?= $main->id; ?>" method="post" autocomplete="off">
              <div class="modal-body">
                <div class="form-group">
                <label for="nama_agenda">Nama Agenda</label>
                     <input type="hidden" name="id" value="<?= $main->id; ?>">
                     <input type="text" id="nama_agenda" name="nama_agenda" value="<?= $data->nama_agenda; ?>" class="input-sm form-control required" placeholder="Nama kegiatan">
               </div>

               <div class="form-group">
               <label for="nama_agenda">Tanggal Agenda</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input class="form-control input-sm pull-right required" id="tgl_1" name="tgl_agenda" placeholder="Tgl. Agenda" value="<?= $data->tgl_agenda; ?>" type="text">
                    </div>
                </div>

               <div class="form-group">
               <label for="nama_agenda">Jam Agenda</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-clock-o"></i>
                        </div>
                        <input class="form-control input-sm pull-right" value="<?= $data->jam; ?>" id="jam" name="jam" type="text">
                    </div>
                </div>

                <div class="form-group">
                <label for="kordinator_lapangan">Kordinator</label>
                     <input type="text" id="kordinator_lapangan" name="kordinator_lapangan" value="<?= $data->kordinator_lapangan; ?>" class="input-sm form-control required" placeholder="Kordinator kegiatan">
               </div>

                <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Agenda</label>
                     <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" value="<?= $data->lokasi_kegiatan; ?>" class="input-sm form-control required" placeholder="Lokasi kegiatan">
               </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>