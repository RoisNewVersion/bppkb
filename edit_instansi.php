<?php 
session_start();
include 'layout/header.php';
include 'layout/menu.php';
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

$id = $_GET['id'];
$app->con->where('id_instansi', $id);
$data = $app->con->getOne('tabel_instansi');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title-header">Form Edit Instansi</h2>

				<form action="proses_instansi.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="edit">
					<input type="hidden" name="id_instansi" value="<?= $data['id_instansi'] ?>">

					<div class="form-group">
						<label for="nama_instansi" class="col-sm-2 control-label">Nama Instansi</label>
						<div class="col-sm-4">
							<input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Nama Instansi" value="<?= $data['nama_ins'] ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="kota" class="col-sm-2 control-label">Kota</label>
						<div class="col-sm-4">
							<input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" value="<?= $data['kota'] ?>" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Edit</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
?>