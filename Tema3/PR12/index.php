<?php

require("../../fpdf186/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("./logo.jpg",30,10,50,50);
$pdf->SetFont("Helvetica","",10);
$pdf->SetXY(30,51);
$pdf->Write(5,"Fernando Calles Ramos");
$pdf->Ln();
$pdf->SetXY(30,56);
$pdf->Write(5,"CIF/NIF: 71043001A");
$pdf->SetXY(30,61);
$pdf->Write(5,utf8_decode("C/ Paraíso N º1"));
$pdf->SetXY(30,66);
$pdf->Write(5,"49020, Zamora");
$pdf->SetXY(30,71);
$pdf->Write(5,utf8_decode("Zamora, España"));
$pdf->SetXY(130,10);
$pdf->Write(5,"Numero de factura: 2023-0001");
// $hoy = new DateTime();
// $hoy->format("d/M/Y");
$pdf->SetXY(130,15);
$pdf->Write(5,"Fecha Factura: ");
$pdf->Write(5,utf8_decode('€'));
$pdf->SetXY(120,30);
$pdf->SetFont("Arial","B",14);
$pdf->Write(5,"Cliente:");

$cliente = ["VicVal SI","CIF/NIF: B30142516","C/ Mala Nº 1","18190","Zamora, Granada"];
$pdf->SetFont("Helvetica","",10);
$y = 35;
foreach ($cliente as $datos) {
    $pdf->SetXY(120,$y);
    $pdf->Write(5,utf8_decode($datos));
    $pdf->Ln();
    $y+=5;
}

$nombreDatos = ["Concepto","Cantidad","Precio","Base imponible","I.V.A."];

$datos = array(
    array("Reparación de equipos informaticos",2,"40.00"),
    array("Instalacion de sistema operativo",5,"30.56"),
    array("Venta mouse CA-32464",2,"12.00"),
    array("venta monitor LG 28''",1,"250.50"),
    array("Memoria USB 128 GB",3,"31.00"),
    array("Teclado Logitech",1,"57.80")

);

$tamanho = [60,17,20,28,20];

$pdf->SetFillColor(0,30,50);
$pdf->SetXY(30,95);

$pdf->SetFont("Helvetica","B",10);
$pdf->Cell(60,5,$nombreDatos[0],1,0,"B",false);
$pdf->Cell(17,5,$nombreDatos[1],1,0,"B",false);
$pdf->Cell(20,5,$nombreDatos[2],1,0,"B",false);
$pdf->Cell(28,5,$nombreDatos[3],1,0,"B",false);
$pdf->Cell(20,5,$nombreDatos[4],1,0,"B",false);

$pdf->SetFont("Helvetica","",10);
$pdf->SetXY(30,100);
foreach($datos as $filaDatos){
    $i = 0;
    $pdf->SetX(30);
    foreach($filaDatos as $dato){
        $pdf->Cell($tamanho[$i],5,utf8_decode($filaDatos[$i]),1,0,"C",false);
        $i++;
    }
    $suma = $filaDatos[1]*$filaDatos[2];
    $filaDatos[3] = $suma;
    $filaDatos[4] = $filaDatos[3]*0.21;
    $pdf->Cell($tamanho[$i],5,utf8_decode($filaDatos[3].'$'),1,0,"C",false);
    $i++;
    $pdf->Cell($tamanho[$i],5,utf8_decode($filaDatos[4]).'$',1,0,"C",false);
    $pdf->Ln();
}

$baseImponible = 0;
$iva = 0;

foreach ($datos as $filaDatos) {
    foreach ($filaDatos as $dato) {
        $baseImponible += $filaDatos[1]*$filaDatos[2];
        $iva += ($filaDatos[1]*$filaDatos[2])*0.21;
    }
}

$pdf->SetXY(100,135);
$pdf->SetFont("Helvetica","",12);
$pdf->Write(5,"Total Base Imponible:" .$baseImponible.'$');
$pdf->Ln();
$pdf->SetXY(100,140);
$pdf->Write(5,"I.V.A. ".$iva.'$');
$pdf->Ln();
$pdf->SetXY(100,145);
$pdf->SetFont("Helvetica","B",12);
$pdf->Write(5,"TOTAL: ".$iva+$baseImponible.'€');

$pdf -> Output();

?>