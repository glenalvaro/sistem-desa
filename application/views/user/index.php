<style>
  .subtitle_head {
    padding: 10px 50px 10px 5px;
    background-color: #a2f2ef;
    margin: 15px 0px 10px 0px;
    margin-top: 15px;
    margin-right: 0px;
    margin-bottom: 10px;
    margin-left: 0px;
    text-align: left;
    color: #111;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="tx-judul">
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user-circle-o"></i> &nbsp;Pengguna</a></li>
        <li><a href="#"> &nbsp;Profil</a></li>
      </ol>
    </section>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">

    <small><?= $this->session->flashdata('message'); ?></small>
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
               <a href="<?= base_url('user/edit_profile'); ?>" class="btn btn-social btn-flat bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Edit Profile</a>

                <a href="<?= base_url('user/changePassword'); ?>" class="btn btn-social btn-flat bg-maroon btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-key"></i> Ganti Password</a>
            </div>
            <div class="box-body">
              <center><img style="width: 143px; height: 133px; border: 3px solid #ccc;" src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="user-image">
              </center>
              <br>      
           <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover tabel-rincian">
              <tbody>
                <tr>
                  <th colspan="3" class="subtitle_head"><strong>DATA PENGGUNA</strong></th>
                </tr>
                <tr>
                  <td width="200">Group</td><td width="1">:</td>
                  <td>
                   <?php foreach($group as $g) : ?>

                    <?php 

                     if ($this->session->userdata('role_id') == $g['role_id']) {
                         echo $g['role'];
                     } else {
                      
                     }

                     ?>
                  <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <td width="200">Nama Lengkap</td><td width="1">:</td>
                  <td><?= $user['name']; ?></td>
                </tr>
                <tr>
                  <td>E-mail</td><td>:</td>
                  <td><?= $user['email']; ?></td>
                </tr>
                <tr>
                  <td width="200">Telepon</td><td width="1">:</td>
                  <td><?= $user['no_hp']; ?></td>
                </tr>
                <tr>
                  <td width="200">Alamat</td><td width="1">:</td>
                  <td><?= $user['alamat']; ?></td>
                </tr>
                <tr>
                  <td>Tgl Terdaftar </td><td>:</td>
                  <td class="text-red"><?= date('d F Y', $user['date_created']); ?></label></td>
                </tr>
              </tbody>
             </table>
            </div>
           </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>