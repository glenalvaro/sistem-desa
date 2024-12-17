<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Teks Berjalan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Teks Berjalan</a></li>
      </ol>
    </section>

    <section class="content">
        <form method="post" action="<?= site_url('text_berjalan/delete_all') ?>" id="delete_all">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('text_berjalan/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

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
        		<th style="min-width:120px;">Aksi</th>
        		<th style="min-width:200px;">Isi Teks Berjalan</th>
        		<th style="min-width:90px;">Tautan</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php
                    foreach ($text_berjalan_data as $data) 
                { ?>
            <tr>
            <td style="text-align:center;" width="10px">
                <input id="data-ceklis" type="checkbox" class="checklist-data" name="id[]" value="<?= $data->id ?>">
            </td>
			<td width="10px"><?= ++$start ?></td>
			<td style="text-align:center" width="130px">
                <a href="<?= site_url('text_berjalan/update/') . $data->id; ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                <?php if($data->status == '0') : ?>
                <a href="<?= base_url('text_berjalan/status_unlock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                <?php elseif($data->status == '1') : ?>
                <a href="<?= base_url('text_berjalan/status_lock/') . $data->id; ?>" class="btn bg-navy btn-sm"  title="Nonaktifkan"><i class="fa fa-unlock"></i></a>
                <?php endif; ?>
                <a href="<?= site_url('text_berjalan/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
			</td>
            <td><?= $data->isi ?> &nbsp;
                <a target="_blank" href="<?= $data->tautan_artikel ?>"><?= $data->judul_tautan ?></a>
            </td>
            <td width="250px">
                 <a target="_blank" href="<?= $data->tautan_artikel ?>"><?= $data->tautan_artikel ?></a>   
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