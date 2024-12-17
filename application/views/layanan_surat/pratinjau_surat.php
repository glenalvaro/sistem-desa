<div class="content-wrapper">
  <section class="content-header">
    <h1 class="tx-judul">
       Pratinjau Surat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li class="active"> Surat <?= $nama_surat; ?></li>
        <li><a href="#"> Pratinjau</a></li>
    </ol> 
</section>

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <form id="mainform" action="<?= base_url('layanan_surat/proses_surat'); ?>" method="post" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="id_surat" value="<?= $id ?>">
                <input type="hidden" name="id_pend" value="<?= $id_pend; ?>">
                <input type="hidden" name="pamong" value="<?= $pamong; ?>">
                <input type="hidden" name="jabatan" value="<?= $jabatan_pamong; ?>">
                <input type="hidden" name="user" value="<?= $user['name']; ?>">
                <input type="hidden" name="no_surat" value="<?= $nomor_surat; ?>">
                <input type="hidden" name="url" value="<?= $url; ?>">
                <input type="hidden" name="nik_pend" value="<?= $nik; ?>">
                <input type="hidden" name="nama_surat" value="<?= $nama_surat; ?>">

                <textarea id="isian_surat" name="isian_surat"><?php $this->load->view('layanan_surat/isian_surat'); ?></textarea>
              </div>
              <div class="box-footer">
                <center>
                <a href="<?= site_url('layanan_surat'); ?>" class="btn btn-social btn-info btn-sm"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Cetak Surat</a>
                <button type="button" id="preview-pdf" class="btn btn-social btn-vk btn-success btn-sm"><i class="fa fa-eye"></i>Tinjau PDF</button>
                <button type="submit" class="btn btn-social btn-success btn-sm"><i class="fa fa-check"></i> Simpan Surat</button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

  <?php $this->load->view('layanan_surat/form/tombol_pdf'); ?>