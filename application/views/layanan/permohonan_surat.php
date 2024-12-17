
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Layanan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daftar Surat</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <?php $this->load->view('layanan/template/side'); ?>
       
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?=site_url('/layanan/permohonan_surat/buat_surat')?>" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-file-pdf-o"></i> Buat Surat</a>
            </div>
            <div class="box-header with-border">
              Daftar Permohonan Surat
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:50px;">Aksi</th>
                    <th style="min-width:100px;">Nama Penduduk</th>
                    <th style="min-width:100px;">Jenis Surat</th>
                    <th style="min-width:90px;">Status</th>
                    <th style="min-width:90px;">Tanggal Kirim</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($daftar_peserta as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="200px"><?= $data->no_kartu ?></td>
                  <td width="200px"><?= set_ucwords($data->nama_peserta); ?></td>
                  <td width="200px"><?= set_ucwords($data->program_nama); ?></td>
                  <td width="200px"><?= set_ucwords($data->alamat_peserta); ?></td>
                  <td width="100px"></td>
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
  </div>