<?php
include "../../models/Conexao.php";

include "../../models/User.php";

include "../../models/Servicos.php";
include "../../models/Escalas.php";


include "./Controllers/ModerarEscala.controller.php";


include "./../login.php";





include "./../../style/header.html";

$usuarioLogado->nivelAcesso(2);

?>



<!DOCTYPE html>
<style>
  .lista-voluntarios {
    background-color: rgb(191, 196, 0);
  }

  .lista-escalados {
    background-color: green;
  }

  .lista-cinza {
    background: gray;
  }

  .btn {
    font-size: 10px;
    border-radius: 12px;
    transition-duration: 0.4s;
    background-color: grey;
    color: white;

  }

  .btn:hover {
    background-color: #bf0000;


  }

  .btn-voltar {

    margin-bottom: 10px;
    margin-top: 10px;
  }
</style>

<body>
  <div class='container text-center'><br>
    <a href='./gerenciarescala.php'><button class=' btn-danger btn-voltar'>VOLTAR</button></a><br><br><br>
    <ul class="list-group">
      <li class="list-group-item lista-cinza text-white" aria-current="true">
        SERVIÇO DIURNO DE <b><?= date("d/m(D)", strtotime($servico->getDataservico())) ?></b></li>
      <li class="list-group-item " aria-current="true"> <?= $servico->getHoraservico() . " (" . $servico->getDescricaoservico() . ")";  ?> </li>
      <br>
      <hr>
  </div>
  <div class=' container-fluid text-center container-lg'>
    <div class='row'>
      <div class='col col-sm-2'></div>
      <div class=' col col-sm-4'>
        <table>
          <li class="list-group-item lista-voluntarios text-center text-white " aria-current="true">
            <b> VOLUNTÁRIOS</b>
          </li>



          <?= $voluntarios ?>



        </table>
      </div>
      <div class='col col-sm-4'>
        <table>

          <li class="list-group-item lista-escalados text-center text-white" aria-current="true">
            <b>ESCALADOS</b>
          </li>
          </tr>
          </tr>


          <?= $escalados ?>

        </table>
      </div>
      <div class='col col-sm-2'></div>


    </div>
  </div>
  </div>
</body>