<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Website</a></li>
        <li><a href="#"> Artikel</a></li>
      </ol>
    </section>

    <section class="content">
       <div class="row">
       <?= $this->load->view('artikel/menu'); ?>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">             
                <a href="<?= site_url('artikel/create'); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        <div class="box-body">
            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-9">
            <div style="padding-bottom: 10px;"></div>
            </div>
            <div class="col-md-3">
            <form action="<?php echo site_url('artikel/index'); ?>" class="form-inline" method="get">
                    <div class="input-group pull-right">
                        <input type="text" class="input-cari form-control" name="q" value="<?php echo $q; ?>" placeholder="Cari..." autocomplete="off">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('artikel'); ?>" class="btn btn-sm btn-default"><i class="fa fa-repeat"></i></a>
                                    <?php
                                }
                            ?>
                            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
        <div class="table-responsive">
        <table class="table table-hover table-bordered tabel-daftar" style="margin-bottom: 15px">
            <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
        		<th style="min-width:180px; text-align: center;">Aksi</th>
                <th style="min-width:100px; text-align: center;">Gambar</th>
        		<th style="min-width:100px;">Judul</th>
        		<th style="min-width:100px;">Tanggal Posting</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($artikel_data as $artikel) { ?>
            <tr>
    			<td width="10px"><?php echo ++$start ?></td>
    			<td style="text-align:center" width="180px">
                     <a href="<?=site_url('artikel/update/'.$artikel->id)?>" class="btn bg-orange btn-sm" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <?php if($artikel->aktif == '0') : ?>
                        <a href="<?=site_url('artikel/unlock/'.$artikel->id)?>" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                    <?php elseif($artikel->aktif == '1') : ?>
                        <a href="<?=site_url('artikel/lock/'.$artikel->id)?>" class="btn bg-navy btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                    <?php endif; ?>
                     <a href="<?=site_url('artikel/delete/'.$artikel->id)?>" class="btn bg-maroon btn-sm aksi-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                     <a href="<?= site_url('artikel/read/'.$artikel->id.'/'.slug_url($artikel->judul)); ?>" class="btn btn-success btn-sm" title="Lihat"><i class="fa fa-eye"></i></a>
    			</td>
                <td style="text-align:center">
                    <img style="width: 50px;" class="img-preview" src="<?= base_url('assets/img/foto_artikel/') . $artikel->gambar; ?>">
                </td>
    			<td>
                    <?= $artikel->judul; ?>
                </td>
    			<td><?= date('d F Y', $artikel->tgl_created); ?></td>
		   </tr>
            <?php } ?>
        </tbody>
        </table>
        </div>
        <div class="row">
           <div class="col-md-6">   
	       </div>
           <div class="col-md-6 text-right">
                <?php echo $pagination ?>
           </div>
        </div>
        </div>
        </div>
      </div>
    </div>
</section>
</div>