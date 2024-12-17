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
      Sistem Informasi <?= $da['sebutan_desa'] ?>
    <strong>Dikembangkan Oleh</strong>
      <a href="#"><b><?= $da['vendor'] ?></b></a>
    <?php endforeach; ?>
  </footer>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/parsleyjs/parsley.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select 2 -->
<script src="<?= base_url() ?>assets/aset/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/progressive-image/progressive-image.js"></script>
<!-- leaflet control -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-locatecontrol/0.82.0/L.Control.Locate.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/sweet-alert/script.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- TinyMCE -->
<script src="<?= base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url() ?>assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE JS -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/custom/select2.js"></script>
<script src="<?= base_url() ?>assets/fitur.js"></script>

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
<!-- link JS-->
<script>
    var SITE_URL = "<?php echo base_url(); ?>";
    function site_url(url){
        var bu = "<?php echo base_url(); ?>";
        url = (url)?url:"";
        return bu + "index.php/" + url;
    }
</script>
<script>
$(document).ready(function(){
    $('[data-rel="popover"]').popover({
        html: true,
        trigger: "hover",
    });       
});
</script>
</body>
</html>

