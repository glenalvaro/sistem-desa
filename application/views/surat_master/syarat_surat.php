<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Persyaratan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Pengaturan</a></li>
        <li class="active"><a href="#"> Syarat Surat</a></li>
      </ol>
    </section>

     <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                 <a href="<?php echo base_url('surat_master'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Pengaturan Surat</a>
            </div>
            <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                 <div class="form-group">
                    <label for="nama_surat" class="col-sm-4">Nama Surat</label>
                    <div class="col-sm-6">
                      <input type="text" value="<?= $nama; ?>" class="form-control input-sm" placeholder="Nama Surat" disabled>
                    </div>
                  </div>
                
                <div class="form-group">
                    <label for="nama_surat" class="col-sm-4">Dokumen Persyaratan</label>
                     <div class="col-sm-6">
                         <div class="table-responsive">
                                <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th><input type="checkbox" id="checkall"/></th>
                                            <th>No</th>
                                            <th>Nama Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($list_syarat as $key => $ref_syarat): ?>
                                        <tr>
                                            <td class="padat"><input type="checkbox" name="id_syarat[]" value="<?=$ref_syarat['id']; ?>" <?php in_array($ref_syarat['id'], array_column($syarat_surat, 'id_syarat')) and print('checked'); ?>/></td>
                                            <td class="padat"><?= ($key + 1); ?></td>
                                            <td><?= $ref_syarat['nama']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
                </div>
              </div>
            </form>
        </div>
        </div>
        </div>
    </section>
</div>