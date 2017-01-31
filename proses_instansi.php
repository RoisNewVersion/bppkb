<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
$type = $_POST['type'];

// jadikan inputan jd array
$dataInput = array(
	'nama_ins'=>strtoupper($_POST['nama_instansi']),
	'kota'=>strtoupper($_POST['kota']),
	'alamat'=>ucwords($_POST['alamat'])
	);

switch ($type) {
	case 'tambah':
		$pesan = $app->con->insert('tabel_instansi', $dataInput);

		if ($pesan) {
			// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
			echo "<script>alert('Tambah berhasil')</script>";
			echo "<script>window.location.href='instansi.php'</script>";
		} else {
			// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
			echo "<script>alert('Tambah gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;

	case 'edit':
		$id = $_POST['id_instansi'];
		$app->con->where('id_instansi', $id);
		$pesan = $app->con->update('tabel_instansi', $dataInput);
		if ($pesan) {
			echo "<script>alert('Edit berhasil')</script>";
			echo "<script>window.location.href='instansi.php'</script>";
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