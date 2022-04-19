<?php

include "controller.php";


$_SESSION['codfunc'] = 1;


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

    $abastecimento = new Abastecimento(
        $_GET['idviatura'],
        $_POST['posto'],
        $_SESSION['codfunc'],
        $_POST['combustivel'],
        $_POST['valor'],
        $_POST['odometro'],
        $_POST['notafiscal'],
        $_POST['statuspg']
    );

    $conn->prepare('INSERT INTO viaturasabastecimento VALUES (?, ?, ?, ?, ?, ?, ?, ?)')
        ->execute([
            $abastecimento->getIdviatura(), $abastecimento->getPosto(), $abastecimento->getCodfunc(), $abastecimento->getCombustivel(),
            $abastecimento->getValor(), $abastecimento->getOdometro(), $abastecimento->getNotafiscal(), $abastecimento->getStatuspg()
        ]);
}


?>



<!DOCTYPE html>



<form method='post'>
    Posto : <input type='text' name='posto'><br>
    Combustivel: <input type='text' name='combustivel'><br>
    Valor: <input type='text' name='valor'><br>
    Odometro <input type='number' name='odometro'><br>
    Nota fiscal <input type='text' name='notafiscal'><br>
    Status <input type='text' name='statuspg'><br>
    <input type='submit' value='Salvar abastecimento'>

</form>



</html>