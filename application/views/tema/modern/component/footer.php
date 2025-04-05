<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

</div>
<!-- End Div Content -->
<!-- Footer -->
<div id="footer" class="color-web min-h-[calc(100vh*0.4)] w-full 2xl:px-72 xl:px-64 lg:px-52 md:px-20 sm:px-10 phone:px-4 flex flex-col 2xl:gap-8 xl:gap-8 lg:gap-8 md:gap-8 sm:gap-8 phone:gap-2">
    <div class="w-full h-[90%] flex 2xl:flex-row xl:flex-row lg:flex-row md:flex-row sm:flex-row phone:flex-col 2xl:gap-10 xl:gap-10 lg:gap-10 md:gap-10 sm:gap-8 phone:gap-5 items-center pt-8">
        <a href="" class="phone:hidden">
            <img style="width: 70px; height: 70px;" src="<?= base_url('assets/img/logo/').$logo_desa; ?>"
                alt="<?= $nama_desa; ?>" title="SIMULASI WEB DESA" class="bg-cover bg-center aspect-square">
        </a>
        <div style="color: white !important;" class="basis-[30%] h-auto flex flex-col 2xl:gap-4 xl:gap-4 lg:gap-4 md:gap-4 sm:gap-3 phone:gap-2 self-start">
        <h1 class="font-semibold 2xl:text-lg xl:text-lg lg:text-lg md:text-lg sm:text-[1.0625rem] phone:text-base">Pemerintah <?= $sebutan_desa; ?> <?= $nama_desa; ?></h1>
        <div class="flex flex-col 2xl:gap-3 xl:gap-3 lg:gap-3 md:gap-3 sm:gap-2 phone:gap-2">
            <div class="flex gap-2 items-start">
                <i class="fa fa-map 2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs" aria-hidden="true"></i><a href="#" class="2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs"><?= $alamat_kantor ?></a>
            </div>
            <div class="flex gap-2 items-start">
                <i class="fa fa-phone 2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs" aria-hidden="true"></i><a href="tel:<?= format_telpon($no_hp); ?>" class="2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs ease-in-out duration-300 transition hover:-translate-y-1 hover:text-gray-500"><?= format_telpon($no_hp); ?></a>
            </div>
            <div class="flex gap-2 items-start">
                <i class="fa fa-envelope 2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs" aria-hidden="true"></i><a href="mailto:<?= $email_desa; ?>"
                class="2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs ease-in-out duration-300 transition hover:-translate-y-1 hover:text-gray-500"><?= $email_desa; ?></a>
            </div>
            </div>
        </div>
        <div style="color: white;" class="basis-[20%] h-auto flex flex-col 2xl:gap-4 xl:gap-4 lg:gap-4 md:gap-4 sm:gap-3 phone:gap-2 self-start">
            <h1 class=" font-semibold 2xl:text-lg xl:text-lg lg:text-lg md:text-lg sm:text-[1.0625rem] phone:text-base">Akses Cepat</h1>
            <div class="flex flex-col 2xl:gap-3 xl:gap-3 lg:gap-3 md:gap-3 sm:gap-2 phone:gap-2">
                <a target="_blank" href="<?= base_url('auth'); ?>" class="2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs ease-in-out duration-300 transition hover:-translate-y-1 hover:text-gray-500">
                    Login Admin</a>
                <a target="_blank" href="<?= base_url('/layanan/masuk') ?>" class=" 2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs ease-in-out duration-300 transition hover:-translate-y-1 hover:text-gray-500">
                    Login Penduduk</a>
                <a href="" class="2xl:text-sm xl:text-sm lg:text-sm md:text-sm sm:text-[0.8125rem] phone:text-xs ease-in-out duration-300 transition hover:-translate-y-1 hover:text-gray-500">
                    Informasi</a>
            </div>
        </div>
        <div style="color: white;" class="basis-[30%] phone:w-full h-auto phone:flex phone:flex-row phone:justify-between self-start items-center">
            <div class="flex-col 2xl:gap-4 xl:gap-4 lg:gap-4 md:gap-4 sm:gap-3 phone:gap-2">
                <h1 class="font-semibold 2xl:text-lg xl:text-lg lg:text-lg md:text-lg sm:text-[1.0625rem] phone:text-base">Media Sosial</h1>
                <div class="flex gap-4 items-center">
                    <?php foreach($media_sosial as $val) : ?>
                        <?php if($val->tampil == 1) : ?>
                            <a href="<?= $val->link; ?>" target="_blank"
                                class="w-9 h-9 rounded-full p-2 ease-in-out duration-300 transition hover:-translate-y-1 hover:shadow-product flex justify-center items-center text-white">
                                <img src="<?= site_url('assets/img/icon/media_sosial/').$val->icon; ?>" class="img-thumbnail" width="25" height="25">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <span class="w-full h-[0.1rem] bg-gray-200"></span>
    <div class="w-full h-[15%] flex justify-center items-center" style="color: white;">
        <h1 class="2xl:text-xs xl:text-xs lg:text-xs md:text-xs sm:text-[0.6875rem] phone:text-[0.5rem] font-medium">&copy; Copyrights <?php echo date('Y'); ?>. <?= $vendor; ?></h1>
    </div>
</div>

<?php $this->load->view('tema/modern/component/script_js'); ?>
<script src="<?= base_url() ?>assets/tema/js/desa.js"></script>
<script src="<?= base_url() ?>assets/tema/js/fitur_web.js"></script>
</body>
</html>