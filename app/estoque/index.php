<?php   
include "./../../protegesessao.php"; 
  include "controller.php" ;
include "header.html" ; 




?>




<div class='container' > 
<div >
<a href='novoproduto.php'> <input class="float-right  btn btn-secondary" type='button' value='Cadastrar produto'> </a> </div>


<table class='table'>
  <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Quantidade</th>
  </tr>
  <?php $listaProdutos = "";
   foreach ($estoque as $produto) {
     $listaProdutos .= "
     <tr>
     <th> $produto->idprodutos </th>
     <form method='get' action=''> <th> <a href='produto.php?selecionado=".$produto->idprodutos."'>$produto->nomeprodutos</a> 
     <th>$produto->quantidadeprodutos </th>
     " ;

  }
  echo $listaProdutos ; 
?>

</div>



<?     include "header.html"  ;  ?>
