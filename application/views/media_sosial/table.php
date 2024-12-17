<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Media Sosial
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Media Sosial</a></li>
      </ol>
    </section>

    <section class="content">
        <form method="post" action="<?= site_url('media_sosial/delete_all') ?>" id="delete_all">
        <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('media_sosial/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                        <button id="hapus-terpilih" name="hapus-ceklis" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" disabled=""><i class="fa fa-trash"></i> Hapus</button>
                      </div>
                </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>
                    <input type="checkbox" id="cek_box">
                </th>
                <th style="min-width:10px;">No</th>
        		<th style="min-width:110px;">Aksi</th>
        		<th style="min-width:170px;">Nama</th>
        		<th style="min-width:50px;">Icon</th>
        		<th style="min-width:80px;">Status</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php
                    foreach ($media_sosial_data as $data) {
                ?>
            <tr>
                <td style="text-align:center;" width="10px">
                    <input id="data-ceklis" type="checkbox" class="checklist-data" name="id[]" value="<?= $data->id ?>">
                </td>
    			<td class="text-center" width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="90px">
                    <a href="<?= site_url('media_sosial/update/') . $data->id; ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                    <?php if($data->tampil == '0') : ?>
                    <a href="<?= base_url('media_sosial/status_unlock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($data->tampil == '1') : ?>
                    <a href="<?= base_url('media_sosial/status_lock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Nonaktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                    <a href="<?= site_url('media_sosial/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                </td>
    			<td width="400px"><?= $data->nama ?></td>
    			<td style="text-align: center; width: 5px !important;">
                    <a href="<?= $data->link ?>" target="_blank">
                        <img src="<?= site_url('assets/img/icon/media_sosial/').$data->icon; ?>" class="img-thumbnail" width="25" height="25">
                    </a>         
                </td>
    			<td style="text-align:center;" width="15px">
                    <?php if($data->tampil == '0') : ?>
                        <span class="label label-danger">Tidak Aktif</span>
                    <?php elseif($data->tampil == '1') : ?>
                        <span class="label label-success">Aktif</span>
                    <?php endif; ?>
                </td>
		  </tr>
            <?php } ?>
        </tbody>
        </table>
        </div>
        </form>
        </div>
        </div>
    </div>
    </div>
    </section>
</div>