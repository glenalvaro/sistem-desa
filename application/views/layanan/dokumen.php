
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Dokumen
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dokumen</a></li>
        <li class="active">Data</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
           <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="#" data-toggle="modal" data-target="#dok_modal" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Dokumen</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:100px;">Aksi</th>
                    <th style="min-width:100px;">Nama Dokumen</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($list_data as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="50px">
                    <a href="<?= base_url(); ?>folder_arsip/dokumen/<?= $data->file; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=600,width=600,resizable=0");return false;' rel='noopener noreferrer' target='_blank' class="btn btn-primary btn-sm">Lihat</a>
                    <a href="<?= site_url('/layanan/dokumen/hapus/') . $data->id; ?>" class="btn bg-maroon btn-sm aksi-hapus">Hapus</a>
                  </td>
                  <td width="200px"><?= set_ucwords($data->nama); ?></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            </div>
             <div class="col-md-12">
                <h4 style="font-size: 12px; font-weight: bold;">Ketentuan Unggah Dokumen</h4>
                  <ul>
                    <li>Format berkas yang diterima PDF atau JPEG sesuai ketentuan per jenis dokumen</li>
                    <li>Ukuran minimal setiap berkas adalah 1000KB, dengan ukuran maksimal tergantung jenis berkas</li>
                    <li>Jika ukuran berkas melebihi ketentuan, silahkan dikecilkan ke resolusi lebih kecil dengan catatan tulisan pada berkas harus terbaca</li>
                    <li>Jika sudah selesai mengunggah, harap mengecek hasil unggahan dengan menekan tombol 'Lihat'.</li>
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>

 
<div class="modal fade" id="dok_modal">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Unggah Dokumen</h5>
          </div>
      <form id="validasi" action="<?= base_url('/layanan/dokumen/unggah_dok'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id_penduduk" value="<?= $id_pend->id; ?>">
          <label for="nama">Nama Dokumen</label>
            <select id="select_dok" onchange="check_duplicate()" name="nama" class="select-filter has-error form-control required" style="width: 100%;">
             <option value="">-- Pilih Dokumen --</option>               
                <?php foreach($list_dk as $data) : ?>
                  <small><option value="<?= $data['nama']; ?>"><?= $data['nama']; ?></option></small>
                <?php endforeach; ?>
            </select>
            <br>
            <small><span id="result_duplicate" style="color: red;"></span></small>
        </div>

        <div class="form-group">
            <label for="file">File</label>
              <div class="input-group input-group-sm">
                <input type="file" name="file" class="form-control input-sm required">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Go!</button>
                    </span>
              </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-social btn-danger btn-sm" data-dismiss="modal" style="float: left;"><i class="fa fa-times"></i> Batal</button>
          <button type="submit" id="btnDok" class="btn btn-social btn-primary btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script>
  function check_duplicate() {

  jQuery.ajax({
  url: "<?= base_url('/layanan/dokumen/cek_nama_dok'); ?>",
  data:'val_dok='+$("#select_dok").val(),
  type: "POST",
  success:function(data){
    $("#result_duplicate").html(data);
  },
  error:function (){}
  });
}
</script>