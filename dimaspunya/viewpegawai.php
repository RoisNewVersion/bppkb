<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">

<?php require_once('Connections/sambung.php'); ?>
<?php
//cek nip
if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} else {
	die ("Error. Tidak ada NIP yang dipilih Silakan cek kembali! ");	
}
		
//Tampilkan datanya dari tabel karyawan
$tampil_karyawan = " SELECT a.nip,a.jabatan, a.nama_karyawan, a.tmp_lahir, a.tgl_lahir, a.agama, a.jk, a.status_nikah, a.jml_anak, a.status_karyawan, a.thn_lulus, a.status, a.no_karpeg,a.keterangan, b.tmt_jabatan, b.gol, b.tmt_gol, b.mk_thn, b.mk_bln, c.pendidikan, c.jurusan
FROM tabel_karyawan a
JOIN tabel_gol b ON a.id_gol = b.id_gol
JOIN tb_pendidikan c ON a.id_pendidikan = c.id_pendidikan
WHERE a.nip ='$nip'";
$sql = mysql_query ($tampil_karyawan);
$hasil_p = mysql_fetch_array ($sql);
	$nip = $hasil_p['nip'];
	$nama_karyawan = $hasil_p['nama_karyawan'];
	$jk = $hasil_p['jk'];
	$jabatan = $hasil_p['jabatan'];
	$tmp_lahir = $hasil_p['tmp_lahir'];
	$tgl_lahir = $hasil_p['tgl_lahir'];
	$agama = $hasil_p['agama'];
	$status_nikah = $hasil_p['status_nikah'];
	$jml_anak = $hasil_p['jml_anak'];
	$status_karyawan = $hasil_p['status_karyawan'];
	$thn_lulus = $hasil_p['thn_lulus'];
	$status = $hasil_p['status'];
	$no_karpeg = $hasil_p['no_karpeg'];
	$gol = $hasil_p['gol'];
	$tmt_gol = $hasil_p['tmt_gol'];
	$tmt_jabatan = $hasil_p['tmt_jabatan'];
	$mk_thn = $hasil_p['mk_thn'];
	$mk_bln = $hasil_p['mk_bln'];
	$jurusan = $hasil_p['jurusan'];
	$pendidikan = $hasil_p['pendidikan'];
?>
<title>Detail Data Normatif Pegawai</title>

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
			<td width="540"><b>Detail Data Pegawai Normatif&nbsp;&nbsp;&nbsp;</b></td>
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
			<td width="142" height="36">NIP</td>
			<td width="540">:&nbsp;<?=$nip?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Nama</td>
			<td>:&nbsp;<?=$nama_karyawan?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Tempat Lahir</td>
			<td>:&nbsp;&nbsp;<?=$tmp_lahir?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Tanggal Lahir</td>
			<td>:&nbsp;<?=date('d/m/Y',strtotime($tgl_lahir))?></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">Agama</td>
			<td>:&nbsp;<?=$agama?></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">Jenis Kelamin</td>
			<td>:&nbsp;<?=$jk?></td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td height="36">Gol/RU</td>
			<td>:&nbsp;<?=$gol?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">TMT Gol</td>
			<td>:&nbsp;<?=date('d/m/Y',strtotime($tmt_gol))?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Jabatan</td>
			<td>:&nbsp;<?=$jabatan?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">TMT Jabatan</td>
			<td>:&nbsp;<?=date('d/m/Y',strtotime($tmt_jabatan))?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">MK Tahun</td>
			<td>:&nbsp;<?=$mk_thn?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">MK Bulan</td>
			<td>:&nbsp;<?=$mk_bln?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td height="36">Pendidikan</td>
			<td>:&nbsp;<?=$pendidikan?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		  <td height="36">Jurusan</td>
		  <td width="540">:&nbsp;<?=$jurusan?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">Tahun Lulus</td>
		  <td width="540">:&nbsp;<?=$thn_lulus?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">Status Perkawinan</td>
		  <td width="540">:&nbsp;<?=$status_nikah?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">Jumlah Anak</td>
		  <td width="540">:&nbsp;<?=$jml_anak?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">Status Pegawai</td>
		  <td width="540">:&nbsp;<?=$status_karyawan?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">No Karpeg</td>
		  <td width="540">:&nbsp;<?=$no_karpeg?></td>
		</tr>
        <tr>
			<td>&nbsp;</td>
		  <td height="36">Status</td>
		  <td width="540">:&nbsp;<?=$status?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		  <td height="36">Keterangan</td>
		  <td width="540">:&nbsp;<?=$keterangan?></td>
		</tr>
</table>
</form>

</div>