<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Menu
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Menu</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="#" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#Menu_web"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:180px; text-align: center;">AKSI</th>
                <th style="min-width:100px;">NAMA MENU</th>
        		<th style="min-width:100px;">LINK</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($menu_list as $data) { ?>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
    			<td style="text-align:center" width="180px">
                    <a href="<?=site_url('menu_web/sub_menu/'.$data->id)?>" class="btn bg-purple btn-sm"><i class="fa fa-bars"></i></a>
                     <a href="" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#data_edit<?= $data->id; ?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <?php if($data->status == '0') : ?>
                        <a href="<?=site_url('menu_web/unlock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($data->status == '1') : ?>
                        <a href="<?=site_url('menu_web/lock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                     <a href="<?=site_url('menu_web/delete/'.$data->id)?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
    			</td>
                <td>
                    <?= set_ucwords($data->nama); ?>
                </td>
    			<td>
                    <?php if($data->jenis_link == 3) : ?>
                        <a target="_blank" href="<?= $data->link; ?>"><?= $data->link; ?></a>
                    <?php else : ?>
                        <a target="_blank" href="<?= base_url('web/'.$data->link.'/'.slug_url($data->nama)); ?>"><?= base_url('web/'.$data->link.'/'.slug_url($data->nama)); ?></a>
                    <?php endif; ?>
                </td>
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
<div class="modal fade" id="Menu_web">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Tambah</h4>
              </div>
              <form id="mainform" action="<?= base_url('menu_web/tambah'); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                     <input type="text" id="nama" name="nama" class="input-sm form-control required" value="" placeholder="Nama Menu">
                </div>
                <div class="form-group">
                <label for="jenis_link">Jenis Link</label>
                     <select name="jenis_link" id="jenis_link" onchange="ganti_link()" class="select-filter2 form-control required">
                        <option disabled selected>--Pilih Jenis Link--</option>               
                        <option value="5">Profil</option>
                        <option value="1">Halaman Statis</option>
                        <option value="2">Statitik Penduduk</option>
                        <option value="4">Data Admnistratif</option>
                        <option value="6">Informasi</option>
                        <option value="7">Lembaga</option>
                        <option value="3">External</option>
                      </select>
                </div>
                <div class="form-group" id="link_external" hidden>
                    <label for="nama">Link</label>
                     <input type="text" id="link_ext" name="link" class="input-sm form-control required" value="" placeholder="contoh <?= base_url(); ?>">
                </div>
                <div class="form-group" id="link_web" hidden>
                <label for="link">Link</label>
                     <select id="link" name="link" class="select-filter form-control required" style="width: 100%;">
                        <option>--Pilih Link--</option>
                      </select>
                </div>
                <div class="form-group">
                <label for="status">Status</label>
                     <select name="status" id="status" class="select-filter form-control required" style="width: 100%;">
                        <option disabled selected>--Pilih Status--</option>               
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
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
foreach($menu_list as $key) : $no++; ?>
<div class="modal fade" id="data_edit<?= $key->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Edit</h4>
              </div>
              <form action="<?= base_url('menu_web/update/'); ?><?= $key->id; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?= $key->id; ?>">
                     <input type="hidden" name="jenis_link" value="<?= $key->jenis_link; ?>">
                     <input type="hidden" name="link" value="<?= $key->link; ?>">
                     <input type="text" id="nama" name="nama" class="input-sm form-control" value="<?= $key->nama; ?>" required>
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

<!-- Load ajax -->
<?php $this->load->view('menu_web/ajax_menu'); ?>