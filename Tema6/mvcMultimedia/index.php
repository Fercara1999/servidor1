<?php

require("./config/config.php");

echo "<pre>";

print_r(MultimediaDAO::findAll());
// print_r(PeliculaDAO::findAll());
print_r(PeliculaDAO::findByTitulo('Inception'));

echo "</pre>";

?>