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
            <h2 class="title-header">Form Tambah Promosi</h2>
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
		            		<form action="proses_promosi.php" method="post" class="form-horizontal">
		            			<input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan']?>">
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="no_sk">No SK</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="no_sk" name="no_sk" placeholder="No SK">
		            				</div>
		            			</div>
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
		            				<label class="col-sm-2 control-label" for="gol_lama">Golongan lama</label>
		            				<div class="col-sm-3">
		            				<?php
		            				$app->con->where('id_gol', $data['id_gol']);
		            				$gol = $app->con->getOne('tabel_gol');
		            				 ?>
		            				<select name="gol_lama" id="gol_lama" class="form-control" >
		            					<option value="<?= $gol['id_gol'] ?>"><?= $gol['gol'] ?></option>
		            				</select>
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="gol_baru">Golongan baru</label>
		            				<div class="col-sm-3">
		            					<select name="gol_baru" id="gol_baru" class="form-control">
			            					<?php 
			            					$g = $app->con->get('tabel_gol');
			            					foreach ($g as $value) {
			            					 	echo '<option value="'.$value['id_gol'].'">'.$value['gol'].'</option>';
			            					 } ?>
		            						
		            					</select>
		            					
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="tmt_gol_baru">TMT Golongan baru</label>
		            				<div class="col-sm-3">
		            					
		            					<input class="form-control tgl" type="text" id="tmt_gol_baru" name="tmt_gol_baru" placeholder="TMT Golongan baru">
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="jabatan_lama">Jabatan lama</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="jabatan_lama" name="jabatan_lama" placeholder="Jabatan lama" value="<?= $data['jabatan'] ?>" readonly>
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="jabatan_baru">Jabatan baru</label>
		            				<div class="col-sm-3">
		            					<input class="form-control" type="text" id="jabatan_baru" name="jabatan_baru" placeholder="Jabatan baru">
		            				</div>
		            			</div>
		            			<div class="form-group">
		            				<label class="col-sm-2 control-label" for="tmt_jabatan_baru">TMT Jabatan baru</label>
		            				<div class="col-sm-3">
		            					<input class="form-control tgl" type="text" id="tmt_jabatan_baru" name="tmt_jabatan_baru" placeholder="TMT Jabatan baru">
		            				</div>
		            			</div>

		            			<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-info">Simpan</button>
										<a href="promosi_karyawan.php" class="btn btn-primary">Batal</a>
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
		$('.tgl').datepicker({
			dateFormat: 'dd-mm-yy',
			chageMonth: true,
			changeYear: true,
		})
	});
</script>