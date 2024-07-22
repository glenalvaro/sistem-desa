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
                    <a href="<?= site_url('data_kelompok/form_anggota/') . $id; ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>

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
                                 <?php 
                                  //ambil data bantuan berdasarkan sasaran program
                                  //sasaran 3 = kelompok/organisasi
                                  $sql = "SELECT u.*, b.id_program as id_prog_ban, y.nama_program as nama_prog, y.sdate as tgl_mulai_prog, y.edate as tgl_akhir_prog, y.keterangan as ket_prog
                                      FROM data_penduduk u
                                      LEFT JOIN peserta_bantuan b ON u.id = b.id_anggota
                                      LEFT JOIN program_bantuan y ON b.id_program = y.id
                                      WHERE u.id = {$id}
                                      AND b.id_sasaran = 3";
                                  $result = $this->db->query($sql)->result_array();
                                 ?>
                                <tr>
                                    <td>Program Bantuan</td>
                                    <td>:</td>
                                    <?php if($result) : ?>
                                    <td>
                                       <div class="btn-group">
                                            <?php $no=1;
                                            foreach($result as $val) : ?>
                                                <a href=""><small class='label label-success'> <?= set_ucwords($val['nama_prog']); ?></small></a>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                    <?php else : ?>
                                    <td>-</td>
                                   <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5><b>Daftar Anggota Kelompok</b></h5>
                    <div class="table-responsive">
                    <table id="datatables-sistem" class="table table-bordered dataTable table-striped table-hover tabel-daftar">
								<thead class="color-palette" style="font-size: 10px;">
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
                                <?php 
                                    $no=1;
                                    foreach($list_anggota_kel as $data) : ?>
									<tr>
										<td class="padat"><?= $no++; ?></td>
										<td class="aksi">
											<a href="<?= site_url("data_kelompok/edit_anggota/{$data->id_kelompok}/{$data->id}"); ?>" class="btn bg-orange btn-sm" title="Ubah Anggota Kelompok"><i class="fa fa-edit"></i></a>
											<a href="<?= site_url('data_kelompok/hapus_anggota/') . $data->id; ?>" title="Hapus Anggota Kelompok" class="btn bg-maroon btn-sm aksi-hapus"><i class='fa fa-trash'></i></a>
										</td>
										<td>
                                            <img style="width:30px;" src="<?= site_url("data_keluarga/ambil_foto_keluarga?foto={$data->foto_anggota}&sex={$data->jenis_kelamin}"); ?>" alt="Foto Anggota"/>
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