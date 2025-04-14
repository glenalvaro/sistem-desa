<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white overflow-y-auto reveal-r">
        <div class="flex justify-between items-center mb-8">
            <a href="#" class="h-full w-10">
                <img src="<?= base_url('assets/img/logo/').$logo_desa; ?>" alt="<?= $nama_desa; ?>"
                    alt="logo" class="bg-cover bg-center">
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="w-full block p-4 text-sm font-semibold hover:bg-green-50 hover:text-green-600 rounded" href="<?= base_url('web'); ?>">Beranda</a>
                </li>
                 <!-- GET MENU  -->
                <?php 
                    $query = $this->db->query("SELECT * FROM menu_web ORDER BY id ASC");
                    $result = $query->result();
                ?>
                 <!-- LOOPING MENU -->
                <?php foreach($result as $main) : ?>
                <?php if($main->status == 1) : ?>
                <li class="dropdown-responsive mb-1 flex flex-col items-center justify-between" data-open="false">
                    <div class="w-full flex justify-between gap-2 items-center hover:bg-green-50 hover:text-green-600 rounded">
                        <?php if($main->jenis_link == 3) : ?>
                            <a href="<?= $main->link; ?>" class="w-full block p-4 text-sm font-semibold cursor-pointer"
                            aria-haspopup="true" aria-expanded="false"><?= $main->nama; ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('web/'.$main->link.'/'.slug_url($main->nama)); ?>" class="w-full block p-4 text-sm font-semibold cursor-pointer <?php if ($this->uri->segment('2') == $main->link) {echo 'text-web';} ?>"
                            aria-haspopup="true" aria-expanded="false"><?= $main->nama; ?></a>
                        <?php endif; ?>
                <!-- QUERI SUB MENU -->
                <?php 
                $menu_id = $main->id;
                $query_sub = "SELECT *
                               FROM `sub_menu_web` JOIN `menu_web` 
                                 ON `sub_menu_web`.`id_menu` = `menu_web`.`id`
                              WHERE `sub_menu_web`.`id_menu` = $menu_id
                                AND `sub_menu_web`.`aktif` = 1
                              ORDER BY `sub_menu_web`.`id` DESC";
                $sub_menu = $this->db->query($query_sub)->result_array();
                ?> 
                <!-- JIKA SUB MENU ADA TAMPILKAN DROPDOWN -->
                <?php if($sub_menu) : ?>
                     <i class="px-10 fa fa-chevron-down text-[#979797]"></i>
                </div>
                <?php endif; ?>
                    <ul class="transition duration-300 z-20 flex flex-col self-start ml-6 mt-2 gap-2" aria-role="menu" aria-hidden="true">
                    <!-- LOOPING SUB MENU -->
                    <?php foreach($sub_menu as $val) : ?>
                    <?php if($val['tipe_link'] == 3) : ?>
                        <a target="_blank" href="<?= $val['url']; ?>" class=" hover:cursor-pointer hover:bg-green-50 hover:text-green-600 text-sm font-semibold p-2 pt-1" tabindex="-1" aria-role="menuitem"><?= $val['sub_nama']; ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('web/'.$val['url'].'/'.slug_url($val['sub_nama'])); ?>" class=" hover:cursor-pointer hover:bg-green-50 hover:text-green-600 text-sm font-semibold p-2 pt-1" tabindex="-1" aria-role="menuitem"><?= $val['sub_nama']; ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
        <div class="mt-auto">
            <div class="pt-6">
                <a class="block px-10 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold color-web hover:bg-[#00532a] rounded-xl" href="<?= base_url('layanan/masuk'); ?>">Log in</a>
            </div>
        </div>
        <p class="my-4 text-xs text-center text-gray-400">
            <span>&copy; Copyrights <?php echo date('Y'); ?>. Sistem Informasi <?= $sebutan_desa; ?></span>
        </p>
    </nav>
</div>