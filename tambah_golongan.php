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
				<h2 class="title-header">Form Tambah Golongan</h2>

				<form action="proses_golongan.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="tambah">

					<div class="form-group">
						<label for="tmt_jabatan" class="col-sm-2 control-label">TMT Jabatan</label>
						<div class="col-sm-4">
							<input type="text" name="tmt_jabatan" class="form-control tgl" id="tmt_jabatan" placeholder="TMT Jabatan" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="gol" class="col-sm-2 control-label">Golongan</label>
						<div class="col-sm-4">
							<input type="text" name="gol" class="form-control" id="gol" placeholder="Golongan" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="tmt_gol" class="col-sm-2 control-label">TMT Golongan</label>
						<div class="col-sm-4">
							<input type="text" name="tmt_gol" class="form-control tgl" id="tmt_gol" placeholder="TMT Golongan" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="mk_thn" class="col-sm-2 control-label">MK Tahun</label>
						<div class="col-sm-4">
							<input type="text" name="mk_thn" class="form-control" id="mk_thn" placeholder="MK Tahun" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="mk_bln" class="col-sm-2 control-label">MK Bulan</label>
						<div class="col-sm-4">
							<input type="text" name="mk_bln" class="form-control" id="mk_bln" placeholder="MK Bulan" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="golongan.php" class="btn btn-primary">Batal</a>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('.tgl').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
		    changeYear: true
		});
	});
</script>