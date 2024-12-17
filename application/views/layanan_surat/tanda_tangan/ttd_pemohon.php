<table style="border-collapse: collapse; width: 100%; height: 144px;" border="0">
    <tbody>
        <tr style="height: 18px;">
            <td style="width: 35%; text-align: center; height: 18px;"></td>
            <td style="width: 30%; height: 18px;"></td>
            <td style="width: 35%; text-align: center; height: 18px;"><?= set_ucwords($nama_desa); ?>, <?= date('d F Y'); ?></td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 35%; text-align: center; height: 18px;">Pemilik</td>
            <td style="width: 30%; height: 18px;"></td>
            <td style="width: 35%; text-align: center; height: 18px;"><?= set_ucwords($jabatan_pamong); ?> <?= set_ucwords($nama_desa); ?></td>
        </tr>
        <tr style="height: 72px;">
            <td style="width: 35%; text-align: center; height: 72px;"></td>
            <td style="width: 30%; height: 72px;"><br><br><br><br></td>
            <td style="width: 35%; height: 72px;"></td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 35%; text-align: center; height: 18px;"><?= set_ucwords($nama_penduduk); ?></td>
            <td style="width: 30%; height: 18px;"></td>
            <td style="width: 35%; text-align: center; height: 18px;"><u><?= $pamong; ?></u></td>
        </tr>
        <tr style="height: 18px;">
            <td style="width: 35%; height: 18px;"></td>
            <td style="width: 30%; height: 18px;"></td>
            <td style="width: 35%; text-align: center; height: 18px;">NIP. <?= $nip_pamong; ?></td>
        </tr>
    </tbody>
</table>