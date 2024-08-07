<style>
  .user-panel>.info {
    padding: 5px !important; 
    line-height: 1;
    position: absolute;
    text-align: center;
    left: 0;
    right: 0;
    margin-top: 30px;
    color: #fff;
    font-size: 7pt;
    text-transform: capitalize;
}
</style>
<?php foreach($setting as $data) : ?>
  <?php foreach($desa as $dt) : ?>
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        <center>
          <img style="width: 22%; margin-top: 5px; margin-bottom: 30px;" src="<?= base_url('assets/img/logo/') . $dt['logo_desa']; ?>" class="img-responsive" alt="User Image">
        </center>
        </div>
        <br>
        <br>
        <div class="info" style="margin-top:38px;">
          <p style="font-size: 9px; letter-spacing: 0.5px;"><?= $data['sebutan_desa'] ?> <?= $dt['nama_desa'] ?></p>
          <p class="text-left" style="font-size: 9px;">Kec. <?= $dt['nama_kecamatan'] ?>, Kab. <?= $dt['nama_kabupaten'] ?></p>
        </div>
      </div>
      <br>

       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="input-sm form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-sm">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
        
        <ul class="sidebar-menu" data-widget="tree">

        <?php if($user['role_id'] == 1) : ?>
            <li class="<?php if ($this->uri->segment('1') == 'home') {echo 'active';} ?>">
              <a href="<?= base_url('home'); ?>">
                <i class="<?php if ($this->uri->segment('1') == 'home') {echo 'text-blue';} ?> fa fa-home"></i> <span>Home</span></a>
            </li>
        <?php endif; ?>

        <!-- QUERY MENU  -->
        <?php 
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
        <li class="header">
          <small><?= $m['menu']; ?></small>
        </li>


        <!-- SIAPKAN SUB MENU SESUAI DENGAN MENU -->
        <?php 
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1";
                                
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach($subMenu as $sm) : ?>
             <li class="<?php if ($this->uri->segment('1') == $sm['url']) {echo 'active';} ?>" style="font-size: 11px;">
                    <a href="<?= base_url($sm['url']); ?>">
                     <i class="<?php if ($this->uri->segment('1') == $sm['url']) {echo 'text-blue';} ?> <?= $sm['icon'] ?>"></i>
                     <span> <?= $sm['title'] ?></span>
                    </a>
                  </li>
        <?php endforeach; ?>

        <?php endforeach; ?>   
      </ul>
    </section>
  </aside>
  <?php endforeach; ?>
<?php endforeach; ?>