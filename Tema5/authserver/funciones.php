<?
function isUser(){
    if($_SERVER['PHP_AUTH_USER']==USER &&
    hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASS)
    {
       return true;   
    }
    return false;
}

function isAdmin(){
    if($_SERVER['PHP_AUTH_USER']==USERA &&
    hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASSA)
    {
       return true;   
    }
    return false;
}