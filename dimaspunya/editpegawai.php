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
	$pendidikan = $hasil_p['pendidikan'];
	$jurusan = $hasil_p['jurusan'];
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_sambung, $sambung);
$query_DetailRS1 = sprintf("SELECT * FROM tabel_karyawan WHERE nip = %s", GetSQLValueString($colname_DetailRS1, "text"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $sambung) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Pegawai</title>
</head>

<body>
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
    <td width="540" ><b>Edit Data Pegawai Normatif&nbsp;&nbsp;&nbsp;</b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td width="540"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" width="540">&nbsp;</td>
  </tr>
  <tr bgcolor="#DFE6EF" height="20">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="540"></td>
    
<h3 align="center">&nbsp;</h3></td>
    <tr>
      <td width="142" height="28">NIP</td>
      <td width="450" height="28"><input type="text" value="<?=$nip?>" name="nip" id="nip" /></td>
    </tr>
    <tr>
      <td height="28">Nama</td>
      <td height="28"><label for="nama"></label>
      <input name="nama" type="text" value="<?=$nama_karyawan?>" id="nama" size="50" /></td>
    </tr>
    <tr>
      <td height="28">Tempat Lahir</td>
      <td height="28"><label for="tmptlahir"></label>
      <input name="tmptlahir" type="text" value="<?=$tmp_lahir?>" id="tmptlahir" size="18" /></td>
    </tr>
    <tr>
      <td height="28">Tanggal Lahir</td>
      <td height="28"><label for="tggllahir"></label>
      <input name="tggllahir" type="text" value="<?=date('d/m/Y', strtotime($tgl_lahir))?>" id="tggllahir" size="15" />       (dd/mm/yyyy) </td>
    </tr>
    <tr>
      <td height="28">Agama</td>
      <td height="28"><label for="agama"></label>
        <select name="agama" id="agama">
          <option>--Agama--</option>
          <option value="islam" <?php if ($agama=='Islam')  {echo 'selected';}?>>Islam</option>
          <option value="kristen" <?php if ($agama=='kristen')  {echo 'selected';}?>>Kristen</option>
          <option value="katolik"<?php if ($agama=='katolik')  {echo 'selected';}?>>Katolik</option>
          <option value="hindu"<?php if ($agama=='hindu')  {echo 'selected';}?>>Hindu</option>
          <option value="buddha"<?php if ($agama=='buddha')  {echo 'selected';}?>>Buddha</option>
      </select></td>
    </tr>
    <tr>
      <td height="28">Jenis Kelamin</td>
      <td height="28">
		  <input name="jk" type="radio" id="jk" value="laki-laki" <?php if ($jk=='L')  {echo 'checked';}?> />
		  <label for="jk">Laki-Laki</label>
		  <input name="jk" type="radio" id="jk" value="perempuan" <?php if ($jk=='P') {echo 'checked';}?> />
		  <label>Perempuan</label>
	  </td>
    </tr>
    <tr>
      <td height="28">Gol/RU</td>
      <td height="28"><label for="gol"></label>
        <select name="gol" id="gol">
          <option>--Golongan--</option>
          <option value="iv/d" <?php if ($gol=='iv/d')  {echo 'selected';}?>>IV/d</option>
          <option value="iv/c" <?php if ($gol=='iv/c')  {echo 'selected';}?>>IV/c</option>
          <option value="iv/b" <?php if ($gol=='iv/b')  {echo 'selected';}?>>IV/b</option>
          <option value="iv/a" <?php if ($gol=='iv/a')  {echo 'selected';}?>>IV/a</option>
          <option value="iii/d" <?php if ($gol=='iii/d')  {echo 'selected';}?>>III/d</option>
          <option value="iii/c" <?php if ($gol=='iii/c')  {echo 'selected';}?>>III/c</option>
          <option value="iii/b" <?php if ($gol=='iii/b')  {echo 'selected';}?>>III/b</option>
          <option value="iii/a" <?php if ($gol=='iii/a')  {echo 'selected';}?>>III/a</option>
          <option value="ii/d" <?php if ($gol=='iii/d')  {echo 'selected';}?>>II/d</option>
          <option value="ii/c" <?php if ($gol=='ii/c')  {echo 'selected';}?>>II/c</option>
          <option value="ii/b" <?php if ($gol=='ii/b')  {echo 'selected';}?>>II/b</option>
          <option value="ii/a" <?php if ($gol=='ii/a')  {echo 'selected';}?>>II/a</option>
          <option value="i/d" <?php if ($gol=='iv/d')  {echo 'selected';}?>>I/d</option>
          <option value="i/c" <?php if ($gol=='i/c')  {echo 'selected';}?>>I/c</option>
          <option value="i/b" <?php if ($gol=='i/b')  {echo 'selected';}?>>I/b</option>
          <option value="i/a" <?php if ($gol=='i/a')  {echo 'selected';}?>>I/a</option>
      </select></td>
    </tr>
    <tr>
      <td height="28">TMT Gol</td>
      <td height="28"><input name="tmtgol" value="<?=date('d/m/Y', strtotime($tmt_gol))?>" type="text" id="tmtgol" size="15" />
      (dd/mm/yyyy)</td>
    </tr>
    <tr>
      <td height="28">Jabatan</td>
      <td height="28"><input name="jabatan" value="<?=$jabatan?>" type="text" id="jabatan" size="40" /></td>
    </tr>
    <tr>
      <td height="28">TMT Jabatan</td>
      <td height="28"><input name="tmtjabatan" value="<?=date('d/m/Y', strtotime($tmt_jabatan))?>" type="text" id="tmtjabatan" size="15" />
(dd/mm/yyyy)</td>
    </tr>
    <tr>
      <td height="28">MK Tahun</td>
      <td height="28"><label for="mktahun"></label>
      <input name="mktahun" type="text" value="<?=$mk_thn?>" id="mktahun" size="5" /></td>
    </tr>
    <tr>
      <td height="28">MK Bulan</td>
      <td height="28"><input name="mkbulan" type="text" value="<?=$mk_bln?>" id="mkbulan" size="5" /></td>
    </tr>
    <tr>
      <td height="28">Pendidikan</td>
      <td height="28"><label for="pendidikan"></label>
        <select name="pendidikan" id="pendidikan">
          <option>--Pendidikan--</option>
          <option value="s3"<?php if ($pendidikan=='s3') {echo 'selected';}?>>S3</option>
          <option value="s2"<?php if ($pendidikan=='s2') {echo 'selected';}?>>S2</option>
          <option value="s1"<?php if ($pendidikan=='s1') {echo 'selected';}?>>S1</option>
          <option value="d3"<?php if ($pendidikan=='d3') {echo 'selected';}?>>D3</option>
          <option value="sma"<?php if ($pendidikan=='sma') {echo 'selected';}?>>SMA/Sederajat</option>
          <option value="smp"<?php if ($pendidikan=='smp') {echo 'selected';}?>>SMP/Sederajat</option>
      </select></td>
    </tr>
    <tr>
      <td height="28">Jurusan</td>
      <td height="28"><input name="jurusan" type="text" value="<?=$jurusan?>" id="jurusan" size="40" /></td>
    </tr>
    <tr>
      <td height="28">Tahun Lulus</td>
      <td height="28"><input name="tahun" type="text" value="<?=$thn_lulus?>" id="tahun" size="10" /></td>
    </tr>
    <tr>
      <td height="28">Status Perkawinan</td>
      <td height="28"><select name="select" id="select">
        <option value="single">Single</option>
        <option value="nikah">Menikah</option>
        <option value="janda">Janda</option>
        <option value="duda">Duda</option>
      </select></td>
    </tr>
    <tr>
      <td height="28">Jumlah Anak</td>
      <td height="28"><input name="jmlanak" type="text" value="<?=$jml_anak?>" id="jmlanak" size="5" /></td>
    </tr>
    <tr>
      <td height="28">Status Pegawai</td>
      <td height="28"><p>
          <input type="radio" name="status_karyawan" value="pns" <?php if ($status_karyawan=='pns') {echo'checked';}?> />
          <label for="status_karyawan">PNS</label>
        <br />
         <input type="radio" name="status_karyawan" value="cpns" <?php if ($status_karyawan=='cpns') {echo'checked';}?> />
          <label for="status_karyawan">CPNS</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td height="28">No.Karpeg</td>
      <td height="28"><label for="karpeg"></label>
      <input name="karpeg" type="text" value="<?=$no_karpeg?>" id="karpeg" size="10" /></td>
    </tr>
    <tr>
      <td height="28">Status</td>
      <td height="28"><input name="radio" type="radio" id="Aktif" value="Aktif" checked="checked" />
      <label for="Aktif">Aktif
        <input type="radio" name="radio" id="Tidak_aktif" value="Tidak_aktif" />
      Tidak Aktif</label></td>
    </tr>
    <tr>
      <td height="28">&nbsp;</td>
      <td height="28"><input type="submit" name="simpan" id="simpan" value="Simpan" />
      <input type="submit" name="batal" id="batal" value="Batal" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
