<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Lembaga Masyarakat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Artikel</a></li>
        <li class="active">Edit Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('lembaga_masyarakat'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga</a>
            </div>
            <form id="mainform" action="<?= base_url('lembaga_masyarakat/edit_data/'); ?><?= $id; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="judul_dokumen" class="col-sm-4">Nama Lembaga</label>
                    <div class="col-sm-6">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" name="user" value="<?= $user; ?>">
                      <input type="text" name="nama" id="nama" value="<?= $nama; ?>" class="form-control input-sm required" placeholder="Nama Lembaga">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="file" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-7">
                  		 <textarea class="form-control input-sm required" name="isi" id="editor-text" placeholder="Isi"><?= $isi; ?></textarea>
                    </div>
                  </div>

                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

