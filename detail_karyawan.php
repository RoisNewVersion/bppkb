<?php 
session_start();
include 'layout/header.php';
include 'layout/menu.php';
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

$id = $_GET['detail'];
// $app->con->where('id_karyawan', $id);
// $data = $app->con->getOne('tabel_karyawan');
$app->con->join('tabel_gol g', "k.id_gol=g.id_gol");
$app->con->join('tb_pendidikan p', "k.pendidikan=p.id_pendidikan");
$app->con->where('k.id_karyawan', $id);
$karyawan = $app->con->getOne('tabel_karyawan k', null, 'k.*, g.gol, p.pendidikan');

?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="row">
		<div class="col-sm-2">
			<img width="60" height="70" src="images/logokendal.jpg" class="img-responsive" alt="">
		</div>
		<div class="col-sm-8">
			<h3 class="title-header">Detail Pegawai Nominatif</h3>
		</div>
		<div class="col-sm-2">
			<img width="60" height="70" src="images/logo-kb.jpg" class="img-responsive" alt="">
		</div>

	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<hr>
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table">
							<tr>
								<td>NIP</td>
								<td>:</td>
								<td><?= $karyawan['nip'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $karyawan['nama_karyawan'] ?></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td>:</td>
								<td><?= $karyawan['tmp_lahir'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td>:</td>
								<td><?= $karyawan['tgl_lahir'] ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td><?= $karyawan['agama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td><?= $karyawan['jk'] ?></td>
							</tr>
							<tr>
								<td>Gol/Ru</td>
								<td>:</td>
								<td><?= $karyawan['gol'] ?></td>
							</tr>
							<tr>
								<td>Tmt Golongan</td>
								<td>:</td>
								<td><?= $karyawan['tmt_gol'] ?></td>
							</tr>
							<tr>
								<td>Jabatan</td>
								<td>:</td>
								<td><?= $karyawan['jabatan'] ?></td>
							</tr>
							<tr>
								<td>TMT jabatan</td>
								<td>:</td>
								<td><?= $karyawan['tmt_jabatan'] ?></td>
							</tr>
							<tr>
								<td>MK Tahun</td>
								<td>:</td>
								<td><?= $karyawan['mk_thn'] ?></td>
							</tr>
							<tr>
								<td>MK Bulan</td>
								<td>:</td>
								<td><?= $karyawan['mk_bln'] ?></td>
							</tr>
							<tr>
								<td>Pendidikan</td>
								<td>:</td>
								<td><?= $karyawan['pendidikan'] ?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td>:</td>
								<td><?= $karyawan['jurusan'] ?></td>
							</tr>
							<tr>
								<td>Tahun Lulus</td>
								<td>:</td>
								<td><?= $karyawan['thn_lulus'] ?></td>
							</tr>
							<tr>
								<td>Status Perkawinan</td>
								<td>:</td>
								<td><?= $karyawan['status_nikah'] ?></td>
							</tr>
							<tr>
								<td>Jumlah Anak</td>
								<td>:</td>
								<td><?= $karyawan['jml_anak'] ?></td>
							</tr>
							<tr>
								<td>Status Pegawai</td>
								<td>:</td>
								<td><?= $karyawan['status_karyawan'] ?></td>
							</tr>
							<tr>
								<td>No Karpeg</td>
								<td>:</td>
								<td><?= $karyawan['no_karpeg'] ?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td>:</td>
								<td><?= $karyawan['status_aktif'] == 'Y' ? 'Aktif' : 'Tdk aktif'?></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td>:</td>
								<td><?= $karyawan['keterangan'] ?></td>
							</tr>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
?>