<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Form Program Bantuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Menu</a></li>
        <li><a href="#"> Bantuan</a></li>
        <li><a href="#"> Form</a></li>
      </ol>
    </section>


 <section class="content">
 <form id="mainform" action="<?php echo $action; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                <a href="<?= site_url('program_bantuan'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Program Bantuan</a>
                </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="sasaran_program" class="col-sm-4">Sasaran Program</label>
                    <div class="col-sm-3">
                      <select id="sasaran_program" name="sasaran_program" class="select-filter2 form-control required"> 
                            <option value="">Pilih Sasaran Program</option>
                            <option value="1">Penduduk Perorangan</option>
                            <option value="2">Keluarga/KK</option>
                            <option value="3">Kelompok/Organisasi</option>
                      </select>
                      <?php echo form_error('sasaran_program') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_program" class="col-sm-4">Nama Program</label>
                    <div class="col-sm-6">
                        <input type="text" id="nama_program" name="nama_program" class="form-control input-sm required" placeholder="Nama Program" maxlenght="50">
                        <?php echo form_error('nama_program') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="col-sm-4">Keterangan</label>
                    <div class="col-sm-6">
                        <textarea id="keterangan" name="keterangan" class="form-control input-sm required" placeholder="Isi Keterangan" rows="8"></textarea>
                        <?php echo form_error('keterangan') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="asal_dana" class="col-sm-4">Asal Dana</label>
                    <div class="col-sm-3">
                      <select id="asal_dana" name="asal_dana" class="select-filter2 form-control required"> 
                            <option value="">Asal Dana</option>
                            <option value="Pusat">Pusat</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kab/Kota">Kab/Kota</option>
                            <option value="Lain-Lain(Hibah)">Lain-Lain(Hibah)</option>
                      </select>
                      <?php echo form_error('asal_dana') ?>
                    </div>
                </div>
                <div class="form-group">
						<label class="col-sm-4" for="waktu_program">Rentang Waktu Program</label>
						<div class="col-sm-3">
							<div class="input-group input-group-sm date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right" id="tgl_1" name="sdate" placeholder="Tgl. Mulai" type="text">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="input-group input-group-sm date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right" id="tgl_2" name="edate" placeholder="Tgl. Akhir" type="text">
							</div>
						</div>
					</div>
                    <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-social btn-flat btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
</div>