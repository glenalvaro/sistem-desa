<div class="content-wrapper">

    <section class="content-header">
       <h1 class="tx-judul">
         Jabatan Perangkat Desa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Desa</a></li>
        <li><a href="#"> Perangkat Desa</a></li>
        <li><a href="#"> Jabatan</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                   <div class="box-header with-border">
                      <div class="btn-group-vertical">
                         <a href="<?= site_url('perangkat_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Perangkat</a>
                      </div>

                      <div class="btn-group-vertical">
<<<<<<< HEAD
                         <a href="#" class="btn btn-social btn-flat btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambah_jab"><i class="fa fa-plus"></i> Tambah</a>
=======
                         <a href="#" class="btn btn-social btn-flat btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambah_jab"><i class="fa fa-plus"></i> Tambah Data</a>
>>>>>>> 985fb331d309cc195f7522724352eb5afd8d9c3d
                      </div>
                    </div>


        <div class="box-body">
        <div class="table-responsive" style="margin-bottom: 10px;">
        <table id="datatables-sistem" class="table table-bordered table-striped table-hover no-footer" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th style="min-width:10px; text-align: center;">No</th>
                <th style="min-width:150px; text-align: center;">ACTION</th>
                <th style="min-width:150px; text-align: center;">NAMA JABATAN</th>
            </tr>
            </thead>
               <?php
               $no = 1;
                foreach ($list_jabatan as $data)
                    {
                ?>
            <tbody style="font-size: 11px;">
            <tr>
    			<td width="10px"><?= $no++; ?></td>
                <td style="text-align:center" width="200px">
                    <a href="" class="btn bg-orange btn-flat btn-sm" data-toggle="modal" data-target="#edit_jab<?= $data['id']; ?>" title="Edit Jabatan"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('perangkat_desa/hapus_jabatan/'.$data['id']) ?>" class="btn bg-maroon btn-flat btn-sm aksi-hapus"><i class="fa fa-trash-o"></i></a>
                </td>
    			<td><?= strtoupper($data['nama']); ?></td>
		    </tr>
                <?php } ?>
        </tbody>
        </table>
        <div>
    </div>
    </div>
    </div>
    </div>
    </section>
</div>



<!-- Tambah data -->
<div class="modal fade" id="tambah_jab">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">Tambah Jabatan</h4>
              </div>
              <form id="validasi" action="<?= base_url('perangkat_desa/tambah_jabatan'); ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                <label for="jabatan">Nama Jabatan</label>
                     <input type="text" id="nama" name="nama" class="input-sm form-control required" value="" placeholder="Nama Jabatan">
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
foreach($list_jabatan as $row) : $no++; ?>
<div class="modal fade" id="edit_jab<?= $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Jabatan</h4>
              </div>
              <form action="<?= base_url('perangkat_desa/update_jabatan/'); ?><?= $row['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?= $row['id']; ?>">
                     <input type="text" id="nama" name="nama" class="input-sm form-control" value="<?= $row['nama']; ?>" placeholder="Masukkan Jabatan" required>
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