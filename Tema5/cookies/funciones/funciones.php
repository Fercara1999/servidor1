<?php

function insertarCookie(){
    // if(empty($_COOKIE['id'][0]))
    //     setcookie("id[0]",$_REQUEST['id'],time()+(3600*24));
    // else if(empty($_COOKIE['id'][1]))
    //     setcookie("id[1]",$_REQUEST['id'],time()+(3600*24));
    // else if(empty($_COOKIE['id'][2]))
    //     setcookie("id[2]",$_REQUEST['id'],time()+(3600*24));

    for ($i=0; $i <= 2; $i++) { 
        if(empty($_COOKIE['id'][$i] && !in_array($_REQUEST['id'],$_COOKIE['id']))){
            setcookie("id[$i]",$_REQUEST['id'],time()+(3600*24));
            exit;
        }
        if(!in_array($_REQUEST['id'],$_COOKIE['id']))
            setcookie("id[2]",$_REQUEST['id'],time()+(3600*24));
    }
}

?>