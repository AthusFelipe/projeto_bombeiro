<?php

include "./../../protegesessao.php";

include "controller.php";
include "header.html";

if (isset($_GET['idservico'])) {
  $conn->prepare('INSERT INTO servicosvoluntario (idservicos, idmilitar) VALUES (?,?)')->execute([$_GET['idservico'], $_SESSION['codfunc']]);
  header('Location: ./');
}



$lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC ')
  ->fetchAll(PDO::FETCH_OBJ);

$voluntario = '';
foreach ($lss as $serv) {
  $voluntario .= "    <tr>
                 
            <td>" . date("D d/m", strtotime($serv->dataservicos)) . "</td>
            <td>$serv->horaservicos</td>
            <td>$serv->descricaoservicos</td>
            <td><a href='?idservico=$serv->idservicos'>Voluntariar</a></td>
            </tr>";
}





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