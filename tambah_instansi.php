<?php 
session_start();
include 'layout/header.php';
include 'layout/menu.php';
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title-header">Form Tambah Instansi</h2>

				<form action="proses_instansi.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="tambah">

					<div class="form-group">
						<label for="nama_instansi" class="col-sm-2 control-label">Nama Instansi</label>
						<div class="col-sm-4">
							<input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Nama Instansi" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="kota" class="col-sm-2 control-label">Kota</label>
						<div class="col-sm-4">
							<input type="text" name="kota" class="form-control" id="kota" placeholder="Kota" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="alamat" class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-4">
							<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="instansi.php" class="btn btn-primary">Batal</a>
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