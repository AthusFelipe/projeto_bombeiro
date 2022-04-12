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








<body>




  <div class='body'>

    <div id='meio' class='container text-center center '>



      <a href='./voluntario.php'>
        <div class="card text-white  mb-3" style="max-width: 16rem;">
          <div class="card-body">
            <h5 class="card-title">VOLUNTARIO</h5>
          </div>
        </div>
      </a>

      <a href='./gerenciarescala.php'>
        <div class="card text-white  mb-3" style="max-width: 16rem;">
          <div class="card-body">
            <h5 class="card-title">GERENCIAR ESCALAS</h5>
          </div>
        </div>
      </a>

      <a href='./cadastrarservico.php'>
        <div class="card text-white  mb-3" style="max-width: 16rem;">
          <div class="card-body">
            <h5 class="card-title">CADASTRAR SERVIÇO</h5>
          </div>
        </div>
      </a>


    </div>



  </div>
  </div>

  </div>

  </div>



</body>