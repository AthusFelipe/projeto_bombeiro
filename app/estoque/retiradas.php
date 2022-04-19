<?php   
include "./../../protegesessao.php"; 

    include "controller.php" ;
    include "layout/header.html" ; 









?>




<div class='container' > 


<table class='table'>
  <tr>
    <th>Produto</th>
    <th>Total retirado</th>
  </tr>
  <?php $listaretiradas = "";
   foreach ($retiradas as $retirada) {
     $listaretiradas .= "
     <tr>
     <th> $retirada->nomeprodutos </th>
     <th>$retirada->totalretiradas </th>
     " ;

  }
  echo $listaretiradas ; 
?>

</div>

<?     include "header.html"  ;  ?>
