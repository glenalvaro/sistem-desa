
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Bantuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Data Bantuan</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            Daftar Penerima Bantuan
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:90px;">Nomor Kartu</th>
                    <th style="min-width:200px;">Nama Peserta</th>
                    <th style="min-width:90px;">Kategori Bantuan</th>
                    <th style="min-width:90px;">Alamat Penerima</th>
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