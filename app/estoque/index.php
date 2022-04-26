<?php
// include "./../../protegesessao.php";
session_start();
include "Controllers/IndexController.php";
include "layout/header.html";



?>

<style>
  * {
    border: 2px solid red;
  }
</style>

<div class='botao'>
  <a href='novoproduto.php'> <input class="float-right  btn btn-secondary" type='button' value='Cadastrar produto'> </a>
</div>

<div class='container'>


  <table class='table'>
    <tr>
      <th>Produto</th>
      <th>Quantidade</th>
      <th> </th>
    </tr>
    <?php $listaProdutos = "";
    foreach ($estoque as $produto) {
      $listaProdutos .= "
     <tr>
     
         
     <form method='get' action=''> <th> <a href='produto.php?selecionado=" . $produto->idprodutos . "'>$produto->nomeprodutos</a> 
     <th>$produto->quantidadeprodutos </th><th><a href='index.php?excluir=" . $produto->idprodutos . "'>EXCLUIR</a> </th>
     ";
    }
    echo $listaProdutos;
    ?>

</div>



<? include "header.html";  ?>