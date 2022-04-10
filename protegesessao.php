<?php

session_start() ; 
if(!$_SESSION['codfunc']){
    header ('location : ./index.php'); 
}

if(isset($_GET['sair'])){
    session_destroy() ; 
    header ('location: ./index.php') ; 
}