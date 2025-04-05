<div class="content-wrapper">
  <section class="content-header">
     <h1 class="tx-judul">
       Buat Surat Permohonan Mandiri
      </h1>
  <ol class="breadcrumb">
      <li><a href="#"> Permohonan</a></li>
      <li><a href="#"> Buat Surat</a></li>
      <li class="active"> Surat <?= $jenis_surat; ?></li>
  </ol>
</section>
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('permohonan'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Permohonan</a>
            </div>
            <form id="mainform" action="<?= base_url('permohonan/tinjau_surat'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                <?php $this->load->view('permohonan/isi_form/tgl_surat'); ?>
                <div class="form-group">
                    <label class="col-sm-3">BIODATA PEMOHON</label>
                </div>
                <hr>
                <?php $this->load->view('permohonan/isi_form/biodata_pemohon'); ?>
                <?php $this->load->view('permohonan/isi_form/ttd_surat'); ?>

                <!-- Load form Surat Sesuai Jenis Surat -->
                <?php if($url == 'surat_keterangan_usaha') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_batal_pindah') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_kematian') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_jamkesos') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_jual_beli') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_kepemilikan_tanah') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php elseif($url == 'surat_keterangan_penghasilan') : ?>
                  <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php endif; ?>

                <div class="form-group">
                    <label for="keperluan" class="col-sm-3">Keperluan</label>
                    <div class="col-sm-8">
                      <textarea name="keperluan" class="form-control input-sm required" placeholder="Masukkan Keperluan"></textarea>
                    </div>
                </div>

                <?php $this->load->view('permohonan/isi_form/dokumen_syarat'); ?>

                <div class="form-group">
                    <label class="col-sm-3">LAINNYA</label>
                </div>
                <hr>
                <?php if($url == 'surat_keterangan_berpegian') : ?>
                      <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php endif; ?>
              </div>
              <div class="box-footer">
                <center>
                  <a href="<?=site_url('permohonan')?>" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> &nbsp;&nbsp;Sebelumnya</a>
                  <button type="submit" class="btn btn-primary btn-sm">Selanjutnya &nbsp;<i class="fa fa-chevron-right"></i></button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
