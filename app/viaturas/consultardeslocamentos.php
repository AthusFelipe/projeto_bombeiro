<?php

include_once "controller.php";
include "./../../style/header.html";
include_once "./../login.php";



$allDeslocamentoss = $conn->query('SELECT * FROM viaturasdeslocamento ORDER BY iddeslocamento DESC')
    ->fetchAll(PDO::FETCH_OBJ);

$deslocs = '';
foreach ($allDeslocamentoss as $allDeslocamentos) {
    $deslocs .= "<p>$allDeslocamentos->idviatura</p>
    <p>$allDeslocamentos->codfuncmotorista</p>
    <p>$allDeslocamentos->codfunccriador</p>
    <p>$allDeslocamentos->kminicial</p>
    <p>$allDeslocamentos->kmfinal</p>
    <p>$allDeslocamentos->horainicial</p>
    <p>$allDeslocamentos->horafinal</p>
    <p>$allDeslocamentos->destino</p>
    <p>$allDeslocamentos->datadeslocamento</p><hr>";
}


?>


<!DOCTYPE html>


<div>


    <?= $deslocs ?>






</div>