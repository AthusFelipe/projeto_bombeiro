<?php
include "Controllers/controller.php";

include "./../login.php";

include "./../../style/header.html";









?>
<html>



<div class='botao-voltar2'>
</div>
<div class='container'>

  <h3>HISTÓRICO DE RETIRADAS</h3>


  <table class='tabela'>
    <tr class='tabela-cabecalho'>
      <th>Produto</th>
      <th>Total retirado</th>
      <th>Militar</th>
      <th>Data</th>
    </tr>
    <?php $listaretiradas = "";
    foreach ($retiradas as $retirada) {
      $listaretiradas .= strtoupper("
     <tr>
     
     <th> $retirada->nomeprodutos </th>
     <th>$retirada->quantidaderetirada </th>
     <th>$retirada->cargo $retirada->nomeguerra </th>
     <th>$retirada->dataretirada </th>
     ");
    }
    echo $listaretiradas;
    ?>

</div>

<? include "header.html";  ?>