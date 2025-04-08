<div class="reveal w-full flex flex-col gap-6 phone:gap-3 items-center mb-10">
    <div class="flex flex-col items-center mb-2">
            <p class="text-web 2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl phone:text-xl font-extrabold capitalize text-center reveal-grow-r py-1">Agenda</p>
            <span class="reveal hr_line 2xl:w-[10%] xl:w-[10%] lg:w-[10%] md:w-[13%] sm:w-[13%] phone:w-[13%] 2xl:h-1 xl:h-1 lg:h-1 md:h-[0.2rem] sm:h-[0.15rem] phone:h-[0.15rem] mb-2"></span>
            <p class="phone:text-xs text-center reveal-grow-r py-1">Menampilkan kegiatan-kegiatan yang akan berlangsung</p>
        </div>
    <div class="w-[70%] phone:w-[90%] h-full flex flex-col">
       <div class="bg-white text-sm text-gray-500 font-bold px-5 py-2 shadow border-b border-gray-300 capitalize">Kegiatan mendatang
       </div>
       <div class="w-full 2xl:max-h-[calc((100vw-24rem-1.5rem)*0.5)] xl:max-h-[calc((100vw-22rem-1.5rem)*0.5)] lg:max-h-[calc((100vw-10rem-1.5rem)*0.5)] md:max-h-[calc((100vw-8rem-1.5rem)*0.5)] sm:max-h-[calc((100vw-5rem-1.5rem)*0.6)] phone:max-h-[calc((100vw-1rem-1.5rem)*0.9)] overflow-auto shadow bg-white p-6" id="journal-scroll">
           <table class="w-full">
                <tbody>
                    <?php foreach($data_agenda as $agenda) : ?>
                    <tr class="transform scale-100 text-xs py-1 border-b-2 border-blue-100 ease-in-out duration-300 transition-all hover:-translate-y-1 rounded-md bg-opacity-25">
                        <td class="pl-5 pr-3 bg-cover bg-center bg-no-repeat bg-origin-content p-2" style="background-image:url('<?= base_url('assets/img/kantor/') . $gambar_desa; ?>');">
                        </td>
                        <td class="px-2 py-2 whitespace-no-wrap">
                            <a style="font-size: 14px;" type="button" class="leading-5 text-gray-700 font-medium capitalize ease-in-out duration-300 transition-all hover:text-gray-900"><?= $agenda->nama_agenda; ?></a>
                            <div class="leading-5 text-gray-900">Tanggal : <?= tgl_indo($agenda->tgl_agenda); ?>, Jam <?= $agenda->jam; ?></div>
                            <div class="leading-5 text-gray-900">Kordinator : <?= $agenda->kordinator_lapangan; ?></div>
                            <div class="leading-5 text-gray-900">Tempat : <?= $agenda->lokasi_kegiatan; ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
               </tbody>
            </table>
          </div>
    </div>
</div>


