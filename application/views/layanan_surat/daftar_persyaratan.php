<div class="content-wrapper">
  <section class="content-header">
    <h1 class="tx-judul">
       Dokumen Persyaratan Surat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Daftar Persyaratan Surat</a></li>
    </ol> 
</section>

    <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambah_persyaratan"><i class="fa fa-plus"></i> Tambah</a>
            </div>

        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
        <thead class="color-palette">
        <tr>
            <th style="min-width:10px;">No</th>
            <th style="min-width:150px;">Aksi</th>
            <th style="min-width:200px;">Nama Dokumen</th>
        </tr>
        </thead>
        <tbody style="font-size: 10px;">
             <?php
            foreach ($list_persyaratan as $data) : ?>
            <tr>
            <td width="10px"><?php echo ++$start ?></td>
            <td style="text-align:center" width="50px">
            <a href="" data-toggle="modal" data-target="#edit_persyaratan<?= $data['id']; ?>" class="btn bg-orange btn-sm"  title="Edit"><i class="fa fa-pencil-square-o"></i></a>
            <a href="<?= base_url('persyaratan_surat/hapus_persyaratan/') . $data['id']; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
            </td>
            <td><?php echo $data['nama'] ?></td>
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


<!-- Tambah data -->
<div class="modal fade" id="tambah_persyaratan">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">Tambah Daftar Persyaratan</h4>
              </div>
              <form id="validasi" action="<?= base_url('persyaratan_surat/tambah_persyaratan'); ?>" method="post" autocomplete="off">
              <div class="modal-body">
               <div class="form-group">
                <label for="jabatan">Nama</label>
                     <input type="text" id="nama" name="nama" class="input-sm form-control required" value="" placeholder="Nama Persyaratan">
                 </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Data -->
<?php $no = 0;
foreach($list_persyaratan as $row) : $no++; ?>
<div class="modal fade" id="edit_persyaratan<?= $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Persyaratan</h4>
              </div>
              <form action="<?= base_url('persyaratan_surat/update_persyaratan/'); ?><?= $row['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?= $row['id']; ?>">
                     <input type="text" id="nama" name="nama" class="input-sm form-control" value="<?= $row['nama']; ?>" placeholder="Nama Persyaratan" required>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>