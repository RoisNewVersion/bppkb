
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
                        <h1 class="title-header">Sistem Pendataan Pegawai Mutasi dan Promosi Jabatan </h1>
                        <br><br>
                        <p>
                            <center><img src="images/kendal.jpg" alt="Kendal" title="Kendal" class="img-responsive"><center>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
 ?>