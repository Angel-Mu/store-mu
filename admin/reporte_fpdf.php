<?php 
header("Content-Type: text/html; charset=iso-8859-1 ");
require('../FPDF/fpdf.php'); 
include ("../controller/conexion.php");

class PDF extends FPDF 
{ 

function Header(){
	$this->Cell(15,6,"",0,1,'L');
	$this->Cell(15,6,"",0,1,'L');
	$this->Cell(15,6,"",0,1,'L');
	$this->Cell(15,6,"",0,1,'L'); 
	//$this->Image('../images/logos.jpg',10,8,33);
	$this->SetFont('Arial','B',12);
}


function Footer() 
{ 
$this->SetY(-10); 
$this->SetFont('Arial','I',8); 
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C'); 
} 
} 
$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 

$consulta = mysql_query("select marca, modelo, serie from celular where stock < 15");
$pdf->Cell(30,6,"Marca",1,0,'L');
$pdf->Cell(30,6,"Modelo",1,0,'L');
$pdf->Cell(40,6,"Serie",1,0,'L');
//$pdf->Cell(18,6,"Imagen",1,0,'L');
$pdf->Cell(15,6,"",0,1,'L');
while($resultado = mysql_fetch_array($consulta)){ 
 
#$pdf->Cell(17,20,$resultado['categoria'],1,0,'L'); 
$pdf->Cell(30,10,$resultado['marca'],1,0,'L');
$pdf->Cell(30,10,$resultado['modelo'],1,0,'L');
$pdf->Cell(40,10,$resultado['serie'],1,0,'L');
//$pdf->Cell(50,25, $pdf->Image($resultado['imagen'], $pdf->GetX(),$pdf->GetY(),17),1,0,'C');
$pdf->Ln(); 
} 
$pdf->Output(); 
?>