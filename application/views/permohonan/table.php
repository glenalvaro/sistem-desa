<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Daftar Permohonan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Permohonan</a></li>
      </ol>
    </section>

    <section class="content">
        <form method="post" action="<?= site_url('text_berjalan/delete_all') ?>" id="delete_all">
        <div class="row">
        <?php $this->load->view('permohonan/menu'); ?>
        <div class="col-xs-12">
        <div class="box box-info">
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th style="min-width:10px;">No</th>
        		<th style="min-width:120px;">Aksi</th>
        		<th style="min-width:100px;">NIK</th>
        		<th style="min-width:120px;">Nama Penduduk</th>
                <th style="min-width:150px;">Jenis Surat</th>
                <th style="min-width:90px;">Tanggal Unggah</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php
                    foreach ($daftar_pemohon as $data) 
                { ?>
            <tr>
			<td width="10px"><?= ++$start ?></td>
			<td style="text-align:center" width="120px">
                <?php if($data->id_status == 1) : ?>
                    <a href="<?= site_url("permohonan/periksa_surat/{$data->id}/{$data->id_pemohon}"); ?>" class="btn btn-social btn-primary btn-sm" title="Periksa Surat"><i class="fa fa-envelope-o">&nbsp;</i>Periksa</a>
                <?php endif; ?>         
            </td>
            <td><?= $data->nik_pemohon; ?></td>
            <td><?= set_ucwords($data->nama_pemohon); ?></td>
            <td><?= set_ucwords($data->jenis_surat); ?></td>
            <td><?= date('d F Y', $data->tgl_buat); ?></td>
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