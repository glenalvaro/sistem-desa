<div class="content-wrapper">
    <section class="content-header">
       <h1 class="tx-judul">
        Profil Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Pengguna</a></li>
        <li><a href="#">Profil</a></li>
      </ol>
    </section>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<section class="content">
    <small><?= $this->session->flashdata('message'); ?></small>
      <div class="row">
         <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
               <a href="<?= base_url('user/edit_profile'); ?>" class="btn btn-social bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Edit Profile</a>

                <a href="<?= base_url('user/changePassword'); ?>" class="btn btn-social bg-maroon btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-key"></i> Ganti Password</a>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?= site_url('assets/img/profile/').$user['image']; ?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
              <p class="text-muted text-center">
                 <?php foreach($group as $g) : ?>
                    <?php 
                      if ($this->session->userdata('role_id') == $g['role_id']) {
                          echo $g['role'];
                      } else {   
                      }
                    ?>
                  <?php endforeach; ?>
              </p>
              <ul class="list-group list-group-unbordered">
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-rincian">
                  <tbody>
                    <tr>
                      <th colspan="3" class="subtitle_head"><strong>DATA PENGGUNA</strong></th>
                    </tr>
                    <tr>
                      <td>E-mail</td><td>:</td>
                      <td><?= $user['email']; ?></td>
                    </tr>
                    <tr>
                      <td width="200">Telepon</td><td width="1">:</td>
                      <td><?= format_telpon($user['no_hp']); ?></td>
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
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>