<div class="content-wrapper">
  <section class="content-header">
    <h1 class="tx-judul">
       Cetak Surat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Cetak Surat</a></li>
    </ol> 
</section>

    <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-body">
            <div class="table-responsive">
            <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="color-palette">
            <tr>
                <th style="min-width:10px;">No</th>
                <th style="min-width:150px;">Aksi</th>
                <th style="min-width:200px;">Nama Surat</th>
            </tr>
            </thead>
            <tbody style="font-size: 10.5px;">
                 <?php
                foreach ($daftar_surat as $data) : ?>
                <tr>
                <td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="50px">
                    <a href="<?= base_url('layanan_surat/form/') . $data['id']; ?>" class="btn btn-social btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> Buat Surat</a>
                </td>
                <td><?= set_ucwords($data['nama']) ?></td>
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