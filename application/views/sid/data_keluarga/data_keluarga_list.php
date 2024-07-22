<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Data Keluarga
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Keluarga</a></li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                        <a href="<?= site_url('data_keluarga/create'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah KK Baru</a>

                        <a target="_blank" href="<?= site_url('data_keluarga/cetak_keluarga'); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

                        <a href="<?= site_url('data_keluarga/unduh_keluarga'); ?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>


                        <div class="btn-group-vertical">
                            <a class="btn btn-social btn-flat bg-maroon btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Aksi Data Terpilih</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <button type="submit" name="delete_checklist" class="btn btn-social btn-flat btn-block btn-sm" title="Ceklis pada data yang akan dihapus" disabled="">
                                        <i class="fa fa-trash"></i> Hapus Data Terpilih</a>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <a href="" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-refresh"></i>Bersihkan</a>
                    </div>

        <div class="box-body table-penduduk">
            <div class="row">   
            <div class="col-sm-10">
            <div class="form-inline">
                 <span id="filter_jk"></span>  
                 <span id="filter_wilayah"></span>  
            </div>
            </div>
            <div class="col-md-2">
            <div class="input-group pull-right">
                <input type="search" class="input-cari form-control" id="search_data" placeholder="Cari...">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-default" disabled><i class="fa fa-search"></i></button>
                </span>
            </div>
            </div>
            </div>
            <div class="table-responsive" style="margin-top: 10px;">
                    <table style="width:100%;" id="table_keluarga" class="table table-bordered dataTable table-striped table-hover no-footer">
                            <thead class="color-palette" style="font-size: 10px;">
                                <tr>
                                    <th>
                                        <input type="checkbox" id="check_kk">
                                    </th>
                                    <th style="min-width:20px; font-weight: bold;">No</th>
                                    <th style="min-width:115px; text-align: center;">AKSI</th>
                                    <th style="min-width:50px; text-align: center;">FOTO</th>
                                    <th style="min-width:150px; text-align: center;">NOMOR KK</th>
                                    <th style="min-width:150px; text-align: center;">KEPALA KELUARGA</th>
                                    <th style="min-width:100px; text-align: center;">NIK</th>
                                    <th style="min-width:100px; text-align: center;">JUMLAH ANGGOTA</th>
                                    <th style="min-width:100px; text-align: center;">JENIS KELAMIN</th>
                                    <th style="min-width:150px; text-align: center;">ALAMAT</th>
                                    <th style="min-width:100px; text-align: center;">DUSUN</th>
                                    <th style="min-width:100px; text-align: center;">TGL TERDAFTAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($list_keluarga as $data) : ?>
                                <tr>
                                    <td>
                                        <input id="data_kk" type="checkbox" class="checklist-kk" name="id[]" value="<?= $data->id ?>">
                                    </td>
                                    <td><?= $no++; ?></td>
                                    <td>
                                    <center>
                                    <a href="<?= site_url("data_keluarga/anggota_keluarga/{$data->id}/{$data->no_kk}"); ?>" class="btn bg-purple btn-flat btn-sm" title="Anggota Keluarga"><i class="fa fa-list-ol"></i></a>
                                    <a href="<?= site_url("data_keluarga/form_peristiwa/{$data->id}/{$data->no_kk}"); ?>" class="btn bg-olive btn-flat btn-sm" title="Tambah Anggota"><i class="fa fa-plus"></i></a>
                                    <a href="#" class="btn bg-yellow btn-flat btn-sm" title="Edit Data" data-toggle="modal" data-target="#editKK<?= $data->id; ?>"><i class="fa fa-edit"></i></a>
                                    </center>
                                    </td>
                                    <td>
                                        <center>
                                        <a href="<?= site_url("data_keluarga/ambil_foto_keluarga?foto={$data->foto}&sex={$data->jenis_kelamin}"); ?>" class="progressive replace foto_penduduk">
                                        <img class="preview" loading="lazy" src="<?= site_url('assets/img/img-load.gif') ?>" alt="Foto Penduduk"/>
                                        </a>
                                        </center>
                                    </td>
                                    <td>
                                        <a href="<?= site_url("data_keluarga/kartu_keluarga/{$data->id}/{$data->no_kk}"); ?>"><?= $data->no_kk; ?></a>
                                    </td>
                                    <td><?= set_ucwords($data->nama_penduduk); ?></td>
                                    <td>
                                        <a href="<?= site_url('data_penduduk/read/'.$data->id) ?>"><?= $data->nik; ?></a>
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                        //hitung jumlah anggota kk
										 $query = $this->db->query("SELECT * FROM data_penduduk where no_kk=$data->no_kk");
										 $count_anggota = $query->num_rows();
									?>
									    <a href="<?= site_url("data_keluarga/anggota_keluarga/{$data->id}/{$data->no_kk}"); ?>"><?= $count_anggota; ?></a>
                                    </td>
                                    <td><?= set_ucwords($data->sex); ?></td>
                                    <td><?= set_ucwords($data->alamat_sekarang); ?></td>
                                    <td><?= set_ucwords($data->dusun); ?></td>
                                    <td><?= tgl_indo($data->tgl_terdaftar); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                    </table>
                </div>

        <div class="row">
            <div class="col-md-6">  
            </div>
            <div class="col-md-6 text-right" style="margin-top: 20px; margin-bottom: 50px;">
            </div>
        </div>
        </div>


<!-- Edit Data Penduduk KK -->
<?php $no = 0;
foreach($list_keluarga as $lk) : $no++; ?>
<div class="modal fade" id="editKK<?= $lk->id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-size: 15px;">Ubah Data KK</h4>
              </div>
              <form action="<?= site_url('data_keluarga/edit_penduduk_KK/'); ?><?= $lk->id; ?>" method="post">
              <div class="modal-body">
               <div class="form-group">
                    <label>Nomor KK :</label>
                    <input type="hidden" name="id" value="<?= $lk->id; ?>">
                    <input type="text" class="form-control input-sm" value="<?= $lk->no_kk; ?>" readonly>
               </div>
               <div class="form-group">
                    <label>Alamat :</label>
                    <textarea name="alamat_sekarang" class="form-control input-sm" placeholder="Alamat Tempat Tinggal"><?= $lk->alamat_sekarang; ?></textarea>
               </div>
               <div class="form-group">
               <div class="row">
                    <div class="col-md-6">
                    <label>Dusun :</label>
                    <select name="dusun_id" class="form-control select-filter2">
                    <option value="<?= $lk->dusun_id; ?>">Pilih Dusun</option> 
                        <?php foreach($penduduk_wilayah as $val) : ?>
                            <option value="<?= $val['id']; ?>" <?=($lk->dusun_id==$val['id'])?'selected="selected"':''?>><?= $val['nama_dusun']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="col-md-3">
                    <label>RW :</label>
                        <select class="form-control select-filter2" disabled>
                        <option>-</option> 
                    </select>
                    </div>
                    <div class="col-md-3">
                    <label>RT :</label>
                        <select class="form-control select-filter2" disabled>
                        <option>-</option> 
                    </select>
                    </div>
                </div>
               </div>
               <div class="form-group">
				<label for="tgl_cetak_kk">Tanggal Lapor <code> (tanggal daftar)</code> </label>
				<div class="input-group input-group-sm">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input class="form-control input-sm" type="text" value="<?= tgl_indo($lk->tgl_terdaftar); ?>" disabled>
				</div>
			    </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>
      </div>
</div>
<?php endforeach; ?>
            </div>
        </div>
      </div>
    </section>
</div>


<script>
    $(document).ready(function() {
    var table = $('#table_keluarga').DataTable({
        "pageLength": 50,
        "ordering" : false,
        'aoColumnDefs':[{
            'bSortable':false,
            'aTargets':['nosort'],
        }],
        "bLengthChange":true,
        "dom":'<"bottom">ct<"right"lp><"clear">',
         initComplete: function () {
              this.api().columns([8]).every( function () {
                var column1 = this;
                var select1 = $('<select class="form-control select-filter2"><option value="">Pilih Jenis Kelamin</option></select>')
                    .appendTo($('#filter_jk'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column1
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
 
                column1.data().unique().sort().each( function (d, j) {
                    select1.append('<option value="'+d+'">'+d+'</option>')
                });
            });
            this.api().columns([10]).every( function () {
                var column = this;
                var select = $('<select class="form-control select-filter2"><option value="">Pilih Wilayah</option></select>')
                    .appendTo($('#filter_wilayah'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                    });
 
                column.data().unique().sort().each( function (d, j) {
                    select.append('<option value="'+d+'">'+d+'</option>')
                });
            });
        }
    });

    //filter search
    $("#search_data").keyup(function(){
        table.search(this.value).draw();
    });
});
</script>