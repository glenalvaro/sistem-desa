<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Kategori Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"> Kependudukan</a></li>
        <li><a href="#"> Data Kelompok</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border"> 
               <a href="<?= site_url('data_kelompok/kategori_form'); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Kategori Kelompok</a>
               <a href="<?= site_url('data_kelompok'); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kelompok</a>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table id="datatables-sistem" class="table table-striped table-hover table-bordered tabel-daftar">
                <thead class="bg-gray disabled color-palette">
                <tr>
                  <th class="text-center">No</th>
                  <th style="min-width:150px;" class="text-center">Aksi</th>
                  <th class="text-center">Kategori Kelompok</th>
                  <th style="min-width:200px;" class="text-center">Deskripsi Kategori</th>
                  <th class="text-center">Jumlah Kelompok</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($kategori_list as $data) : ?>
                <tr>
                  <td width="5%" class="text-center"><?= $no++; ?></td>
                  <td width="10%" class="text-center">
                      <a href="<?= base_url('data_kelompok/edit_kategori/') . $data['id']; ?>" class="btn btn-warning btn-flat btn-sm" title="Edit Kelompok"><i class="fa fa-edit"></i></a>
                      <a href="<?= base_url('data_kelompok/hapus_kategori/') . $data['id']; ?>" class="btn btn-danger btn-flat btn-sm aksi-hapus" title="Hapus Kategori Kelompok"><i class="fa fa-trash-o"></i></a>
                  </td>
                  <td width="5%"><?= $data['kategori_kelompok']; ?></td>
                  <td><?= $data['deskripsi_kategori']; ?></td>
                  <td width="3%" class="text-center">
                  <?php 
                      //hitung jumlah anggota kelompok
										 $query = $this->db->query("SELECT * FROM data_kelompok where id_kategori={$data['id']}");
										 $hitung_kategori = $query->num_rows();
									?>
									    <?= $hitung_kategori; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
</section>
</div>