<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Dokumentasi Pembangunan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Pembangunan</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url('pembangunan/tambah_dokumentasi/') . $id; ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

                    <a target="_blank" href="<?= site_url('pembangunan/cetak_dokumentasi/') . $id; ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                    <a href="<?= site_url('pembangunan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembangunan</a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian Dokumentasi Pembangunan</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Nama Kegiatan</td>
                                    <td width="1%">:</td>
                                    <td><?= set_ucwords($nama_kegiatan); ?></td>
                                </tr>
                                <tr>
                                    <td>Sumber Dana</td>
                                    <td>:</td>
                                    <td><?= set_ucwords($sumber_dana); ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi Pembangunan</td>
                                    <td>:</td>
                                    <td><?= set_ucwords($lokasi_pembangunan); ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?= set_ucwords($keterangan); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="datatables-sistem" class="table table-bordered dataTable table-striped table-hover tabel-daftar">
								<thead class="color-palette" style="font-size: 10px;">
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>Gambar</th>
										<th>Persentase</th>
										<th>Keterangan</th>
										<th>Tanggal Rekam</th>
									</tr>
								</thead>
								<tbody style="font-size: 10px;">
                                <?php 
                                    $no=1;
                                    foreach($get_dok as $data) : ?>
									<tr>
										<td class="padat"><?= $no++; ?></td>
										<td class="aksi">
											<a href="<?= site_url("pembangunan/edit_dok/{$data->id_pembangunan}/{$data->id}"); ?>" class="btn bg-orange btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
											<a href="<?= site_url('pembangunan/hapus_dok/') . $data->id; ?>" title="Hapus" class="btn bg-maroon btn-sm aksi-hapus"><i class='fa fa-trash'></i></a>
										</td>
										<td align="center">
                                             <!-- jika foto tidak sama dengan default tampil true -->
                                            <?php if($data->foto_dok != '404-image-not-found.jpg') : ?>
                                            <img class="img-responsive" style="width: 50px;" src="<?= base_url('assets/img/pembangunan/dokumentasi/') . $data->foto_dok; ?>" alt="Foto Dokumentasi"/>
                                            <?php endif; ?>
                                        </td>
										<td><?= $data->presentase; ?></td>
										<td><?= $data->ket; ?></td>
                                        <td><?= tgl_indo($data->tgl_rekam); ?></td>
									</tr>
                                    <?php endforeach; ?>
								</tbody>
							</table>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
  	  </div>
  	</div>
  </form>
 </section>
</div>