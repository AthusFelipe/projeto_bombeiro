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
        width: 25%;
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
</style>

<body><br>










    <div class='container-fluid containert'>
        <a href='./index.php'><button class='btn btn-danger'>VOLTAR </button></a><br>
        <?= $LISTATESTE ?>

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