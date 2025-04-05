      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('permohonan') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-navicon"></i></span>
            <div class="info-box-content" style="color: black;">
               <?php 
                $queryPem = $this->db->query('SELECT * FROM permohonan_surat WHERE id_status=1');
                $count_pem = $queryPem->num_rows();
               ?>
              <span class="info-box-text">Permohonan Surat</span>
              <span class="info-box-number"><?= $count_pem; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: <?= $count_pem; ?>%;"></div>
              </div>
              <span class="progress-description">
                    <?= $count_pem; ?> Data
                  </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('permohonan/daftar_diterima') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-ios-checkmark-outline"></i></span>
            <div class="info-box-content" style="color: black;">
               <?php 
                $queryTerima = $this->db->query('SELECT * FROM permohonan_surat WHERE id_status!=1 AND id_status !=3');
                $count_terima = $queryTerima->num_rows();
               ?>
              <span class="info-box-text">Permohonan Surat Diterima</span>
              <span class="info-box-number"><?= $count_terima; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: <?= $count_terima; ?>%;"></div>
              </div>
              <span class="progress-description">
                    <?= $count_terima; ?> Surat
                  </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('permohonan/daftar_ditolak') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-ios-close-outline"></i></span>
            <div class="info-box-content" style="color: black;">
              <?php 
                $querytolak = $this->db->query('SELECT * FROM log_surat WHERE id_status=3');
                $count_tolak = $querytolak->num_rows();
               ?>
              <span class="info-box-text">Permohonan Surat Ditolak</span>
              <span class="info-box-number"><?= $count_tolak; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: <?= $count_tolak; ?>%;"></div>
              </div>
              <span class="progress-description">
                    <?= $count_tolak; ?> Surat
                  </span>
            </div>
          </div>
          </a>
        </div>