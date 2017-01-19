<?php require_once('Connections/sambung.php'); ?>
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

mysql_select_db($database_sambung, $sambung);
$query_mutasi = "SELECT * FROM tabel_mutasi";
$mutasi = mysql_query($query_mutasi, $sambung) or die(mysql_error());
$row_mutasi = mysql_fetch_assoc($mutasi);
$totalRows_mutasi = mysql_num_rows($mutasi);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Promosi Pegawai</title>
<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">
</head>

<body>
<table width="100%"  cellspacing="0" cellpadding="0">
  <tr>
    <td width="21%" rowspan="3">&nbsp;</td>
    <td width="55%" height="25"><h3 align="center">Kantor Pemerintahan Daerah </h3></td>
    <td width="24%" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="32"><div align="center"><strong>Badan Pemberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal</strong></div></td>
  </tr>
  <tr>
    <td height="43"><div align="center"><strong>DATA PROMOSI JABATAN PEGAWAI</strong></div></td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="7%" rowspan="2"><div align="center">No SK</div></td>
      <td width="10%" rowspan="2"><div align="center">NIP</div></td>
      <td width="17%" rowspan="2"><div align="center">Nama Karyawan</div></td>
      <td colspan="2"><div align="center">Golongan</div></td>
      <td colspan="2"><div align="center">Instansi</div></td>
      <td colspan="2"><div align="center">Diklat</div></td>
      <td width="6%" rowspan="2"><div align="center">TMT baru</div>        <div align="center"></div></td>
      <td colspan="2" rowspan="2"><div align="center"></div>        <div align="center"></div>
      <div align="center"></div>        <div align="center"></div></td>
    </tr>
    <tr>
      <td width="9%"><div align="center">Lama</div></td>
      <td width="10%"><div align="center">Baru</div></td>
      <td width="12%"><div align="center">Lama</div></td>
      <td width="6%"><div align="center">Baru</div></td>
      <td width="9%"><div align="center">Fungsional</div></td>
      <td width="8%"><div align="center">Struktural</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="3%">&nbsp;</td>
      <td width="3%">&nbsp;</td>
    </tr>
  </table>
  </table>
</form>
<h3 align="left">&nbsp;</h3>
</body>
</html>
<?php
mysql_free_result($mutasi);
?>
