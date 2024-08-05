<style>
  .dropzone {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 2px dashed #0087F7;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Unggah Gambar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Usaha Mikro</a></li>
        <li><a href="#"> Unggah Gambar</a></li>
      </ol>
    </section>

  <section class="content">
    <div class="row">
		<div class="col-xs-12">
          <div class="alert alert-info alert-dismissible">
              <h4><i class="icon fa fa-info"></i> Perhatian!</h4>
              Unggah beberapa gambar usaha mikro anda, gambar yang diunggah akan langsung di simpan ke database.
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
            	<a href="<?= site_url('umkm'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Usaha Mikro</a>
            </div>
            <div class="box-body">
              <form class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="col-sm-3">Nama Pemilik</label>
                  <div class="col-sm-5">
                    <input type="hidden" id="id_umkm" name="id_umkm" value="<?= $id; ?>" readonly>
                    <input type="text" value="<?= set_ucwords($nama_pemilik); ?>" class="form-control input-sm" disabled>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3">Nama Usaha</label>
                  <div class="col-sm-5">
                    <input type="text" value="<?= set_ucwords($nama_usaha); ?>" class="form-control input-sm" disabled>
                  </div>
              </div>
            </form>
             <div class="dropzone" id="gambar_usaha">
                <div class="dz-message">
                  <h3 style="font-size: 20px;"> Klik atau drop gambar disini</h3>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</section>
</div>


<script>
Dropzone.autoDiscover = false;
var foto_upload=new Dropzone("#gambar_usaha",{
    url           : "<?= base_url('umkm/proses_unggah') ?>",
    maxFilesize   : 2,
    method        :"post",
    acceptedFiles :"image/*",
    paramName     :"userfile",
    dictInvalidFileType :"Type file ini tidak dizinkan",
    addRemoveLinks:true,
});

//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
  a.token=Math.random();
  c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});

foto_upload.on("sending", function(file, xhr, formData) {
      //Add additional data to the upload
      formData.append('id_umkm', $('#id_umkm').val());  
});

//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
  var token = a.token;
  $.ajax({
    type    : "post",
    data    : {token:token},
    url     : "<?php echo base_url('umkm/hapus_gambar') ?>",
    cache   : false,
    dataType: 'json',
    success : function(){
      console.log("Foto terhapus");
    },
    error: function(){
      console.log("Error");

    }
  });
});
</script>