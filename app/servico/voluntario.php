<?php

include "./../../protegesessao.php";
include "Voluntario.controller.php";



include "header.html";







?>


<!DOCTYPE html>

<body>
  <div class="container">
    <div class="row">
      <div class="col">

        <table class="table">
          <p>Serviços disponíveis</p>
          <thead>
            <tr>
              <th scope="col">DIA</th>
              <th scope="col">HORA</th>
              <th scope="col">DESCRICAO</th>
            </tr>
          </thead>
          <tbody>
            <?= $voluntario ?>

          </tbody>

        </table>
      </div>
      <div class="col">
        <table class="table">
          <p>Serviços voluntariados
            <thead>
              <tr>
                <th scope="col">DIA</th>
                <th scope="col">HORA</th>
                <th scope="col">DESCRICAO</th>
              </tr>
            </thead>
            <tbody>
              <?= $voluntario1 ?>

            </tbody>

        </table>
      </div>

    </div>
  </div>
</body>









</html>