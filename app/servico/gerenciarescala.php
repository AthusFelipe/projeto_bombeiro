<?php

include "./../../protegesessao.php";
include "Voluntario.controller.php";



include "header.html";


$lss = $conn->query('SELECT servicosescala.iservicosescala, servicosescala.idservicos, 
                    count(idmilitar1)  as totalescalado, servicos.descricaoservicos, servicos.dataservicos, servicos.horaservicos 
                    FROM servicosescala, servicos 
                    WHERE servicos.idservicos = servicosescala.idservicos
                    GROUP BY idservicos ORDER BY idservicos DESC')

    ->fetchAll(PDO::FETCH_OBJ);



if (isset($_GET['excluirescala'])) {
    $conn->prepare('DELETE FROM servicosescala WHERE iservicosescala = ?')->execute([$_GET['excluirescala']]);
    header('Location: ./gerenciarescala.php');
}

$servicoss = '';
foreach ($lss as $serv) {
    $servicoss .= "    <tr>
                            <th scope='col'>$serv->dataservicos</th>
                            <th scope='col'>$serv->horaservicos</th>
                            <th scope='col'>$serv->descricaoservicos</th>
                            <th scope='col'>$serv->totalescalado</th>
                            <th scope='col'><a href='?excluirescala=$serv->iservicosescala'> Remover</a></th>
                        </tr>";
}




?>


<!DOCTYPE html>

<body>
    <div class="container">
        <div class="row">
            <div class="col">

                <table class="table">
                    <p>Escalas Cadastradas</p>
                    <thead>
                        <tr>
                            <th scope="col">DIA</th>
                            <th scope="col">HORA</th>
                            <th scope="col">DESCRICAO</th>
                            <th scope='col'>QTD. ESCALADOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $servicoss ?>

                    </tbody>

                </table>

            </div>
</body>