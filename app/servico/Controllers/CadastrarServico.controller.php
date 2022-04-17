<?php


include "controller.php";







if (isset($_POST['descricao']) && isset($_POST['dataservico'])) {
    if(empty($_POST['multiplicarservico'])){
        $_POST['multiplicarservico'] = 0 ; 
    }

    for ($i = 0; $i <= $_POST['multiplicarservico']; $i++){
        $addData = date('Y/m/d', strtotime($_POST['dataservico']."+{$i} days" )) ;

    $s1 = new Servico($_POST['descricao'], $addData, $_POST['horaservico']);
    $conn->prepare('INSERT INTO servicos (dataservicos, descricaoservicos, horaservicos) VALUES (?,?, ?)')
        ->execute([$s1->getDataservico(), $s1->getDescricaoservico(), $s1->getHoraservico()]);
    }
    header('Location: ./cadastrarservico.php');

}







if (isset($_GET['excluir'])) {
    $conn->prepare('DELETE FROM servicos WHERE idservicos = ?')->execute([$_GET['excluir']]);
    header('Location: ./cadastrarservico.php');
}







//BUSCA OS SERVIÇOS CADASTRADOS 
{
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $contaserv = $conn->query('SELECT * FROM servicos')->fetchAll();
    $total = (count($contaserv));
    $registros = 10;
    $numPaginas = ceil($total / $registros);
    $inicio = ($registros * $pagina) - $registros;
    $servicos = $conn->query("SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC limit $inicio , $registros")
        ->fetchAll(PDO::FETCH_OBJ);
    $servico = '';
    foreach ($servicos as $serv) {
        $servico .= " <tr>
                        
                        <td>" . date("D d/m", strtotime($serv->dataservicos)) . "</td>
                        <td>$serv->horaservicos</td>
                        <td>$serv->descricaoservicos</td>
                        <td><a href='?excluir=$serv->idservicos'><button class='btn btn-sm btn-primary'><i class='bi bi-trash'> Excluir</i></button></a></td>
                        </tr>";
    }
}
