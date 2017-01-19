
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
                        <h1>DASBOARD BPPKB </h1>
                        <p>iki Contoh gan</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
 ?>