<?php
// include "./../../protegesessao.php";
include "Controllers/IndexController.php";



include "./../login.php";
include "./../../style/header.html";



?>

<style>

</style>


<div class='container'>
  <h3>ESTOQUE</h3>


  <table class='tabela'>
<?= $usuarioLogado->getNomeguerra();?>
    <tr class='tabela-cabecalho'>

      <th>Produto</th>
      <th>Quantidade</th>
      <th> #</th>

    </tr>

    <?php $listaProdutos = "";

    foreach ($estoque as $produto) {

      $usuarioLogado->getNivelAcesso() == 2 ? $escondeOpcao = "<th class='itemtabela-selecionado'><a class='itemtabela-selecionado' href='index.php?excluir=".$produto->idprodutos."'>EXCLUIR</a> </th>' " : $escondeOpcao = ''; 





      $listaProdutos .= "
     <tr  class='itemtabela-selecionado'>
     
         
     <form method='get' action=''> <th class='itemtabela-selecionado'> <a  class='itemtabela-selecionado' href='produto.php?selecionado=" . $produto->idprodutos . "'>$produto->nomeprodutos</a> 
     <th class='itemtabela-selecionado'>$produto->quantidadeprodutos </th> $escondeOpcao    ";
    }
    echo $listaProdutos;
    ?>

</div>



<? include "header.html";  ?>