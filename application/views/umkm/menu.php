      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('umkm') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-ios-cart-outline"></i></span>
            <div class="info-box-content" style="color: black;">
               <?php 
                $queryProduk = $this->db->query('SELECT * FROM umkm');
                $count = $queryProduk->num_rows();
               ?>
              <span class="info-box-text">UMKM</span>
              <span class="info-box-number"><?= $count; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: <?= $count; ?>%;"></div>
              </div>
              <span class="progress-description">
                    <?= $count; ?> Data
                  </span>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('umkm/kategori') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-ios-settings"></i></span>
            <div class="info-box-content" style="color: black;">
              <?php 
                $querykat = $this->db->query('SELECT * FROM kategori_umkm');
                $count_kat = $querykat->num_rows();
               ?>
              <span class="info-box-text">Kategori</span>
              <span class="info-box-number"><?= $count_kat; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: <?= $count_kat; ?>%;"></div>
              </div>
              <span class="progress-description">
                    <?= $count_kat; ?> Kategori
                  </span>
            </div>
          </div>
          </a>
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('umkm/peta_umkm') ?>">
           <div class="info-box">
            <span class="info-box-icon"><i class="ion-ios-location-outline"></i></span>
            <div class="info-box-content">
              <br>
              <h4 style="font-family: rubik, sans-serif; color: black;">PETA</h4>
            </div>
          </div>
          </a>
        </div>