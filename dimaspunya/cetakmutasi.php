<?php 
mysql_connect("localhost","root","29april");
mysql_select_db("bppkb");
require('fpdf/fpdf.php'); 
	$result=mysql_query("SELECT * FROM tabel_mutasi ORDER BY no_surat") or die(mysql_error());
	
	$column_no_surat ="";
	$column_nip ="";
	$column_nama_karyawan ='';
	$column_dinas_lama ="";
	$column_dinas_baru ="";
	$column_tmt_baru ="";
	
	while($row=mysql_fetch_array($result))
	{
		$no_surat=$row["no_surat"];
		$nip=$row["nip"];
		$nama_karyawan=$row["nama_karyawan"];
		$dinas_lama=$row["dinas_lama"];
		$dinas_baru=$row["dinas_baru"];
		$tmt_baru=$row["tmt_baru"];
		
		$column_no_surat=$column_no_surat.$no_surat."\n";
		$column_nip=$column_nip.$nip."\n";
		$column_nama_karyawan=$column_nama_karyawan.$nama_karyawan."\n";
		$column_dinas_lama=$column_dinas_lama.$dinas_lama."\n";
		$column_dinas_baru=$column_dinas_baru.$dinas_baru."\n";
		$column_tmt_baru=$column_tmt_baru.$tmt_baru."\n";
		
		$pdf=new FPDF('P','mm',array(210,297));//L For Landscape / P For Potrait
		$pdf->AddPage();
		
		//$pdf->Image('../foto/logo.png',10,10,-175);
		
		$pdf->SetFont('Arial','B','13');
		$pdf->Cell(80);
		$pdf->Cell(30,10,'DATA MUTASI PEGAWAI',0,0,'C');
		$pdf->Ln();
	}
	$Y_fields_Name_position =30;
	$pdf->SetFillColor(110,180,230);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'No Surat',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(40,8,'NIP',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,8,'Nama karyawan',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,8,'Dinas Lama',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(50,8,'Dinas Baru',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(35,8,'TMT Baru',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_no_surat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,6,$column_nip,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_nama_karyawan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_dinas_lama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(50,6,$column_dinas_baru,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(35,6,$column_tmt_baru,1,'C');

$pdf->Output();
?>