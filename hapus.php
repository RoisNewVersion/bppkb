<?php 
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

$id = $_GET['id'];
$type = $_GET['type'];

switch ($type) {

	case 'mutasi':
		$app->con->where('id_mutasi', $id);
		$del = $app->con->delete('tabel_mutasi');
		if ($del) {
			// echo json_encode('Berhasil hapus');
			echo "<script>alert('Hapus berhasil')</script>";
			echo "<script>window.location.href='mutasi_pegawai.php'</script>";
		} else {
			// echo json_encode('Gagal hapus');
			echo "<script>alert('Hapus gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;
	case 'instansi':
		$app->con->where('id_instansi', $id);
		$del = $app->con->delete('tabel_instansi');
		if ($del) {
			// echo json_encode('Berhasil hapus');
			echo "<script>alert('Hapus berhasil')</script>";
			echo "<script>window.location.href='instansi.php'</script>";
		} else {
			// echo json_encode('Gagal hapus');
			echo "<script>alert('Hapus gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;
	case 'golongan':
		$app->con->where('id_gol', $id);
		$del = $app->con->delete('tabel_gol');
		if ($del) {
			// echo json_encode('Berhasil hapus');
			echo "<script>alert('Hapus berhasil')</script>";
			echo "<script>window.location.href='golongan.php'</script>";
		} else {
			// echo json_encode('Gagal hapus');
			echo "<script>alert('Hapus gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;
	case 'karyawan':
		$app->con->where('id_karyawan', $id);
		$del = $app->con->delete('tabel_karyawan');
		if ($del) {
			// echo json_encode('Berhasil hapus');
			echo "<script>alert('Hapus berhasil')</script>";
			echo "<script>window.location.href='karyawan.php'</script>";
		} else {
			// echo json_encode('Gagal hapus');
			echo "<script>alert('Hapus gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;
	default:
		echo 'error hapus data';
		break;
}

?>