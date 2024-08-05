<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
       Perangkat
       <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Administrasi Umum</a></li>
        <li><a href="#"> Perangkat</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

  <section class="content">
    <div class="box box-primary">
       <form class="form-horizontal" action="<?php echo $action; ?>" method="GET">
        <div class="box-header with-border">
             <a href="<?= site_url('perangkat_desa'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Perangkat</a>
        </div>
        <div class="box-body">
            <div class="form-group">
               <label class="col-sm-2">Data Staff</label>
                <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label active">
                        <input id="group1" type="radio" name="staf_data"  class="form-check-input" value="1" checked="" autocomplete="off"> Dari Database Penduduk
                    </label>
                    <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label ">
                        <input id="group2" type="radio" name="staf_data"  class="form-check-input2" value="2" autocomplete="off"> Tidak Terdata
                    </label>
                </div>
            </div>

         <div class="form-group pilih_penduduk">
             <label class="col-sm-2">NIK / Nama Penduduk</label>
                <div class="col-sm-6">
                <select name="id_peg" id="kelompok_penduduk" class="form-control" style="width: 100%;" onchange="this.form.submit()">
                    <option value="">NIK : <?= $nik; ?> - <?= $nama_penduduk; ?> -</option>
                      <?php foreach($get_penduduk as $main) : ?>
                        <option value="<?= $main->id; ?>">NIK : <?= $main->nik; ?> - <?= strtoupper($main->nama_penduduk); ?> - <?= strtoupper($main->dusun); ?></option>
                      <?php endforeach; ?>
                </select>
              </div>
          </div>
        </div>
    </form>
    </div>

    <form class="validation-form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"autocomplete="off" data-parsley-validate="" novalidate>
  	<div class="row">
  		<div class="col-md-3">
  			<div class="box box-primary">
  			<div class="box-body">
              <center>
                <img class="profile-user-img img-penduduk img-preview" id="foto" src="<?= AmbilFoto($foto, '', $jenis_kelamin); ?>" alt="Foto Penduduk">
              </center>  
              <br>
              <center>
              <div class="col-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" oninput="myFunction()" id="image" name="image" onchange="previewGmb()" value="<?= $foto; ?>">
                    <label class="custom-file-label" for="image"></label>
                </div>
              </div>
              </center>    
            </div> 
            <br> 
           	</div>
  		</div>

  		<div class="col-md-9">
  			<div class="box box-primary">
            <div class="box-body" style="margin-left: -10px; margin-right: -10px;">

            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="col-sm-7">
                <div class="form-group">
                    <label>Nama Pegawai Desa</label> 
                    <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control input-sm form_perangkat" value="<?= $nama_penduduk; ?>" placeholder="Nama Pegawai Desa" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required readonly>
                </div>
            </div>

             <div class="col-sm-3">
                <div class="form-group">
                    <label>Gelar</label> 
                    <input type="text" name="gelar" id="gelar" class="form-control input-sm" value="<?= $gelar; ?>" placeholder="Gelar" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="form-group">
                    <label id="form-label-nik">Nomor Induk Kependudukan</label>&nbsp;
                    <input type="text" name="nik_pegawai" id="nik_pegawai" class="form-control input-sm form_perangkat" value="<?= $nik; ?>" placeholder="Nomor Induk Kependudukan" data-parsley-minlength="16" data-parsley-maxlength="16" data-parsley-minlength-message="NIK harus bilangan 16 digit" data-parsley-maxlength-message="NIK harus bilangan 16 digit" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required readonly>
                  </div>
              </div>

            <div class="col-sm-10">
                  <div class="form-group">
                    <label id="form-label-kk">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control input-sm" value="<?= $nip; ?>" placeholder="NIP" required>
                    <small><span id="check-kk" class="help-block"></span></small>
                    <small><span id="check-kk" class="help-block">Jika belum memiliki nip isi dengan ' - '</span></small>
                </div>
            </div>
								
             <div class="col-sm-10">
                 <div class="form-group">
                  <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control input-sm form_perangkat" value="<?= $tempat_lahir; ?>" placeholder="Tempat Lahir" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required readonly>
              </div>    
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control input-sm form_perangkat" value="<?= $tgl_lahir; ?>" placeholder="Tanggal Lahir" data-parsley-required-message="Kolom ini diperlukan." required readonly>
               
                </div>
            </div>

           <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="sex">Jenis Kelamin </label>
                    <select class="form-control select-filter2 form_perangkat" name="jenis_kelamin" onchange="ubah_sex($(this).find(':selected').val());" data-parsley-required-message="Kolom ini diperlukan." required readonly>
                        <option value="">Jenis Kelamin</option>
                        <option value="1" <?=($jenis_kelamin=='1')?'selected="selected"':''?>>Laki-Laki</option>
                        <option value="2" <?=($jenis_kelamin=='2')?'selected="selected"':''?>>Perempuan</option>
                    </select>
                
                </div>
            </div>

             <div class="col-sm-10">
                <div class="form-group">
                  <label>Pendidikan Dalam KK</label>
                   <select name="pendidikan" class="form-control select-filter2 form_perangkat" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required readonly>
                        <option disabled selected value="">-- Pilih Pendidikan --</option> 
                        <option value="TIDAK / BELUM SEKOLAH" <?=($pendidikan=='TIDAK / BELUM SEKOLAH')?'selected="selected"':''?>>TIDAK / BELUM SEKOLAH</option>
                        <option value="BELUM TAMAT SD/SEDERAJAT" <?=($pendidikan=='BELUM TAMAT SD/SEDERAJAT')?'selected="selected"':''?>>BELUM TAMAT SD/SEDERAJAT</option>
                        <option value="TAMAT SD / SEDERAJAT" <?=($pendidikan=='TAMAT SD / SEDERAJAT')?'selected="selected"':''?>>TAMAT SD / SEDERAJAT</option>
                        <option value="SLTP/SEDERAJAT" <?=($pendidikan=='SLTP/SEDERAJAT')?'selected="selected"':''?>>SLTP/SEDERAJAT</option>
                        <option value="SLTA / SEDERAJAT" <?=($pendidikan=='SLTA / SEDERAJAT')?'selected="selected"':''?>>SLTA / SEDERAJAT</option>
                        <option value="DIPLOMA I/II" <?=($pendidikan=='DIPLOMA I/II')?'selected="selected"':''?>>DIPLOMA I/II</option>
                        <option value="AKADEMI/ DIPLOMA III/S. MUDA" <?=($pendidikan=='AKADEMI/ DIPLOMA III/S. MUDA')?'selected="selected"':''?>>AKADEMI/ DIPLOMA III/S. MUDA</option>
                        <option value="DIPLOMA IV/ STRATA I" <?=($pendidikan=='DIPLOMA IV/ STRATA I')?'selected="selected"':''?>>DIPLOMA IV/ STRATA I</option>
                        <option value="STRATA II" <?=($pendidikan=='STRATA II')?'selected="selected"':''?>>STRATA II</option>
                        <option value="STRATA III" <?=($pendidikan=='STRATA III')?'selected="selected"':''?>>STRATA III</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="form-group">
                  <label>Agama</label>
                    <select name="agama" class="form-control select-filter2 form_perangkat" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required readonly>
                        <option disabled selected value="">-- Pilih Agama --</option>
                        <option value="ISLAM" <?=($agama=='ISLAM')?'selected="selected"':''?>>ISLAM</option>
                        <option value="KRISTEN" <?=($agama=='KRISTEN')?'selected="selected"':''?>>KRISTEN</option>
                        <option value="KATHOLIK" <?=($agama=='KATHOLIK')?'selected="selected"':''?>>KATHOLIK</option>
                        <option value="HINDU" <?=($agama=='HINDU')?'selected="selected"':''?>>HINDU</option>
                        <option value="BUDHA" <?=($agama=='BUDHA')?'selected="selected"':''?>>BUDHA</option>
                        <option value="KHONGHUCU" <?=($agama=='KHONGHUCU')?'selected="selected"':''?>>KHONGHUCU</option>
                        <option value="Kepercayaan Terhadap Tuhan YME / Lainnya" <?=($agama=='Kepercayaan Terhadap Tuhan YME / Lainnya')?'selected="selected"':''?>>Kepercayaan Terhadap Tuhan YME / Lainnya</option>
                    </select>
                 
              </div>    
            </div>

             <div class="col-sm-7">
                <div class="form-group">
                  <label>Jabatan</label>
                    <select name="jabatan_pegawai" class="form-control select-filter" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                    <option value="">Pilih Jabatan</option> 
                        <?php foreach($jab_perangkat as $row) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  
                </div>
            </div>

             <div class="col-sm-3">
                 <div class="form-group">
                  <label>Pangkat/Golongan</label>
                    <input type="text" name="pangkat_golongan" class="form-control input-sm" value="<?= $pangkat_golongan; ?>" placeholder="Pangkat/Golongan" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                 
              </div>    
            </div>

            <div class="form-group">
              <label class="col-xs-12 col-sm-3 col-lg-3 control-label" for="status">Status Pegawai Desa</label>
                 <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label active">
                        <input type="radio" name="status" class="form-check-input" value="1" checked="" autocomplete="off"> Aktif
                    </label>
                    <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label ">
                        <input type="radio" name="status" class="form-check-input" value="2" autocomplete="off"> Tidak Aktif
                    </label>
                </div>
            </div>

	
           </div>
             <div class="box-footer">
                    <button type="submit" id="btnsimpan" name="btnsimpan" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
  		</div>
  	  </div>
  	</div>
  </form>
 </section>
</div>
</div>


<script type="text/javascript">

function ubah_sex(sex) {
    var old_foto = $('#image').val();

    if (old_foto == '') {
            $('#foto').attr("src", AmbilFoto(old_foto, 'kecil_', sex));
        }
};

//jika ada foto penduduk yang diupload tampilkan
function AmbilFoto(foto, ukuran = "kecil_", sex) {
        //Jika penduduk ada foto, maka pakai foto tersebut
        //Jika tidak, pakai foto default
        if (foto) {
            ukuran_foto = ukuran || null
            file_foto = '<?= LOKASI_USER_PICT ?>' + ukuran_foto + foto;
        } else {
            file_foto = sex == '2' ? '<?= FOTO_DEFAULT_WANITA ?>' : '<?= FOTO_DEFAULT_PRIA ?>';
        }

    return base_url + file_foto;
};
</script>