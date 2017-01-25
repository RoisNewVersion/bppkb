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
                    <h3 class="title-header">Kantor Pemerintahan Daerah</h3>
                    <h3 class="title-header">Badan Pemberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal</h3>
                </div>
                <div class="col-sm-2">
                    <img width="60" height="70" src="images/logo-kb.jpg" class="img-responsive" alt="">
                </div>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <hr>
                        <h2 class="title-header">Daftar Mutasi Pegawai</h2>
                        <a class="btn btn-primary btn-sm tambah" href="tambah_mutasi.php">Tambah <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>NIP</th>
                                    <th>Nama Karyawan</th>
                                    <th>Dinas lama</th>
                                    <th>Dinas baru</th>
                                    <th>TMT baru</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            // $mutasis = $app->con->get('tabel_mutasi');
                            $app->con->join('tabel_karyawan k', "m.id_karyawan=k.id_karyawan", "LEFT");
                            $app->con->join('tabel_instansi i', "m.dinas_lama=i.id_instansi", "LEFT");
                            $app->con->join('tabel_instansi i2', 'm.dinas_baru=i2.id_instansi', "LEFT");
                            // $app->con->where('k.status_aktif', 'Y');
                            $mutasis = $app->con->get('tabel_mutasi m', null, 'm.id_mutasi ,m.no_surat, m.tmt_baru, k.nip, k.nama_karyawan, i.nama_ins as dinas_lama, i2.nama_ins as dinas_baru');
                            // echo '<pre>';
                            // print_r($mutasis);
                            // echo '</pre>';
                            // die();
                            foreach ($mutasis as $mutasi) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $mutasi['no_surat'] ?></td>
                                    <td><?= $mutasi['nip']?></td>
                                    <td><?= $mutasi['nama_karyawan'] ?></td>
                                    <td><?= $mutasi['dinas_lama'] ?></td>
                                    <td><?= $mutasi['dinas_baru'] ?> </td>
                                    <td><?= $mutasi['tmt_baru'] ?> </td>
                                    
                                    <th>
                                        <a title="Edit" class="btn btn-info btn-xs" href="cetak_mutasi.php?id=<?= $mutasi['id_mutasi']?> ">Cetak <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <!-- <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus_master.php?type=mutasi&id=<?= $mutasi['id_mutasi']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
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