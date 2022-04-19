<?php

include "./../../protegesessao.php";

include "./Controllers/CadastrarServico.controller.php";

include "layout/header.html";
setlocale(LC_TIME, 'portuguese');






?>



<!DOCTYPE html>
<style>
  .table-red {
    background-color: #bf0000;

  }
</style>

<body>
  <div class="container">

    <div class="row">
      <div class="col-sm"> <br>
        <a href='./index.php'><button class='btn btn-sm btn-primary'>VOLTAR</button></a><br>
        <form method='POST' action='cadastrarservico.php'>

          <br>
          <div class='form-group row col-sm-10 form-control'>


            <h3>Cadastrar novo serviço</h3>
            <label for='descricao'>Descrição do servico</label>
            <input type='text' name='descricao'><br>
            <label for='dataservico'>Data do serviço</label>
            <input type='date' name='dataservico'><br>
            <label for='horaservico'>Horário do serviço</label>
            <input type='time' name='horaservico'><br>
            <label for='multiplicarservico'>Multiplicar serviço</label>
            <input type='number' name='multiplicarservico' placeholder='Quantas vezes o serviço será repetido?'><br><br>
            <input class="btn btn-success" type='submit' value='Criar'>

        </form>
      </div>
    </div>
    <div class="col-sm">
      <table class="table">
        <thead class='table-red text-white'>
          <h2>
            <center>Serviços cadastrados</center>
          </h2>
          <tr>
            <th scope="col">HORA</th>
            <th scope="col">DIA</th>
            <th scope="col">SERVIÇO</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?= $servico ?>

        </tbody>


      </table>
      Página:
      <?php for ($i = 1; $i < $numPaginas + 1; $i++) {
        echo "<a href='?pagina=$i'>" . $i . "</a> ";
      } ?>
    </div>


  </div>

  </div>



</body>


</html>