<?php



include "../../models/Servicos.php"; 
include "../../models/Conexao.php";





//CONEXAO COM O DB
$conn = Conexao::conectar(); 

//CADASTRA NOVO SERVICO

if(isset($_POST['descricao']) && isset( $_POST['dataservico'])){

    $s1 = new Servico($_POST['descricao'], $_POST['dataservico'], $_POST['horaservico']) ;
    $conn->prepare('INSERT INTO servicos (dataservicos, descricaoservicos, horaservicos) VALUES (?,?, ?)')
         ->execute([$_POST['dataservico'], $_POST['descricao'], $_POST['horaservico']]); 

}

//BUSCA OS SERVICOS PARA O PAINEL DE SERVICOS
// $servicos = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC limit $inicio,$registros')
                //  ->fetchAll(PDO::FETCH_OBJ) ; 


                 //
                 $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                $contaserv = $conn->query('SELECT * FROM servicos')->fetchAll();
                 $total = (count($contaserv)) ; 
                 $registros = 12 ;
                 $numPaginas = ceil($total/$registros) ; 
                 $inicio = ($registros * $pagina)- $registros; 
                 $servicos = $conn->query("SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC limit $inicio , $registros")
                 ->fetchAll(PDO::FETCH_OBJ) ; 

                                    
                           

                 $servico = '';
                 foreach($servicos as $serv){
                 $servico .= " <tr>
                 
                 <td>".date("D d/m", strtotime($serv->dataservicos))."</td>
                 <td>$serv->horaservicos</td>
                 <td>$serv->descricaoservicos</td>
                 <td><a href='?excluir=$serv->idservicos'>Excluir</a></td>
                 </tr>"  ; 




                }


if(isset($_GET['excluir'])){
    $conn->prepare('DELETE FROM servicos WHERE idservicos = ?')->execute([$_GET['excluir']]);
    header('Location: cadastrarservico.php') ; 


}




//MEUSSERVICOS.PHP
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
          
          if(isset($_GET['inserirvoluntario'])){
            $conn->prepare('INSERT INTO servicosvoluntario (idservicos, idmilitar) VALUES (?,?)')->execute([57, 1]) ;
          }
          
          $lss = $conn->query('SELECT * FROM servicos WHERE dataservicos >= curdate() ORDER BY dataservicos DESC, horaservicos ASC ')
                      ->fetchAll(PDO::FETCH_OBJ) ;
          
                  $voluntarios = '' ; 
                  foreach($lss as $ls){
                      $voluntarios .= "    <tr>
                           
                      <td>".date("D d/m", strtotime($ls->dataservicos))."</td>
                      <td>$ls->horaservicos</td>
                      <td>$ls->descricaoservicos</td>
                      <td><a href='?inserirvoluntario=5'>Voluntariar</a></td>
                      </tr>" ;
                      
                  }
          
  
