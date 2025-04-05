<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Edit Sambutan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Sambutan</a></li>
        <li class="active">Edit Data</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('sambutan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sambutan</a>
            </div>
            <form id="mainform" action="<?= base_url('sambutan/edit_data/'); ?><?= $id; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                    <label for="file" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                        <textarea class="form-control input-sm required" name="isi_sambutan" id="editor-text" placeholder="Isi"><?= $isi_sambutan; ?></textarea>
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

