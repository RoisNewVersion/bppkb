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
            <h2 class="title-header">Form Tambah Mutasi</h2>
	            <form action="" method="post" class="form-horizontal">
	            	<div class="form-group">
	            		<label class="col-sm-2 control-label" for="nippegawai">NIP Karyawan</label>
	            		<div class="col-sm-3">
	            			<input class="form-control" type="text" id="nippegawai" name="nippegawai" placeholder="NIP Karyawan" required="">
	            		</div>
	            		<button type="submit" name="cari" class="btn btn-primary btn-sm">Cari</button>
	            	</div>
	            </form>
	            <?php 
	            	if (isset($_POST['cari'])) {
	            		$nip = $_POST['nippegawai'];
	            		$app->con->where('nip', $nip);
	            		$data = $app->con->getOne('tabel_karyawan');
	            		if ($data) { ?>
	            			<hr><hr>
		            		<form action="proses_mutasi.php" method="post" class="form-horizontal">
		            			<input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan']?>">
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="nippegawai">NIP Karyawan</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="nippegawai" name="nippegawai" placeholder="NIP Karyawan" value="<?= $data['nip'] ?>" readonly>
		            				</div>
		            			</div>

		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="nama_karyawan">Nama Karyawan</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" value="<?= $data['nama_karyawan'] ?>" readonly>
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="no_surat">No Surat</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="no_surat" name="no_surat" placeholder="No Surat">
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="tmt_baru">TMT Baru</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="tmt_baru" name="tmt_baru" placeholder="TMT Baru">
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="nippegawai">Dinas lama</label>
		            				<div class="col-sm-3">
		            					<select name="dinas_lama" class="form-control">
		            						<?php 
		            							$din = $app->con->get('tabel_instansi', null, array('id_instansi', 'nama_ins'));
		            							foreach ($din as $dinas) {
		            								echo '<option value="'.$dinas['id_instansi'].'">'.$dinas['nama_ins'].'</option>';
		            							}
		            						 ?>
		            					</select>
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="nippegawai">Dinas baru</label>
		            				<div class="col-sm-3">
		            					<select name="dinas_baru" class="form-control">
		            						<?php 
		            							$din = $app->con->get('tabel_instansi', null, array('id_instansi', 'nama_ins'));
		            							foreach ($din as $dinas) {
		            								echo '<option value="'.$dinas['id_instansi'].'">'.$dinas['nama_ins'].'</option>';
		            							}
		            						 ?>
		            					</select>
		            				</div>
		            			</div>
		            			<div class="form-group">
		            			<label class="col-sm-2 control-label" for="nippegawai">Data yang dilampirkan</label>
		            				<div class="col-sm-5">
		            					<input type="checkbox" name="data_terlampir[]" value="surat pindah dari pkk" > Surat pindah dari PPK kabupaten/Kota/Departemen/provinsi asal
		            					
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC SK CPNS legalisir" > FC SK CPNS legalisir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC SK PNS legalisir" > FC SK PNS legalisir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC SK KP terakhir legalisir" > FC SK KP terakhir legalisir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC konversi NIP Legalisir" > FC konversi NIP Legalisir
		            				</div>
		            			</div>
		            			<div class="form-group">
		            			<label class="col-sm-2 control-label" for="nippegawai">Data yang dilampirkan</label>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC Karpeg legalisir" > FC Karpeg legalisir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC Ijazah Legalisir" > FC Ijazah Legalisir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="FC DP3/SKP 2 Tahun terakhir" > FC DP3/SKP 2 Tahun terakhir
		            				</div>
		            				<div class="col-sm-5">
		            					<input class="" type="checkbox" name="data_terlampir[]" value="Surat keterangan tidak pernah dijatuhi hukum disiplin sedang/berat dari pimpinan SKPD asal" > Surat keterangan tidak pernah dijatuhi hukum disiplin sedang/berat dari pimpinan SKPD asal
		            				</div>
		            			</div>

		            			<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-info">Simpan</button>
										<a href="mutasi_pegawai.php" class="btn btn-primary">Batal</a>
									</div>
								</div>
		            		</form>
	            		<?php } else { 
	            			echo '<p class="bg-primary">Tidak ada data yang cocok!</p>';
	            		}
	            	}
	             ?>
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
		$('#tmt_baru').datepicker({
			dateFormat: 'dd-mm-yy',
			chageMonth: true,
			changeYear: true,
		})
	});
</script>