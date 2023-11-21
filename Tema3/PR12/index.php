<?php

require("../../fpdf186/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("./logo.jpg",30,10,50,50);
$pdf->SetFont("Helvetica","",10);
// $pdf->SetFont("Helvetica","",10);
$pdf->SetXY(30,51);
$pdf->Write(5,"Fernando Calles Ramos");
$pdf->Ln();
$pdf->SetXY(30,56);
$pdf->Write(5,"CIF/NIF: 71043001A");
$pdf->SetXY(30,61);
$pdf->Write(5,"C/ Paraíso N º1");
$pdf->SetXY(30,66);
$pdf->Write(5,"49020, Zamora");
$pdf->SetXY(30,71);
$pdf->Write(5,"Zamora, España");
$pdf->SetXY(130,10);
$pdf->Write(5,"Numero de factura: 2023-0001");
// $hoy = new DateTime();
// $hoy->format("d/M/Y");
$pdf->SetXY(130,15);
$pdf->Write(5,"Fecha Factura: ");
$pdf->SetXY(120,25);
$pdf->SetFont("Arial","B",14);
$pdf->Write(5,"Cliente:");

$cliente = 


// $
$pdf->SetDrawColor(0,40,0);
// $pdf->Line(0,10,130,150);
$pdf -> Output();

?>