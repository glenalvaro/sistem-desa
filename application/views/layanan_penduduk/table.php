<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Pendaftar Layanan Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Beranda</a></li>
        <li><a href="#"> Layanan Penduduk</a></li>
      </ol>
    </section>

    <section class="content">
         <span><?= $this->session->flashdata('msg'); ?></span>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambah_pengguna"><i class="fa fa-plus"></i> Tambah Pengguna</a>
                      </div>
                    </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette" style="font-size: 10px;">
            <tr>
                <th style="min-width:10px;">No</th>
        		<th style="min-width:120px;">Aksi</th>
        		<th style="min-width:120px;">NIK</th>
        		<th style="min-width:200px;">Nama Penduduk</th>
        		<th style="min-width:150px;">Tgl Daftar</th>
        		<th style="min-width:120px;">Login Terakhir</th>
            </tr>
            </thead>
            <tbody style="font-size: 10px;">
            <?php
                foreach ($layanan_penduduk_data as $main) {
            ?>
            <tr>
    			<td width="10px"><?= ++$start ?></td>
                <td style="text-align:center" width="100px">
                    <a href="" data-toggle="modal" data-target="#reset_pin<?= $main->id; ?>" class="btn btn-primary btn-sm" title="Reset PIN Penduduk"><i class="fa fa-key"></i></a>
                    <a href="" data-toggle="modal" data-target="#tambah_telepon<?= $main->id; ?>" class="btn btn-success btn-sm" title="Tambah Telepon"><i class="fa fa-phone"></i></a>
                    <a href="<?= site_url('layanan_penduduk/delete/') . $main->id; ?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                </td>
    			<td width="100px"><?= $main->nik_pend; ?></td>
    			<td><?= strtoupper($main->nama_pend); ?></td>
    			<td width="100px"><?= date('d F Y', $main->tgl_buat); ?>&nbsp;&nbsp;<?= date('H:i:s', $main->tgl_buat); ?></td>
                <td></td>
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

<!-- Tambah data -->
<div class="modal fade" id="tambah_pengguna">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px;">Daftar Pengguna Layanan</h4>
              </div>
              <form id="validasi" action="<?= base_url('layanan_penduduk/tambah_pengguna'); ?>" method="post" autocomplete="off">
              <div class="modal-body">
                <div class="form-group">
                    <label for="nama">NIK / Nama Penduduk</label>
                      <select name="nik_pend" class="select-filter form-control required" style="width: 100%;">
                        <option value="<?= $nik_pend; ?>">-- Silahkan Cari NIK - Nama Penduduk --</option> 
                        <?php foreach($nama_penduduk as $row) : ?>
                            <option value="<?= $row['nik']; ?>"><?= $row['nik']; ?> - <?= $row['nama_penduduk']; ?></option>
                        <?php endforeach; ?>
                      </select>
                 </div>

                 <div class="form-group">
                    <label for="pin">PIN</label>
                     <input type="number" id="pin" name="pin" class="input-sm form-control" value="" placeholder="PIN Penduduk" maxlength="6" minlength="6">
                 </div>

                 <p class="help-block"><code>1. Jika PIN tidak di isi maka sistem akan menghasilkan PIN secara acak.</code></p>
                 <p class="help-block"><code>2. Pin terdiri dari 6 (enam) digit angka.</code></p>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Tambah Telepon -->
<?php $no = 0;
foreach($layanan_penduduk_data as $row) : $no++; ?>
<div class="modal fade" id="tambah_telepon<?= $row->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">Tambah Telepon Penduduk</h4>
              </div>
              <form id="mainform" action="<?= base_url('layanan_penduduk/tambah_telepon/'); ?><?= $row->id; ?>" method="post" autocomplete="off">
              <div class="modal-body">
              <table class="table tabel-rincian">
              <tbody>
                <tr>
                  <td width="200">NIK</td><td width="1">:</td>
                  <td><?= $row->nik_pend; ?></td>
                </tr>
                <tr>
                 <td width="200">Nama Penduduk</td><td width="1">:</td>
                  <td><?= set_ucwords($row->nama_pend); ?></td>
                </tr>
                </tbody>
                </table>

                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                     <input type="hidden" name="id" value="<?= $row->id; ?>">
                     <input type="number" id="no_telepon" name="no_telepon" class="input-sm form-control required" value="<?= $row->no_telepon; ?>" placeholder="No.HP Penduduk" maxlength="12" minlength="12">
                </div>
              </div>
             <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>


<!-- Modal Reset PIN -->
<?php $no = 0;
foreach($layanan_penduduk_data as $row) : $no++; ?>
<div class="modal fade" id="reset_pin<?= $row->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">Reset PIN Penduduk</h4>
              </div>
              <form id="validasi" action="<?= base_url('layanan_penduduk/reset_pin/'); ?><?= $row->id; ?>" method="post" autocomplete="off">
              <div class="modal-body">
               <div class="form-group">
                    <label for="pin">PIN</label>
                     <input type="hidden" name="id" value="<?= $row->id; ?>">
                     <input type="number" id="pin" name="pin" class="input-sm form-control required" placeholder="PIN Penduduk" maxlength="6" minlength="6" required>
                </div>

                <p class="help-block"><code>1. Klik tombol 'Reset PIN' untuk mengatur ulang PIN Penduduk.</code></p>
                <p class="help-block"><code>2. PIN berisi 6 (enam) digit Angka.</code></p>
                <p class="help-block"><code>3. PIN akan dikirimkan ke akun Telegram atau Email yang sudah diverifikasi.</code></p>
              </div>
             <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" style="float: left;"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm" style="float: right;"><i class="fa fa-check"></i> Reset PIN</button>
              </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>



<!-- Modal PIN Show-->
<?php

$pesan = $this->session->flashdata('pesan');

?>
<div class="modal fade" id="pin_penduduk" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #40e0d0;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 14px; font-weight: bold;">PIN Penduduk <?= $pesan['nik_pend']; ?></h4>
              </div>
              <div class="modal-body">
                <p>Berikut adalah kode pin yang baru saja di hasilkan, silakan dicatat atau di ingat dengan baik, kode pin ini sangat rahasia, dan hanya bisa dilihat sekali ini lalu setelah itu hanya bisa di reset saja.</p>
                <p style="font-size: 15px;">Kode Pin : <?= $pesan['pin']; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-social btn-flat btn-warning btn-sm" style="float: right;"><i class="fa fa-sign-out"></i> Tutup</button>
              </div>
            </form>
        </div>
    </div>
</div>



<?php if(!empty($this->session->flashdata('pesan'))) : ?>
 <script>
    $(window).on('load',function(){
       $('#pin_penduduk').modal('show');
    });
 </script>
<?php endif; ?>