<?php
include "../../models/Viaturas.php";
include "../../models/Abastecimentos.php";
include "../../models/Deslocamentos.php";
include "../../models/User.php";
include "../../models/Conexao.php";
// include "../../models/Produto.php";
// include "../../models/User.php";

include "./../login.php";


$conn = Conexao::conectar();

$vtr = $conn->query('SELECT * FROM viaturascadastro, viaturasinformacao WHERE
viaturascadastro.idviaturas = viaturasinformacao.idviatura 
    ')->fetchAll(PDO::FETCH_OBJ);

$selectViaturas = '';
foreach ($vtr as $viatura) {
    $selectViaturas .= "
    <option value='$viatura->idviatura'>$viatura->nomeviatura</option>";
}



if (isset($_POST['posto'])) {

    $abastecimento = new Abastecimento;
    $abastecimento->novoAbastecimento(
        $_POST['idviatura'],
        $_POST['posto'],
        $_POST['codfunc'],
        $_POST['combustivel'],
        $_POST['valor'],
        $_POST['odometro'],
        $_POST['notafiscal'],
        $_POST['status']
    );

    // $conn->prepare('INSERT INTO viaturasabastecimento (idviatura, posto, codfunc, combustivel, valor, odometro, notafiscal, statuspg) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')
    //     ->execute([
    //         $abastecimento->getIdviatura(), $abastecimento->getPosto(), $abastecimento->getCodfunc(), $abastecimento->getCombustivel(),
    //         $abastecimento->getValor(), $abastecimento->getOdometro(), $abastecimento->getNotafiscal(), $abastecimento->getStatuspg()
    //     ]);
}
