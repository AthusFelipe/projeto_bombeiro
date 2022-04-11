<?php

include "controller.php";
$conn = Conexao::conectar();


//SE INSERE NO VOLUNTARIO
if (isset($_GET['idservico'])) {
    $inserrt = $conn->prepare('INSERT INTO servicosvoluntario (idservicos, idmilitar) VALUES (?,?)')->execute([$_GET['idservico'], $_SESSION['codfunc']]);
    header('Location: voluntario.php');
}


//LISTA OS SERVICOS DISPONIVEIS PARA VOLUNTARIADO
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

//RETIRA O VOLUNTARIADO 
if (isset($_GET['excluirvoluntario'])) {
    $exc = $conn->prepare('DELETE FROM servicosvoluntario WHERE idservicosvoluntario = ?')->execute([$_GET['excluirvoluntario']]);
}
$lsss = $conn->prepare('SELECT idservicosvoluntario, idmilitar, descricaoservicos, dataservicos, horaservicos  FROM servicosvoluntario, servicos
                           WHERE servicos.dataservicos >= curdate() AND servicosvoluntario.idservicos = servicos.idservicos AND  servicosvoluntario.idmilitar = ? 
                            ORDER BY servicos.dataservicos DESC, servicos.horaservicos ASC ');
$lsss->execute([$_SESSION['codfunc']]);
$lss = $lsss->fetchAll(PDO::FETCH_OBJ);

$voluntario1 = '';
foreach ($lss as $serv1) {
    $voluntario1 .= "    <tr>
                   
              <td>" . date("D d/m", strtotime($serv1->dataservicos)) . "</td>
              <td>$serv1->horaservicos</td>
              <td>$serv1->descricaoservicos</td>
              <td><a href='?excluirvoluntario=$serv1->idservicosvoluntario'>Excluir</a></td>
              </tr>";
}
