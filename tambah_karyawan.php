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
				<h2 class="title-header">Form Tambah Karyawan</h2>

				<form action="proses_karyawan.php" method="post" class="form-horizontal">

					<input type="hidden" name="type" value="tambah">

					<div class="form-group">
						<label for="nip" class="col-sm-2 control-label">NIP</label>
						<div class="col-sm-4">
							<input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-4">
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
						<div class="col-sm-4">
							<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="id_gol" class="col-sm-2 control-label">Golongan</label>
						<div class="col-sm-4">
							<select name="id_gol" class="form-control" id="id_gol" required="">
								<?php 
								$data = $app->con->get('tabel_gol', null, array('id_gol', 'gol'));
								foreach($data as $d){
									echo '<option value="'.$d['id_gol'].'">'.$d['gol'].'</option>';
									} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tempat" class="col-sm-2 control-label">Tempat lahir</label>
						<div class="col-sm-4">
							<input type="text" name="tempat" class="form-control" id="tempat" placeholder="Tempat lahir" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="tgl_lahir" class="col-sm-2 control-label">Tgl lahir</label>
						<div class="col-sm-4">
							<input type="text" name="tgl_lahir" class="form-control tgl" id="tgl_lahir" placeholder="Tgl lahir" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="agama" class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-4">
							<select name="agama" class="form-control" id="agama" required="">
								<option value="islam">Islam</option>
								<option value="kristen">Kristen</option>
								<option value="katolik">Katolik</option>
								<option value="hindu">Hindu</option>
								<option value="budha">Budha</option>
								<option value="khonghucu">Khonghucu</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-4">
							<select name="jk" class="form-control" id="jk" required="">
								<option value="L">Laki - laki</option>
								<option value="P">Perempuan</option>
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="status_nikah" class="col-sm-2 control-label">Status Nikah</label>
						<div class="col-sm-4">
							<select name="status_nikah" class="form-control" id="status_nikah" required="">
								<option value="menikah">Menikah</option>
								<option value="belum">Belum menikah</option>
								<option value="duda">Duda</option>
								<option value="janda">Janda</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="jml_anak" class="col-sm-2 control-label">Jumlah anak</label>
						<div class="col-sm-4">
							<input type="text" name="jml_anak" class="form-control" id="jml_anak" placeholder="Jumlah anak" >
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
								$data = $app->con->get('tb_pendidikan');
								foreach($data as $d){
									echo '<option value="'.$d['id_pendidikan'].'">'.$d['pendidikan'].' - '.$d['jurusan'].'</option>';
									} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="thn_lulus" class="col-sm-2 control-label">Tahun Lulus</label>
						<div class="col-sm-4">
							<input type="text" name="thn_lulus" class="form-control" id="thn_lulus" placeholder="Tahun Lulus" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="no_karpeg" class="col-sm-2 control-label">No karpeg</label>
						<div class="col-sm-4">
							<input type="text" name="no_karpeg" class="form-control" id="no_karpeg" placeholder="No karpeg" >
						</div>
					</div>
					<!--<div class="form-group">
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
							<input type="text" name="keterangan" class="form-control " id="keterangan" placeholder="Keterangan" required="">
						</div>
					</div>
					-->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info">Simpan</button>
							<a href="karyawan.php" class="btn btn-primary">Batal</a>
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
			dateFormat: 'dd-mm-yy',
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