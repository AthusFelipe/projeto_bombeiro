<?php


$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$total = (count($lss));
$registros = 10;
$numPaginas = ceil($total / $registros);
$inicio = ($registros * $pagina) - $registros;
$diaAtual = date('Y-m-d');

$lss = $conn->query("SELECT * FROM servicos  where dataservicos >= CURDATE() ORDER BY dataservicos ASC limit $inicio , $registros")

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

  $totalEscalados->totalescalado < 1  ? $ret = "<div style='text-decoration:none;'><font color='red'><b>DEFINIR ESCALA</b></font></div>" : $ret = "<font color='green'><b>$escalados</b></font>";
  $totalEscalados->totalescalado < 1  ? $backgroundcolor = "background-color:#fdff7a;" : $backgroundcolor = "background-color:#7cff7a; ";
  $totalEscalados->totalescalado < 1 ? $styl = "aviso-escala" : $styl = '';
  $totalEscalados->totalescalado < 1  ? $imagem = " <figure><img src='yellowicon.png' width='24 height='24' class='d-inline-block align-top' </figure>" : $imagem = "";
  $totalEscalados->totalescalado < 1  ?  $gerenciaroualterar = "GERENCIAR" : $gerenciaroualterar = "ALTERAR";
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

  $LISTATESTE .= "  



<div class=' w3-quarter w3-center w3-container'  style='box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; border-color:black;border-width:0px;border-style:solid;margin:12px;border-radius:15px;'>
  
      <h3 style='text-decoration:none;' ><a class='cartao-servico'  style='textdecoration:none; 'href='./moderarescala.php?idservico=$serv->idservicos'></h3>   
   
    <p style='font-width:bold;' >" . $serv->descricaoservicos . ' ' . date('d/m', strtotime($serv->dataservicos)) . "</p>
      
      <p>$ret</p>
      <p class='cartao-servico' >$totalVoluntarios->totalvoluntario voluntários</p>

    
    
    <button class='w3-button  w3-block' style='$backgroundcolor;text-decoration:none;border-radius:5px;'>$gerenciaroualterar</button>
    </div>
    </div>




  ";
}
