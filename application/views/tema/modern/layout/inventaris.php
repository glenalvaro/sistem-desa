
<div class="h-full w-full relative">
    <div class="w-full h-auto flex flex-col gap-7 2xl:px-72 xl:px-64 lg:px-52 md:px-36 sm:px-24 phone:px-10 my-10">
        <div class="w-auto h-auto flex flex-col gap-2 items-center">
            <h1 class="text-center font-semibold text-xl">Data Inventaris <?= $sebutan_desa; ?> <?= $nama_desa; ?></h1>
            <span class="hr_line w-[10%] h-1"></span>
        </div>
        <div class="text-justify flex flex-col gap-3 leading-6 text-[0.9375rem] 2xl:text-lg xl:text-lg md:text-base sm:text-sm phone:text-xs overflow-x-auto">
          <div class="table-responsive-vertical mt-6">
            <table id="table" class="table-data table-hover table-mc-light-blue">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Kode</th>
                        <th>Identitas Barang</th>
                        <th>Tgl Pembelian</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($list_inventaris) : ?>
                    <?php foreach ($list_inventaris as $data) : ?>
                    <tr>
                        <td data-title='No'><?= ++$start ?></td>
                        <td data-title='Jenis Barang'><?= $data->jenis_barang ?></td>
                        <td data-title='Kode Barang'><?= $data->kode_barang ?></td>
                        <td data-title='Identitas Barang'><?= $data->identitas_barang; ?></td>
                        <td data-title='Tanggal Pembelian'><?= tgl_indo($data->tgl_perolehan); ?></td>
                        <td data-title='Keterangan'><?= $data->keterangan; ?></td>
                    </tr>
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