<?php
// include "./../../protegesessao.php";
include "Controllers/IndexController.php";



include "./../login.php";
include "./../../style/header.html";


$listaProdutos = "";

foreach ($estoque as $produto) {

  $usuarioLogado->getNivelAcesso() == 2 ? $escondeOpcao = "<th class='itemtabela-selecionado'><a class='itemtabela-selecionado botao-estoque-retirar' style='background-color:white;color:red;border-radius:8px;' href='index.php?excluir=" . $produto->idprodutos . "'>excluir</a> </th></tr> " : $escondeOpcao = '';





  $listaProdutos .= "
     <tr  class='itemtabela-selecionado'>      
     <th class='itemtabela-selecionado'> 
     <a  class='itemtabela-selecionado' href='produto.php?selecionado=" . strtoupper($produto->idprodutos) . "'>" . strtoupper($produto->nomeprodutos) . "</a> 
     <th class='itemtabela-selecionado'>$produto->quantidadeprodutos </th> $escondeOpcao    ";
}
?>

<style>

</style>


<div class='container'>
  <h3>ALMORAFIXADO</h3>


  <table class='tabela'>
    <tr class='tabela-cabecalho'>

      <th>Produto</th>
      <th>Quantidade</th>
      <th> #</th>

    </tr>

    <?php
    echo $listaProdutos;
    ?>

</div>