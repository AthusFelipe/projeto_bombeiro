<?php
include "./../../protegesessao.php";

include "./Controllers/Voluntario.controller.php";
include "./Controllers/GerenciarEscala.controller.php";





include "layout/header.html"; 



?>


<!DOCTYPE html>
<style>
    th {
        line-height: 5px;
    }

    hr {
        border: none;
        background-color: #ccc;
        color: #ccc;
        height: 0px;
    }

    .list-group-item-warning {
        background-color: #ffd600;
        border-color: red;
        border-width: 50px;
        border-right: 20px;
        color: black;
    }

    .containert {
        width: fit-content;
    }

    .btn {
        margin-bottom: 15px;
        

    }



    a{
        color: black; 
    }

    ul{
        min-width: fit-content; 
    }

    .paginacao{
        background-color: #bf0000;
        color: white;

    }
    .paginacao > a{
        color: white;}

    .rodape > p{
        font-size:large;
    
    }
</style>

<body><br>










    <div class='container-fluid containert text-center'>

        <a href='./index.php'><button class='btn btn-danger'>VOLTAR </button></a><br>
        <div class='paginacao'>
        Página:
      <?php for ($i = 1; $i < $numPaginas + 1; $i++) {
        echo "<a href='?pagina=$i'>" . $i . "</a> ";
      } ?></div>


        <? if(isset($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }else $pagina = 1;?>
<div class='rodape'>
        <p>Página: <?=$pagina ?></div>

        <?= $LISTATESTE ?>


        <div class='paginacao'>
        Páginas:
      <?php for ($i = 1; $i < $numPaginas + 1; $i++) {
        echo "<a href='?pagina=$i'>" . $i . "</a> ";
      } ?></div><div class='rodape'>
           <p>Página: <?=$pagina ?></div>


    </div>




    <!--
        <div class="row">
            <div class="col">

                <br>
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
!-->

    </div>
</body>