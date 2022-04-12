<?php

include "./../../protegesessao.php";



include "header.html";

include "controller.php";
$conn = Conexao::conectar();





//BUSCA OS SERVIÇOS DO MILITAR COM BASE NO ID QUE JÁ ESTÃO NO BANCO
$retornacheck = $conn->prepare('SELECT * FROM servicosvoluntario WHERE idmilitar = ?');
$retornacheck->execute([$_SESSION['codfunc']]);
$buscaCheckbox = $retornacheck->fetchAll(PDO::FETCH_OBJ);

$result = [];
foreach ($buscaCheckbox as $check) {
  $result[] .= $check->idservicos;   //CRIA UMA ARRAY $result COM TODOS OS idservicos DA PESQUISA ACIMA 
}




//RECEBE O GET DO 
if (isset($_POST['idservicoescolhido'])) {
  $resultadoarray = array_diff($result, $_POST['idservicoescolhido']);
  foreach ($resultadoarray as $key => $value) {
    $conn->prepare('DELETE FROM servicosvoluntario WHERE idservicos = ? AND idmilitar = ?')->execute([$value, $_SESSION['codfunc']]);
  }
  header('Location: voluntariocopy.php');
}



//SE INSERE NO VOLUNTARIO
// if (isset($_POST['idservicoescolhido'])) {
//   $inserrt = $conn->prepare('INSERT INTO servicosvoluntario (idservicos, idmilitar) VALUES (?,?)')->execute([$_POST['idservicoescolhido'], $_SESSION['codfunc']]);
//   header('Location: voluntario.php');
// }


if (isset($_POST['idservicoescolhido'])) {

  $arrayid = $_POST['idservicoescolhido'];
  foreach ($arrayid as $c => $id) {
    $consulta = $conn->prepare(' SELECT * FROM servicosvoluntario WHERE idmilitar = ? AND idservicos  =  ?');
    $consulta->execute([$_SESSION['codfunc'], $id]);
    $r = $consulta->fetchAll(PDO::FETCH_OBJ);


    if (!$r) {
      $conn->prepare('INSERT INTO servicosvoluntario(idservicos,idmilitar) VALUES (?, ?)')->execute([$id, $_SESSION['codfunc']]);
      echo "Serviço $id inserido com sucesso ao militar codfunc 999 <br>";
    } else {
    }


    // $conn->prepare('INSERT INTO servicosvoluntario(idservicos,idmilitar) VALUES (?, ?)')->execute([$id, 999]);
    // echo "Serviço $id inserido com sucesso ao militar codfunc 999 <br>";
  }
  header('Location: voluntariocopy.php');
}





//LISTA OS SERVICOS DISPONIVEIS PARA VOLUNTARIADO
$lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC ')
  ->fetchAll(PDO::FETCH_OBJ);
$voluntario = '';
foreach ($lss as $serv) {
  $res = in_array($serv->idservicos, $result) ? "checked" : "unchecked";
  $voluntario .= "    <tr><td>$serv->idservicos</td>
                   
              <td>" . date("D d/m", strtotime($serv->dataservicos)) . "</td>   
              <td>$serv->horaservicos</td>
              <td>$serv->descricaoservicos</td>
              <td><input name='idservicoescolhido[]' type='checkbox' value='$serv->idservicos' $res ></input></td>
                  </tr>";
}










echo $_SESSION['codfunc'];
?>


<!DOCTYPE html>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <a href='./index.php'><button>VOLTAR </button></a>
        <form method='post'>
          <input type='submit' value='salvar'>
          <table id='pager' class="table">
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
              _____________________________________________<input type='submit' value='salvar'>
        </form>
        </tbody>

        </table>




</body>









</html>