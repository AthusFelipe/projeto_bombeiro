<?php

include "./../../protegesessao.php";


include "./Controllers/Voluntario.controller.php";


$conn = Conexao::conectar();





// //BUSCA OS SERVIÇOS DO MILITAR COM BASE NO ID QUE JÁ ESTÃO NO BANCO
// $retornacheck = $conn->prepare('SELECT * FROM servicosvoluntario WHERE idmilitar = ?');
// $retornacheck->execute([$_SESSION['codfunc']]);
// $buscaCheckbox = $retornacheck->fetchAll(PDO::FETCH_OBJ);

// $result = [];
// foreach ($buscaCheckbox as $check) {
//   $result[] .= $check->idservicos;   //CRIA UMA ARRAY $result COM TODOS OS idservicos DA PESQUISA ACIMA 
// }




// //RECEBE O GET DOS CHECKS DOS SERVICOES SELECIONADOS (idservicoescolhido) E COMPARA COM O ARRAY $result (ARRAY COM OS SERVICOES ESCOLHIDOS QUE JA CONTAM
// // NO BANCO DE DADOS, CASO AJA ALTERACAO ELE IRÁ EXCLUIR DO BD OS CHECKS QUE FORAM 'DESCHECKADOS)
// if (isset($_POST['idservicoescolhido'])) {
//   $resultadoarray = array_diff($result, $_POST['idservicoescolhido']);
//   foreach ($resultadoarray as $key => $value) {
//     $conn->prepare('DELETE FROM servicosvoluntario WHERE idservicos = ? AND idmilitar = ?')->execute([$value, $_SESSION['codfunc']]);
//   }
//   header('Location: voluntariocopy.php');
// }

// //PRIMEIRO VALIDA SE OS GETS JÁ CONSTAM EM BD, SE NÃO CONSTAR ELE ADICIONA OS NOVOS CHECKS AO BD
// if (isset($_POST['idservicoescolhido'])) {

//   $arrayid = $_POST['idservicoescolhido'];
//   foreach ($arrayid as $c => $id) {
//     $consulta = $conn->prepare(' SELECT * FROM servicosvoluntario WHERE idmilitar = ? AND idservicos  =  ?');
//     $consulta->execute([$_SESSION['codfunc'], $id]);
//     $r = $consulta->fetchAll(PDO::FETCH_OBJ);


//     if (!$r) {
//       $conn->prepare('INSERT INTO servicosvoluntario(idservicos,idmilitar) VALUES (?, ?)')->execute([$id, $_SESSION['codfunc']]);
//       echo "Serviço $id inserido com sucesso ao militar codfunc 999 <br>";
//     } else {
//     }


//     // $conn->prepare('INSERT INTO servicosvoluntario(idservicos,idmilitar) VALUES (?, ?)')->execute([$id, 999]);
//     // echo "Serviço $id inserido com sucesso ao militar codfunc 999 <br>";
//   }
//   header('Location: voluntariocopy.php');
// }





// //LISTA OS SERVICOS DISPONIVEIS PARA VOLUNTARIADO
// $lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC ')
//   ->fetchAll(PDO::FETCH_OBJ);
// $voluntario = '';
// foreach ($lss as $serv) {
//   $res = in_array($serv->idservicos, $result) ? "checked" : "unchecked";
//   $voluntario .= "    <tr><td>$serv->idservicos</td>

//               <td>" . date("D d/m", strtotime($serv->dataservicos)) . "</td>   
//               <td>$serv->horaservicos</td>
//               <td>$serv->descricaoservicos</td>
//               <td><input name='idservicoescolhido[]' type='checkbox' value='$serv->idservicos' $res ></input></td>
//                   </tr>";
// }







include "header.html";



// 
?>


<!DOCTYPE html>
<style>
  .thead {
    background: #817e7e;
  }

  .btn {
    padding: 15px;
    line-height: 15px;
  }

  .esquerda{
    margin-right: 500px;
  }
  .direita{
    margin-left: 500px;
  }
</style>

<body>
  <div class="container text-center">
  <br>
  <div class=''>
    <a href='./index.php'><button class='btn btn-danger'>VOLTAR </button></a></div>
    <form method='post'><div class=''>
    <input class='btn btn-success' type='submit' value='SALVAR'>
  

   
</div>
<h1>Serviços disponíveis</h1>
      <div class='table-responsive'>
        <table class="table   table-hover ">

          <thead class='thead'>
            <tr>
              <th scope="col">HORA</th>
              <th scope="col">DIA</th>
              <th scope="col">DESCRICAO</th>
              <th scope="col">STATUS</th>
            </tr>
          </thead>
          <tbody>


            <?= $voluntario ?>
            <div class='alinhardireita container'>
           
            
   
    </tbody>

    </table>
    
   
    <div class='mxauto' style='height: 65px;'>
    <div class=''><input class='btn btn-success' type='submit' value='SALVAR'>
</div></div></div>
            </form>
  </div>




</body>









</html>