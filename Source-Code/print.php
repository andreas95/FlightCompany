<?php 
require('u/fpdf.php');
error_reporting(E_ERROR | E_PARSE);
class PDF extends FPDF
{

function Header()
{
$this->SetFont('Arial','B',12);
$this->Ln(1);
}

function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'FMI Flights Inc.',0,0,'C');
}

function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}

function create_ticket($filename, $ticket_id, $item, $price, $name, $email) {
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->SetTextColor(32);
	$pdf->Image('pic/logo.png',0,10,80,40);
	$pdf->Cell(0,5,'FMI Flights Inc.',0,1,'R');
	$pdf->Cell(0,5,'B-dul Regina Elisabeta 4-12, Bucharest',0,1,'R');
	$pdf->Cell(0,5,'E-mail: antone.andreas@icloud.com',0,1,'R');
	$pdf->Cell(0,5,'Telephone: +40728443867',0,1,'R');
	$pdf->Cell(0,30,'',0,1,'R');
	$pdf->SetFillColor(200,220,255);
	$pdf->ChapterTitle('Invoice Number: ',$ticket_id);
	$pdf->ChapterTitle('Invoice Date: ',date('d/m/Y'));
	$pdf->Cell(0,20,'',0,1,'R');
	$pdf->SetFillColor(224,235,255);
	$pdf->SetDrawColor(192,192,192);
	$pdf->Cell(170,7,'Item',1,0,'L');
	$pdf->Cell(20,7,'Price',1,1,'C');
	$pdf->Cell(170,7,$item,1,0,'L',0);
	$pdf->Cell(20,7,$price,1,1,'C',0);
	$pdf->Cell(0,0,'',0,1,'R');
	$pdf->Cell(170,7,'TVA',1,0,'R',0);
	$pdf->Cell(20,7,'24%',1,1,'C',0);
	$pdf->Cell(170,7,'Total',1,0,'R',0);
	$pdf->Cell(20,7,$price,1,0,'C',0);
	$pdf->Cell(0,20,'',0,1,'R');
	$pdf->Cell(0,20,'',0,1,'R');
	$pdf->ChapterTitle('Payment information:','');
	$pdf->ChapterTitle('Name: ',$name);
	$pdf->ChapterTitle('Email: ',$email);
	$pdf->Output($filename,'F');
}

}

?>
