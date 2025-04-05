<script>
$(document).ready(function(){
      $('#cari_nik').change(function(){
        var id = $(this).val();
        if (id) {
          $('.show_form').prop('hidden', false);
          $('.show_kk_list').prop('hidden', true);
          $('.show_dok_list').prop('hidden', true);
          $.ajax({
          url : "<?= base_url('layanan_surat/ajax_get_nik');?>",
          method : "post",
          dataType : "json",
          data : {
               id : id
          },
          success: function(array){
            var id_pd = '';
            var nik = '';
            var pend_nama = '';
            var pend_kk = '';
            var tempat_lahir = '';
            var lahir_pend = '';
            var sex ='';
            var alamat_pend ='';
            var warga_pend ='';
            var agama_pend = '';
            var pendidikan_pend = '';
            var wilayah_pend = '';
            var pekerjaan_pend = '';
            var kawin_status = '';
            for(let index = 0; index < array.length; index++){
              id_pd += "" + array[index].id + ""
              nik += "" + array[index].nik + ""
              pend_nama += "" + array[index].nama_penduduk + ""
              pend_kk += "" + array[index].no_kk + ""
              tempat_lahir += "" + array[index].tempat_lahir + ""
              lahir_pend += "" + array[index].tgl_lahir + ""
              sex += "" + array[index].sex + ""
              alamat_pend += "" + array[index].alamat_sekarang + ""
              warga_pend += "" + array[index].status_warganegara + ""
              agama_pend += "" + array[index].agama + ""
              pendidikan_pend += "" + array[index].pendidikan_sedang + ""
              wilayah_pend += "" + array[index].dusun + ""
              pekerjaan_pend += "" + array[index].pekerjaan + ""
              kawin_status += "" + array[index].status_kawin + ""
            }
            $('#pend_nik').val(nik);
            $('#pend_nama').val(pend_nama);
            $('#pend_kk').val(pend_kk);
            $('#tempat_lahir_pend').val(tempat_lahir);
            $('#tgl_lahir_pend').val(lahir_pend);
            $('#jk_pend').val(sex);
            $('#alamat_pend').val(alamat_pend);
            $('#warga_pend').val(warga_pend);
            $('#agama_pend').val(agama_pend);
            $('#pendidikan_pend').val(pendidikan_pend);
            $('#wilayah_pend').val(wilayah_pend);
            $('#pekerjaan_pend').val(pekerjaan_pend);
            $('#kawin_status').val(kawin_status);
            $('#id_ped').val(id_pd);

            document.querySelector("#manajemen_dok").addEventListener("click", 
            function (e){
               myLink = "<?= base_url('data_penduduk/dokumen/') ?>" + id_pd;
                   window.open(myLink, "_blank");
            });
        }
      })
    } else {
       $('.show_form').prop('hidden', true);
    }
  })
})
</script>


<script>
$(document).ready(function(){
  $("#daftar_keluarga").on('click', function() {
    var kk_nomor = document.getElementById("pend_kk").value;
     //alert(kk_nomor);
      if (kk_nomor) {
        $('.show_kk_list').prop('hidden', false);
         $.ajax({
          url : "<?= base_url('layanan_surat/ajax_get_kk');?>",
          method : "post",
          dataType : "json",
          data : {
               kk_nomor : kk_nomor
          },
          success: function (response) {
            var no=1;
            var trHTML = '';
            $.each(response, function (i, key) {
                trHTML += '<tr><td>' + no++ + '</td><td>' + key.nik + '</td><td>' + 
                          key.nama_penduduk + '</td><td>' + 
                          key.sex + '</td><td>' + key.tempat_lahir + '</td><td>' + key.hubungan + '</td><td>' + key.status_kawin + '</td></tr>';
                });
            $('#record_kk').html(trHTML);
          }
      })
      } else {
        $('.show_kk_list').prop('hidden', true);
    }
});

});
</script>

<script>
$(document).ready(function(){
  $("#daftar_dok").on('click', function() {
    var dok_id = document.getElementById("id_ped").value;
     //alert(dok_id);
      if (dok_id) {
        $('.show_dok_list').prop('hidden', false);
         $.ajax({
          url : "<?= base_url('layanan_surat/ajax_get_dok');?>",
          method : "post",
          dataType : "json",
          data : {
               dok_id : dok_id
          },
          success: function (response) {
            var no=1;
            var trHTML = '';
            $.each(response, function (i, val) {
                trHTML += '<tr><td>' + no++ + '</td><td><a href="<?= base_url(); ?>folder_arsip/dokumen/' + val.file + '" target="_blank" class="btn btn-primary btn-sm">Lihat</a></td><td>' + 
                          val.nama + '</td></tr>';
                });
            $('#record_dok').html(trHTML);
          }
      })
      } else {
        $('.show_dok_list').prop('hidden', true);
    }
});

});
</script>



