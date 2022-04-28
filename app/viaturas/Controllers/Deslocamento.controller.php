<?php

include "controller.php";



$vtr = $conn->query('SELECT * FROM viaturascadastro, viaturasinformacao WHERE
viaturascadastro.idviaturas = viaturasinformacao.idviatura 
    ')->fetchAll(PDO::FETCH_OBJ);


foreach ($vtr as $viatura) {
    echo "ID: $viatura->idviaturas<br>
    Viatura: $viatura->nomeviatura <br>
    Modelo: $viatura->modelo <br>
    Placa: $viatura->placa <br>
    Fabricante: $viatura->fabricante <br>
    Combustivel: $viatura->combustivel <br>
    Categoria: $viatura->categoria <hr>";
}






if (isset($_POST['posto'])) {

    $abastecimento = new Abastecimento;
    $abastecimento->novoAbastecimento(
        $_GET['idviatura'],
        $_POST['posto'],
        $_SESSION['codfunc'],
        $_POST['combustivel'],
        $_POST['valor'],
        $_POST['odometro'],
        $_POST['notafiscal'],
        $_POST['statuspg']
    );

    $conn->prepare('INSERT INTO viaturasabastecimento (idviatura, posto, codfunc, combustivel, valor, odometro, notafiscal, statuspg) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')
        ->execute([
            $abastecimento->getIdviatura(), $abastecimento->getPosto(), $abastecimento->getCodfunc(), $abastecimento->getCombustivel(),
            $abastecimento->getValor(), $abastecimento->getOdometro(), $abastecimento->getNotafiscal(), $abastecimento->getStatuspg()
        ]);
}
