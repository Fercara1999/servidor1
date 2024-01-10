<?php

require("./Empresa.php");
require("./EmpresaM.php");

$empresa = new Empresa("B385839","Mi web","Zamora");

print_r($empresa);

$empresa->setCif('B497245');

// Solo lo permite si es public
$empresa->setNombre("Mola tu Web");

echo "<br>";
print_r($empresa);

$empresaM = new EmpresaM("B385839","Mi nueva web","Zamora");
$empresaM2 = new EmpresaM("B385839","Mi nueva web","Zamora");
$empresaM3 = new EmpresaM("B385839","Mi nueva web","Zamora");

$empresaM->cif = "A435478932";

echo "<br>";

echo $empresaM->cif;
echo "<br>";
echo $empresaM->cif = "123456789";

$empresaM->cifa = "88888888";

echo "<br>";
echo $empresaM->cif;

echo "<br>";


print_r($empresaM->__toString());

echo EmpresaM::saluda();

echo Empresam::$cont;
?>