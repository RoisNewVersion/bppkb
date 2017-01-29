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
                        <h2 class="title-header">Data Pegawai Promosi Jabatan</h2>
                        <a class="btn btn-primary btn-sm tambah" href="tambah_promosi.php">Tambah <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">No SK</th>
                                    <th class="text-center" rowspan="2">NIP</th>
                                    <th class="text-center" rowspan="2">Nama Karyawan</th>
                                    <th class="text-center" colspan="2">Golongan</th>
                                    <th class="text-center" colspan="2">Jabatan</th>
                                    <th class="text-center" colspan="2">TMT</th>
                                    <th class="text-center" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Lama</th>
                                    <th class="text-center">Baru</th>
                                    <th class="text-center">Lama</th>
                                    <th class="text-center">Baru</th>
                                    <th class="text-center">Golongan baru</th>
                                    <th class="text-center">Jabatan baru</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            // $mutasis = $app->con->get('tabel_mutasi');
                            $app->con->join('tabel_karyawan k', "p.id_karyawan=k.id_karyawan", "LEFT");
                            $app->con->join('tabel_gol g', "p.gol_lama=g.id_gol", "LEFT");
                            $app->con->join('tabel_gol g2', 'p.gol_baru=g2.id_gol', "LEFT");
                            // $app->con->where('k.status_aktif', 'Y');
                            $mutasis = $app->con->get('tabel_promosi p', null, 'p.*, k.nip, k.nama_karyawan, g.gol as gol_lama, g2.gol as gol_baru');
                            // echo '<pre>';
                            // print_r($mutasis);
                            // echo '</pre>';
                            // die();
                            foreach ($mutasis as $mutasi) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $mutasi['no_sk'] ?></td>
                                    <td><?= $mutasi['nip']?></td>
                                    <td><?= $mutasi['nama_karyawan'] ?></td>
                                    <td><?= $mutasi['gol_lama'] ?></td>
                                    <td><?= $mutasi['gol_baru'] ?> </td>
                                    <td><?= $mutasi['jabatan_lama'] ?> </td>
                                    <td><?= $mutasi['jabatan_baru'] ?> </td>
                                    <td><?= $mutasi['tmt_gol_baru'] ?> </td>
                                    <td><?= $mutasi['tmt_jabatan_baru'] ?> </td>
                                    <th>
                                        <a title="Edit" class="btn btn-info btn-xs" href="cetak_mutasi.php?id=<?= $mutasi['id_mutasi']?> ">Cetak <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus_master.php?type=mutasi&id=<?= $mutasi['id_mutasi']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </th>
                                </tr>
                            <?php $no++;
                             } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="cetak_nominatif()">Cetak Laporan</button>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<?php 
include 'layout/footer.php'
 ?>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#tabelku').DataTable();
    });
</script>