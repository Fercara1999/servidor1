<?php

//Constantes a usar en todo el programa
define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');

require("./config/configBD.php");

require("./dao/factoryBD.php");
require("./dao/userDAO.php");
require("./models/user.php");

?>