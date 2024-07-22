<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA UMKM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td width='200'>No Tlp <?php echo form_error('no_tlp') ?></td><td><input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="No Tlp" value="<?php echo $no_tlp; ?>" /></td></tr>
	    <tr><td width='200'>Nama Usaha <?php echo form_error('nama_usaha') ?></td><td><input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" value="<?php echo $nama_usaha; ?>" /></td></tr>
	    <tr><td width='200'>Id Kategori <?php echo form_error('id_kategori') ?></td><td><input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /></td></tr>
	    
        <tr><td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td><td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td></tr>
	    <tr><td width='200'>Latitude <?php echo form_error('latitude') ?></td><td><input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" /></td></tr>
	    <tr><td width='200'>Longitude <?php echo form_error('longitude') ?></td><td><input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Posting <?php echo form_error('tgl_posting') ?></td><td><input type="text" class="form-control" name="tgl_posting" id="tgl_posting" placeholder="Tgl Posting" value="<?php echo $tgl_posting; ?>" /></td></tr>
	    <tr><td width='200'>Gambar <?php echo form_error('gambar') ?></td><td><input type="text" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('umkm') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>