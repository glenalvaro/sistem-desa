<div class="form-group">
        <label class="col-sm-3">DOKUMEN PERSYARATAN</label>
</div>   
            <div class="table-responsive">
               <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th style="width: 100px; text-align: center;">Aksi</th>
                  <th>Jenis Dokumen</th>
                </tr>
                 <?php 
                    //get dokumen id penduduk
                    $query = $this->db->query("SELECT * FROM dokumen_penduduk where id_penduduk=$id_pemohon");
                    $get_dok = $query->result();
                  ?>
                  
                <?php $no=1;
                    foreach ($syarat_dok as $data) 
                { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td align="center">
                    <?php foreach($get_dok as $main) : ?>
                        <?php if($data->nama_syarat == $main->nama) : ?>
                            <small> <a href="<?= base_url(); ?>folder_arsip/dokumen/<?= $main->file; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=600,width=600,resizable=0");return false;' rel='noopener noreferrer' target='_blank' class="btn btn-primary btn-sm">Lihat</a></small>
                       <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                  <td><?= $data->nama_syarat ?></td>
                </tr>
              <?php } ?>
              </table>
            </div>