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
	'tmt_baru'=>date('Y-m-d',strtotime($_POST['tmt_baru'])),
	'dinas_lama'=>$_POST['dinas_lama'],
	'dinas_baru'=>$_POST['dinas_baru'],
	'data_terlampir'=>json_encode($_POST['data_terlampir'])
);
// echo '<pre>';
// print_r($dataInput);
// print_r($_POST['data_terlampir']);
// echo ;
// echo '</pre>';
// die();
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