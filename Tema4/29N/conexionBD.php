<?php

require("./confBD.php");

$con = new mysqli();
// $con -> connect(IP,USER,PASSWORD,"prueba");

// $sql = "UPDATE alumnos SET nombre = ?, edad = ? WHERE id = ?";

// $stmt = $con->stmt_init();
// $stmt->prepare($sql);
// $nombre = "Raul";
// $edad = 35;
// $id = 2;
// $stmt->bind_param('sii',$nombre,$edad,$id);
// $stmt->execute();

$con -> connect(IP,USER,PASSWORD);
$script = file_get_contents("./banco.sql");

$con->multi_query($script);



$con->close();


?>