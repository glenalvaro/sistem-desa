<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Pengaturan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Layanan Surat</a></li>
        <li><a href="#"> Pengaturan Surat</a></li>
      </ol>
    </section>

     <section class="content">
        <div class="row">
         <div class="col-xs-12">
            <div class="box box-info">
            <div class="box-header with-border">
                 <a href="<?php echo base_url('surat_master'); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Data Daftar Surat</a>
            </div>
         <div class="box-body">
        <form id="validasi" action="<?= base_url('surat_master/simpan_header/'.$isian_header['id'] ); ?>" method="post" autocomplete="off">
            <div class="box-body">
                    <div class="form-group">
                      <label for="header_surat"></label>
                       <input type="hidden" name="id" value="<?= $isian_header['id']; ?>">
                       <textarea id="isian_surat" name="header_surat"><?= $isian_header['header']; ?></textarea>
                    </div>
            </div>
            <div class="box-footer">
                <button type="button" id="preview-header" class="btn btn-social btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat Header</button>
                <button type="submit" class="btn btn-social btn-info btn-sm" style="float: right;"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>
    </section>
</div>


<script>
   $(function() {
            $('#preview-header').click(function(e) {
                e.preventDefault();
                const text = tinymce.get('isian_surat');
                text.save();
                const kop_head = text.getContent();

                Swal({
                    title: 'Sedang Memproses...',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    timer: 2000,
                    onOpen: () => {
                      swal.showLoading();
                    },
                    allowOutsideClick: () => false
                });

                $.ajax({
                    url: `<?= site_url('surat_master/tinjau_header') ?>`,
                    type: 'POST',
                    xhrFields: {
                        responseType: 'blob'
                    },
                    data: {
                      kop_head:kop_head,
                    },
                    success: function(response, status, xhr) {
                        // https://stackoverflow.com/questions/34586671/download-pdf-file-using-jquery-ajax
                        var filename = "";
                        var disposition = xhr.getResponseHeader('Content-Disposition');

                        if (disposition) {
                            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                            var matches = filenameRegex.exec(disposition);
                            if (matches !== null && matches[1]) filename = matches[1].replace(
                                /['"]/g, '');
                        }
                        try {
                            var blob = new Blob([response], {
                                type: 'application/pdf'
                            });
                            if (typeof window.navigator.msSaveBlob !== 'undefined') {
                                //   IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                                window.navigator.msSaveBlob(blob, filename);
                            } else {
                                var URL = window.URL || window.webkitURL;
                                var downloadUrl = URL.createObjectURL(blob);
                                Swal({
                                    customClass: 'swal-lg',
                                    title: 'Header',
                                    html: `
                                        <object data="${downloadUrl}#toolbar=0" style="width: 100%;min-height: 400px;" type="application/pdf"></object>
                                    `,
                                    showCancelButton: true,
                                    showConfirmButton: false,
                                    cancelButtonText: 'Tutup',
                                    allowOutsideClick: () => false
                                });
                            }
                        } catch (ex) {
                            alert(ex); // This is an error
                        }
                    }
                }).fail(function(response, status, xhr) {

                    Swal({
                        title: xhr.statusText,
                        icon: 'error',
                        text: response.statusText,
                    })
                })
            });

          });
</script>