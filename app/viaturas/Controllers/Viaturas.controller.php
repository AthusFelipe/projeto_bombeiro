<?php
include "controller.php";
include_once "./../login.php";



$idvtr = $_GET['idviatura'];

$viatura = new Viatura;
$viatura->retornaViatura($idvtr);


$listaAbastecimentos = $conn->query("SELECT * FROM viaturasabastecimento WHERE idviatura = $idvtr  ORDER BY idabastecimento DESC  LIMIT 5")->fetchAll(PDO::FETCH_OBJ);

$abastecimentos = '';
foreach ($listaAbastecimentos as $abast) {
    $abastecimentos .=
        "
<div class='content-inner'>
<div style='display:flex'>
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
 </div>
";
}


$listaDeslocamentos = $conn->query("SELECT * FROM viaturasdeslocamento, usuarios WHERE idviatura = $idvtr AND viaturasdeslocamento.codfuncmotorista = usuarios.codfunc ORDER BY iddeslocamento DESC LIMIT 5 ")->fetchAll(PDO::FETCH_OBJ);

$deslocamentos = '';
foreach ($listaDeslocamentos as $desloc) {

    $motorista = $conn->query("SELECT nomeguerra, cargo FROM usuarios WHERE codfunc = $desloc->codfuncmotorista")->fetch(PDO::FETCH_OBJ);
    $criador = $conn->query("SELECT nomeguerra, cargo FROM usuarios WHERE codfunc = $desloc->codfunccriador")->fetch(PDO::FETCH_OBJ);


    $deslocamentos .=
        "
<div class='content-inner'>
<div class='aba' style='display:flex;justify-content:center;text-align:center;'>

 <p>Motorista:
 $motorista->cargo $motorista->nomeguerra</p>
 <p>cadastrado por: $criador->cargo $criador->nomeguerra</p>
 <p>Km inicial: $desloc->kminicial </p>
 <p>km Final: $desloc->kmfinal </p>
 <p>Hora inicial: $desloc->horainicial </p>
 <p>Hora final: $desloc->horafinal </p>
 <p>Destino: $desloc->destino </p>
 <p>Data: $desloc->datadeslocamento </p>
 </div>
 </div>

";
}


function EditarViatura()
{
    global $usuarioLogado;
    if ($usuarioLogado->getNivelAcesso() == 2) {
        echo "<p>Editar viatura</p>";
    }
}
