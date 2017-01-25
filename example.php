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
	<div class="row">
		<div class="col-sm-2">
			<img width="60" height="70" src="images/logokendal.jpg" class="img-responsive" alt="">
		</div>
		<div class="col-sm-8">
			<h3 class="title-header">Daftar Pegawai Nominatif</h3>
			<h3 class="title-header">Badan Pemberdayaan Perempuan dan Keluarga berencana kabupaten Kendal</h3>
		</div>
		<div class="col-sm-2">
			<img width="60" height="70" src="images/logo-kb.jpg" class="img-responsive" alt="">
		</div>

	</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <h2 class="title-header">Header</h2>

                

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
?>