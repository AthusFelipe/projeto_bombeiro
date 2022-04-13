<?php


$lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY idservicos ASC')

    ->fetchAll(PDO::FETCH_OBJ);




$LISTATESTE = '';
$servicoss = '';
foreach ($lss as $serv) {
    $totalEscalados = $conn->query("SELECT count(idmilitar1) as totalescalado FROM servicosescala WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ);
    $totalVoluntarios = $conn->query("SELECT count(idmilitar) as totalvoluntario FROM servicosvoluntario WHERE idservicos = $serv->idservicos")->fetch(PDO::FETCH_OBJ);

    $totalEscalados->totalescalado < 1  ? $ret = "<font color='red'><b>DEFINIR ESCALA</b></font>" : $ret = "<font color='green'><b>$totalEscalados->totalescalado ESCALADOS</b></font>";

    $totalEscalados->totalescalado < 1 ? $styl = "list-group-item-warning" : $styl = '';
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


    $LISTATESTE .= "  
    <ul class='list-group list-group-flush'>
    <li class='list-group-item d-flex justify-content-between align-items-start $styl'>
                        <div class='ms-2 me-auto'>
                          <div class='fw-bold'>" . $serv->descricaoservicos . " " . date('d/m', strtotime($serv->dataservicos)) . " </div>
                          <a href='./moderarescala.php?idservico=$serv->idservicos'>$ret  </a>
                        </div>
                        <span class='badge bg-primary rounded-pill'>$totalVoluntarios->totalvoluntario</span>

                      </li></ul><br>";
}
