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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_pegawai = 10;
$pageNum_pegawai = 0;
if (isset($_GET['pageNum_pegawai'])) {
  $pageNum_pegawai = $_GET['pageNum_pegawai'];
}
$startRow_pegawai = $pageNum_pegawai * $maxRows_pegawai;

mysql_select_db($database_sambung, $sambung);
$query_pegawai = "SELECT * FROM tabel_karyawan";
if($_GET["status"] != "") {
	$query_pegawai .= " WHERE status = '".$_GET["status"]."'";
}
if($_GET["status"] != "" && $_GET["cari"] != "") {
	$query_pegawai .= " AND nip LIKE '%".$_GET["cari"]."%' OR nama_karyawan LIKE '%".$_GET["cari"]."%'";
} elseif ($_GET["cari"] != ""){
	$query_pegawai .= " WHERE nip LIKE '%".$_GET["cari"]."%' OR nama_karyawan LIKE '%".$_GET["cari"]."%'";
}
$query_limit_pegawai = sprintf("%s LIMIT %d, %d", $query_pegawai, $startRow_pegawai, $maxRows_pegawai);
$pegawai = mysql_query($query_limit_pegawai, $sambung) or die(mysql_error());
$row_pegawai = mysql_fetch_assoc($pegawai);

if (isset($_GET['totalRows_pegawai'])) {
  $totalRows_pegawai = $_GET['totalRows_pegawai'];
} else {
  $all_pegawai = mysql_query($query_pegawai);
  $totalRows_pegawai = mysql_num_rows($all_pegawai);
}
$totalPages_pegawai = ceil($totalRows_pegawai/$maxRows_pegawai)-1;

$queryString_pegawai = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_pegawai") == false && 
        stristr($param, "totalRows_pegawai") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_pegawai = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_pegawai = sprintf("&totalRows_pegawai=%d%s", $totalRows_pegawai, $queryString_pegawai);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Normatif Pegawai</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<form id="form1" name="form1" method="get" action="">
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
    <td height="43"><div align="center"><strong>DATA NORMATIF PEGAWAI</strong></div></td>
  </tr>
</table>
<p>
  <input name="cari" width="20%" type="text" class="form-control" placeholder="NIP atau Nama" id="cari" value="<?php echo $_GET["cari"]; ?>" />
  <div>
  <label>Keterangan:</label>
  <select id="status" name="status">
  <option value="">-- Pilih Status --</option>
  <option value="Aktif">-- Aktif --</option>
  <option value="Tidak Aktif">-- Tidak Aktif --</option>
  </select>
  <button class="btn btn-default"  type="submit"> Filter </button>
   </div>
   <button class="btn btn-default" type="submit"> Tambah Pegawai </button>
</p>

  <table width="100%" height="34" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <th width="10%" height="32" align="center" nowrap="nowrap" bgcolor="#CCCCCC">NIP</th>
      <th width=300 align="center" nowrap="nowrap" bgcolor="#CCCCCC">Nama </th>
      <th width="10%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Tempat lahir</th>
      <th width="11%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Tanggal Lahir</th>
      <th width="7%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Agama</th>
      <th width="6%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Jenis Kelamin</th>
      <th width="2%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Nama Jabatan</th>
       <th width="2%" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Status</th>
      <th colspan="3" align="center" nowrap="nowrap" bgcolor="#CCCCCC">Proses</th>
    </tr>
    <tr>
      <?php do { ?>
        <td width="20" height="32" align="center"><?php echo $row_pegawai['nip']; ?></td>
        <td width="200" align="center"><?php echo $row_pegawai['nama_karyawan']; ?></td>
        <td width="40" align="center"><?php echo $row_pegawai['tmp_lahir']; ?></td>
        <td width="20" align="center"><?php echo date('d/m/Y', strtotime ($row_pegawai['tgl_lahir'])); ?></td>
        <td width="15" align="center"><?php echo $row_pegawai['agama']; ?></td>
        <td width="20" align="center"><?php echo $row_pegawai['jk']; ?></td>
        <td width="100" align="center"><?php echo $row_pegawai['jabatan']; ?></td>
        <td width="100" align="center"><?php echo $row_pegawai['status']; ?></td>
      <td width="60" align="center"><a href="viewpegawai.php?page=detail&nip=<?php echo $row_pegawai['nip']; ?>"><span class="glyphicon glyphicon-list-alt"></span> 
	  <a href="editpegawai.php?page=detail&nip=<?php echo $row_pegawai['nip']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

    </tr>
        <?php } while ($row_pegawai = mysql_fetch_assoc($pegawai)); ?>
  </table>
</form>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
<?php
mysql_free_result($pegawai);
?>
