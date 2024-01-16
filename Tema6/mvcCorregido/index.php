<?php

require("./config/config.php");

echo "<pre>";
print_r(UserDAO::findAll());
print_r(UserDAO::findById(2));
echo "</pre>";
// $usuario = new User(3,"raul",sha1('raul'),'2024-01-13');
UserDAO::insert($usuario);
?>