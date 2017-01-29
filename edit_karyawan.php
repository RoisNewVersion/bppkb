<?php 
session_start();
include 'layout/header.php';
include 'layout/menu.php';
include 'system/fungsi.php';
$app = new Core();
$app->check_session('admin');

$id = $_GET['id'];
$app->con->where('id_karyawan', $id);
$data = $app->con->getOne('tabel_karyawan');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title-header">Form Tambah Karyawan</h2>

				<form action="proses_karyawan.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="edit">
					<input type="hidden" name="id_karyawan" value="<?= $data['id_karyawan'] ?>">

					<div class="form-group">
						<label for="nip" class="col-sm-2 control-label">NIP</label>
						<div class="col-sm-4">
							<input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" required=""  value="<?= $data['nip'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-4">
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required=""  value="<?= $data['nama_karyawan'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
						<div class="col-sm-4">
							<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" required="" value="<?= $data['jabatan'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="id_gol" class="col-sm-2 control-label">Golongan</label>
						<div class="col-sm-4">
							<select name="id_gol" class="form-control" id="id_gol" required="">
								<?php 
								$gol = $app->con->get('tabel_gol', null, array('id_gol', 'gol'));
								foreach($gol as $d){
									if ($data['id_gol'] == $d['id_gol']) {
										echo '<option value="'.$d['id_gol'].'" selected>'.$d['gol'].'</option>';
									} else {
										echo '<option value="'.$d['id_gol'].'">'.$d['gol'].'</option>';
									}
									
									} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tempat" class="col-sm-2 control-label">Tempat lahir</label>
						<div class="col-sm-4">
							<input type="text" name="tempat" class="form-control" id="tempat" placeholder="Tempat lahir" required="" value="<?= $data['tmp_lahir'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="tgl_lahir" class="col-sm-2 control-label">Tgl lahir</label>
						<div class="col-sm-4">
							<input type="text" name="tgl_lahir" class="form-control tgl" id="tgl_lahir" placeholder="Tgl lahir" required="" value="<?= $data['tgl_lahir'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="agama" class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-4">
							<select name="agama" class="form-control" id="agama" required="">
								<?php 
									$dataagama = array('islam', 'kristen', 'katolik', 'hindu', 'budha', 'khonghucu');
									foreach ($dataagama as $value) {
										if ($value == $data['agama']) {
											echo '<option value="'.$value.'" selected>'.ucfirst($value).'</option>';
										} else {
											echo '<option value="'.$value.'">'.ucfirst($value).'</option>';
										}
									}
									
								 ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-4">
							<select name="jk" class="form-control" id="jk" required="">
								<?php 
									$datajk = array('L', 'P');
									foreach ($datajk as $value) {
										if ($value == $data['jk']) {
											echo '<option value="'.$value.'" selected>'.($value).'</option>';
										} else {
											echo '<option value="'.$value.'">'.$value.'</option>';
										}
									}
									
								 ?>
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="status_nikah" class="col-sm-2 control-label">Status Nikah</label>
						<div class="col-sm-4">
							<select name="status_nikah" class="form-control" id="status_nikah" required="">
								<?php 
									$datakawin = array('menikah', 'belum', 'duda', 'janda');
									foreach ($datakawin as $value) {
										if ($value == $data['status_nikah']) {
											echo '<option value="'.$value.'" selected>'.ucfirst($value).'</option>';
										} else {
											echo '<option value="'.$value.'">'.ucfirst($value).'</option>';
										}
									}
									
								 ?>
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="jml_anak" class="col-sm-2 control-label">Jumlah anak</label>
						<div class="col-sm-4">
							<input type="text" name="jml_anak" class="form-control" id="jml_anak" placeholder="Jumlah anak" value="<?= $data['jml_anak'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="status_karyawan" class="col-sm-2 control-label">Status Karyawan</label>
						<div class="col-sm-4">
							<select name="status_karyawan" class="form-control tgl" id="status_karyawan" required="">
								<option value="pns">PNS</option>
								<option value="cpns">CPNS</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="pendidikan" class="col-sm-2 control-label">Pendidikan</label>
						<div class="col-sm-4">
							<select name="pendidikan" class="form-control" id="pendidikan" required="">
								<?php 
								$datapend = $app->con->get('tb_pendidikan', null, array('id_pendidikan', 'pendidikan'));
								foreach($datapend as $d){
									if ($d['id_pendidikan'] == $data['pendidikan']) {
										echo '<option value="'.$d['id_pendidikan'].'" selected>'.$d['pendidikan'].'</option>';
									} else {
										echo '<option value="'.$d['id_pendidikan'].'">'.$d['pendidikan'].'</option>';
									}
									
									} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="thn_lulus" class="col-sm-2 control-label">Tahun Lulus</label>
						<div class="col-sm-4">
							<input type="text" name="thn_lulus" class="form-control" id="thn_lulus" placeholder="Tahun Lulus" required="" value="<?= $data['thn_lulus'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="no_karpeg" class="col-sm-2 control-label">No karpeg</label>
						<div class="col-sm-4">
							<input type="text" name="no_karpeg" class="form-control" id="no_karpeg" placeholder="No karpeg" required="" value="<?= $data['no_karpeg'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="status_aktif" class="col-sm-2 control-label">Status Aktif</label>
						<div class="col-sm-4">
							<select name="status_aktif" class="form-control tgl" id="status_aktif" required="">
								<option value="Y">Aktif</option>
								<option value="N">Tidak aktif</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
						<div class="col-sm-4">
							<input type="text" name="keterangan" class="form-control " id="keterangan" placeholder="Keterangan" required="" value="<?= $data['keterangan'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info btn-sm">Edit</button>
							<a href="data_nominatif.php" class="btn btn-primary btn-sm">Batal</a>
						</div>
					</div>
				</form>

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
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
		    changeYear: true
		});

		$('#thn_lulus').datepicker({
			dateFormat: 'yy',
			// changeMonth: true,
		    changeYear: true
		});
	});
</script>