<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Laporan Karyawan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body onload="cetak();">
<?php 
include 'system/fungsi.php';
$app = new Core();
?>
<div id="page-content-wrapper">
	<div class="row">
		<table width="100%">
			<tr>
				<td><img width="70" height="80" src="images/logokendal.jpg" class="img-responsive" alt=""></td>
				<td>
					<h3 class="title-header">Data Pegawai Nominatif</h3>
					<h3 class="title-header">Badan Pemberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal</h3>
            		<h4 class="title-header">Jl. Soekarno hatta Kotak Pos 107 Tlp/Fax (0294)381143</h4>
				</td>
				<td><img width="70" height="80" src="images/logo-kb.jpg" class="img-responsive" alt=""></td>
			</tr>
		</table>
	</div>
	<br>
	<table id="isi" class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<!-- <th>Golongan</th> -->
				<!--  -->
				<th>Tmpt. lahir</th>
				<th>Tgl. lahir</th>
				<th>Agama</th>
				<th>JK</th>
				<th>Jabatan</th>
				<!-- <th>Status Nikah</th> -->
				<!-- <th>JML Anak</th> -->
				<!-- <th>Status Kary.</th> -->
				<!-- <th>Pendidikan</th> -->
				<!-- <th>Thn Lulus</th> -->
				<!-- <th>No. Karpeg</th> -->
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
                            // $karyawans = $app->con->get('tabel_karyawan');
			$app->con->join('tabel_gol g', "k.id_gol=g.id_gol");
			$app->con->join('tb_pendidikan p', "k.pendidikan=p.id_pendidikan");
                            // $app->con->where('k.status_aktif', 'Y');
			$karyawans = $app->con->get('tabel_karyawan k', null, 'k.*, g.gol, p.pendidikan');

			foreach ($karyawans as $karyawan) { ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $karyawan['nip'] ?></td>
				<td><?= $karyawan['nama_karyawan']?></td>
				<td><?= $karyawan['tmp_lahir'] ?> </td>
				<td><?= date('d-m-Y', strtotime($karyawan['tgl_lahir']))  ?></td>
				<td><?= $karyawan['agama'] ?></td>
				<td><?= $karyawan['jk'] ?></td>
				<td><?= $karyawan['jabatan'] ?></td>
				<td><?= $karyawan['status_aktif'] == 'Y' ? 'Aktif' : 'Tdk aktif'  ?></td>
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