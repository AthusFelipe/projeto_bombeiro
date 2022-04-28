<?php



include "../../models/Servicos.php";
include "../../models/Conexao.php";
include "../../models/User.php";

include "./../login.php";





//CONEXAO COM O DB
$conn = Conexao::conectar();









//MEUSSERVICOS.PHP




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
