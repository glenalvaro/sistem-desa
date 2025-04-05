
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Perangkat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Daftar Perangkat</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              Data Perangkat
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="tabel-data" class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
                <thead class="bg-gray disabled color-palette" style="font-size: 11px;">
                <tr>
                    <th style="min-width:10px;">No</th>
                    <th style="min-width:200px;">Nama</th>
                    <th style="min-width:90px;">NIP</th>
                    <th style="min-width:90px;">Jabatan</th>
                </tr>
                </thead>
                <tbody style="font-size: 11px;">
                <?php $no=1;
                    foreach ($perangkat as $data) 
                { ?>
                <tr>
                  <td width="10px"><?= $no++; ?></td>
                  <td width="200px"><?= $data->nama_pegawai ?></td>
                  <td width="200px"><?= $data->nip ?></td>
                  <td width="200px"><?= $data->jabatan ?></td>
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