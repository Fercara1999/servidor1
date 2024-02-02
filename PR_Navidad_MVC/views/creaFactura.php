<?php

require("./webroot/fpdf186/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle(utf8_decode("Factura número: " . $_REQUEST['idPedido']));
$pdf->Image(IMG."logoGrande.png",30,10,40,35);
$pdf->SetFont("Helvetica","",10);
$pdf->SetXY(30,46);
$pdf->Write(5,"Libreria Fernando");
$pdf->Ln();
$pdf->SetXY(30,51);
$pdf->Write(5,"CIF/NIF: 71043001A");
$pdf->SetXY(30,56);
$pdf->Write(5,utf8_decode("Teléfono: 676592891"));
$pdf->SetXY(30,61);
$pdf->Write(5,utf8_decode("Av. de Requejo, 4, 49012 Zamora"));
$pdf->SetXY(30,66);
$pdf->Write(5,"49012, Zamora");
$pdf->SetXY(30,71);
$pdf->Write(5,utf8_decode("Zamora, España"));
$pdf->SetXY(130,10);
$pdf->Write(5,"Numero de factura: ".$_REQUEST['idPedido']);
$pdf->SetXY(130,15);
$pdf->Write(5,"Fecha Factura: ".$_REQUEST['fechaPedido']);
$pdf->SetXY(120,30);
$pdf->SetFont("Arial","B",14);
$pdf->Write(5,"Cliente:");
$text = "€";
define('EURO',iconv('UTF-8', 'windows-1252', $text));
$cliente = ["Usuario: ".$_REQUEST['usuario'],"Correo: ".$_REQUEST['correo'],"Fecha de nacimiento: ".$_REQUEST['fechaNacimiento']];
$pdf->SetFont("Helvetica","",10);
$y = 35;

foreach ($cliente as $datos) {
    $pdf->SetXY(120,$y);
    $pdf->Write(5,utf8_decode($datos));
    $pdf->Ln();
    $y+=5;
}

$nombreDatos = ["Portada","Titulo","Precio","Cantidad"];

$datos = array($_REQUEST['rutaPortada'],$_REQUEST['titulo'],$_REQUEST['precio'],$_REQUEST['cantidad']);

$tamanho = [45,64,20,18];
$pdf->SetXY(30,95);

$pdf->SetFillColor(0,182,212);
$pdf->SetFont("Helvetica","B",10);

$pdf->Cell(45,5,$nombreDatos[0],1,0,'C',true);
$pdf->Cell(64,5,$nombreDatos[1],1,0,"C",true);
$pdf->Cell(20,5,$nombreDatos[2],1,0,"C",true);
$pdf->Cell(18,5,$nombreDatos[3],1,0,"C",true);

$pdf->SetFont("Helvetica","",10);
$pdf->SetXY(30,100);

$pdf->Cell($tamanho[0],55,$pdf->Image($datos[0],32,100,40,55),1,0,"C",false);
$pdf->Cell($tamanho[1],55,utf8_decode($datos[1]),1,0,"C",false);
$pdf->Cell($tamanho[2],55,utf8_decode($datos[2]).EURO,1,0,"C",false);
$pdf->Cell($tamanho[3],55,utf8_decode($datos[3]),1,0,"C",false);


$pdf->SetXY(100,175);
$pdf->SetFont("Helvetica","B",12);
$pdf->Write(5,"Importe total: " .$_REQUEST['precioTotal'].EURO);

$pdf -> Output();

?>