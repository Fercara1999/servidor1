<?php

function insertarCookie() {
    $i = 0;

    while (!empty($_COOKIE['id'][$i])) {
        $i++;
    }

    setcookie("id[$i]", $_REQUEST['id'], time() + (3600 * 24));
}
    

?>