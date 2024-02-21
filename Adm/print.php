<?php
// memanggil library FPDF
require('../fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Rekap kehadiran',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(20,7,'NISN' ,1,0,'C');
$pdf->Cell(50,7,'NAMA',1,0,'C');
$pdf->Cell(30,7,'KEHADIRAN',1,0,'C');
$pdf->Cell(35,7,'TANGGAL',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($conn,"SELECT  * FROM vrekap");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(20,6, $d['nisn'],1,0);
  $pdf->Cell(50,6, $d['nama'],1,0);  
  $pdf->Cell(30,6, $d['kehadiran'],1,0);
  $pdf->Cell(35,6, $d['tanggal'],1,1);
}
 
$pdf->Output();
 
?>