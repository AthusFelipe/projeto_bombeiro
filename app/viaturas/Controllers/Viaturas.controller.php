<?php 
include "controller.php" ; 



$idvtr = $_GET['idviatura']; 

$viatura = new Viatura ;
$viatura->retornaViatura($idvtr); 


$listaAbastecimentos = $conn->query("SELECT * FROM viaturasabastecimento WHERE idviatura = $idvtr LIMIT 5")->fetchAll(PDO::FETCH_OBJ);

$abastecimentos = '' ; 
foreach ($listaAbastecimentos as $abast){
$abastecimentos .=
"
<div class='content-inner'>

<p>ID do abastecimento: $abast->idabastecimento </p>
 <p>Data: $abast->dataabastecimento </p>
 <p>Posto: $abast->posto </p>
 <p>codfunc: $abast->codfunc </p>
 <p>combustivel: $abast->combustivel </p>
 <p> valor: $abast->valor </p>
 <p> odometro: $abast->odometro </p>
 <p> notafiscal: $abast->notafiscal </p>
 <p> statusPg: $abast->statuspg </p>

 </div>
" ; 
}




$listaDesloc = $conn->query("SELECT * FROM viaturasdeslocamento WHERE idviatura = $idvtr ")->fetchAll(PDO::FETCH_OBJ);





