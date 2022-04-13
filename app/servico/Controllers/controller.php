<?php



include "../../models/Servicos.php";
include "../../models/Conexao.php";





//CONEXAO COM O DB
$conn = Conexao::conectar();









//MEUSSERVICOS.PHP
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





if (isset($_GET['inserirvoluntario'])) {
    $conn->prepare('INSERT INTO servicosvoluntario (idservicos, idmilitar) VALUES (?,?)')->execute([57, 1]);
}

$lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC ')
    ->fetchAll(PDO::FETCH_OBJ);

$voluntarios = '';
foreach ($lss as $ls) {
    $voluntarios .= "    <tr>
                           
                      <td>" . date("D d/m", strtotime($ls->dataservicos)) . "</td>
                      <td>$ls->horaservicos</td>
                      <td>$ls->descricaoservicos</td>
                      <td><a href='?inserirvoluntario=5'>Voluntariar</a></td>
                      </tr>";
}
