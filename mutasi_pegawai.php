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
                                    <th class="text-center" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">No Surat</th>
                                    <th class="text-center" rowspan="2">NIP</th>
                                    <th class="text-center" rowspan="2">Nama Karyawan</th>
                                    <th class="text-center" colspan="2">Instansi</th>
                                    <th class="text-center" rowspan="2">TMT baru</th>
                                    <th class="text-center" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Dinas lama</th>
                                    <th class="text-center">Dinas baru</th>
                                </tr>
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
                                        <a onclick="cetak_detail_mutasi('<?= $mutasi['id_mutasi'] ?>');" title="Cetak" class="btn btn-info btn-xs">Cetak <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a title="Hapus" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" href="hapus.php?type=mutasi&id=<?= $mutasi['id_mutasi']?> ">Hapus <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    </th>
                                </tr>
                            <?php $no++;
                             } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="cetak_laporan_mutasi()">Cetak Laporan</button>
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
    function cetak_laporan_mutasi() {
        var left = (screen.width/2) - (800/2);
        var right = (screen.height/2) - (640/2);

        var url = 'cetak_mutasi.php';

        window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
    }

    function cetak_detail_mutasi(r) {
        var left = (screen.width/2) - (800/2);
        var right = (screen.height/2) - (640/2);

        var url = 'cetak_detail_mutasi.php?id='+r;

        window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
    }
</script>