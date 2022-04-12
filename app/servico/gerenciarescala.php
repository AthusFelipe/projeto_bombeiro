<?php

include "./../../protegesessao.php";
include "Voluntario.controller.php";



include "header.html";





$lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY idservicos DESC')

    ->fetchAll(PDO::FETCH_OBJ);





$servicoss = '';
foreach ($lss as $serv) {
   $totalEscalados = $conn->query("SELECT count(idmilitar1) as totalescalado FROM servicosescala WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ) ; 
   $totalVoluntarios = $conn->query("SELECT count(idmilitar) as totalvoluntario FROM servicosvoluntario WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ) ; 
   
   $totalEscalados->totalescalado < 1  ? $ret = "<font color='red'>DEFINIR ESCALA</font>" : $ret = "<font color='green'><b>ESCALA DEFINIDA</b></font>" ; 
   
    
   $totalEscalados->totalescalado < 1  ? $imagem = " <figure><img src='yellowicon.png' width='30' height='30' class='d-inline-block align-top' </figure>" : $imagem = ""; 
   
   $servicoss .= "    <tr> 
                            <th scope='col'>".date('D-d/m', strtotime($serv->dataservicos))."
                            <hr>$serv->descricaoservicos</th>
                            
                            <th scope='col'>$totalEscalados->totalescalado escalados <hr><a href='./moderarescala.php?idservico=$serv->idservicos'>$ret </a>
                            <hr>
                            $totalVoluntarios->totalvoluntario voluntários</th>
                            <th><hr>$imagem<hr></th>
                           

                        </tr>";
}




?>


<!DOCTYPE html>
<style>
th{ line-height: 5px;  }
hr {
    border: none;
    background-color: #ccc;
    color: #ccc;
    height: 0px;
}

</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col">

                <table class="table table-stripped">
                    
                    <thead>
                        <tr>
                            <th scope="col">DIA</th>
                            <th scope="col">HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $servicoss ?>

                    </tbody>

                </table>

            </div>
</body>