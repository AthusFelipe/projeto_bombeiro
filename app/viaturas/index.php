<?php

include "controller.php";


function listaViaturas()
{
    global $conn;
    $listaViaturas =   $conn->query('SELECT * FROM viaturascadastro, viaturasinformacao WHERE viaturascadastro.idviaturas = viaturasinformacao.idviatura')
        ->fetchAll(PDO::FETCH_OBJ);


    $listarVtrs = '';
    foreach ($listaViaturas as $viatura) {
        $listarVtrs .=
            "<section class='cartao'> 
        <div class='card' style='width: 20rem;'>
        <img src='$viatura->fotoviatura' class='card-img-top' >
        <div class='card-body'>
          <h5 class='card-title'>$viatura->nomeviatura</h5>
          <p class='card-text'>$viatura->modelo $viatura->fabricante $viatura->categoria </p>
          <a href='viatura.php?idviatura=$viatura->idviatura' class='btn btn-primary'>LINK PARA ABRIR VTR</a>
        </div>
      </div>
      </div>
      </section>
          
           ";
    }

    echo $listarVtrs;
}



include "layout/header.html";
?>


<!DOCTYPE html>
<style>
  .meiota {
    display: inline-flex;
    gap: 50px;
    margin: auto;
    align-self: center;


   
    width: 100%;
    justify-content: center;;

  }
 .menusuperir{
   text-align: center;
   justify-content: center;
    color: black;
 }
 .viaturas{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  gap: 0;



  border-color:black;
    border-style:solid;
    border-width: 10px;
    padding: 0 ; 
    margin: 0 ;

 }


 .cartao{
flex-grow: 1 ;
  display: flex;
  border-color:red;
    border-style:solid;
    border-width: 10px;
    margin: 0;
    flex-direction: row;
 }
</style>

<body>
<ul>
<div class='meiota'>
    <li><a class='menusuperir' href='novoabastecimento.php'>Novo Abastecimento</a></li>
    <li><a  class='menusuperir' href='cadastrarviatura.php'>Cadastrar viatura </a></li>
    <li><a class='menusuperir' href='deslocamento.php'>Deslocamentos </a></li>
    </div>
  </ul>
  </div>
<div class='cartao'>
<pre><?= listaViaturas(); ?> </pre>
</div>



</body>
</html>