<div class="content-wrapper">
    <section class="content-header">
      <h1 class="tx-judul">
        Surat Keluar<small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li><a href="#"> Surat Keluar</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="<?= site_url('buku_surat_keluar'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Surat Keluar</a>

           <a href="<?= base_url(); ?>/folder_arsip/surat_keluar/<?= $file_surat; ?>" class="btn btn-social btn-flat bg-maroon btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" download><i class="fa fa-download"></i>  Download Surat</a>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                  <th>Nama Surat</th>
                  <td><?php echo $nama_surat ?></td>
                </tr>
                <tr>
                  <th>Nomor Surat</th>
                  <td><?php echo $no_surat_kel ?></td>
                </tr>
                <tr>
                  <th>Tanggal Surat</th>
                  <td><?php echo $tgl_surat ?></td>
                </tr>
                <tr>
                  <th>Ditujukan Kepada</th>
                  <td><?php echo $tujuan ?></td>
                </tr>
                <tr>
                  <th>Isi Singkat/Perihat</th>
                  <td><?php echo $isi_singkat ?></td>
                </tr>
                <tr>
                  <th>File Surat</th>
                  <td><i class="fa fa-file-pdf-o"></i> <a href="<?= base_url(); ?>/folder_arsip/surat_keluar/<?= $file_surat; ?>" target="_blank" ><?php echo $file_surat ?></a>
                  </td>
                </tr>
              </table>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


