<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Data Kelompok <?= set_ucwords($nama_kelompok); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Kelompok</a></li>
        <li class="active">Anggota Kelompok</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url('data_kelompok/form_anggota/') . $id; ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Anggota Kelompok</a>

                    <a target="_blank" href="<?= site_url('data_kelompok/cetak_anggota/') . $id; ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                    <a href="<?= site_url('data_kelompok'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kelompok</a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian Kelompok</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Kode Kelompok</td>
                                    <td width="1%">:</td>
                                    <td><code><?= $kode_kelompok; ?></code></td>
                                </tr>
                                <tr>
                                    <td>Nama Kelompok</td>
                                    <td>:</td>
                                    <td style="text-transform: uppercase;"><?= strtoupper($nama_kelompok); ?></td>
                                </tr>
                                <tr>
                                    <td>Ketua Kelompok</td>
                                    <td>:</td>
                                    <td><?= strtoupper($nama_ketua); ?></td>
                                </tr>
                                <tr>
                                    <td>Kategori Kelompok</td>
                                    <td>:</td>
                                    <td><?= strtoupper($nama_kategori); ?></td>
                                </tr>
                                <tr>
                                    <td>Katerangan</td>
                                    <td>:</td>
                                    <td><?= strtoupper($deskripsi_kelompok); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5><b>Daftar Anggota Kelompok</b></h5>
                    <div class="table-responsive">
                    <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
								<thead class="bg-gray disabled color-palette" style="font-size: 10px;">
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>Foto</th>
										<th>Nomor Anggota</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Tempat/Tanggal Lahir</th>
										<th>Umur (Tahun)</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Jabatan</th>
										<th>Nomor SK Jabatan</th>
										<th>keterangan</th>
									</tr>
								</thead>
								<tbody>
                                <?php if ($list_anggota_kel) : ?>
                                <?php 
                                    $no=1;
                                    foreach($list_anggota_kel as $data) : ?>
									<tr>
										<td class="padat"><?= $no++; ?></td>
										<td class="aksi">
											<a href="<?= site_url("data_kelompok/edit_anggota/{$data->id_kelompok}/{$data->id}"); ?>" class="btn bg-orange btn-flat btn-sm" title="Ubah Anggota Kelompok"><i class="fa fa-edit"></i></a>
											<a href="<?= site_url('data_kelompok/hapus_anggota/') . $data->id; ?>" title="Hapus Anggota Kelompok" class="btn bg-maroon btn-flat btn-sm aksi-hapus"><i class='fa fa-trash-o'></i></a>
										</td>
										<td>
                                                <img style="width:40px;" src="<?= site_url("data_keluarga/ambil_foto_keluarga?foto={$data->foto_anggota}&sex={$data->jenis_kelamin}"); ?>" alt="Foto Anggota"/>
                                        </td>
										<td><?= $data->no_anggota; ?></td>
										<td><?= $data->nik_anggota; ?></td>
										<td nowrap width="60%"><?= strtoupper($data->anggota_nama); ?></td>
										<td nowrap><?= strtoupper($data->tempat_lahir); ?>/<?= $data->tgl_lahir; ?></td>
										<td><?= hitung_umur($data->tgl_lahir); ?></td>
										<td><?= $data->anggota_sex; ?></td>
										<td nowrap><?= strtoupper($data->wilayah_anggota); ?></td>
										<td nowrap><?= $data->nama_jabatan; ?></td>
										<td nowrap><?= $data->no_sk; ?></td>
										<td nowrap><?= $data->keterangan; ?></td>
									</tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
										<tr>
											<td class="text-center" colspan="12">Data Tidak Tersedia</td>
										</tr>
									<?php endif; ?>
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