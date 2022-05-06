<?php
include "./../../style/header.html";
include "./Controllers/controller.php";
$usuarioLogado->nivelAcesso(2);


include "./Controllers/Voluntario.controller.php";
include "./Controllers/GerenciarEscala.controller.php";
?>


<!DOCTYPE html>


<body>




    <div style='text-align:center;display:flex;justify-content:center;'>
        <a style='font-weight:bold;
    color:white;
    border-style:solid;
    border-width:0px;
    border-radius:2px;
    background-color:#bf0000;' href="http://127.0.0.1/bombeiros/app/servico/cadastrarservico.php" class="w3-bar-item w3-button">Criar escala</a>
        <a style='font-weight:bold;
    color:white;
    border-style:solid;
    border-width:0px;
    border-radius:2px;
    background-color:#bf0000;' href="relatoriomensal.php" class="w3-bar-item w3-button">Relatório</a>
    </div>




    <h3 style='text-align:center'>GERENCIAR ESCALAS</h3>

    <div style='text-align:center;display:flex;justify-content:center;margin-bottom:5px;'>
        <p style='margin-right:5px;'>Páginas:</p>
        <?php
        $pag = '';
        for ($i = 1; $i < $numPaginas + 1; $i++) {


            if ($i == $_GET['pagina']) {
                $pag = "<a style='margin-right:5px;' href='?pagina=$i'>" . "<div style='font-weight:bold;'>$i</div>" . "</a> ";
            } else $pag = "<a style='margin-right:5px;' href='?pagina=$i'>" . $i . "</a> ";
            echo $pag;
        } ?>
    </div>


    <section class='w3-row-padding w3-container' style='margin-top:50px;display:flex;flex-wrap:wrap;justify-content:center;'>

        <?= $LISTATESTE ?>

    </section>
</body>