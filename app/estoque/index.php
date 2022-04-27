<?php
// include "./../../protegesessao.php";
session_start();
include "Controllers/IndexController.php";
include "./../../style/header.html";



?>

<style>

</style>


<div class='container'>


  <table class='tabela'>

    <tr class='tabela-cabecalho'>

      <th>Produto</th>
      <th>Quantidade</th>
      <th> #</th>

    </tr>

    <?php $listaProdutos = "";
    foreach ($estoque as $produto) {
      $listaProdutos .= "
     <tr  class='itemtabela-selecionado'>
     
         
     <form method='get' action=''> <th 'itemtabela-selecionado'> <a  'itemtabela-selecionado' href='produto.php?selecionado=" . $produto->idprodutos . "'>$produto->nomeprodutos</a> 
     <th 'itemtabela-selecionado'>$produto->quantidadeprodutos </th><th 'itemtabela-selecionado'><a 'itemtabela-selecionado' href='index.php?excluir=" . $produto->idprodutos . "'>EXCLUIR</a> </th>
     ";
    }
    echo $listaProdutos;
    ?>

</div>



<? include "header.html";  ?>