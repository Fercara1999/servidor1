<?php

require("./config/config.php");
echo "<pre>";
print_r(UserDAO::findAll());
echo "<h1>FindByID</h1>";
print_r(UserDAO::findbyId(2));
echo "</pre>";
$usuario = new User(3,sha1('maria'),"maria",'2024-01-11');
UserDAO::insert($usuario);
?>