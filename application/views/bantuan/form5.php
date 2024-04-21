<div class="content-wrapper">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Form Program Bantuan</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Program <?php echo form_error('nama_program') ?></td><td><input type="text" class="form-control" name="nama_program" id="nama_program" placeholder="Nama Program" value="<?php echo $nama_program; ?>" /></td></tr>
	    <tr><td width='200'>Sasaran Program <?php echo form_error('sasaran_program') ?></td><td><input type="text" class="form-control" name="sasaran_program" id="sasaran_program" placeholder="Sasaran Program" value="<?php echo $sasaran_program; ?>" /></td></tr>
	    
        <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
	    <tr><td width='200'>Asal Dana <?php echo form_error('asal_dana') ?></td><td><input type="text" class="form-control" name="asal_dana" id="asal_dana" placeholder="Asal Dana" value="<?php echo $asal_dana; ?>" /></td></tr>
	    <tr><td width='200'>Waktu Program <?php echo form_error('waktu_program') ?></td><td><input type="text" class="form-control" name="waktu_program" id="waktu_program" placeholder="Waktu Program" value="<?php echo $waktu_program; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('program_bantuan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>