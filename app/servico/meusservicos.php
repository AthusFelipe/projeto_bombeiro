<?php

include "./../../protegesessao.php"; 

include "controller.php" ; 
include "header.html" ; 

if(isset($_GET['excluirvoluntario'])){
  $exc = $conn->prepare('DELETE FROM servicosvoluntario WHERE idservicosvoluntario = ?')->execute([$_GET['excluirvoluntario']]); 
}


$lsss = $conn->prepare('SELECT idservicosvoluntario, idmilitar, descricaoservicos, dataservicos, horaservicos  FROM servicosvoluntario, servicos
                         WHERE servicos.dataservicos >= curdate() AND servicosvoluntario.idservicos = servicos.idservicos AND  servicosvoluntario.idmilitar = ? 
                          ORDER BY servicos.dataservicos DESC, servicos.horaservicos ASC ') ; 
          $lsss->execute([$_SESSION['codfunc']]);
                     $lss= $lsss->fetchAll(PDO::FETCH_OBJ) ;

        $voluntario1 = '' ; 
        foreach($lss as $serv1){
            $voluntario1 .= "    <tr>
                 
            <td>".date("D d/m", strtotime($serv1->dataservicos))."</td>
            <td>$serv1->horaservicos</td>
            <td>$serv1->descricaoservicos</td>
            <td><a href='?excluirvoluntario=$serv1->idservicosvoluntario'>Excluir</a></td>
            </tr>" ;
            
        }

                      



?>


<!DOCTYPE html>
<body>
<table class="table">
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

</body>


</html>
