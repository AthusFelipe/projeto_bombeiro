<?php
include "./../../style/header.html";
include "./Controllers/controller.php";
$usuarioLogado->nivelAcesso(2);


include "./Controllers/Voluntario.controller.php";
include "./Controllers/GerenciarEscala.controller.php";
?>


<!DOCTYPE html>


<body>
    <h3 style='text-align:center'>GERENCIAR ESCALAS</h3>


    <section class='w3-row-padding w3-container' style='text-decoration: none;margin-top:50px;display:flex;flex-wrap:flex;justify-content:center;'>

        <?= $LISTATESTE ?>

    </section>
</body>