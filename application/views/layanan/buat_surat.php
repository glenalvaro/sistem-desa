<div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
        <h1 class="tx-title">
          Layanan Permohonan Surat
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#"> Layanan Surat</a></li>
          <li class="active">Buat Surat</li>
        </ol>
      </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?=site_url('/layanan/permohonan_surat/')?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-left"></i> Kembali ke Daftar Surat</a>
            </div>
             <form id="mainform" action="<?= base_url('/layanan/permohonan_surat/tinjau_permohonan'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                  <div class="form-group">
                    <label for="id_surat" class="col-sm-3">Jenis Surat</label>
                    <div class="col-sm-5">
                      <select id="id_surat" name="id_surat" class="select-filter form-control required" style="width: 100%;">
                          <option value="">-- Pilih Jenis Surat --</option>               
                          <?php foreach($daftar_surat as $data) : ?>
                            <option value="<?= $data['id']; ?>">Surat <?= $data['nama']; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="no_hp_aktif" class="col-sm-3">Nomor Whatsapp</label>
                    <div class="col-sm-5">
                      <input type="number" id="no_hp_aktif" name="no_hp_aktif" class="form-control input-sm required" placeholder="+628xxxxxxxxxx">
                    </div>
              </div>
              </div>
              <div class="box-footer">
                 <button type="submit" class="btn btn-primary btn-sm" style="float: right;"> Selanjutnya &nbsp;<i class="fa fa-chevron-right"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>



 