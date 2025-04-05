<style>
  .user-panel .info {
    padding: 2px !important; 
    line-height: 0.5;
    position: relative;
    text-align: center;
    left: 0;
    right: 0;
    color: #fff;
    text-transform: capitalize;
  }

  .user-panel .info .nama_desa{
    font-size: 11px;
    letter-spacing: 0.5px;
  }

  .user-panel .info .nama_kab{
    font-weight: normal !important;
    font-size: 10px;
  }
</style>
<?php foreach($setting as $data) : ?>
  <?php foreach($desa as $dt) : ?>
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        <center>
          <img style="width: 20%; margin-top: 5px; margin-bottom: 20px;" src="<?= base_url('assets/img/logo/') . $dt['logo_desa']; ?>" class="img-responsive" alt="User Image">
        </center>
        </div>
        <div class="info">
          <p class="nama_desa"><?= $data['sebutan_desa'] ?> <?= $dt['nama_desa'] ?></p>
          <?php if($data['sebutan_kabupaten'] == 'Kabupaten' ) : ?>
          <p class="nama_kab">Kec. <?= $dt['nama_kecamatan'] ?>, Kab. <?= $dt['nama_kabupaten'] ?></p>
           <?php elseif($data['sebutan_kabupaten'] == 'Kota' ) : ?>
          <p class="nama_kab">Kec. <?= $dt['nama_kecamatan'] ?>, Kota. <?= $dt['nama_kabupaten'] ?></p>
          <?php endif; ?>
        </div>
      </div>

       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" id="search_menu" name="search_menu" class="input-sm form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="button" class="btn btn-flat btn-sm">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
        
        <ul class="sidebar-menu" data-widget="tree">

        <?php if($user['role_id'] == 1) : ?>
            <li class="menu_list <?php if ($this->uri->segment('1') == 'home') {echo 'active';} ?>">
              <a href="<?= base_url('home'); ?>">
                <i class="<?php if ($this->uri->segment('1') == 'home') {echo 'text-red';} ?> fa fa-home"></i> <span class="<?php if ($this->uri->segment('1') == 'home') {echo 'text-red';} ?>">Home</span></a>
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
        <li class="menu_list header">
          <small style="font-size: 11px;"><?= $m['menu']; ?></small>
        </li>


        <!-- SIAPKAN SUB MENU SESUAI DENGAN MENU -->
        <?php 
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                              ORDER BY `user_sub_menu`.`id` ASC";
                                
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach($subMenu as $sm) : ?>
             <li class="menu_list
             <?php 
             if ($this->uri->uri_string('1') == $sm['url']) {
                echo "active"; 
              } elseif ($this->uri->segment('1') == $sm['url']) {
                  echo "active";
              }
             ?>
             " style="font-size: 11.5px;">
                    <a href="<?= base_url($sm['url']); ?>">
                     <i class="
                     <?php 
                     if ($this->uri->uri_string('1') == $sm['url']) {
                        echo "text-red"; 
                      } elseif ($this->uri->segment('1') == $sm['url']) {
                          echo "text-red";
                      }
                     ?> 
                     <?= $sm['icon'] ?>"></i>
                     <span class="
                      <?php 
                     if ($this->uri->uri_string('1') == $sm['url']) {
                        echo "text-red"; 
                      } elseif ($this->uri->segment('1') == $sm['url']) {
                          echo "text-red";
                      }
                     ?>
                     "> <?= $sm['title'] ?></span>
                    </a>
                  </li>
        <?php endforeach; ?>

        <?php endforeach; ?>   
      </ul>
    </section>
  </aside>
  <?php endforeach; ?>
<?php endforeach; ?>



<script>
$(document).ready(function () {
   
$("#search_menu").on("keyup", function () {
if (this.value.length > 0) {   
  $(".menu_list").hide().filter(function () {
    return $(this).text().toLowerCase().indexOf($("#search_menu").val().toLowerCase()) != -1;
  }).show(); 
}  
else { 
  $(".menu_list").show();
}
}); 

});
</script>