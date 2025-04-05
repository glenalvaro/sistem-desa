<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Sub Menu 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Artikel</a></li>
        <li><a href="#"> Sub Menu</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="#" data-toggle="modal" data-target="#tambah_sub" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                    <a href="<?= site_url('menu_web'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Menu</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Menu</td>
                                    <td width="1%">:</td>
                                    <td><?= set_ucwords($nama_menu); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="box-body">
            <div class="table-responsive">
            <table id="datatables-sistem" class="table table-bordered dataTable table-striped table-hover tabel-daftar">
				<thead class="color-palette" style="font-size: 10px;">
					<tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Menu</th>
                        <th>LINK</th>
                    </tr>
                </thead>
				<tbody>
                    <?php 
                    $no=1;
                    foreach($list_sub_menu as $data) : ?>
					<tr>
						<td class="padat"><?= $no++; ?></td>
                        <td class="aksi">
                            <a href="" data-toggle="modal" data-target="#sub_edit<?= $data->id; ?>" class="btn bg-orange btn-sm"><i class="fa fa-edit"></i></a>
                            <?php if($data->aktif == '0') : ?>
                                <a href="<?=site_url('menu_web/unlock_sub/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                            <?php elseif($data->aktif == '1') : ?>
                                <a href="<?=site_url('menu_web/lock_sub/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                            <?php endif; ?>
                            <a href="<?=site_url('menu_web/delete_sub/'.$data->id)?>" title="Hapus Sub Menu" class="btn bg-maroon btn-sm aksi-hapus"><i class='fa fa-trash'></i></a>
                        </td>
                        <td><?= $data->sub_nama; ?></td>
                        <td> 
                            <?php if($data->tipe_link == 3) : ?>
                                <a target="_blank" href="<?= $data->url; ?>"><?= $data->url; ?></a>
                            <?php else : ?>
                                <a target="_blank" href="<?= base_url('web/'.$data->url.'/'.slug_url($data->sub_nama)); ?>"><?= base_url('web/'.$data->url.'/'.slug_url($data->sub_nama)); ?></a>
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
<div class="modal fade" id="tambah_sub">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Tambah Sub</h4>
              </div>
              <form id="mainform" action="<?= base_url('menu_web/tambah_sub'); ?>" method="post" autocomplete="off">
              <div class="modal-body">
               <div class="form-group">
                <label for="sub_nama">Nama Sub Menu</label>
                    <input type="hidden" name="id_menu" value="<?= $id_menu; ?>">
                    <input type="text" id="sub_nama" name="sub_nama" class="input-sm form-control required" value="" placeholder="Nama Menu">
                </div>

                <div class="form-group">
                <label for="jenis_link">Jenis Link</label>
                     <select name="tipe_link" id="jenis_link" onchange="ganti_link()" class="select-filter2 form-control required">
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
                     <input type="text" id="link_ext" name="url" class="input-sm form-control required" value="" placeholder="contoh <?= base_url(); ?>">
                </div>
                <div class="form-group" id="link_web" hidden>
                <label for="link">Link</label>
                     <select id="link" name="url" class="select-filter form-control required" style="width: 100%;">
                        <option>--Pilih Link--</option>
                      </select>
                </div>
                <div class="form-group">
                <label for="aktif">Status</label>
                     <select name="aktif" id="aktif" class="select-filter form-control required" style="width: 100%;">
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
foreach($list_sub_menu as $key) : $no++; ?>
<div class="modal fade" id="sub_edit<?= $key->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Edit Sub</h4>
              </div>
              <form action="<?= base_url('menu_web/update_sub_menu/'); ?><?= $key->id; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                    <label>Nama Sub</label>
                     <input type="hidden" name="id" value="<?= $key->id; ?>">
                     <input type="hidden" name="id_menu" value="<?= $key->id_menu; ?>">
                     <input type="hidden" name="tipe_link" value="<?= $key->tipe_link; ?>">
                     <input type="hidden" name="url" value="<?= $key->url; ?>">
                     <input type="text" id="sub_nama" name="sub_nama" class="input-sm form-control" value="<?= $key->sub_nama; ?>" required>
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


<?php $this->load->view('menu_web/ajax_menu'); ?>