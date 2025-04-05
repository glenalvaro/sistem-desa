<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Permohonan Surat Diterima
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Surat Diterima</a></li>
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
        		<th style="min-width:210px;">Aksi</th>
        		<th style="min-width:100px;">NIK</th>
        		<th style="min-width:120px;">Nama Penduduk</th>
                <th style="min-width:150px;">Jenis Surat</th>
                <th style="min-width:90px;">Tanggal Unggah</th>
                <th style="min-width:150px;">Status</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php
                    foreach ($daftar_terima as $data) 
                { ?>
            <tr>
			<td width="10px"><?= ++$start ?></td>
			<td style="text-align:center" width="150px">  
            <?php if($data->id_status == 2) : ?> 
                <small>
                    <a target="_blank" href="<?= base_url('folder_arsip/file_surat/').$data->file.'.pdf'; ?>" class="btn btn-info btn-sm" title="Cetak Surat">Cetak Surat</a> 
                    <a href="<?= base_url('permohonan/siap_ambil/') . $data->id; ?>" class="btn btn-primary btn-sm" title="Ubah Status Jika Sudah Ditandatangan">Siap Diambil</a>
                </small>
            <?php elseif($data->id_status == 4) : ?> 
                 <small> 
                    <a href="<?= base_url('permohonan/sudah_ambil/') . $data->id; ?>" class="btn btn-primary btn-sm" title="Ubah Status Jika Sudah Diambil">Sudah Diambil</a>
                </small>
            <?php endif; ?>        
            </td>
            <td><?= $data->nik_pemohon; ?></td>
            <td><?= set_ucwords($data->nama_pemohon); ?></td>
            <td><?= set_ucwords($data->jenis_surat); ?></td>
            <td><?= date('d F Y', $data->tgl_buat); ?></td>
            <td><?= set_ucwords($data->status); ?></td>
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