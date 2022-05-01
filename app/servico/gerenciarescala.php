<?php
include "./../../style/header.html";
include "./Controllers/controller.php";
$usuarioLogado->nivelAcesso(2);


include "./Controllers/Voluntario.controller.php";
include "./Controllers/GerenciarEscala.controller.php";
?>


<!DOCTYPE html>


<body>
    <div class='container' style='display:inline;'>
<a href="http://127.0.0.1/bombeiros/app/servico/cadastrarservico.php" class="w3-bar-item w3-button">Criar escala</a>
<a href="relatoriomensal.php" class="w3-bar-item w3-button">Relatório</a>

    </div>




    <h3 style='text-align:center'>GERENCIAR ESCALAS</h3>


    <section class='w3-row-padding w3-container' style='margin-top:50px;display:flex;flex-wrap:wrap;justify-content:center;'>

        <?= $LISTATESTE ?>

    </section>
</body>