<?php


$conn = Conexao::conectar();


//BUSCA OS SERVIÇOS DO MILITAR COM BASE NO ID QUE JÁ ESTÃO NO BANCO

$buscaCheckbox = Servico::buscaVoluntarioDoMilitar($_SESSION['codfunc']);

$result = [];
foreach ($buscaCheckbox as $check) {
  $result[] .= $check->idservicos;   //CRIA UMA ARRAY $result COM TODOS OS idservicos DA PESQUISA ACIMA 
}


if(isset($_POST['idservicoescolhido'])){
  if(count($_POST['idservicoescolhido']) == 1){
    $conn->prepare('DELETE FROM servicosvoluntario WHERE idmilitar = ?')
         ->execute([$usuarioLogado->getCodfunc()]);
  }
}

//RECEBE O GET DOS CHECKS DOS SERVICOES SELECIONADOS (idservicoescolhido) E COMPARA COM O ARRAY $result (ARRAY COM OS SERVICOES ESCOLHIDOS QUE JA CONTAM
// NO BANCO DE DADOS, CASO HAJA ALTERACAO ELE IRÁ EXCLUIR DO BD OS CHECKS QUE FORAM 'DESCHECKADOS')
if (isset($_POST['idservicoescolhido'])) {

  $resultadoarray = array_diff($result, $_POST['idservicoescolhido']);
  foreach ($resultadoarray as $key => $value) {
    $conn->prepare('DELETE FROM servicosvoluntario WHERE idservicos = ? AND idmilitar = ?')->execute([$value, $_SESSION['codfunc']]);
  }
   header('Location: ./voluntario.php');
}

//PRIMEIRO VALIDA SE OS GETS JÁ CONSTAM EM BD, SE NÃO CONSTAR ELE ADICIONA OS NOVOS CHECKS AO BD
if (isset($_POST['idservicoescolhido'])) {

  $arrayid = $_POST['idservicoescolhido'];
  foreach ($arrayid as $c => $id) {
    $consulta = $conn->prepare(' SELECT * FROM servicosvoluntario WHERE idmilitar = ? AND idservicos  =  ?');
    $consulta->execute([$_SESSION['codfunc'], $id]);
    $r = $consulta->fetchAll(PDO::FETCH_OBJ);


    if (!$r) {
      $conn->prepare('INSERT INTO servicosvoluntario(idservicos,idmilitar) VALUES (?, ?)')->execute([$id, $_SESSION['codfunc']]);
    } else {
    }
  }
   header('Location: ./voluntario.php');
}





//LISTA OS SERVICOS DISPONIVEIS PARA VOLUNTARIADO
$lss = $conn->query("SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos asc, horaservicos ASC")
  ->fetchAll(PDO::FETCH_OBJ);
$voluntario = '';
foreach ($lss as $serv) {

  $res = in_array($serv->idservicos, $result) ? "checked" : "unchecked";
  $voluntario .= "    
  <tr><td style='border-bottom: 1px;border-style:solid;border-color:#cfcfcf'>$serv->horaservicos</td>
                   
              <td style='border-bottom: 1px;border-style:solid;border-color:#cfcfcf'>" . date("D d/m", strtotime($serv->dataservicos)) . "</td>   
              
              <td style='border-bottom: 1px;border-style:solid;border-color:#cfcfcf'>$serv->descricaoservicos</td>
              <td style='border-bottom: 1px;border-style:solid;border-color:#cfcfcf'><input name='idservicoescolhido[]' type='checkbox' value='$serv->idservicos' $res ></input></td>
                  </tr>";
}


