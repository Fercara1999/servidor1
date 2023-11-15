<?php
header('Content-Type: text/xml');
header("Content-Disposition: attachment;filename=instrumentos.xml");
readfile("instrumentos.xml");
?>