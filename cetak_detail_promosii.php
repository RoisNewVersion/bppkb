<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak detail karyawan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<style type="text/css">
		.body-msg{
			font-family: helvetica;
			font-size: 18px; 
		}
		.tabel-nama{
			margin-left: 25px;
			margin-right: 25px;
			/*width: 100%;*/
		}
		
		td{
			padding: 0 10px 0 10px;
		}
	</style>
</head>
<body onload="">
	<?php 
	include 'system/fungsi.php';
	$app = new Core();
	// $app->check_session('admin');
	$id = $_GET['id'];
	?>
	<?php
		$app->con->join('tabel_karyawan k', 'k.id_karyawan=p.id_karyawan', 'LEFT');
		$app->con->join('tabel_gol g', 'k.id_gol=g.id_gol', 'LEFT');
		$app->con->where('p.id_promosi', $id);
		$data = $app->con->get('tabel_promosi p', null, 'p.*, k.nama_karyawan, k.nip, k.jabatan, g.gol');
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
	 ?>
	<div id="page-content-wrapper">
		<div class="row">
			<table width="100%">
				<tr>
					<td><img width="80" height="90" src="images/logokendal.jpg" class="img-responsive" alt=""></td>
					<td>
						<h3 class="title-header">Data Pegawai Promosi Jabatan</h3>
						<h3 class="title-header">Badan Pemberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal</h3>
                    <h4 class="title-header">Jl. Soekarno hatta Kotak Pos 107 Tlp/Fax (0294)381143</h4>
					</td>
					<td><img width="80" height="90" src="images/logo-kb.jpg" class="img-responsive" alt=""></td>
				</tr>
			</table>
		</div>
		<hr>

	<center>
		<h4 style="margin-bottom: 0px;"><u>SURAT PERINTAH</u></h4>
		<p style="margin-top: 0px;">Nomor : 824.3/........../BPPKB</p>
	</center>

	<p class="body-msg">Surat Perintah dari Sekertaris Daerah Kabupaten Kendal Nomor ........../......./......., tanggal ................</p>

	<p class="body-msg">Yang bertanda tangan dibawah ini :</p>

	<table class="body-msg tabel-nama">
		<tr>
			<td>Nama </td>
			<td>:</td>
			<td>Ir. DIAH ANING BUDIARTI, M.Si</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>Kepala Badan Pemberdayaan Perempuan dan Keluarga Berenca Kabupaten Kendal</td>
		</tr>
	</table>

	<br><h3 class="title-header">MEMERINTAHKAN : </h3><br>

	<table class="body-msg tabel-nama">
		<tr>
			<td>Nama </td>
			<td>:</td>
			<td><?= $data[0]['nama_karyawan'] ?></td>
		</tr>
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><?= $data[0]['nip'] ?></td>
		</tr>
		<tr>
			<td>Pangkat Gol./Ruang</td>
			<td>:</td>
			<td> <?= $data[0]['gol'] ?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?= $data[0]['jabatan'] ?></td>
		</tr>
	</table>
	<br>

	<p class="body-msg">Melaksanakan Tugas sebagai Staf di Sekertariat Badan PEmberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal.</p>

	<p class="body-msg">Terhitung mulai ditetepkannya surat perintah.</p>

	<p class="body-msg">Demikian Surat Perintah ini dibuat, agar dilaksanakan dengan sebaik - baiknya dan bertanggung jawab</p>

	<div  style="float: right; margin: 2px;">
	<table class="hea">
		<tr><td>Ditetapkan di Kendal</td></tr>
		<tr><td>pada tanggal .....,.......................2017</td></tr>
	</table>
	<br>
	<table class="title-header">
		<tr><td>Kepala Badan Pemberdayaan Perempuan</td></tr>
		<tr><td> dan Keluarga Berencana</td></tr>
	</table>
	<br><br><br><br><br>
	<table class="title-header">
		<tr><td><u>Ir. DIAH ANING BUDIARTI, M.Si</u></td></tr>
		<tr><td>Pembina Utama Muda</td></tr>
		<tr><td>19601220 198108 2 001</td></tr>
	</table>
	</div>
</div>
</body>
<script >
	function cetak() {
		window.print();
	}
</script>
</html> 