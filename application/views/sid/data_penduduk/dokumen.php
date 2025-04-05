<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Manajemen Dokumen <?= set_ucwords($dp->nama_penduduk); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Data Penduduk</a></li>
        <li><a href="#"> Daftar Dokumen</a></li>
      </ol>
    </section>

    <section class="content">
            <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                   <div class="box-header with-border">
                      <div>
                        <a href="<?= site_url('data_penduduk'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali ke Daftar Penduduk</a>

                        <a href="#" data-toggle="modal" data-target="#tambah_dk" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                      </div>
                    </div>

        <div class="box-body">
              <div class="table-responsive">
                <table id="datatables-sistem" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:80px;">Aksi</th>
                    <th style="min-width:150px;">Nama Dokumen</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($dok_data as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="50px">
                    <a href="<?= base_url(); ?>folder_arsip/dokumen/<?= $data->file; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=600,width=600,resizable=0");return false;' rel='noopener noreferrer' target='_blank' class="btn btn-primary btn-sm">Lihat</a>
                    <a href="<?= site_url('data_penduduk/hapus_dokumen/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus">Hapus</a>
                  </td>
                  <td width="200px"><?= set_ucwords($data->nama); ?></td>
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


<div class="modal fade" id="tambah_dk">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Unggah Dokumen</h5>
          </div>
      <form id="validasi" action="<?= base_url('data_penduduk/tambah_dokumen'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="id_penduduk" name="id_penduduk" value="<?= $dp->id; ?>">
          <label for="nama">Nama Dokumen</label>
            <select id="id_dk" onchange="clik_ini()" name="nama" class="select-filter form-control required" style="width: 100%;">
             <option value="">-- Pilih Dokumen --</option>               
                <?php foreach($list_dp as $data) : ?>
                  <small><option value="<?= $data['nama']; ?>"><?= $data['nama']; ?></option></small>
                <?php endforeach; ?>
            </select>
            <br>
            <small><span style="color: red;" id="dk_tampil"></span></small>
        </div>

        <div class="form-group">
            <label for="file">File</label>
              <div class="custom-file">
                  <input type="file" id="file" name="file" class="custom-file-input" required>
             <label class="custom-file-label" for="file"></label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-social btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" id="btndok" class="btn btn-social btn-primary btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  function clik_ini() {

  jQuery.ajax({
  url: "<?= base_url("data_penduduk/cek_duplicate/{$dp->id}"); ?>",
  data:'isi_val='+$("#id_dk").val(),
  type: "POST",
  success:function(data){
    $("#dk_tampil").html(data);
  },
  error:function (){}
  });
}
</script>