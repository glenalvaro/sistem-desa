
<div class="h-full w-full relative">
    <div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
        <div class="w-auto h-auto flex flex-col gap-2 items-center">
            <h1 class="text-center font-semibold text-xl">Data Informasi Publik</h1>
            <span class="hr_line w-[10%] h-1"></span>
        </div>
        <div class="text-justify flex flex-col gap-3 leading-6 text-[0.9375rem] 2xl:text-lg xl:text-lg md:text-base sm:text-sm phone:text-xs overflow-x-auto">
          <div class="table-responsive-vertical mt-6">
            <table id="table" class="table-data table-hover table-mc-light-blue">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Tanggal Unggah</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($list_informasi) : ?>
                    <?php foreach ($list_informasi as $data) : ?>
                    <?php if($data->aktif == 1) : ?>
                    <tr>
                        <td data-title='No'><?= ++$start ?></td>
                        <td data-title='Nama'><?= $data->judul_dokumen ?></td>
                        <td data-title='Kategori'><?= $data->kategori ?></td>
                        <td data-title='Tahun'><?= $data->tahun; ?></td>
                        <td data-title='Tanggal Unggah'><?= date('d F Y', $data->tgl_muat); ?></td>
                        <td data-title='File'><a target="_blank" href="<?= site_url('folder_arsip/informasi_publik/').$data->dokumen; ?>" title="Lihat Dokumen" class="px-6 py-2.5 color-web text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out">Lihat</a></td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6"><center>Data Tidak Tersedia</center></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
           </div>
        </div>
        <div class="self-center">
            <?= $halaman_data; ?>
        </div>
    </div>
</div>