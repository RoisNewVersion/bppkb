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
                        <h2 class="title-header">Daftar Instansi</h2>
                        <a class="btn btn-primary btn-sm tambah" href="tambah_instansi.php">Tambah <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            $instansis = $app->con->get('tabel_instansi');
                            foreach ($instansis as $instansi) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $instansi['nama_ins'] ?></td>
                                    <td><?= $instansi['kota']?></td>
                                    <th>
                                        <a title="Edit" class="btn btn-info btn-xs" href="edit_instansi.php?id=<?= $instansi['id_instansi']?> ">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus_master.php?type=instansi&id=<?= $instansi['id_instansi']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </th>
                                </tr>
                            <?php $no++;
                             } ?>
                            </tbody>
                        </table>
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
        $('#tabelku').DataTable();
    });
</script>