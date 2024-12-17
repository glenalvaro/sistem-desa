<div class="content-wrapper">
  <?php $this->load->view('layanan_surat/form/breadcumb'); ?>
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="<?= site_url('layanan_surat'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Cetak Surat</a>
            </div>
            <form id="mainform" action="<?= base_url('layanan_surat/pratinjau_surat/'); ?><?= $id; ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                <?php $this->load->view('layanan_surat/form/nomor_surat'); ?>
                <div class="form-group">
                    <label class="col-sm-3">KETERANGAN PEMOHON</label>
                </div>
                <hr>
                <?php $this->load->view('layanan_surat/form/cari_nik'); ?>
                <?php $this->load->view('layanan_surat/form/ttd_pamong'); ?>

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

                <div class="form-group">
                    <label class="col-sm-3">LAINNYA</label>
                </div>
                <hr>
                <?php if($url == 'surat_keterangan_berpegian') : ?>
                      <?php $this->load->view("template-surat/{$url}/form"); ?>
                <?php endif; ?>
              </div>
              <div class="box-footer">
                 <button type="reset" class="btn btn-social btn-danger btn-sm"  style="float: left;"><i class="fa fa-times"></i> Batal</button>
                 <button type="submit" class="btn btn-social btn-info btn-sm"  style="float: right;"><i class="fa fa-check"></i> Lanjut</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
<?php $this->load->view('layanan_surat/form/ajax_nik'); ?>
