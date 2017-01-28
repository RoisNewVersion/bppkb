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
                        <h2 class="title-header">Daftar Pegawai</h2>
                        <a class="btn btn-primary btn-sm tambah" href="tambah_karyawan.php">Tambah <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        <table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Golongan</th>
                                    <th>Jabatan</th>
                                    <th>TTL</th>
                                    <th>Agama</th>
                                    <th>JK</th>
                                    <th>Status Nikah</th>
                                    <th>JML Anak</th>
                                    <th>Status Kary.</th>
                                    <th>Pendidikan</th>
                                    <th>Thn Lulus</th>
                                    <th>No. Karpeg</th>
                                    <th>Status</th>
                                    <th>Keteragan</th>
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
                                    <td><?= $karyawan['gol'] ?></td>
                                    <td><?= $karyawan['jabatan'] ?></td>
                                    <td><?= $karyawan['tmp_lahir'] .', '.date('d-m-Y', strtotime($karyawan['tgl_lahir'])) ?> </td>
                                    <td><?= $karyawan['agama'] ?></td>
                                    <td><?= $karyawan['jk'] ?></td>
                                    <td><?= $karyawan['status_nikah'] ?></td>
                                    <td><?= $karyawan['jml_anak'] ?></td>
                                    <td><?= $karyawan['status_karyawan'] ?></td>
                                    <td><?= $karyawan['pendidikan'] ?></td>
                                    <td><?= $karyawan['thn_lulus'] ?></td>
                                    <td><?= $karyawan['no_karpeg'] ?></td>
                                    <td><?= $karyawan['keterangan'] ?></td>
                                    <th>
                                        <a title="Edit" class="btn btn-info btn-xs" href="edit_karyawan.php?id=<?= $karyawan['id_karyawan']?> ">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus_master.php?type=karyawan&id=<?= $karyawan['id_karyawan']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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