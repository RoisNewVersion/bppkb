<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
$type = $_POST['type'];

// jadikan inputan jd array
$dataInput = array(
	'pendidikan'=>strtoupper($_POST['pendidikan']),
	'jurusan'=>strtoupper($_POST['jurusan'])
	);

switch ($type) {
	case 'tambah':
		$pesan = $app->con->insert('tb_pendidikan', $dataInput);

		if ($pesan) {
			// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
			echo "<script>alert('Tambah berhasil')</script>";
			echo "<script>window.location.href='pendidikan.php'</script>";
		} else {
			// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
			echo "<script>alert('Tambah gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;

	case 'edit':
		$id = $_POST['id_pendidikan'];
		$app->con->where('id_pendidikan', $id);
		$pesan = $app->con->update('tb_pendidikan', $dataInput);
		if ($pesan) {
			echo "<script>alert('Edit berhasil')</script>";
			echo "<script>window.location.href='pendidikan.php'</script>";
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