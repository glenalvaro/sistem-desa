<page backtop="4mm" backbottom="3mm" backleft="4mm" backright="3mm"> 
    <table>
    <page_header> 
      <?= $isian_header; ?>
    </page_header>
        <br>
        <h4 style="margin: 0; text-align: center;"><span style="text-decoration: underline;">SURAT <?= strtoupper($nama_surat) ?></span></h4>
        <p style="margin: 0; text-align: center;">Nomor : <?= $nomor_surat; ?>/<?= $kode_wilayah; ?>/<?= strtoupper($singkatan_surat); ?>/<?= bulan_romawi(date('m')) ?>/<?= date('Y') ?><br><br>
        </p>
        <p style="text-align: justify; font-size: 10pt;">
            Yang bertandatangan di bawah ini :
        </p>
        <table width="95%" style="font-size: 10pt; margin-bottom: 10px; line-height: 1.5; font-weight: bold;">
            <tr>
                <td width="30%">Nama</td>
                <td width="3%">:</td>
                <td width="77%"><b><?= strtoupper($pamong); ?></b></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?= $nip_pamong; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= strtoupper($jabatan_pamong); ?></td>
            </tr>
        </table>
        
    <!-- Load Keterangan Surat Sesuai Jenis Surat -->
    <?php $this->load->view("template-surat/{$url}/data"); ?>

</table>
</page>


