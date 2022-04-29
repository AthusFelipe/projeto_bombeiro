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
      "

            <div class='card' style='width: 18rem;'>
            <img class='' style='width:auto; height:auto;' src='$viatura->fotoviatura' >

            <div class='card-body'>
  <h1 class='card-title'>$viatura->nomeviatura</h1>
        
        
          <p >$viatura->modelo $viatura->fabricante $viatura->categoria </p>
         <p> <a href='viatura.php?idviatura=$viatura->idviatura' class='btn btn-primary'> CONSULTAR</a></p>
       </div>
          </div>
           ";
  }

  echo $listarVtrs;
}



include "./../../style/header.html";

?>


<!DOCTYPE html>
<style>
  .meiota {
    display: inline-flex;
    gap: 50px;
    margin: auto;
    align-self: center;



    width: 100%;
    justify-content: center;
    ;

  }

  .menusuperir {
    text-align: center;
    justify-content: center;
    color: black;
  }

  .viaturas {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0;



    border-color: black;
    border-style: solid;
    border-width: 10px;
    padding: 0;
    margin: 0;

  }


  .cartao {
    flex-grow: 1;
    display: flex;
    border-color: red;
    border-style: solid;
    border-width: 10px;
    margin: 0;
    flex-direction: row;
  }
</style>

<body>
  <ul style='display:inline;'>
    <li><a href='novoabastecimento.php'>Novo Abastecimento</a></li>
    <li><a href='cadastrarviatura.php'>Cadastrar viatura </a></li>
    <li><a href='deslocamento.php'>Deslocamentos </a></li>

  </ul>


  <div style='display: flex;flex-wrap:wrap;justify-content:center;gap:20px;'>
    <?= listaViaturas(); ?>
  </div>





</body>

</html>