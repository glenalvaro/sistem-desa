<div class="content-wrapper">
    <section class="content-header">
      <h1 class="tx-judul">
        Surat Masuk<small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Administrasi Umum</a></li>
        <li><a href="#"> Surat Masuk</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <a href="<?= site_url('buku_surat_masuk'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Surat Masuk</a>
        </div>
        <div class="box-body">
            <table class="table">
                <tr>
                  <td width="35%"><strong>Nama Program</strong></td>
				  <td> :  <?= strtoupper($nama_surat); ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>Tanggal Penerimaan</strong></td>
                  <td> : <?php echo $tgl_terima ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>Nomor Surat</strong></td>
                  <td> : <?php echo $no_surat ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>Tanggal Surat</strong></td>
                  <td> : <?php echo $tgl_surat ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>Perihal</strong></td>
                  <td> : <?php echo $perihal ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>Pengirim</strong></td>
                  <td> : <?php echo $pengirim_surat ?></td>
                </tr>
                 <tr>
                  <td width="35%"><strong>Disposisi Kepada</strong></td>
                  <td>
           				<?php foreach ($list_jab as $rw) : ?>
                    	 		<div class="col-sm-12 col-lg-6 checkbox">
                                	<label style="padding: 5px;">
                                    <input type="checkbox" class="akas required" value="<?= $rw['id']; ?>" <?=($disposisi_ke==$rw['id'])?'checked="checked"':''?> disabled><?= $rw['nama']; ?>
                                	</label>
                            	</div>
                        <?php endforeach;  ?>
                  </td>
                </tr>
                 <tr>
                  <td width="35%"><strong>Isi Disposisi</strong></td>
                  <td> : <?php echo $isi_disposisi ?></td>
                </tr>
                <tr>
                  <td width="35%"><strong>File Surat</strong></td>
                  <td> : <i class="fa fa-file-pdf-o"></i> <a href="<?= base_url(); ?>/folder_arsip/surat_masuk/<?= $file_surat_masuk; ?>" target="_blank" ><?php echo $file_surat_masuk ?></a>
                  </td>
                </tr>
              </table>
              <br>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


