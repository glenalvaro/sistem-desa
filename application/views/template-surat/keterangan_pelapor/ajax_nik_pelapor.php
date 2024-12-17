<script>
$(document).ready(function(){
      $('#cari_pelapor').change(function(){
        var id = $(this).val();
        if (id) {
          $('.show_form_pelapor').prop('hidden', false);
          $.ajax({
          url : "<?= base_url('layanan_surat/ajax_get_nik');?>",
          method : "post",
          dataType : "json",
          data : {
               id : id
          },
          success: function(array){
            var nik_pelapor = '';
            var nama_pelapor = '';
            var kk_pelapor = '';
            var tmp_lahir_pelapor = '';
            var tgl_lahir_pelapor = '';
            var jk_pelapor ='';
            var alamat_pelapor ='';
            var warga_pelapor ='';
            var agama_pelapor = '';
            var pendidikan_pelapor = '';
            var wilayah_pelapor = '';
            var pekerjaan_pelapor = '';
            var kawin_pelapor = '';
            for(let index = 0; index < array.length; index++){
              nik_pelapor += "" + array[index].nik + ""
              nama_pelapor += "" + array[index].nama_penduduk + ""
              kk_pelapor += "" + array[index].no_kk + ""
              tmp_lahir_pelapor += "" + array[index].tempat_lahir + ""
              tgl_lahir_pelapor += "" + array[index].tgl_lahir + ""
              jk_pelapor += "" + array[index].sex + ""
              alamat_pelapor += "" + array[index].alamat_sekarang + ""
              warga_pelapor += "" + array[index].status_warganegara + ""
              agama_pelapor += "" + array[index].agama + ""
              pendidikan_pelapor += "" + array[index].pendidikan_sedang + ""
              wilayah_pelapor += "" + array[index].dusun + ""
              pekerjaan_pelapor += "" + array[index].pekerjaan + ""
              kawin_pelapor += "" + array[index].status_kawin + ""
            }
            $('#nik_pelapor').val(nik_pelapor);
            $('#nama_pelapor').val(nama_pelapor);
            $('#kk_pelapor').val(kk_pelapor);
            $('#tmp_lahir_pelapor').val(tmp_lahir_pelapor);
            $('#tgl_lahir_pelapor').val(tgl_lahir_pelapor);
            $('#jk_pelapor').val(jk_pelapor);
            $('#alamat_pelapor').val(alamat_pelapor);
            $('#wilayah_pelapor').val(wilayah_pelapor);
            $('#warga_pelapor').val(warga_pelapor);
            $('#agama_pelapor').val(agama_pelapor);
            $('#pendidikan_pelapor').val(pendidikan_pelapor);
            $('#pekerjaan_pelapor').val(pekerjaan_pelapor);
            $('#kawin_pelapor').val(kawin_pelapor);
        }
      })
    } else {
       $('.show_form_pelapor').prop('hidden', true);
    }
  })
})
</script>


