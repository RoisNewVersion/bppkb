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
				<h2 class="title-header">Form Tambah Pendidikan</h2>

				<form action="proses_pendidikan.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="tambah">

					<div class="form-group">
						<label for="pendidikan" class="col-sm-2 control-label">Pendidikan</label>
						<div class="col-sm-4">
							<input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="Jenjang Pendidikan" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="jurusan" class="col-sm-2 control-label">Jurusan</label>
						<div class="col-sm-4">
							<input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="pendidikan.php" class="btn btn-primary">Batal</a>
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