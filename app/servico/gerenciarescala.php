<?php
include "./../../style/header.html";
include "./Controllers/controller.php";
$usuarioLogado->nivelAcesso(2);


include "./Controllers/Voluntario.controller.php";
include "./Controllers/GerenciarEscala.controller.php";














?>


<!DOCTYPE html>

<body>


    <section class='w3-row-padding w3-container' style='margin-top:50px;display:flex;justify-content:center;'>

        <?= $LISTATESTE ?>

    </section>
</body>