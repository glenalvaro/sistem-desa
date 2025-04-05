<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($info) : ?>
<div class="w-full flex flex-col items-center gap-4 phone:gap-2">
    <div class="w-full flex flex-col- items-center gap-2 phone:gap-2">
        <div style="background: rgba(9,9,9,.04); border-bottom: 1px solid #e2e1e1; height: 40px;" class="w-full rounded-sm h-auto py-4 px-3 flex justify-start items-center informasi_text">
            <div class="text_berjalan">
                <span>Info</span>
            </div>
        <marquee class="informasi__lists" onmouseover="this.stop();" onmouseout="this.start();">
      <?php foreach($info as $newsticker) : ?>
        <span class="informasi__item" style="padding-right: 1.5rem">
          <?= $newsticker->isi; ?>
          <?php if($newsticker->tautan_artikel) : ?>
          <a target="_blank" href="<?= $newsticker->tautan_artikel; ?>" class="text-web informasi__link"><?= $newsticker->judul_tautan; ?></a>
          <?php endif ?>
          &nbsp; |
        </span>
      <?php endforeach ?>
    </marquee>
       </div>
    </div>
</div>
<?php endif; ?>
