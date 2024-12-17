<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Daftar Album
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Galeri</a></li>
        <li class="active">Daftar Album</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url('galeri/tambah_gambar/') . $id; ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                    <a href="<?= site_url('galeri'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Album</a>
                </div>
                <div class="box-header with-border">
                     <p style="font-size: 12px; font-weight: bold;">Nama Album : <?= set_ucwords($nama_album); ?></p>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                    <thead class="color-palette">
                    <tr>
                        <th style="min-width:10px;">No</th>
                        <th style="min-width:160px;">Aksi</th>
                        <th style="min-width:200px;">Nama Gambar</th>
                        <th style="min-width:100px;">Aktif</th>
                        <th style="min-width:200px;">Dimuat Pada</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 11px;">
                         <?php
                        foreach ($get_album as $data) : ?>
                        <tr>
                        <td width="10px"><?= ++$start ?></td>
                        <td style="text-align:center" width="50px">
                            <a href="<?= site_url("galeri/edit_gambar/{$data->id_album}/{$data->id}"); ?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                             <?php if($data->aktif == '0') : ?>
                                <a href="<?=site_url('galeri/gambar_album_unlock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Aktifkan Gambar"><i class="fa fa-lock">&nbsp;</i></a>
                            <?php elseif($data->aktif == '1') : ?>
                                <a href="<?=site_url('galeri/gambar_album_lock/'.$data->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan Gambar"><i class="fa fa-unlock"></i></a>
                            <?php endif; ?>
                            <a href="<?= base_url('galeri/hapus_gambarId/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>
                            <label style="cursor: pointer;" class="tampil" data-img="<?= site_url('assets/img/galeri/album/').$data->gambar; ?>" data-rel="popover" data-content="<img width=200 height=134 src=<?= site_url('assets/img/galeri/album/').$data->gambar; ?>>" data-original-title="" title=""><?= $data->nama_gambar ?> </label>
                        </td>
                        <td>
                            <?php
                                if ($data->aktif == 1) {
                                     echo "Aktif";
                                 } else {
                                    echo "Tidak Aktif";
                                 } 
                            ?>  
                        </td>
                        <td><?= date('d F Y H:i:s', $data->tgl_dibuat); ?></td>
                    </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
  	  </div>
  	</div>
  </form>
 </section>
</div>