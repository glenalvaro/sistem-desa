
<div class="h-full w-full relative">
    <div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
        <div class="w-auto h-auto flex flex-col gap-2 items-center">
            <h1 class="text-center font-semibold text-xl">Data Bantuan <?= $sebutan_desa; ?> <?= $nama_desa; ?></h1>
            <span class="hr_line w-[10%] h-1"></span>
        </div>
        <div class="text-justify flex flex-col gap-3 leading-6 text-[0.9375rem] 2xl:text-lg xl:text-lg md:text-base sm:text-sm phone:text-xs overflow-x-auto">
         <div class="search-data self-center">
            <form class="search-form" autocomplete="off">
                <input type="text" name="nik" id="nik" class="input-data form-control" placeholder="Masukkan NIK">
                <input type="button" class="btn-submit" value="Cari">
            </form>
          </div>

          <div id="hasil-pencarian">
          <h2>Hasil Pencarian Penerima Bantuan</h2>
          <div class="table-responsive-vertical">
          <table id="table" class="table-data table-hover table-mc-light-blue">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Umur</th>
                  <th>Penerima Bantuan</th>
                </tr>
              </thead>
              <tbody id="result_data">
                
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

<script src="<?= site_url() ?>assets/tema/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
     $(".btn-submit").on('click', function(){
        var nik = $("#nik").val();
        //alert(nik);
        $.ajax({
            url:"<?= base_url('web/get_bantuan'); ?>", 
            type:"POST",
            data:"nik_pend=" + nik,
            success:function(data){
                $("#result_data").html(data);
            }
        });
    });
})
</script>