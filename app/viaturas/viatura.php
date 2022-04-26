<?php

include "controller.php" ; 

$idvtr = $_GET['idviatura']; 

$vt = new Viatura ;
$vt->retornaViatura($idvtr); 

echo '<pre>'; print_r($vt); echo '<pre>' ; //SNIPPET DEBUG

$listaAbast = $conn->query("SELECT * FROM viaturasabastecimento WHERE idviatura = $idvtr")->fetchAll(PDO::FETCH_OBJ);


$abastecimentos = '';

foreach($listaAbast as $abast){

    $abastecimentos .= $abast->dataabastecimento."<br>" ; 
}


echo "Abastecimentos : <br> $abastecimentos" ;
