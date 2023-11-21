<?php

require("../../fpdf186/fpdf.php");
include("./header.php");

$pdf = new Head();
$pdf->AddPage();
$pdf->SetFont("Courier","B",14);
$pdf->Write(5,"Hola mundo","www.google.es");
$pdf->Ln();
$pdf->Write(5,$pdf->GetPageWidth());
$pdf->Ln();
$pdf->Image('./prueba.jpg',25,40);
$pdf->AddPage();
// $pdf->Cell(30,10,"Prueba",1,0,'C',false);
// $pdf->Cell(30,10,"Prueba",1,0,'C',false);

// $pdf->Cell(30,10,"Prueba",1,1,'C',false);
// $pdf->Cell(30,10,"Prueba",1,2,'C',false);

// $pdf->Cell(30,10,"Prueba",1,1,'C',false);
// $pdf->Cell(30,10,"Prueba",1,0,'C',false);

$array = array(
    array('pc1','Lenovo','1TB','4GB RAM'),
    array('pc2','MSI','2TB','8GB RAM'),
    array('pc3','Mac','3TB','2GB RAM'),
    array('pc4','HP','5TB','16GB RAM'),
);

creatabla($array,$pdf);


$pdf->Output();

function creaTabla($array,$pdf){

    $pdf->SetFillColor(0,150,255);
    $pdf->Cell(40,10,"PC",1,0,'C',true);
    $pdf->Cell(40,10,"Marca",1,0,'C',true);
    $pdf->Cell(40,10,"Disco duro",1,0,'C',true);
    $pdf->Cell(40,10,"RAM",1,0,'C',true);
    $pdf->Ln();

    foreach($array as $row){
        foreach($row as $datos){
            $pdf->Cell(40,10,$datos,1,0,'C',false);
        }
        $pdf->Ln();
    }

}

?>