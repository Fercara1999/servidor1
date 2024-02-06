<?php

function insertarCookie() {
    $i = 0;
    $existe = false;

    while (!empty($_COOKIE['id'][$i]) && $i <= 3) {
        if ($_COOKIE['id'][$i] == $_REQUEST['id']) {
            $existe = true;
            break;
        }
        $i++;
    }

    if (!$existe && !empty($_COOKIE['id'][3]) && !empty($_COOKIE['id'][2]) && !empty($_COOKIE['id'][1]) && !empty($_COOKIE['id'][0])) {
        $_COOKIE['id'][0] = $_COOKIE['id'][1];
        $_COOKIE['id'][1] = $_COOKIE['id'][2];
        $_COOKIE['id'][2] = $_COOKIE['id'][3];
        $_COOKIE['id'][3] = $_REQUEST['id'];
        
        setcookie("id[0]", $_COOKIE['id'][0], time() + (3600 * 24));
        setcookie("id[1]", $_COOKIE['id'][1], time() + (3600 * 24));
        setcookie("id[2]", $_COOKIE['id'][2], time() + (3600 * 24));
        setcookie("id[3]", $_COOKIE['id'][3], time() + (3600 * 24));
    } else if (!$existe) {
        $_COOKIE['id'][$i] = $_REQUEST['id'];
        setcookie("id[$i]", $_REQUEST['id'], time() + (3600 * 24));
    }
}

?>