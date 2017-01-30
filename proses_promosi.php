<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
// jadikan inputan jd array
$dataInput = array(
	'id_karyawan' => $_POST['id_karyawan'],
	'no_sk'=>strtoupper($_POST['no_sk']),
	'gol_lama' => $_POST['gol_lama'],
	'gol_baru' => $_POST['gol_baru'],
	'tmt_gol_baru'=>date('Y-m-d',strtotime($_POST['tmt_gol_baru'])),
	'jabatan_lama'=>ucwords($_POST['jabatan_lama']),
	'jabatan_baru'=>ucwords($_POST['jabatan_baru']),
	'tmt_jabatan_baru'=>date('Y-m-d',strtotime($_POST['tmt_jabatan_baru']))
);

// masukan ke tabel promosi
$cek = $app->con->insert('tabel_promosi', $dataInput);
if ($cek) {
	// update kolom gol dan jabatan di karyawan
	$app->con->where('id_karyawan', $dataInput['id_karyawan']);
	$app->con->update('tabel_karyawan', array('id_gol'=>$dataInput['gol_baru'], 'jabatan'=>$dataInput['jabatan_baru']));
	
	// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
	echo "<script>alert('Tambah berhasil')</script>";
	echo "<script>window.location.href='promosi_karyawan.php'</script>";
} else {
	// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
	echo "<script>alert('Tambah gagal')</script>";
	echo "<script>window.location.href='tambah_promosi.php'</script>";
}
?>