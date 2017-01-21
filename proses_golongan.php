<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
$type = $_POST['type'];

// jadikan inputan jd array
$dataInput = array(
	'tmt_jabatan'=>$_POST['tmt_jabatan'],
	'gol'=>strtoupper($_POST['gol']),
	'tmt_gol'=>$_POST['tmt_gol'],
	'mk_thn'=>strtoupper($_POST['mk_thn']),
	'mk_bln'=>strtoupper($_POST['mk_bln'])
	);

switch ($type) {
	case 'tambah':
		$pesan = $app->con->insert('tabel_gol', $dataInput);

		if ($pesan) {
			// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
			echo "<script>alert('Tambah berhasil')</script>";
			echo "<script>window.location.href='golongan.php'</script>";
		} else {
			// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
			echo "<script>alert('Tambah gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;

	case 'edit':
		$id = $_POST['id_gol'];
		$app->con->where('id_gol', $id);
		$pesan = $app->con->update('tabel_gol', $dataInput);
		if ($pesan) {
			echo "<script>alert('Edit berhasil')</script>";
			echo "<script>window.location.href='golongan.php'</script>";
			// echo json_encode(array('pesan'=>"Edit berhasil", 'type'=>'success'));
		} else {
			echo "<script>alert('Edit gagal')</script>";
			echo "<script>history.back()</script>";
			// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
		}
		break;
	
	default:
		echo 'Gagal, error tidak diketahui ';
		break;
}
 ?>