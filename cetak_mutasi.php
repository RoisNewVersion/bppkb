<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Laporan Mutasi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body onload="cetak();">
<?php 
include 'system/fungsi.php';
$app = new Core();
?>
<div id="page-content-wrapper">
	<div class="row">
		<table width="100%">
			<tr>
				<td><img width="60" height="70" src="images/logokendal.jpg" class="img-responsive" alt=""></td>
				<td><h3 class="title-header">Data Mutasi Pegawai</h3></td>
				<td><img width="60" height="70" src="images/logo-kb.jpg" class="img-responsive" alt=""></td>
			</tr>
		</table>
	</div>
	<br>
	<table id="tabelku" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">No Surat</th>
                                    <th class="text-center" rowspan="2">NIP</th>
                                    <th class="text-center" rowspan="2">Nama Karyawan</th>
                                    <th class="text-center" colspan="2">Instansi</th>
                                    <th class="text-center" rowspan="2">TMT baru</th>
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
                                </tr>
                            <?php $no++;
                             } ?>
                            </tbody>
                        </table>
</div>
</body>
<script >
	function cetak() {
		window.print();
	}
</script>
</html>