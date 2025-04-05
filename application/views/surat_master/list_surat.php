<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Daftar Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Daftar Surat</a></li>
      </ol>
    </section>

     <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
            <div class="box-header with-border">
                <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambah_surat"><i class="fa fa-plus"></i> Tambah</a>

                <a href="<?= base_url('surat_master/panduan_surat') ?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-question"></i> Panduan</a>

                <a href="<?= base_url('surat_master/pengaturan_surat') ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-gear"></i> Pengaturan</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="color-palette">
                    <tr>
                        <th style="min-width:10px;">No</th>
                        <th style="min-width:150px;">Aksi</th>
                        <th style="min-width:150px;">Nama Surat</th>
                        <th style="min-width:90px;">Url</th>
                        <th style="min-width:30px;">Status Layanan</th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px;">
                    <?php
                    foreach ($daftar_surat as $data) : ?>
                    <tr>
                        <td width="10px"><?= ++$start ?></td>
                        <td style="text-align:center" width="100px">
                            <a href="<?= base_url('surat_master/syarat_surat/') . $data->id; ?>" class="btn btn-primary btn-sm"  title="Persyaratan Surat"><i class="fa fa-copy"></i></a>
                            <a href="" data-toggle="modal" data-target="#edit_surat<?= $data->id; ?>" class="btn bg-orange btn-sm"  title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                             <?php if($data->active == '0') : ?>
                                <a href="<?=site_url('surat_master/surat_unlock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan Surat"><i class="fa fa-lock">&nbsp;</i></a>
                            <?php elseif($data->active == '1') : ?>
                                <a href="<?=site_url('surat_master/surat_lock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan Surat"><i class="fa fa-unlock"></i></a>
                            <?php endif; ?>
                            <a href="<?= base_url('surat_master/hapus_surat/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                        <td><?= set_ucwords($data->nama); ?></td>
                        <td><code><?= $data->url ?></code></td>
                        <td style="text-align: center;">
                            <?php if($data->tampil_surat == 1) : ?> 
                                <small><button type="button" class="btn btn-info btn-sm" title="Surat ini tersedia di administrasi layanan kependudukan">Tersedia</button></small>
                            <?php elseif($data->tampil_surat == 0) : ?>
                                <small><button type="button" class="btn btn-danger btn-sm">Tidak Tersedia</button></small>
                            <?php endif; ?>
                        </td>
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
<div class="modal fade" id="tambah_surat">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">Tambah Surat</h4>
              </div>
              <form id="validasi" action="<?= base_url('surat_master/tambah_surat'); ?>" method="post" autocomplete="off">
              <div class="modal-body">
                <div class="form-group">
                <label for="nama">Nama Surat</label>
                   <div class="input-group input-group-sm">
                    <span class="input-group-addon">Surat</span>
                     <input type="text" id="nama" name="nama" class="input-sm form-control required" value="" placeholder="Nama Surat">
                   </div>
                 </div>

                <div class="form-group">
                <label for="url">Url Surat</label>
                     <input type="text" id="url" name="url" class="input-sm form-control required" value="" placeholder="Url template surat">
                     <small><i>*/ di isi sesuai folder template surat</i></small>
                </div>

                <div class="form-group">
                <label for="singkatan">Singkatan Surat</label>
                     <input type="text" id="singkatan" name="singkatan" class="input-sm form-control required" value="" placeholder="Singkatan surat">
                     <small><i>*/ digunakan untuk format nomor surat</i></small>
                </div>

                <div class="form-group">
                    <label for="active">Status :</label>
                    <select name="active" class="select-filter2 form-control required">
                        <option value="">Pilih Status Surat</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                  </select>
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
foreach($daftar_surat as $row) : $no++; ?>
<div class="modal fade" id="edit_surat<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Surat</h4>
              </div>
              <form action="<?= base_url('surat_master/update_surat/'); ?><?= $row->id; ?>" method="post" autocomplete="off">
              <div class="modal-body">
                 <div class="form-group">
                    <label for="active">Nama Surat</label>
                     <input type="hidden" name="id" value="<?= $row->id; ?>">
                      <div class="input-group input-group-sm">
                        <span class="input-group-addon">Surat</span>
                         <input type="text" id="nama" name="nama" class="input-sm form-control" value="<?= $row->nama; ?>" placeholder="Nama Surat" required>
                   </div>
                 </div>

                 <div class="form-group">
                    <label for="active">Url Surat</label>
                     <input type="text" id="url" name="url" class="input-sm form-control" value="<?= $row->url; ?>" placeholder="Url Surat" required>
                    <small><i>*/ di isi sesuai folder template surat</i></small>
                 </div>

                 <div class="form-group">
                    <label for="active">Singkatan Surat</label>
                     <input type="text" id="singkatan" name="singkatan" class="input-sm form-control" value="<?= $row->singkatan; ?>" placeholder="singkatan Surat" required>
                    <small><i>*/ di gunakan untuk nomor surat</i></small>
                 </div>

                  <div class="form-group">
                    <label for="tampil_surat">Sediakan Surat DiLayanan Penduduk</label>
                      <select id="tampil_surat" name="tampil_surat" class="select-filter form-control required" style="width:100%;"> 
                            <option value="">--Pilih Status Surat--</option>
                            <option value="0" <?=($row->tampil_surat=='0')?'selected="selected"':''?>>Tidak</option>
                            <option value="1" <?=($row->tampil_surat=='1')?'selected="selected"':''?>>Ya</option>
                      </select>
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