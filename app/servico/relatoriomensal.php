<?php
include "./../../protegesessao.php";
include "Controllers/controller.php"; 



$contagemMensal = $conn->query("SELECT  usuarios.nomeguerra as nomeguerra, usuarios.cargo as cargo, count(servicos.idservicos) as totalservicosmes
                                FROM servicosescala, servicos, usuarios 
                                WHERE servicos.idservicos = servicosescala.idservicos
                                 AND month(servicos.dataservicos) = month(curdate()) 
                                 AND usuarios.codfunc = servicosescala.idmilitar1 
                                 GROUP BY servicosescala.idmilitar1 ORDER BY usuarios.nomeguerra")
                       ->fetchAll(PDO::FETCH_OBJ);



$tabelaMilitarMensal = ''; 
foreach ($contagemMensal as $militarMensal){



    $tabelaMilitarMensal .=   "<tr>
    <th scope='row'>$militarMensal->cargo $militarMensal->nomeguerra</th>
    <td>$militarMensal->totalservicosmes</td>
    
  </tr>"
    
    
    ; 
}

function mesAtual(){
    $hoje = getdate(); 
    echo  $hoje['month']; 
} 


include "layout/header.html"; 
?>

<!DOCTYPE html>
<style>
     .containert {
        width:fit-content;
        
    }

    .thead-color{
        background-color: #bf0000 ; 
    }

    div{
        margin: 0 auto ; 
        margin-top: 30px; 
        align-items: center;
    }
    table{
      margin: 0 auto;
    
        min-width: fit-content ; 
        border-style:solid;
      border-color: #bf0000;
      padding: 10px;
    }
</style>
<body>


<div class='container-fluid containert text-center'>
        <a href='./index.php'><button class='btn btn-danger'>VOLTAR </button></a><br>
      

    <br>
        <p class='center-text' >MÊS: <b><?= mesAtual()  ?></b> </p></div>
    <div class='containert container-fluid'>
        
<table class="table text-center">
  <thead class='thead-color' >
    <tr>
      <th scope="col">MILITAR</th>
      <th scope="col">SERVIÇOS</th>
    </tr>
  </thead>
  <tbody>
<?= $tabelaMilitarMensal ;?>
  </tbody>
</table>
</div>

</body>