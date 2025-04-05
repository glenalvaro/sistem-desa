<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="<?= site_url() ?>assets/tema/jquery/jquery.min.js"></script>
<script src="<?= site_url() ?>assets/tema/jquery/jquery-ui.min.js"></script>
<script src="<?= site_url() ?>assets/tema/js/jquery.fancybox.min.js"></script>
<script src="<?= site_url() ?>assets/tema/js/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/aset/layanan_penduduk/slick/slick.min.js"></script>
<script src="<?= site_url() ?>assets/tema/js/desa.js"></script>
<script>
//slick slider
$(document).ready(function(){
  $(".items").slick({
    infinite: false,
    speed : 300,
    centerMode: false,
    variableWidth: true
   });

  //select2 yang sedang digunakan
  $('.select-filter').select2({
    dropdownAutoWidth : true
  });

  // marquee
   if ($('.informasi_text')) {
    $('.informasi__lists').marquee({
      gap: 50,
      pauseOnHover: true,
      speed: 150
    });
  }
});
</script>
<script>
  var swiper = new Swiper('.header-slider', {
      centeredSlides: true,
      slidesPerView: 'auto',
      loop: true,
      speed : 3000,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        },
      navigation: {
          nextEl: ".swiper-button-next",
          revEl: ".swiper-button-prev",
        },
    });
</script>
