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
            " <div class='flex text-center'>
        <div class='card' style='width: 20rem;'>
        <img src='$viatura->fotoviatura' class='card-img-top' >
        <div class='card-body'>
          <h5 class='card-title'>$viatura->nomeviatura</h5>
          <p class='card-text'>$viatura->modelo $viatura->fabricante $viatura->categoria </p>
          <a href='viatura.php?idviatura=$viatura->idviatura' class='btn btn-primary'>LINK PARA ABRIR VTR</a>
        </div>
      </div>
      </div>
          
           ";
    }

    echo $listarVtrs;
}



include "layout/header.html";
?>


<!DOCTYPE html>

<ul>
    <li><a href='novoabastecimento.php'>Novo Abastecimento</a></li>
    <li><a href='cadastrarviatura.php'>Cadastrar viatura </a></li>
    <li><a href='deslocamento.php'>Deslocamentos </a></li>
  </ul>

<pre><?= listaViaturas(); ?> </pre>


</html>