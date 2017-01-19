<html>
<head>
<title>Input Data Mutasi Pegawai</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="layout/bootstrap.min.css" rel="stylesheet">
<link href="layout/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<form id="karyawan" name="karyawan" method="post" enctype="multipart/form-data" action="prosesmutasi.php?aksi=tambah">
      <table width="100%" border="0" cellspacing="2" cellpadding="4">
        <tr>
          <td colspan="2" align="center" class="judulform">Isi Data Karyawan Mutasi</td>
          </tr>
        <tr>
          <td width="44%">&nbsp;</td>
          <td width="56%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="error"><? echo $_GET[err]; ?></td>
          </tr>
        <tr>
          <td class="labelform">No Surat</td>
          <td><label>
            <input name="no_surat" type="text" id="no_surat" size="20" <? echo "value='$t[no_surat]'"; ?> readonly="" />
          </label></td>
        </tr>
        <tr>
          <td class="labelform">NIP </td>
          <td><label>
            <input name="nip" type="text" disabled="disabled" id="nip" size="50" <? echo "value='$t[nip]'"; ?>/>
          </label></td>
        </tr>
        <tr>
          <td class="labelform">NAMA PEGAWAI</td>
          <td><input name="alamat_ktp" type="text" disabled="disabled" id="alamat_ktp" size="50" <? echo "value='$t[alamat_ktp]'"; ?>/></td>
        </tr>
        <tr>
          <td class="labelform">INSTANSI LAMA</td>
          <td><input name="alamat_domisili" type="text" disabled="disabled" id="alamat_domisili" size="50"<? echo "value='$t[alamat_domisili]'"; ?> /></td>
        </tr>
        <tr>
          <td class="labelform">INSTANSI BARU</td>
          <td><input name="alamat_email" type="text" disabled="disabled" id="alamat_email" size="50" <? echo "value='$t[alamat_email]'"; ?>/></td>
        </tr>
        <tr>
          <td class="labelform">TMT BARU</td>
          <td><input name="telp_hp" type="text" disabled="disabled" id="telp_hp" size="50" <? echo "value='$t[telp_hp]'"; ?> /></td>
        </tr>
		        <tr>
          <td colspan="2" class="labelform" align="right"><label>
            <input type="submit" align="center" class="btn btn-default" name="Submit" id="submit" value="Simpan" disabled="disabled" />
          </label>
            <label>
            <input type="button" align="center" class="btn btn-default" name="Submit2" value="Batal" onclick="location.href='<? echo $alamat; ?>'" />
            </label></td>
          </tr>
		 </body>
		 </html>