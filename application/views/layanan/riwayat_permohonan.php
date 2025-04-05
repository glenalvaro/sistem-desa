
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Riwayat Permohonan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Riwayat Surat</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
            <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?=site_url('/layanan/permohonan_surat')?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pemohonan</a>
            </div>
            <div class="box-header with-border">
              Riwayat Permohonan Surat
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:150px;">Jenis Surat</th>
                    <th style="min-width:50px;">No Surat</th>
                    <th style="min-width:100px;">Tanda Tangan</th>
                    <th style="min-width:100px;">Tanggal Selesai</th>
                    <th style="min-width:80px;">Status</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($riwayat_pemohon as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="150px"><?= set_ucwords($data->nama_surat); ?></td>
                  <td width="50px"><?= set_ucwords($data->no_surat); ?></td>
                  <td width="100px"><?= set_ucwords($data->pamong); ?></td>
                  <td width="100px"><?= $data->tanggal; ?></td>
                  <td width="80px">
                      <button type="button" data-toggle="modal" data-target="#ket_surat1<?= $data->id; ?>" class="btn btn-primary btn-sm"> Lihat</button>
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
  </div>



<!-- Modal Keterangan -->
<?php $no = 0;
foreach($riwayat_pemohon as $row) : $no++; ?>
<div class="modal fade" id="ket_surat1<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Keterangan Surat</h4>
              </div>
              <div class="modal-body">
                 <?php if($row->id_status == 3) : ?>
                      <div class="form-group">
                        <label>Status Surat</label>
                        <input type="text" name="id" class="form-control input-sm" value="<?= $row->surat_status; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <label>Alasan Tolak</label>
                        <textarea name="keterangan" class="form-control input-sm" placeholder="Keterangan" rows="4" disabled><?= $row->keterangan; ?></textarea>
                      </div>
                    <?php else : ?>
                      <div class="form-group">
                        <label>Status Surat</label>
                        <input type="text" name="id" class="form-control input-sm" value="<?= $row->surat_status; ?>" disabled>
                      </div>
                    <?php endif; ?>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-primary btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
              </div>
          </div>
      </div>
</div>
<?php endforeach; ?>