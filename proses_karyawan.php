<?php
session_start();
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

// ambil inputan
$type = $_POST['type'];
// jika tambah disable status & keterangan
if ($type == 'tambah') {
	$status_aktif = 'Y';
	$keterangan = 'baru';
} else {
	$status_aktif = $_POST['status_aktif'];
	$keterangan = $_POST['keterangan'];
}
// jadikan inputan jd array
$dataInput = array(
	'nip'=>$_POST['nip'],
	'nama_karyawan'=>strtoupper($_POST['nama']),
	'jabatan'=>ucwords($_POST['jabatan']),
	'id_gol'=>$_POST['id_gol'],
	'tmp_lahir'=>strtoupper($_POST['tempat']),
	'tgl_lahir'=>date('Y-m-d', strtotime($_POST['tgl_lahir'])),
	'agama'=>$_POST['agama'],
	'jk'=>$_POST['jk'],
	'status_nikah'=>$_POST['status_nikah'],
	'jml_anak'=>$_POST['jml_anak'],
	'status_karyawan'=>$_POST['status_karyawan'],
	'pendidikan'=>$_POST['pendidikan'],
	'thn_lulus'=>$_POST['thn_lulus'],
	'no_karpeg'=>$_POST['no_karpeg'],
	'status_aktif'=>$status_aktif,
	'keterangan'=>$keterangan,
	'tmt_jabatan'=>date('Y-m-d', strtotime($_POST['tmt_jabatan'])),
	'tmt_gol'=>date('Y-m-d', strtotime($_POST['tmt_golongan'])),
	'mk_thn'=>strtoupper($_POST['mk_thn']),
	'mk_bln'=>strtoupper($_POST['mk_bln'])
	);

switch ($type) {
	case 'tambah':
		$pesan = $app->con->insert('tabel_karyawan', $dataInput);

		if ($pesan) {
			// echo json_encode(array('pesan'=>"Tambah berhasil", 'type'=>'success'));
			echo "<script>alert('Tambah berhasil')</script>";
			echo "<script>window.location.href='data_nominatif.php'</script>";
		} else {
			// echo json_encode(array('pesan'=>'Gagal '. $db->getLastError(), 'type'=>'error'));
			echo "<script>alert('Tambah gagal')</script>";
			echo "<script>history.back()</script>";
		}
		break;

	case 'edit':
		$id = $_POST['id_karyawan'];
		$app->con->where('id_karyawan', $id);
		$pesan = $app->con->update('tabel_karyawan', $dataInput);
		if ($pesan) {
			echo "<script>alert('Edit berhasil')</script>";
			echo "<script>window.location.href='data_nominatif.php'</script>";
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