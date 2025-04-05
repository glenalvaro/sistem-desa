
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Layanan Permohonan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daftar Surat</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
            <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?=site_url('/layanan/permohonan_surat/buat_surat')?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Buat Permohonan</a>

              <a href="<?=site_url('/layanan/permohonan_surat/riwayat_surat')?>" class="btn btn-social btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-history"></i> Riwayat Permohonan</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:150px;">Status</th>
                    <th style="min-width:200px;">Jenis Surat</th>
                    <th style="min-width:90px;">Nomor Telepon</th>
                    <th style="min-width:90px;">Tanggal Kirim</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($list_permohonan as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="200px">
                     <?php if($data->id_status == 3) : ?>
                        <small><button type="button" data-toggle="modal" data-target="#ket_tolak<?= $data->id; ?>" class="btn btn-danger btn-sm"> <?= set_ucwords($data->status); ?></button></small>
                     <?php else : ?>
                      <span style="font-style: italic;"><?= set_ucwords($data->status); ?></span>
                    <?php endif; ?>
                  </td>
                  <td width="200px"><?= set_ucwords($data->jenis_surat); ?></td>
                  <td width="200px"><?= set_ucwords($data->no_hp_aktif); ?></td>
                  <td width="100px"><?= date('d F Y', $data->tgl_buat); ?></td>
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
foreach($list_permohonan as $row) : $no++; ?>
<div class="modal fade" id="ket_tolak<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Keterangan Surat</h4>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                    <input type="hidden" name="id" value="<?= $row->id; ?>">
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