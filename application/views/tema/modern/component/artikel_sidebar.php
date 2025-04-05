 <?php 
    //get artikel
    $query = $this->db->query("SELECT * FROM artikel ORDER BY id DESC LIMIT 5");
    $result = $query->result();
?>

<?php foreach($result as $val) : ?>
    <?php if($val->aktif == 1) : ?>
 <div class="w-full h-full tab_content">
    <div class="p-2 tabs_item">
        <ul class="w-full h-auto flex flex-col gap-4 max-h-96 overflow-auto no-scrollbar">
        <a href="<?= base_url('web/detail_artikel/'.$val->id.'/'.slug_url($val->judul)); ?>" class="h-20 w-full flex items-center rounded-md hover:shadow-product hover:-translate-y-1 ease-in-out duration-300 border border-gray-300">
        <div class="basis-[30%] h-full">
            <img src="<?= base_url('assets/img/foto_artikel/') . $val->gambar; ?>" class="w-full h-full bg-cover bg-center"alt="">
        </div>
        <div class="basis-[70%] h-full flex flex-col justify-between px-2 py-1">
            <h1 class="w-full self-start text-xs phone:text-xs font-medium line-clamp-2 mt-1">
                <?= set_ucwords($val->judul); ?>
            </h1>
            <p class="text-xs font-light text-[0.65rem] text-gray-400"><?= date('d F Y', $val->tgl_created); ?></p>
        </div>
            </a>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php endforeach; ?>