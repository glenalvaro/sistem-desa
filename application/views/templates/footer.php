<div class="noprint">
    <footer style="font-size: 11px;" class="main-footer">
    <div class="pull-right hidden-xs">
      <strong>Versi</strong>  <span>5.1.2</span>
    </div>
    <?php
      $querySetting = "SELECT * FROM `setting`";
      $hasil = $this->db->query($querySetting)->result_array();
     ?>
    <?php foreach ($hasil as $da) : ?>
    <strong>Aplikasi</strong>
      Sistem Informasi Desa
    <strong>Dikembangkan Oleh</strong>
      <a href="#"><b><?= $da['vendor'] ?></b></a>
    <?php endforeach; ?>
  </footer>



<aside style="font-size: 12px;" class="control-sidebar control-sidebar-light">
    <?php foreach ($hasil as $hl) : ?>
        <div class="col">
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-default">
                  <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Aplikasi SID
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="box-body">
                      Aplikasi Sistem Informasi Desa (SID) yang dikembangkan oleh <b><?= $hl['vendor'] ?></b>. Aplikasi ini dirancang dan dikelola untuk memudahkan desa dalam proses administrasi di kantor desa.
                    </div>
                  </div>
                </div>
              </div>

            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                       Tentang SID
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                      Aplikasi Sistem Informasi Desa (SID) adalah sistem olah data dan informasi berbasis komputer yang dapat dikelola oleh pemerintah dan komunitas desa dalam dua ranah:
                        <br><br><b>1. Offline</b><br>
                         Aplikasi diinstall dalam komputer server di kantor desa dan dioperasikan sebagai server (pusat data) yang bersifat lokal. Karena tidak terhubung ke internet, SID offline hanya bisa diakses dalam jaringan lokal. Sistem offline ini direkomendasikan untuk diterapkan dalam penggunaan aplikasi SID harian. Database dari hasil proses olah data secara offline itu dapat diunggah ke sistem online secara berkala.
                        <br><br><b>2. Online</b><br>
                         SID akan optimal jika terhubung ke internet sebagai sistem online berbasis web. SID online akan otomatis berfungsi juga sebagai website desa. Website desa ini memiliki fungsi yang terbagi dalam dua bagian, yakni bagian depan yang bisa diakses oleh publik dan bagian dalam yang hanya bisa diakses oleh administrator sistem.
                    </div>
                </div>
            </div>

            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                       Fitur Aplikasi Sistem Informasi Desa
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                      Aplikasi Sistem Informasi Desa (SID) memiliki fitur yang dapat memudahkan perangkat desa dalam mengelola administrasi desa. Fitur-fitur tersebut adalah :
                      <ol style="margin-left: -10px; margin-top: 10px;">
                          <li>Administrasi Penduduk</li>
                          <li>Administrasi Keluarga</li>
                          <li>Administrasi Kelompok</li>
                          <li>Manajemen Surat</li>
                          <li>Administrasi Wilayah Desa</li>
                          <li>Informasi Desa</li>
                          <li>UMKM Desa</li>
                          <li>Administrasi Statistik Penduduk</li>
                          <li>Buku Arsip Desa</li>
                          <li>Inventaris Desa</li>
                          <li>Surat Masuk</li>
                          <li>Surat Keluar</li>
                          <li>Layanan Pengaduan</li>
                          <li>Badan Usaha Milik Desa (BumDes)</li>
                          <li>Web Desa</li>
                      </ol>
                    </div>
                </div>
            </div>

            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                       Manajemen Akses SID
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                      Aplikasi SID dirancang untuk mengelola data dasar desa dan informasi desa. Data dasar yang dikelola meliputi data dasar kependudukan dan data dasar aset/sumber daya desa. Data dasar ini menjadi tanggung jawab pemerintah desa dalam pengelolaannya. Hanya pengguna (user) dari pemerintah desa dan tim yang dikoordinasikan oleh pemerintah desa saja yang akan memiliki kewenangan dan hak akses ke dalam sistem. Sementara, user di luar pemerintah desa hanya akan memiliki akses terbatas pada fungsi olah informasi untuk website desa.
                      <br><br>
                      Tingkat user (pengguna) dalam SID:
                      <ol style="margin-left: -20px; margin-top: 10px;">
                          <li>Administrator : adalah orang/tim yang bertanggung jawab penuh atas olah data dan informasi dalam SID dan website desa.</li>
                          <ul>
                              <li>Peran olah data : entry, edit, delete data dasar</li>
                              <li>Peran olah informasi : tulis, edit, publish artikel website</li>
                          </ul>
                          <li>Operator: adalah orang/tim yang bertugas membantu administrator mengelola data dan informasi, tetapi dengan kewenangan yang lebih terbatas.</li>
                          <ul>
                              <li>Peran olah data : entry, edit data dasar</li>
                              <li>Peran olah informasi : tulis, edit artikel website.</li>
                          </ul>
                          <li>Redaksi: adalah orang/tim yang bertugas sebagai redaksi media website desa dan hanya dapat melakukan olah informasi berupa artikel website.</li>
                          <ul>
                              <li>Peran olah informasi : tulis, edit artikel. Redaksi boleh mengubah semua artikel, termasuk menjadikan headline, aktif/non-aktifkan, masukkan ke slider, dsbnya</li>
                          </ul>
                      </ol>
                    </div>
                </div>
            </div>

            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                       Tujuan Dikembangkan SID
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                        Aplikasi SID di rancang untuk memenuhi salah satu syarat penelitian untuk memperoleh Gelar Sarjana pada <b>Universitas Negeri Manado</b>, Jurusan <b>Pendidikan Teknologi Informasi & Komunikasi</b>.
                    </div>
                </div>
            </div>

            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h4 style="font-size: 14px;" class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                       Kontak dan Informasi
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="box-body" style="font-size: 11px;">
                        <p>Nama : <?= $hl['vendor'] ?></p>
                        <p>NIM : 18208040</p>
                        <p>Perguruan Tinggi : Universitas Negeri Manado</p>
                        <p>Jurusan : Pendidikan Teknologi Informasi & Komunikasi</p>
                        <p>Email : glenalvaro66@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach; ?>
</aside>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/parsleyjs/parsley.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select 2 -->
<script src="<?php echo base_url() ?>assets/aset/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/progressive-image/progressive-image.js"></script>
<!-- leaflet control -->
<script src="https://domoritz.github.io/leaflet-locatecontrol/src/L.Control.Locate.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- sweet alert -->
<script src="<?= base_url() ?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sweet-alert/script.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/validasi.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/custom/select2.js"></script>
<script src="<?php echo base_url() ?>assets/fitur.js"></script>

<!-- fungsi untuk menghapus user_role_access -->
  <script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
    
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function(){
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
          }
        });

    });
  </script>

<script>
  var status = 'online';
  var current_status = 'online';
  
  <?php foreach ($hasil as $h) : ?>
  <?php if ($h['cek_internet'] == "Ya") : ?>
    function check_internet_connection(){
        if(navigator.onLine)
        {
            status = 'online';
        }
        else
        {
            status = 'offline';
        }

        if(current_status != status)
        {
            if(status == 'online')
            {
                $('#notif-internet').modal('hide');
            }
            else
            {
                 $('#notif-internet').modal({
                    backdrop: false
                 });
            }

            current_status = status;
        }
    }
    // panggil fungsi check_internet_connection
    check_internet_connection();

    setInterval(function(){
        check_internet_connection();
    }, 1000);
  <?php endif; ?>
<?php endforeach; ?>
</script>
<!-- link -->
<script>
    var SITE_URL = "<?php echo base_url(); ?>";
    function site_url(url){
        var bu = "<?php echo base_url(); ?>";
        url = (url)?url:"";
        return bu + "index.php/" + url;
    }
</script>
</body>
</html>

