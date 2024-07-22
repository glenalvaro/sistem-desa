<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Data Kelompok 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Kelompok</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-3">
      <a href="<?= base_url('data_kelompok/kelola_kategori'); ?>" class="btn btn-social btn-flat btn-primary btn-sm btn-block margin-bottom"><i class="fa fa-sort"></i> KELOLA KATEGORI KELOMPOK</a>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 style="font-size: 14px;" class="box-title">FILTER KELOMPOK</h4>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li>
                <select id="filter_kategori" class="form-control select-filter" style="width:100%;">
                    <option value="">--PILIH KATEGORI KELOMPOK--</option>
                    <?php foreach($kategori_list as $data) : ?>
                        <option value="<?= $data['kategori_kelompok']; ?>"><?= strtoupper($data['kategori_kelompok']); ?></option>
                    <?php endforeach; ?>
                </select>  
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border"> 
               <a href="<?= site_url('data_kelompok/tambah_kelompok'); ?>" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Kelompok Baru</a>
               <a target="_blank" href="<?= site_url('data_kelompok/cetak_kelompok'); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>
               <a href="<?= site_url('data_kelompok/export_pdf'); ?>" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>
            </div>
        <div class="box-body table-penduduk" >
            <div class="row">   
            <div class="col-sm-9"></div>
            <div class="col-md-3">
            <div class="input-group pull-right">
                <input type="search" class="input-cari form-control" id="search-kelompok" placeholder="Cari Kelompok...">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-default" disabled><i class="fa fa-search"></i></button>
                </span>
            </div>
            </div>
            </div>
            <div class="table-responsive" style="margin-bottom: 70px;">
                <table id="table-kelompok" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="color-palette" style="font-size: 10px;">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th class="text-center">Kode Kelompok</th>
                  <th style="min-width:200px;" class="text-center">Nama Kelompok</th>
                  <th class="text-center">Ketua Kelompok</th>
                  <th class="text-center">Kategori Kelompok</th>
                  <th class="text-center">Jumlah Anggota</th>
                </tr>
                </thead>
                <tbody>
                   <?php if($list_kelompok) : ?>
                    <?php 
                    $no=1;
                    foreach($list_kelompok as $data) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="10%" class="text-center">
                      <a href="<?= site_url('data_kelompok/anggota_kelompok/') . $data->id; ?>" class="btn bg-purple btn-flat btn-sm" title="Rincian Kelompok"><i class="fa fa-list-ol"></i></a>
                      <a href="<?= site_url('data_kelompok/edit_kelompok/') . $data->id; ?>" class="btn btn-warning btn-flat btn-sm" title="Edit Kelompok"><i class="fa fa-edit"></i></a>
                      <a href="<?= site_url('data_kelompok/hapus_kelompok/') . $data->id; ?>" class="btn bg-maroon btn-flat btn-sm aksi-hapus" title="Hapus Kategori Kelompok"><i class="fa fa-trash"></i></a>
                  </td>
                  <td width="5%"><?= $data->kode_kelompok; ?></td>
                  <td><?= $data->nama_kelompok; ?></td>
                  <td width="15%"><?= set_ucwords($data->nama_ketua); ?></td>
                  <td><?= $data->nama_kategori; ?></td>
                  <td class="text-center">
                  <?php 
                      //hitung jumlah anggota kelompok
										 $query = $this->db->query("SELECT * FROM anggota_kelompok where id_kelompok=$data->id");
										 $count_kelompok = $query->num_rows();
									?>
									    <?= $count_kelompok; ?>
                  </td>
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
</section>
</div>

<script>
  $(document).ready(function() {
    var list = $('#table-kelompok').DataTable({
      "pageLength": 10,
        "ordering" : false,
        'aoColumnDefs':[{
            'bSortable':false,
            'aTargets':['nosort'],
        }],
        "bLengthChange":true,
        "dom":'<"bottom">ct<"bottom"lp><"clear">',
    });
     //search kelompok
     $("#search-kelompok").keyup(function(){
        list.search(this.value).draw();
    });
     //filter berdasarkan kategori kelompok
     $("#filter_kategori").on("change", function(){
        var kategori = $(this).val();
        // alert(kategori);
        $.ajax({
            url:"<?= base_url('data_kelompok/filter_kategori'); ?>", 
            type:"POST",
            data:"filter=" + kategori,
            success:function(data){
              list.search(kategori).draw();
            }
        });
    });
})
</script>