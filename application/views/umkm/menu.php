      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= site_url('umkm') ?>">
           <div class="info-box bg-aqua">
            <span class="info-box-icon"><ion-icon name="cart-outline"></ion-icon></span>
            <div class="info-box-content">
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
           <div class="info-box bg-yellow">
            <span class="info-box-icon"><ion-icon name="options-outline"></span>
            <div class="info-box-content">
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
            <span class="info-box-icon bg-red"><ion-icon name="navigate-circle-outline"></span>
            <div class="info-box-content">
              <br>
              <h4 style="font-family: rubik, sans-serif; color: black;">PETA</h4>
            </div>
          </div>
          </a>
        </div>