<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">

<?php require_once('Connections/sambung.php'); ?>
<?php
//cek no surat
if (isset($_GET['no_surat'])) {
	$no_surat = $_GET['no_surat'];
} else {
	die ("Error. Tidak ada No Surat yang dipilih Silakan cek kembali! ");	
}
		
//Tampilkan datanya dari tabel mutasi
$tampil_mutasi = "SELECT * FROM tabel_mutasi WHERE no_surat='$no_surat'";
$sql = mysql_query ($tampil_mutasi);
$hasil_p = mysql_fetch_array ($sql);
	$no_surat = $hasil_p['no_surat'];
	$nip = $hasil_p['nip'];
	$nama_karyawan = $hasil_p['nama_karyawan'];
	$dinas_lama = $hasil_p['dinas_lama'];
	$dinas_baru = $hasil_p['dinas_baru'];
	$tmt_baru = $hasil_p['tmt_baru'];
?>
<title>Detail Data Mutasi Pegawai</title>

<form action="#" method="POST" name="detail" enctype="multipart/form-data">
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="18">&nbsp;</td>
			<td width="142">&nbsp;</td>
			<td width="540">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="540"><b>Detail Data Mutasi Pegawai &nbsp;&nbsp;&nbsp;</b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="540">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right" width="540">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="540">&nbsp;</td>
		</tr>
		<tr bgcolor="#DFE6EF" height="20">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="540"></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td width="142" height="36">No Surat</td>
			<td width="540">:&nbsp;<?=$no_surat?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">NIP</td>
			<td>:&nbsp;<?=$nip?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">nama Karyawan</td>
			<td>:&nbsp;&nbsp;<?=$nama_karyawan?></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">Dinas Lama</td>
			<td>:&nbsp;<?=$dinas_lama?></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">dinas_baru</td>
			<td>:&nbsp;<?=$dinas_baru?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">TMT Baru</td>
			<td>:&nbsp;<?=date('d/m/Y',strtotime($tmt_baru))?></td>
		</tr>
</table>
</form>

</div>