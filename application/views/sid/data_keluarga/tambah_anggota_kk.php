<div class="content-wrapper">
     <section class="content-header">
     <h1 class="tx-judul">
      Anggota Keluarga
       <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data keluarga</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

  <section class="content">
  	<form class="validation-form" action="<?= site_url("data_keluarga/form_peristiwa/{$id}/{$no_kk}"); ?>" method="post" enctype="multipart/form-data" onreset=""autocomplete="off" data-parsley-validate="" novalidate>
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
                    <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()" value="<?= $foto; ?>">
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
  				<div class="box-header with-border">
             	 	<a href="<?= site_url('data_keluarga'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Keluarga</a>

                    <a href="<?= site_url("data_keluarga/anggota_keluarga/{$id}/{$no_kk}"); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Anggota keluarga</a>
           </div>
            <div class="box-body" style="margin-left: -10px; margin-right: -10px;">

            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="status_dasar_id" class="form-control" value="1">
            <input type="hidden" name="created_by" class="form-control" value="<?= $user['name']; ?>">
            <input type="hidden" name="no_kk" class="form-control" value="<?= $no_kk; ?>">
            <input type="hidden" name="dusun_id" class="form-control" value="<?= $dusun_id; ?>">

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA KELUARGA :</strong></label>
                </div>
            </div>

            <div class="col-sm-6">
                  <div class="form-group">
                    <label id="form-label-kk">Nomor KK</label>
                    <input type="text" class="form-control input-sm" value="<?= $no_kk; ?>" readonly>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kepala keluarga</label> 
                    <input type="text" class="form-control input-sm" value="<?= $kepala_keluarga; ?>" readonly> 
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Alamat / Wilayah</label> 
                    <input type="text" class="form-control input-sm" value="<?= $dusun; ?>" readonly>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA DIRI :</strong></label>
                </div>
            </div>
            
            <div class="col-sm-4">
				<div class="form-group">
					<label>Tanggal Daftar </label>
						<div class="input-group input-group-sm">
                		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                		  <input type="text" name="tgl_terdaftar" class="form-control input-sm pull-right datepicker" value="<?= date('Y-m-d') ?>">
              			</div>
				</div>
			</div>

            <div class="col-sm-8">
                <div class="form-group">
                    <label id="form-label-nik">Nomor NIK</label>&nbsp;
                    <input type="text" name="nik" id="nik" class="form-control input-sm" value="<?= $nik; ?>" placeholder="Nomor NIK" data-parsley-minlength="16" data-parsley-maxlength="16" data-parsley-minlength-message="NIK harus bilangan 16 digit" data-parsley-maxlength-message="NIK harus bilangan 16 digit" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." onInput="checkNIK()" required>
                     <small><span id="check-nik" class="help-block"></span></small>
                  </div>
              </div>
								
            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA DIRI :</strong></label>
                </div>
            </div>
              
            
             <div class="col-sm-8">
                <div class="form-group">
                    <label>Nama Lengkap</label> 
                    <code>(Tanpa Gelar)</code>
                    <input type="text" name="nama_penduduk" id="nama_penduduk" class="form-control input-sm" value="<?= $nama_penduduk; ?>" placeholder="Nama Lengkap" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                     <span class="help-block"> <?php echo form_error('nama_penduduk') ?></span>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="sex">Jenis Kelamin </label>
                    <select class="form-control select-filter2" name="jenis_kelamin" onchange="ubah_sex($(this).find(':selected').val());" data-parsley-required-message="Kolom ini diperlukan." required>
                        <option value="">Jenis Kelamin</option>
                        <option value="1" <?=($jenis_kelamin=='1')?'selected="selected"':''?>>Laki-Laki</option>
                        <option value="2" <?=($jenis_kelamin=='2')?'selected="selected"':''?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hubungan Dalam Keluarga</label>
                     <select name="hubungan_keluarga_id" class="select-filter2 form-control" style="width: 100%;"data-parsley-required-message="Kolom ini diperlukan." required>
                        <option value="<?= $hubungan_keluarga_id; ?>">Pilih Hubungan Keluarga</option> 
                        <?php foreach($hubungan_penduduk as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($hubungan_keluarga_id==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                     <span class="help-block"> <?php echo form_error('hubungan_keluarga_id') ?></span>
              </div>    
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Agama</label>
                    <select name="agama_id" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                        <option value="">Pilih Agama</option>
                        <?php foreach($penduduk_agama as $data) : ?>
                           <option value="<?= $data['id']; ?>" <?=($agama_id==$data['id'])?'selected="selected"':''?>><?= $data['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="help-block"> <?php echo form_error('agama_id') ?></span>
              </div>    
            </div>
            
            <div class="col-sm-4">
                 <div class="form-group">
                  <label>Status Penduduk</label>
                   <select name="status_penduduk_id" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                        <option value="<?= $status_penduduk_id; ?>">Pilih Status Penduduk</option> 
                        <?php foreach($penduduk_status as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($status_penduduk_id==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="help-block"> <?php echo form_error('status_penduduk_id') ?></span>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
                </div>
            </div>

            <div class="col-sm-12">
                 <div class="form-group">
                  <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control input-sm" value="<?= $tempat_lahir; ?>" placeholder="Tempat Lahir" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                    <span class="help-block"> <?php echo form_error('tempat_lahir') ?></span>
              </div>    
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control input-sm" value="<?= $tgl_lahir; ?>" placeholder="Tanggal Lahir" data-parsley-required-message="Kolom ini diperlukan." required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                  <label>Anak Ke</label>
                  <code>(Isi dengan Angka)</code>
                  <input type="number" name="kelahiran_anak_ke" class="form-control input-sm" value="<?= $kelahiran_anak_ke; ?>" placeholder="Anak Ke-">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>PENDIDIKAN DAN PEKERJAAN :</strong></label>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Pendidikan Dalam KK</label>
                   <select name="pendikan_kk_id" class="form-control select-filter2" style="width: 100%;">
                        <option value="<?= $pendikan_kk_id; ?>">Pilih Pendidikan (Dalam KK)</option> 
                        <?php foreach($pendidikan_kk as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($pendikan_kk_id==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Pendidikan Sedang Ditempuh</label>
                  <select name="pendidikan_sedang_id" class="form-control select-filter2" style="width: 100%;">
                    <option value="<?= $pendidikan_sedang_id; ?>">Pilih Pendidikan</option> 
                        <?php foreach($pendidikan_sedang as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($pendidikan_sedang_id==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Pekerjaan</label>
                    <select name="pekerjaan_id" class="form-control select-filter2" style="width: 100%;">
                    <option value="<?= $pekerjaan_id; ?>">Pilih Pekerjaan</option> 
                        <?php foreach($pekerjaan_penduduk as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($pekerjaan_id==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA KEWARGANEGARAAN :</strong></label>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                  <label>Suku/Etnis</label>
                  <code>(Opsional)</code>
                   <select name="suku" class="form-control select-filter" style="width: 100%;">
                    <option value="<?= $suku; ?>">Pilih Suku</option> 
                        <?php foreach($penduduk_suku as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($suku==$row['id'])?'selected="selected"':''?>><?= $row['suku']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
               <div class="form-group">
                  <label>Status Warganegara</label>
                   <select name="status_warganegara" id="status_warganegara" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                      <option value="WNI" <?=($status_warganegara=='WNI')?'selected="selected"':''?>>WNI</option>
                      <option value="WNA" <?=($status_warganegara=='WNA')?'selected="selected"':''?>>WNA</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Dokumen Paspor</label>
                  <span class="alert-icon">
                      <img src="<?= base_url('assets/img/icon/alert-circle-outline.svg') ?>" data-toggle="modal" data-target="#info-dokumen-paspor">
                  </span>
                  <input type="text" name="dokumen_paspor" class="form-control input-sm" value="<?= $dokumen_paspor ?>" placeholder="Nomor Paspor">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Tgl Berakhir Paspor</label>
                  <code>(Opsional)</code>
                  <input type="date" name="tgl_paspor" class="form-control input-sm" value="<?= $tgl_paspor ?>" placeholder="Tgl Paspor">
                </div>
            </div>

            <div class="col-sm-4 form-status-warganegara" hidden>
                <div class="form-group">
                  <label>Dokumen KITAS/KITAP</label>
                  <input type="text" name="dokumen_kitas" class="form-control input-sm" value="<?= $dokumen_kitas ?>" placeholder="Nomor KITAS/KITAP">
                </div>
            </div>

            <div class="col-sm-4 form-status-warganegara" hidden>
                <div class="form-group">
                  <label>Negara Asal</label>
                  <input type="text" name="negara_asal" class="form-control input-sm" value="<?= $negara_asal ?>" placeholder="Negara Asal">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA ORANG TUA   :</strong></label>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>NIK Ayah</label>
                  <input type="text" name="nik_ayah" class="form-control input-sm" value="<?= $nik_ayah; ?>" placeholder="NIK Ayah">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="form-group">
                  <label>Nama Ayah</label>
                  <input type="text" name="nama_ayah" class="form-control input-sm" value="<?= $nama_ayah; ?>" placeholder="Nama Ayah" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                  <span class="help-block"> <?php echo form_error('nama_ayah') ?></span>
                </div>
            </div>

             <div class="col-sm-4">
                <div class="form-group">
                  <label>NIK Ibu</label>
                  <input type="text" name="nik_ibu" class="form-control input-sm" value="<?= $nik_ibu; ?>" placeholder="NIK Ibu">
                </div>
            </div>

            <div class="col-sm-8">
               <div class="form-group">
                  <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control input-sm" value="<?= $nama_ibu; ?>" placeholder="Nama Ibu" data-parsley-trigger="keyup" data-parsley-validation-threshold="1" data-parsley-required-message="Kolom ini diperlukan." required>
                    <span class="help-block"> <?php echo form_error('nama_ibu') ?></span>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>ALAMAT  :</strong></label>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                  <label>Alamat Sebelumnya</label>
                  <input type="text" name="alamat_sebelumnya" class="form-control input-sm" value="<?= $alamat_sebelumnya; ?>" placeholder="Alamat Sebelumnya">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                  <label>Alamat Sekarang</label>
                  <input type="text" name="alamat_sekarang" class="form-control input-sm" value="<?= $alamat_sekarang; ?>" placeholder="Alamat Sekarang">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" name="no_telepon" class="form-control input-sm" value="<?= $no_telepon; ?>" placeholder="Nomor Telepon">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Alamat E-mail</label>
                  <input type="text" name="email" class="form-control input-sm" value="<?= $email; ?>" placeholder="Email">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA PERKAWINAN  :</strong></label>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select name="status_kawin" class="form-control select-filter2" style="width: 100%;">
                    <option value="<?= $status_kawin; ?>">Pilih Status Perkawinan</option> 
                            <option value="BELUM KAWIN">BELUM KAWIN</option>
                            <option value="KAWIN">KAWIN</option>
                            <option value="CERAI HIDUP">CERAI HIDUP</option>
                            <option value="CERAI MATI">CERAI MATI</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>DATA KESEHATAN  :</strong></label>
                </div>
            </div>

             <div class="col-sm-12">
                <div class="form-group">
                  <label>Golongan Darah</label>
                  <select name="golongan_darah" class="form-control select-filter2" style="width: 100%;" data-parsley-required-message="Kolom ini diperlukan." required>
                    <option value="<?= $golongan_darah; ?>">Pilih Golongan Darah</option> 
                        <?php foreach($golongan_darah_penduduk as $row) : ?>
                            <option value="<?= $row['id']; ?>" <?=($golongan_darah==$row['id'])?'selected="selected"':''?>><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                      <span class="help-block"> <?php echo form_error('golongan_darah') ?></span>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                  <label>Nomor BPJS Ketenagakerjaan</label>
                  <input type="text" name="bpjs_ketenagakerjaan" class="form-control input-sm" value="<?= $bpjs_ketenagakerjaan; ?>" placeholder="Nomor BPJS Ketenagakerjaan">
                </div>
            </div>

             <div class="col-sm-6">
                <div class="form-group">
                  <label>Asuransi Kesehatan</label>
                  <select name="asuransi_kesehatan" id="asuransi_kesehatan" class="form-control select-filter2" style="width: 100%;">
                    <option value="<?= $asuransi_kesehatan; ?>" disabled>Pilih Asuransi Kesehatan</option> 
                            <option value="TIDAK/BELUM PUNYA">TIDAK/BELUM PUNYA</option>
                            <option value="BPJS PENERIMA BANTUAN IURAN">BPJS PENERIMA BANTUAN IURAN</option>
                            <option value="BPJS NON PENERIMA BANTUAN IURAN">BPJS NON PENERIMA BANTUAN IURAN</option>
                            <option value="BPJS BANTUAN DAERAH">BPJS BANTUAN DAERAH</option>
                    </select>
                </div>
            </div>

             <div class="col-sm-6">
                <div class="form-group">
                  <label>Nomor Asuransi</label>
                  <input type="text" name="no_asuransi" id="no_asuransi" class="form-control input-sm" value="<?= $no_asuransi; ?>" placeholder="Nomor Asuransi" disabled>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group subtitle_head">
                    <label class="text-right"><strong>LAINNYA  :</strong></label>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea id="ket" name="keterangan" class="form-control input-sm" rows="3" placeholder="Keterangan"><?= $keterangan; ?></textarea>
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

<div class="modal fade" id="info-dokumen-paspor">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info</h4>
              </div>
              <div class="modal-body">
                <img class="show-info-paspor img-responsive" src="<?= base_url('assets/img/icon/paspor.jpg') ?>">
              </div>
              <div class="modal-deskripsi">
                  <p>Nomor Paspor terletak pada sisi kanan atas.</p>
              </div>
         </div>
    </div>
</div>

<script type="text/javascript">

function checkNIK() {

  jQuery.ajax({
  url: "<?= base_url('data_penduduk/cek_nik'); ?>",
  data:'nik='+$("#nik").val(),
  type: "POST",
  success:function(data){
    $("#check-nik").html(data);
  },
  error:function (){}
  });
}


function ubah_sex(sex) {
    var old_foto = $('#image').val();

    if (old_foto == '') {
            $('#foto').attr("src", AmbilFoto(old_foto, 'kecil_', sex));
        }
};

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