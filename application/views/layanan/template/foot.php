<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
         <strong>Versi</strong>  <span>5.1.2</span>
      </div>
     <?php
      $querySetting = "SELECT * FROM `setting`";
      $hasil = $this->db->query($querySetting)->result_array();
     ?>
    <?php foreach ($hasil as $da) : ?>
    <strong>Aplikasi</strong>
      <?= $da['title_login']; ?>
    <?php endforeach; ?>
    </div>
  </footer>
</div>

<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/aset/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/aset/layanan_penduduk/slick/slick.min.js"></script>
<script>
  //slider list buku di transaksi
$(document).ready(function(){
  $(".items").slick({
    infinite: true,
    speed : 300,
    centerMode: false,
    variableWidth: true
   });

  //select2 yang sedang digunakan
  $('.select-filter').select2({
    dropdownAutoWidth : true
  });
});

$(function () {
    $('#tabel-data').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      "language": {
          "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
      }
    })
});
</script>
</body>
</html>