<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Daftar Album
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Galeri</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                <a href="<?= base_url('galeri/create') ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>

        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
        <thead class="color-palette">
        <tr>
            <th style="min-width:10px;">No</th>
            <th style="min-width:160px;">Aksi</th>
            <th style="min-width:200px;">Nama Album</th>
            <th style="min-width:200px;">Terdaftar Pada</th>
        </tr>
        </thead>
        <tbody style="font-size: 11px;">
             <?php
            foreach ($daftar_album as $data) : ?>
            <tr>
            <td width="10px"><?= ++$start ?></td>
            <td style="text-align:center" width="50px">
                <a href="<?= base_url('galeri/album_list/') . $data['id']; ?>" class="btn bg-purple btn-sm" title="Detail"><i class="fa fa-bars"></i></a>
                <a href="<?= base_url('galeri/update/') . $data['id']; ?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                 <?php if($data['aktif'] == '0') : ?>
                    <a href="<?=site_url('galeri/album_unlock/'.$data['id'])?>" class="btn bg-navy btn-sm" title="Aktifkan Album"><i class="fa fa-lock">&nbsp;</i></a>
                <?php elseif($data['aktif'] == '1') : ?>
                    <a href="<?=site_url('galeri/album_lock/'.$data['id'])?>" class="btn bg-navy btn-sm" title="Non Aktifkan Album"><i class="fa fa-unlock"></i></a>
                <?php endif; ?>
                <a href="<?= base_url('galeri/delete/') . $data['id']; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>
            </td>
            <td>
                <label style="cursor: pointer;" class="tampil" data-img="<?= site_url('assets/img/galeri/').$data['gambar']; ?>" data-rel="popover" data-content="<img width=200 height=134 src=<?= site_url('assets/img/galeri/').$data['gambar']; ?>>" data-original-title="" title=""><?= $data['nama_album'] ?> </label>
            </td>
            <td><?= date('d F Y H:i:s', $data['tgl_buat']); ?></td>
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

