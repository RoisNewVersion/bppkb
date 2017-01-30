<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak detail karyawan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body onload="cetak()">
	<?php 
	include 'system/fungsi.php';
	$app = new Core();
	// $app->check_session('admin');
// $app->con->where('id_karyawan', $id);
// $data = $app->con->getOne('tabel_karyawan');
	?>
	<div id="page-content-wrapper">
		<div class="row">
			<table width="100%">
				<tr>
					<td><img width="60" height="70" src="images/logokendal.jpg" class="img-responsive" alt=""></td>
					<td><h3 class="title-header">Data Pegawai Promosi Jabatan</h3></td>
					<td><img width="60" height="70" src="images/logo-kb.jpg" class="img-responsive" alt=""></td>
				</tr>
			</table>
		</div>
		<br>
		<table id="tabelku" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center" rowspan="2">No</th>
					<th class="text-center" rowspan="2">No SK</th>
					<th class="text-center" rowspan="2">NIP</th>
					<th class="text-center" rowspan="2">Nama Karyawan</th>
					<th class="text-center" colspan="2">Golongan</th>
					<th class="text-center" colspan="2">Jabatan</th>
					<th class="text-center" colspan="2">TMT</th>
				</tr>
				<tr>
					<th class="text-center">Lama</th>
					<th class="text-center">Baru</th>
					<th class="text-center">Lama</th>
					<th class="text-center">Baru</th>
					<th class="text-center">Golongan baru</th>
					<th class="text-center">Jabatan baru</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
                            // $mutasis = $app->con->get('tabel_mutasi');
				$app->con->join('tabel_karyawan k', "p.id_karyawan=k.id_karyawan", "LEFT");
				$app->con->join('tabel_gol g', "p.gol_lama=g.id_gol", "LEFT");
				$app->con->join('tabel_gol g2', 'p.gol_baru=g2.id_gol', "LEFT");
                            // $app->con->where('k.status_aktif', 'Y');
				$mutasis = $app->con->get('tabel_promosi p', null, 'p.*, k.nip, k.nama_karyawan, g.gol as gol_lama, g2.gol as gol_baru');
                            // echo '<pre>';
                            // print_r($mutasis);
                            // echo '</pre>';
                            // die();
				foreach ($mutasis as $mutasi) { ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $mutasi['no_sk'] ?></td>
					<td><?= $mutasi['nip']?></td>
					<td><?= $mutasi['nama_karyawan'] ?></td>
					<td><?= $mutasi['gol_lama'] ?></td>
					<td><?= $mutasi['gol_baru'] ?> </td>
					<td><?= $mutasi['jabatan_lama'] ?> </td>
					<td><?= $mutasi['jabatan_baru'] ?> </td>
					<td><?= $mutasi['tmt_gol_baru'] ?> </td>
					<td><?= $mutasi['tmt_jabatan_baru'] ?> </td>

				</tr>
				<?php $no++;
			} ?>
		</tbody>
	</table>
</div>
</body>
<script >
	function cetak() {
		window.print();
	}
</script>
</html>