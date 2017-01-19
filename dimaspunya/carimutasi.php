<html>
<head>
<title>Mutasi NIP Pegawai</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<?php require_once('Connections/sambung.php'); ?>
<?php
//cek nip
if (isset($_GET['nip'])) {
	if ($_GET['nip'] != '') {
	$nip = $_GET['nip'];
	mysql_select_db($database_sambung, $sambung);
	$query_mutasi = "SELECT * FROM tabel_karyawan WHERE nip ='$nip'";
	$mutasi = mysql_query($query_mutasi, $sambung) or die(mysql_error());
	$t = mysql_fetch_assoc($mutasi);
	$nip = $t ['nip'];
	$nama_karyawan = $t['nama_karyawan'];
	if(empty($t)) {
		echo 'NIP tidak ditemukan';
	}
	$totalRows_mutasi = mysql_num_rows($mutasi);
	} else {
		die ("Error. Tidak ada NIP yang dipilih Silakan cek kembali! ");	
	}
} else {
	
}

?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="bgform">
    <form method="GET" action="">
    <table>
        <tr>
          <td><label>
            <input name="nip" type="text" placeholder="NIP Pegawai" id="nip" size="40" maxlength="23" />
            <input class="btn btn-default" type="submit" name="Submit" value="Cari" />
          </label></td>
        </tr>
    </table>
	</form>
	<?php if(!empty($t)): ?>
	<form id="karyawan" id="form-karyawan" name="karyawan" method="post" enctype="multipart/form-data" >
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td colspan="2" align="center" class="judulform">Isi Data Karyawan Mutasi</td>
          </tr>
        <tr>
          <td width="44%">&nbsp;</td>
          <td width="56%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="error"><? echo $_GET[err]; ?></td>
          </tr>
        <tr>
          <td class="labelform">No Surat</td>
          <td><label>
            <input name="no_surat" type="text" id="no_surat" size="20" <? echo "value='$t[no_surat]'"; ?> readonly="" />
          </label></td>
        </tr>
        <tr>
          <td class="labelform">NIP </td>
          <td><label>
            <input name="nip" type="text" disabled="disabled" id="nip" size="50" value="<?=$t['nip']?>"/>
          </label></td>
        </tr>
        <tr>
          <td class="labelform">NAMA PEGAWAI</td>
          <td><input name="nama_karyawan" type="text" disabled="disabled" id="nama_karyawan" size="50" value="<?=$t['nama_karyawan'] ?>"/></td>
        </tr>
        <tr>
          <td class="labelform">INSTANSI LAMA</td>
          <td><input name="instansi_lama" value="BPPKB Kab Kendal" type="text" disabled="disabled" id="instansi_lama" size="50"<? echo "value='$t[alamat_domisili]'"; ?> /></td>
        </tr>
        <tr>
          <td class="labelform">INSTANSI BARU</td>
          <td><input name="instansi_baru" type="text" id="instansi_baru" size="50" <? echo "value='$t[instansi_baru]'"; ?>/></td>
        </tr>
        <tr>
          <td class="labelform">TMT BARU</td>
          <td><input name="tmt_baru" type="text" id="tmt_baru" size="50" <? echo "value='$t[tmt_baru]'"; ?> /></td>
        </tr>
		<tr>
          <td width="44%">&nbsp;</td>
          <td width="56%">&nbsp;</td>
        </tr>
		        <tr>
          <td colspan="2" class="labelform" align="right"><label>
            <input type="submit" align="center" class="btn btn-default" name="Submit" id="submit" value="Simpan" />
          </label>
            <label>
            <input type="button" align="center" class="btn btn-default" name="Submit2" value="Batal" onclick="location.href='<? echo $alamat; ?>'" />
            </label></td>
          </tr>
		</table>
</form>
<?php
if(isset($_GET['Submit'])) {
	$query_mutasi = "INSERT INTO tabel_mutasi (no_surat,nip,nama_karyawan,dinas_lama,dinas_baru,tmt_baru) VALUE ('$_GET')";
	mys$query_mutasi, $sambung) or die(mysql_error());
}
?>
<?php endif; ?>		
		  <script src="jquery.js" />
</body>
</html>