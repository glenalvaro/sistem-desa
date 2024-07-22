<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
       Buku Administrasi Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Buku Administrasi Desa</a></li>
        <li class="active"><a href="#"> Rekapitulasi Jumlah Penduduk</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
      <?php $this->load->view('buku_desa/bumindes_penduduk'); ?>
        <div class="col-md-9">
          <div class="box box-info">
            <div class="box-header with-border">
               <a target="_blank" href="" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-print"></i> Cetak</a>

               <a href="" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-download"></i> Unduh</a>

               <a href="" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-repeat"></i> Bersihkan</a>
            </div>
            <div class="box-body" style="margin-bottom:100px !important;">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                  <thead class="bg-gray color-palette">
                      <tr>
                          <th rowspan="4" nowrap>NOMOR URUT</th>
                          <th rowspan="4" nowrap>NAMA DUSUN / LINGKUNGAN</th>
                          <th colspan="7" nowrap>JUMLAH PENDUDUK</th>
                      </tr>
                      <tr>
                          <th colspan="2" nowrap>WNA</th>
                          <th colspan="2" nowrap>WNI</th>
                          <th rowspan="3" nowrap>JML KK</th>
                          <th rowspan="3" nowrap>JML ANGGOTA KELUARGA</th>
                          <th rowspan="3" nowrap>JML JIWA (7+8)</th>
                      </tr>
                      <tr>
                          <th rowspan="2" nowrap>L</th>
                          <th rowspan="2" nowrap>P</th>
                          <th rowspan="2" nowrap>L</th>
                          <th rowspan="2" nowrap>P</th>
                       </tr>
                      <tr></tr>
                      <tr class="border thick">
                         <th rowspan="2" nowrap="">1</th>
                         <th>2</th>
                         <th>3</th>
                         <th>4</th>
                         <th>5</th>
                         <th>6</th>
                         <th>7</th>
                         <th>8</th>
                         <th>9</th>
                      </tr>
                    </thead>
                <tbody style="font-size: 10px;">
                  <?php $no=1;
                  foreach ($get_wilayah as $val) : ?>
               <tr>
                  <td class="padat"><?= $no++; ?></td>
                  <td class="padat"><?= $val->nama_dusun; ?></td>
                  <td class="padat">
                     <?php 
                      //hitung WNA PRIA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNA' AND jenis_kelamin =1 AND dusun_id = $val->id");
                        $count_WNA_P = $query->num_rows();
                    ?>
                    <?= $count_WNA_P; ?>
                  </td>
                  <td class="padat">
                    <?php 
                      //hitung WNA WANITA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNA' AND jenis_kelamin =2 AND dusun_id = $val->id");
                        $count_WNA_W = $query->num_rows();
                    ?>
                    <?= $count_WNA_W; ?>
                  </td>
                   <td class="padat">
                     <?php 
                      //hitung WNI PRIA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNI' AND jenis_kelamin =1 AND dusun_id = $val->id");
                        $count_WNI_P = $query->num_rows();
                    ?>
                    <?= $count_WNI_P; ?>
                  </td>
                  <td class="padat">
                    <?php 
                      //hitung WNI WANITA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNI' AND jenis_kelamin =2 AND dusun_id = $val->id");
                        $count_WNI_W = $query->num_rows();
                    ?>
                    <?= $count_WNI_W; ?>
                  </td>
                   <td class="padat">
                    <?php 
                      //hitung jml kk
                        $query = $this->db->query("SELECT * FROM data_penduduk where hubungan_keluarga_id =1 AND dusun_id = $val->id");
                        $jml_kk = $query->num_rows();
                    ?>
                    <?= $jml_kk; ?>
                  </td>
                  <td class="padat">
                    <?php 
                      //hitung jml anggota kk
                        $query = $this->db->query("SELECT * FROM data_penduduk where hubungan_keluarga_id != 1 AND dusun_id = $val->id");
                        $jml_kk_anggota = $query->num_rows();
                    ?>
                    <?= $jml_kk_anggota; ?>
                  </td>
                  <td class="padat">
                    <?php 
                      //hitung jml jiwa kolom 7 + 8
                        $query = $this->db->query("SELECT * FROM data_penduduk where dusun_id = $val->id");
                        $jml_jiwa = $query->num_rows();
                    ?>
                    <?= $jml_jiwa; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
              <tfoot>
                <tr class="bg-gray color-palette">
                  <th colspan="2">TOTAL</th>
                  <th class="padat">
                     <?php 
                      //hitung Total PRIA WNA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNA' AND jenis_kelamin =1");
                        $count_total_P_WNA = $query->num_rows();
                    ?>
                     <?= $count_total_P_WNA; ?>
                  </th>
                  <th class="padat">
                     <?php 
                      //hitung Total Wanita WNA
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNA' AND jenis_kelamin =2");
                        $count_total_W_WNA = $query->num_rows();
                    ?>
                     <?= $count_total_W_WNA; ?>
                  </th>
                  <th class="padat">
                    <?php 
                      //hitung Total PRIA WNI
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNI' AND jenis_kelamin =1");
                        $count_total_P = $query->num_rows();
                    ?>
                     <?= $count_total_P; ?>
                  </th>
                  <th class="padat">
                     <?php 
                      //hitung Total Wanita WNI
                        $query = $this->db->query("SELECT * FROM data_penduduk where status_warganegara='WNI' AND jenis_kelamin =2");
                        $count_total_W = $query->num_rows();
                    ?>
                     <?= $count_total_W; ?>
                  </th>
                  <th class="padat">
                      <?php 
                      //hitung Total jml KK
                        $query = $this->db->query("SELECT * FROM data_penduduk where hubungan_keluarga_id =1");
                        $count_total_kk = $query->num_rows();
                    ?>
                     <?= $count_total_kk; ?>
                  </th>
                  <th class="padat">
                     <?php 
                      //hitung Total jml anggota KK
                        $query = $this->db->query("SELECT * FROM data_penduduk where hubungan_keluarga_id != 1");
                        $count_total_anggota_kk = $query->num_rows();
                    ?>
                     <?= $count_total_anggota_kk; ?>
                  </th>
                  <th class="padat">
                     <?php 
                      //hitung total jml jiwa kolom 7 + 8
                        $query = $this->db->query("SELECT * FROM data_penduduk");
                        $jml_jiwa_total = $query->num_rows();
                    ?>
                    <?= $jml_jiwa_total; ?>
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
</section>
</div>