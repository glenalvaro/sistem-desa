<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Permohonan Surat Ditolak
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Surat Ditolak</a></li>
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
        		<th style="min-width:150px;">Aksi</th>
        		<th style="min-width:100px;">NIK</th>
        		<th style="min-width:120px;">Nama Penduduk</th>
                <th style="min-width:150px;">Jenis Surat</th>
                <th style="min-width:90px;">Tanggal Periksa</th>
                <th style="min-width:90px;">Status</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php
                    foreach ($daftar_tolak as $data) 
                { ?>
            <tr>
			<td width="10px"><?= ++$start ?></td>
			<td style="text-align:center" width="120px">
                <?php if($data->id_status == 3) : ?> 
                <small>
                    <button type="button" data-toggle="modal" data-target="#ket_tolaksurat1<?= $data->id; ?>" class="btn btn-primary btn-sm"> Lihat</button>
                </small>
                <?php endif; ?>         
            </td>
            <td><?= $data->nik_pemohon; ?></td>
            <td><?= set_ucwords($data->pemohon); ?></td>
            <td><?= set_ucwords($data->nama_surat); ?></td>
            <td><?= $data->tanggal; ?></td>
            <td><?= set_ucwords($data->surat_status); ?></td>
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

<!-- Modal Keterangan -->
<?php $no = 0;
foreach($daftar_tolak as $row) : $no++; ?>
<div class="modal fade" id="ket_tolaksurat1<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Keterangan Surat</h4>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                    <label>Alasan Tolak</label>
                    <textarea name="keterangan" class="form-control input-sm" placeholder="Keterangan" rows="4" disabled><?= $row->keterangan; ?></textarea>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-primary btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
              </div>
          </div>
      </div>
</div>
<?php endforeach; ?>