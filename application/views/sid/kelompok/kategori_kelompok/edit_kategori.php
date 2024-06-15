<div class="content-wrapper">
    <section class="content-header">
     <h1 class="tx-judul">
       Edit Kategori Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Kelompok</a></li>
        <li class="active">Ketegori Kelompok</li>
      </ol>
    </section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('data_kelompok/kelola_kategori'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kategori Kelompok</a>
            </div>
            <form action="<?= site_url('data_kelompok/update_kategori'); ?>" method="post" class="form-horizontal" autocomplete="off">
              <div class="box-body">
                <?php foreach($edit_list as $main) : ?>
                 <div class="form-group">
                    <label for="kategori_kelompok" class="col-sm-4">Kategori Kelompok</label>
                    <div class="col-sm-6">
                       <input type="hidden" name="id" value="<?= $main->id; ?>">
                       <input type="text" name="kategori_kelompok" id="kategori_kelompok" value="<?= $main->kategori_kelompok; ?>" class="form-control input-sm" placeholder="Ketegori Kelompok">
                       <?= form_error('kategori_kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-sm-4">Deskripsi Kategori</label>
                    <div class="col-sm-6">
                      <textarea name="deskripsi_kategori" class="form-control input-sm" value="<?= $main->deskripsi_kategori; ?>" placeholder="Deskripsi Kelompok"><?= $main->deskripsi_kategori; ?></textarea>
                    </div>
                  </div>
                 <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <br>
              <?php endforeach; ?>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>




