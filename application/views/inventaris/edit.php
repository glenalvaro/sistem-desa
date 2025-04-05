<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Edit Inventaris
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi UMUM</a></li>
        <li><a href="#"> Data Inventaris</a></li>
        <li class="active"><a href="#"> Edit Data </a></li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('inventaris'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Inventaris</a>
            </div>
            <form id="validasi" action="<?= base_url('inventaris/update_data/'); ?><?= $id; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                <label>Jenis Barang</label>
                     <input type="hidden" name="id" value="<?= $id; ?>">
                     <input type="text" name="jenis_barang" value="<?= $jenis_barang; ?>" class="input-sm form-control required" placeholder="Nama kegiatan">
               </div>

               <div class="form-group">
               <label>Kode Barang</label>
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon">
                           <i class="fa fa-code"></i>
                        </div>
                        <input class="form-control input-sm pull-right required" name="kode_barang" value="<?= $kode_barang; ?>" type="text">
                    </div>
                </div>

               <div class="form-group">
               <label>Identitas Barang</label>
                   <input type="text" name="identitas_barang" value="<?= $identitas_barang; ?>" class="input-sm form-control required">
                </div>

               <div class="form-group">
               <label>Asal Usul Barang</label>
               <div class="row">
                    <div class="col-md-4">
                    <label>APB Desa/Kelurahan :</label>
                        <input type="text" name="apb_desa" value="<?= $apb_desa; ?>" class="input-sm form-control required" placeholder="Rp.">
                    </div>
                    <div class="col-md-4">
                    <label>Perolehan Lain :</label>
                        <input type="text" name="perolehan_lain" value="<?= $perolehan_lain; ?>" class="input-sm form-control required" placeholder="Rp.">
                    </div>
                    <div class="col-md-4">
                    <label>Kekayaan Asli Desa/Kelurahan :</label>
                         <input type="text" name="kekayaan_desa" value="<?= $kekayaan_desa; ?>" class="input-sm form-control required" placeholder="Rp.">
                    </div>
                </div>
                <small>Jika tidak ada diisi dengan '-'.</small>
               </div>

               <div class="form-group">
               <label>Tanggal Perolehan/Pembelian</label>
                   <input type="text" name="tgl_perolehan" id="tgl_1" value="<?= $tgl_perolehan; ?>" class="input-sm form-control required">
                </div>

               <div class="form-group">
               <label>Keterangan</label>
                  <textarea class="input-sm form-control required" name="keterangan"><?= $keterangan; ?></textarea>
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
    </section>
</div>

