<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
// jadikan inputan jd array
$dataInput = array(
	'id_karyawan' => $_POST['id_karyawan'],
	'no_surat'=>strtoupper($_POST['no_surat']),
	'tmt_baru'=>strtoupper($_POST['tmt_baru']),
	'dinas_lama'=>$_POST['dinas_lama'],
	'dinas_baru'=>$_POST['dinas_baru']
);
// masukan ke tabel mutasi
$cek = $app->con->insert('tabel_mutasi', $dataInput);
if ($cek) {
	// update status karyawan (Y, N), keterangan = mutasi
	$app->con->where('id_karyawan', $dataInput['id_karyawan']);
	$app->con->update('tabel_karyawan', array('status_aktif'=>'N', 'keterangan'=>'mutasi'));
	// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
	echo "<script>alert('Tambah berhasil')</script>";
	echo "<script>window.location.href='mutasi_pegawai.php'</script>";
} else {
	// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
	echo "<script>alert('Tambah gagal')</script>";
	echo "<script>history.back()</script>";
}
?>