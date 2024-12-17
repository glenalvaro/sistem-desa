<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Arsip Layanan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Arsip</a></li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                <div>
                    <a href="<?= site_url('arsip_surat/graph_surat') ?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-pie-chart"></i> Grafik Surat</a>

                    <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                    <a href="" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>
                </div>
            </div>

        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th>No</th>
        		<th style="min-width:110px; text-align: center;">Aksi</th>
        		<th>No Urut</th>
        		<th style="min-width:100px;">Jenis Surat</th>
                <th style="min-width:100px;">Pemohon</th>
                <th style="min-width:100px;">Tanggal</th>
                <th style="min-width:100px;">User</th>
                <th style="min-width:100px;">Keterangan</th>
                <th style="min-width:100px;">Ditandatangani Oleh</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
                <?php $no = 1; 
                foreach($surat_log as $data) : ?>
            <tr>
			<td width="10px"><?= $no++; ?></td>
			<td style="text-align:center">
                <a target="_blank" href="<?= base_url('folder_arsip/surat/').$data->file_surat.'.pdf'; ?>" class="btn bg-maroon btn-sm" title="Cetak"><i class="fa fa-file-pdf-o"></i></a>
                <a href="" data-toggle="modal" data-target="#edit_arsip<?= $data->id; ?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                <a href="<?= base_url('arsip_surat/delete/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus"  title="Hapus"><i class="fa fa-trash"></i></a>        
            </td>
            <td style="text-align: center;"><?= $data->no_surat; ?></td>
            <td><?= strtoupper($data->nama_surat); ?></td>
            <td><?= strtoupper($data->pemohon); ?></td>
            <td><?= $data->tanggal; ?></td>
            <td><?= $data->user; ?></td>
            <td>
            <?php 
                if(empty($data->keterangan)) {
                    echo "-";
                } else {
                    echo $data->keterangan;
                }
            ?>
            </td>
            <td><?= $data->pamong; ?></td>
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


<!-- Modal Edit Data -->
<?php $no = 0;
foreach($surat_log as $row) : $no++; ?>
<div class="modal fade" id="edit_arsip<?= $row->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Arsip Surat</h4>
              </div>
              <form id="mainform" action="<?= base_url('arsip_surat/edit/'); ?><?= $row->id; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                    <input type="hidden" name="id" value="<?= $row->id; ?>">
                    <textarea name="keterangan" class="form-control input-sm" placeholder="Keterangan" rows="3" required><?= $row->keterangan; ?></textarea>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>