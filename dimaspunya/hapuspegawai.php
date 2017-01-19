<?php require_once('Connections/sambung.php'); ?>
<?php
if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
// membaca nama file yang akan dihapus
$query   = "SELECT * FROM tabel_karyawan WHERE nip='$nip'";
$hasil   = mysql_query($query);
}
else {
	die ("Error. Tidak ada Nip yang dipilih Silakan cek kembali! ");	
}
//proses hapus data
	if (!empty($nip) && $nip != "") {
		$hapus = "DELETE FROM data_karyawan WHERE nip='$nip'";
		$sql = mysql_query ($hapus);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Seluruh Data Karyawan <?=$nip?> Berhasil dihapus!');
				document.location='index.php?page=lihat';
				</script>
			<?		
		} else {
			echo "<h2><font color=red><center>Data Karyawan gagal dihapus</center></font></h2>";	
		}
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
?>