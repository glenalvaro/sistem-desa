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
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        <center>
          <img style="width: 20%; margin-top: 5px; margin-bottom: 30px;" src="<?= base_url('assets/img/logo/') . $dt['logo_desa']; ?>" class="img-responsive" alt="User Image">
        </center>
        </div>
        <br>
        <br>
        <div class="info">
          <p style="font-size: 10px;"><?= $data['sebutan_desa'] ?> <?= $dt['nama_desa'] ?></p>
          <p style="font-size: 9px;">Kec. <?= $dt['nama_kecamatan'] ?>, Kab. <?= $dt['nama_kabupaten'] ?></p>
        </div>
      </div>
      <br>
        
        <ul class="sidebar-menu" data-widget="tree">

        <?php if($user['role_id'] == 1) : ?>
          <?php if($title == 'Home') : ?>
            <li class="active">
              <a href="<?= base_url('home'); ?>">
                <i class="fa fa-home text-red"></i> <span>Home</span></a>
            </li>
          <?php else : ?>
            <li>
              <a href="<?= base_url('home'); ?>">
                <i class="fa fa-home"></i> <span>Home</span></a>
            </li>
          <?php endif; ?>
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
          <?php if($title == $sm['title']) : ?>
             <li class="active" style="font-size: 12px;">
          <?php else : ?>
                 <li style="font-size: 12px;">
          <?php endif; ?>
                    <a href="<?= base_url($sm['url']); ?>">
                      <?php if($title == $sm['title']) : ?>
                            <i class="<?= $sm['icon'] ?> text-red"></i>
                            <span> <?= $sm['title'] ?></span>
                      <?php else : ?>
                             <i class="<?= $sm['icon'] ?>"></i>
                             <span> <?= $sm['title'] ?></span>
                       <?php endif; ?>
                    </a>
                  </li>
        <?php endforeach; ?>

        <?php endforeach; ?>   
      </ul>
    </section>
  </aside>
  <?php endforeach; ?>
<?php endforeach; ?>