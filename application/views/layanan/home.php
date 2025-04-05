
  <div class="content-wrapper tx-rubik">
    <div class="container">
       <section class="content-header">
      <h1 class="tx-title">
        Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Data</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <?php foreach($setting as $data) : ?>
               Selamat Datang di Aplikasi Layanan <?= $data['title_login']; ?>
             <?php endforeach; ?>
            </div>
            <div class="box-body">
              <h4 style="font-size: 14px; font-weight: bold;">Prosedur Permohonan Surat :</h4>
              <br>
              <ul class="timeline">
                <li class="time-label">
                      <span class="bg-red">
                        Alur Permohonan
                      </span>
                </li>
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">Isi Formulir</a> surat</h3>
                    <div class="timeline-body">
                      Penduduk melakukan pendaftaran surat yang akan di ajukan selanjutnya isi formulir permohonan dan unggah dokumen yang disyaratkan...
                    </div>
                    <div class="timeline-footer">
                      <a href="<?=site_url('/layanan/permohonan_surat/buat_surat')?>" class="btn btn-primary btn-xs">Buat Permohonan</a>
                      <a href="<?=site_url('/layanan/dokumen')?>" class="btn btn-danger btn-xs">Dokumen</a>
                    </div>
                  </div>
                </li>
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header no-border"><a href="#">Petugas</a> memeriksa permohonan yang diajukan penduduk</h3>
                    <div class="timeline-body">
                     <ul style="font-size: 13px;">
                        <li>Permohonan Diterima
                          <ul>
                            <li>Cetak surat dan Tandatangan surat</li>
                          </ul>
                        </li>
                        <li>Permohonan Ditolak</li>
                        <ul>
                            <li>Akan muncul pemberitahuan kepada penduduk dan keterangan surat, periksa kembali formulir persyaratan</li>
                          </ul>
                      </ul>
                    </div>
                </div>
              </li>
            <li>
              <i class="fa fa-comments bg-yellow"></i>
              <div class="timeline-item">
                <h3 class="timeline-header"><a href="#">Status Surat</a></h3>
                <div class="timeline-body">
                  <p style="font-size: 13px;">Status surat dapat merujuk pada status disposisi surat atau status surat secara umum. Terdapat beberapa status surat pada aplikasi administrasi kependudukan ini.</p>
                   <ul style="font-size: 13px;">
                        <li><b>Sedang Diperiksa</b></li>
                          <ul>
                            <li>Petugas sedang memeriksa surat permohonan.</li>
                          </ul>
                        <li><b>Menunggu Tandatangan</b></li>
                        <ul>
                            <li>Surat permohonan diterima dan diserahkan kepada kepala kelurahan/desa untuk ditandatangani.</li>
                        </ul>
                        <li><b>Siap Diambil</b></li>
                        <ul>
                            <li>Surat selesai ditandatangan dan penduduk dapat mengambil surat tersebut dikantor kelurahan/desa.</li>
                        </ul>
                        <li><b>Ditolak</b></li>
                        <ul>
                            <li>Dokumen persyaratan yang diunggah tidak sesuai atau keperluan surat tidak jelas.</li>
                        </ul>
                    </ul>
                </div>
                <div class="timeline-footer">
                  <a href="<?=site_url('/layanan/permohonan_surat')?>" class="btn btn-warning btn-flat btn-xs">Lihat Permohonan</a>
                </div>
              </div>
            </li>
          </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>


