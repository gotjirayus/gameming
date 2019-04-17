<?php 
	require('fpdf/fpdf.php');
	require('connectANSI.php');
	$idorder=$_GET['id'];
	 $sql = "SELECT * FROM order1 LEFT JOIN member ON order1.idmember = member.idmember WHERE oderid =  $idorder";
 	 $result= mysqli_query($conn,$sql);
  	 $row = mysqli_fetch_assoc($result);


class PDF extends FPDF
{
// Page header
function Header()
{

	$this -> AddFont('angsa','','angsa.php');
    // Logo
    $this->Image('fpdf/logo.png',10,10,25);
    // Arial bold 15
    $this->SetFont('Angsana','B',28);
    // Move to the right
    $this->Cell(60);
    // PDF_set_info_title()
    $this->Cell(70,20,iconv( 'UTF-8','TIS-620','ใบสั่งสินค้า'),0,1,'C');
   
    $this->line(5,28,200,28);
   
    // Line break
    $this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Angsana','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
define('FPDF_FONTPATH','font/');
$pdf = new PDF('P');
$pdf->AddFont('Angsana','','angsa.php');
$pdf->AddFont('Angsana','B','angsab.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Angsana','',16);
require('connectANSI.php');
 $sql2 = "SELECT * FROM order2 LEFT JOIN product ON order2.idproduct = product.idproduct WHERE oderid =  $idorder";
       $result2= mysqli_query($conn,$sql2);
       	$pdf->Cell(12,10,iconv( 'UTF-8','TIS-620','รหัสใบสั่งสินค้า : '),0,0,'L');
		$pdf->Cell(12,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.' '.$row['oderid'].' '),0,1,'L');
		$pdf->Cell(12,10,iconv( 'UTF-8','TIS-620','รหัสลูกค้า : '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.' '.' '.' '.$row['idmember'].' '),0,1,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620','ชื่อ :'),0,0,'L');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row['name'].' '),0,0,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','นามสกุล : '),0,0,'L');
		$pdf->Cell(10,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.$row['lastname'].' '),0,1,'L');
		$pdf->Cell(15,10,iconv( 'UTF-8','TIS-620','วันที่สั่งของ : '),0,0,'L');
		$pdf->Cell(60,10,iconv( 'UTF-8','TIS-620',' '.' '.' '.' '.' '.$row['oderdate'].' '),0,0,'L');
		
		
		$pdf->Cell(20,10,'',0,1,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','รหัสสินค้า '),1,0,'C');
		$pdf->Cell(50,10,iconv( 'UTF-8','TIS-620','ชื่อสินค้า '),1,0,'C');
		$pdf->Cell(80,10,iconv( 'UTF-8','TIS-620','รูปสินค้า'),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620','ราคา '),1,1,'C');
		
		




       while($row2 = mysqli_fetch_assoc($result2)){      
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row2['idproduct']),1,0,'C');
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		$pdf->Cell(50,10,iconv( 'UTF-8','TIS-620',$row2['productname']),1,0,'C');
		$pdf->Cell(80,10,iconv( 'UTF-8','TIS-620',$row2['image']),1,0,'C');
		$pdf->Cell(20,10,iconv( 'UTF-8','TIS-620',$row2['total']),1,0,'C');
		
			}
			 
		$pdf->Cell(160,10,iconv( 'UTF-8','TIS-620','ราคารวม'),0,0,'R');
		
	

			
$pdf->Output();
?>	