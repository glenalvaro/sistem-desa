<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Data Peserta Bantuan <?= set_ucwords($nama_program); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Bantuan</a></li>
        <li class="active">Peserta</li>
      </ol>
    </section>

    <section class="content">
  	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?= site_url('program_bantuan/form_anggotaPeserta/') . $id; ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Peserta</a>

                    <a target="_blank" href="<?= site_url('program_bantuan/cetak_datapeserta/') . $id; ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                    <a href="<?= site_url('program_bantuan'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Program Bantuan</a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian Program</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Sasaran Peserta</td>
                                    <td width="1">:</td>
                                    <td style="text-transform: uppercase;">
                                    <?php 

                                        if($sasaran_program == 1){
                                                echo 'Penduduk Perorangan';
                                        } elseif ($sasaran_program == 2) {
                                                echo 'Keluarga/KK';
                                        } else {
                                            echo 'Kelompok/Organisasi';
                                        }

                                         ?> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Program</td>
                                    <td>:</td>
                                    <td style="text-transform: uppercase;"><?= strtoupper($nama_program); ?></td>
                                </tr>
                                <tr>
                                    <td>Masa Berlaku</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($sdate); ?> - <?= tgl_indo($edate); ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td style="font-size: 10px;"><?= strtoupper($keterangan); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5><b>Daftar Peserta</b></h5>
                   <div class="table-responsive">
                       <table class="table table-bordered table-striped dataTable table-hover tabel-daftar">
                         <thead class="bg-gray disabled color-palette">
                         <tr>
                            <th rowspan="2" class="padat"><input type="checkbox" id="checkall"></th>
                            <th rowspan="2" class="padat">No</th>
                            <th rowspan="2" class="padat">Aksi</th>
                            <?php if($sasaran_program == 1) : ?>
                                <th rowspan="2" nowrap="">NIK</th>
                                <th rowspan="2" nowrap="" class="text-center">NO.KK</th>
                                <th rowspan="2" nowrap="">Nama Penduduk</th>
                            <?php elseif($sasaran_program == 2) : ?>
                                <th rowspan="2" nowrap="">NIK</th>
                                <th rowspan="2" nowrap="" class="text-center">NO.KK</th>
                                <th rowspan="2" nowrap="">Kepala Keluarga</th>
                            <?php else : ?>
                                <th rowspan="2" nowrap="">Ketua Kelompok</th>
                                <th rowspan="2" nowrap="">Nama Kelompok</th>
                                <th rowspan="2" nowrap="">Kode Kelompok</th>
                            <?php endif; ?>
                            <th colspan="8">Identitas di Kartu Peserta</th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="padat">No. Kartu Peserta</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                             <?php if ($peserta_list) : ?>
                             <?php
                             $no = 1;
                            foreach ($peserta_list as $value) : ?>
                            <tr>
                                <td class="padat"><input type="checkbox" name="id_cb[]" value="5"></td>
                                <td class="padat"><?= $no++; ?></td>
                                <td class="aksi">
                                    <a href="" class="btn bg-orange btn-sm" title="Ubah" data-remote="false" data-toggle="modal" data-target="#edit_pes<?= $value->id; ?>" data-title="Ubah Data Peserta"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#hapus_pes<?= $value->id; ?>" class="btn bg-maroon btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                </td>
                                 <?php if($sasaran_program == 1) : ?>
                                    <td nowrap=""><a href="#" title="Daftar program untuk peserta"><?= $value->nik_peserta; ?></a></td>
                                    <td nowrap=""><?= $value->nomor_kk; ?></td>
                                    <td nowrap=""><?= $value->nama_peserta; ?></td>
                                <?php elseif($sasaran_program == 2) : ?>
                                     <td nowrap=""><a href="#" title="Daftar program untuk peserta"><?= $value->nik_peserta; ?></a></td>
                                    <td nowrap=""><?= $value->nomor_kk; ?></td>
                                    <td nowrap=""><?= $value->nama_peserta; ?></td>
                                <?php else : ?>
                                     <td nowrap=""><a href="#" title="Daftar program untuk peserta"><?= $value->ketua_kelompok; ?></a></td>
                                     <td nowrap=""><?= $value->kelompok_nama; ?></td>
                                     <td nowrap=""><?= $value->kode_klpk; ?></td>
                                 <?php endif; ?>
                                <td nowrap="" class="padat"><a href="#" title="Data peserta"><?= $value->no_kartu; ?></a></td>
                                <td nowrap=""><?= $value->nik_peserta ?></td>
                                <td nowrap=""><?= $value->nama_peserta; ?></td>
                                <td nowrap=""><?= $value->tmp_lahir; ?></td>
                                <td nowrap=""><?= $value->tgl_lahir; ?></td>
                                <td nowrap=""><?= $value->jk; ?></td>
                                <td nowrap="">RT 00  RW 00 - <?= $value->alamat_peserta; ?></td>
                                <td nowrap=""><?= $value->keterangan; ?></td>
                            </tr>
                        <?php endforeach; ?>
                          <?php else : ?>
                                <tr>
                                    <td class="text-center" colspan="14">Data Tidak Tersedia</td>
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


<!-- Modal Edit Data -->
<?php $no = 0;
foreach($list_pesban as $row) : $no++; ?>
<div class="modal fade" id="edit_pes<?= $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Edit Identitas Kartu Peserta</h4>
              </div>
              <form action="<?= base_url('program_bantuan/update_peserta/'); ?><?= $row['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                    <label>Nomor Kartu Peserta</label>
                     <input type="hidden" name="id" value="<?= $row['id']; ?>">
                     <input type="text" id="no_kartu" name="no_kartu" class="input-sm form-control" value="<?= $row['no_kartu']; ?>" placeholder="Masukkan Nomor Kartu" required>
                 </div>

                 <div class="form-group">
                     <label>NIK Peserta</label>
                     <input type="text" id="nik_peserta" name="nik_peserta" class="input-sm form-control" value="<?= $row['nik_peserta']; ?>" placeholder="Masukkan NIK Peserta" required>
                 </div>

                 <div class="form-group">
                     <label>Nama Peserta</label>
                     <input type="text" id="nama_peserta" name="nama_peserta" class="input-sm form-control" value="<?= $row['nama_peserta']; ?>" placeholder="Masukkan Nama Peserta" required>
                 </div>

                 <div class="form-group">
                   <div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Tempat Lahir Peserta</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" class="input-sm form-control" value="<?= $row['tmp_lahir']; ?>" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Lahir Peserta</label>
                            <input type="tgl_lahir" name="tgl_lahir" class="input-sm form-control" value="<?= $row['tgl_lahir']; ?>" required>
                         </div>
                        </div>
                        <div class="col-md-3">
                        <label>Jenis Kelamin</label>
                        <select class="form-control select-filter2" name="jk" required>
                        <option value="<?= $row['jk']; ?>">Jenis Kelamin</option>
                            <option value="LAKI-LAKI" <?=($row['jk']=='LAKI-LAKI')?'selected="selected"':''?>>LAKI-LAKI</option>
                            <option value="PEREMPUAN" <?=($row['jk']=='PEREMPUAN')?'selected="selected"':''?>>PEREMPUAN</option>
                        </select>
                        </div>
                    </div>
               </div>

               <div class="form-group">
                 <label>Alamat Peserta</label>
                    <select name="alamat_peserta" class="form-control select-filter2" required>
                    <option value="<?= $row['alamat_peserta']; ?>">Pilih Alamat</option> 
                        <?php foreach($list_wilayah as $main) : ?>
                            <option value="<?= $main['nama_dusun']; ?>" <?=($row['alamat_peserta']==$main['nama_dusun'])?'selected="selected"':''?>><?= $main['nama_dusun']; ?></option>
                        <?php endforeach; ?>
                    </select>
               </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan" class="form-control select-filter2" required>
                    <option value="<?= $row['keterangan']; ?>">Pilih Keterangan</option> 
                        <?php foreach($status_pen as $val) : ?>
                            <option value="<?= $val['nama']; ?>" <?=($row['keterangan']==$val['nama'])?'selected="selected"':''?>><?= $val['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
               </div>
               
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>


<!-- Modal Hapus Data -->
<?php $no = 0;
foreach($list_pesban as $row) : $no++; ?>
<div class="modal fade" id="hapus_pes<?= $row['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px; font-weight: bold;">Hapus Kartu Peserta ini ?</h4>
              </div>
              <form action="<?= base_url('program_bantuan/hapus_peserta/'); ?><?= $row['id']; ?>" method="post">
              <div class="modal-body">
                 <div class="form-group">
                    <label>Nomor Kartu Peserta</label>
                     <input type="text" class="input-sm form-control" value="<?= $row['no_kartu']; ?>" placeholder="Masukkan Nomor Kartu" disabled>
                 </div>

                 <div class="form-group">
                     <label>Nama Peserta</label>
                     <input type="text" class="input-sm form-control" value="<?= $row['nama_peserta']; ?>" placeholder="Masukkan Nama Peserta" disabled>
                 </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-social btn-flat btn-info btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: right;"><i class="fa fa-check"></i> Hapus</button>
              </div>
            </form>
          </div>
      </div>
</div>
<?php endforeach; ?>