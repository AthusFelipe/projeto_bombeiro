<?php


$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$total = (count($lss));
$registros = 10;
$numPaginas = ceil($total / $registros);
$inicio = ($registros * $pagina) - $registros;
$lss = $conn->query("SELECT * FROM servicos  ORDER BY dataservicos DESC limit $inicio , $registros")

  ->fetchAll(PDO::FETCH_OBJ);





$LISTATESTE = '';
$servicoss = '';
foreach ($lss as $serv) {

  $inicioMes = date("Y-m-01");
  $finalMes = date("Y-m-t");


  $totalEscalados = $conn->query("SELECT count(idmilitar1) as totalescalado FROM servicosescala WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ);
  $totalVoluntarios = $conn->query("SELECT count(idmilitar) as totalvoluntario FROM servicosvoluntario WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ);

  $esc = $conn->query(" SELECT usuarios.cargo, usuarios.nomeguerra, servicosescala.idservicos, servicosescala.idmilitar1 FROM usuarios, servicosescala WHERE usuarios.codfunc = servicosescala.idmilitar1 AND servicosescala.idservicos = $serv->idservicos ")->fetchAll(PDO::FETCH_OBJ);


  $escalados = '';
  foreach ($esc as $escalado) {
    $escalados .= $escalado->cargo . ' ' . $escalado->nomeguerra . '   ';
  }

  $totalEscalados->totalescalado < 1  ? $ret = "<font color='red'><b>DEFINIR ESCALA</b></font>" : $ret = "<font color='green'><b>$escalados</b></font>";

  $totalEscalados->totalescalado < 1 ? $styl = "aviso-escala" : $styl = '';
  $totalEscalados->totalescalado < 1  ? $imagem = " <figure><img src='yellowicon.png' width='24 height='24' class='d-inline-block align-top' </figure>" : $imagem = "";

  /*   $servicoss .= "    <tr> 
                            <th scope='col'>" . date('D-d/m', strtotime($serv->dataservicos)) . "
                            <hr>$serv->descricaoservicos</th>
                            <th scope='col'><br> <hr><a href='./moderarescala.php?idservico=$serv->idservicos'>$ret </a>

                            <hr>
                            $totalVoluntarios->totalvoluntario voluntários</th>
                            <th><hr>$imagem<hr></th>
                           

                        </tr>";
*/

  /*<ul class='list-group list-group-flush'><a href='./moderarescala.php?idservico=$serv->idservicos'>
<li class='list-group-item d-flex justify-content-between align-items-start $styl'>
                    <div class='ms-2 me-auto'>
                      <div class='fw-bold text-center'>" . $serv->descricaoservicos . " " . date('d/m', strtotime($serv->dataservicos)) . " </div>
                      <a class='text-center ' href='./moderarescala.php?idservico=$serv->idservicos'>$ret  </a>
                    </div>
                    <span class='badge bg-primary rounded-pill'>$totalVoluntarios->totalvoluntario</span>

                  </li></a></ul><br>

*/

  $LISTATESTE .= "  <div class='w3-card-4'>

    <header class='w3-container w3-light-grey'>
      <h3><a href='./moderarescala.php?idservico=$serv->idservicos'></h3>
    </header>
    
    <div class='w3-container ' >
    <p  >" . $serv->descricaoservicos . ' ' . date('d/m', strtotime($serv->dataservicos)) . "</p>
      <hr>
      <p>$ret</p>
      <p>$totalVoluntarios->totalvoluntario voluntários</p>

    </div>
    
    <button class='w3-button w3-block w3-dark-grey'>Gerenciar</button><br>
       </div><br>
  ";
}
