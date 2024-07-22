<!-- file ini berisi ttd kepdes dan camat -->
<?php 
    //ambil data info desa
    $query = $this->db->query("SELECT * FROM identitas_desa");
    $get_desa = $query->result_array();
?>

<?php 
    //ambil jabatan
    $sql = "SELECT p.*, j.nama as jabatan
    FROM perangkat_desa p 
    LEFT JOIN jabatan_perangkat j ON p.jabatan_pegawai = j.id
    WHERE p.jabatan_pegawai=1";
    $get_jab = $this->db->query($sql)->row();
?>

<?php foreach($get_desa as $main) : ?>
<tr>
	<td width="25%"></td>
	<td width="50%"></td>
	<td width="25%" align="center"><?= strtoupper($main['nama_desa']); ?>, <?= tgl_indo(date('Y m d')); ?></td>
</tr>
	<td width="25%" align="center">CAMAT <?= strtoupper($main['nama_kecamatan']); ?></td>
	<td width="50%"></td>
	<td align="center" width="150"><?= strtoupper($get_jab->jabatan); ?> <?= strtoupper($main['nama_desa']); ?></td>
</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
<tr>
	<td width="25%" align="center"><u><?= strtoupper($main['nama_camat']); ?></u></td>
	<td width="50%"></td>
	<td width="25%" align="center" width="150"><u><?= strtoupper($get_jab->nama_pegawai); ?></u></td>
</tr>
<tr>
	<td width="25%" align="center">NIP. <?= $main['nip_camat'] ?></td>
	<td width="50%"></td>
	<td width="25%" align="center" width="150">NIP. <?= strtoupper($get_jab->nip); ?></td>
</tr>
<?php endforeach; ?>