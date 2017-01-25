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
                        <h2 class="title-header">Daftar Pegawai</h2>
                        <a class="btn btn-primary btn-sm tambah" href="tambah_karyawan.php">Tambah <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <!-- <th>Golongan</th> -->
                                    <!--  -->
                                    <th>Tmpt. lahir</th>
                                    <th>Tgl. lahir</th>
                                    <th>Agama</th>
                                    <th>JK</th>
                                    <th>Jabatan</th>
                                    <!-- <th>Status Nikah</th> -->
                                    <!-- <th>JML Anak</th> -->
                                    <!-- <th>Status Kary.</th> -->
                                    <!-- <th>Pendidikan</th> -->
                                    <!-- <th>Thn Lulus</th> -->
                                    <!-- <th>No. Karpeg</th> -->
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            // $karyawans = $app->con->get('tabel_karyawan');
                            $app->con->join('tabel_gol g', "k.id_gol=g.id_gol");
                            $app->con->join('tb_pendidikan p', "k.pendidikan=p.id_pendidikan");
                            // $app->con->where('k.status_aktif', 'Y');
                            $karyawans = $app->con->get('tabel_karyawan k', null, 'k.*, g.gol, p.pendidikan');
                            
                            foreach ($karyawans as $karyawan) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $karyawan['nip'] ?></td>
                                    <td><?= $karyawan['nama_karyawan']?></td>
                                    <td><?= $karyawan['tmp_lahir'] ?> </td>
                                    <td><?= $karyawan['tgl_lahir'] ?></td>
                                    <td><?= $karyawan['agama'] ?></td>
                                    <td><?= $karyawan['jk'] ?></td>
                                    <td><?= $karyawan['jabatan'] ?></td>
                                    <td><?= $karyawan['status_aktif'] == 'Y' ? 'Aktif' : 'Tdk aktif'  ?></td>
                                    <td>
                                        <a title="Edit" class="btn btn-success btn-xs" href="detail_karyawan.php?detail=<?= $karyawan['id_karyawan']?> ">Detail <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a title="Edit" class="btn btn-info btn-xs" href="edit_karyawan.php?id=<?= $karyawan['id_karyawan']?> ">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus_master.php?type=karyawan&id=<?= $karyawan['id_karyawan']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </td>
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