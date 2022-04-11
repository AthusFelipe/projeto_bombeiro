<?php
include "./../../protegesessao.php"; 

include "header.html"  ; 
include "controller.php";


?>

<!DOCTYPE html> 
<body>
<div class='form-group row'>
    <div class='container'>

<form method='get' action=''>
    <input type='number' name='idproduto' value='<?php echo $retProd->idprodutos ;?>' hidden><br>
    <label for='quantidade'>Produto</label>
    <div class="col-sm-10">

    <input type='text'  name='nomeproduto' value='<?php echo  $retProd->nomeprodutos ?>' disabled><br><br>
    </div>
        <label for='quantidade'>Quantidade</label>
        <div class="col-sm-10">

    <input type = 'number' name='quantidade' ><br>
        </div><br>
            <div class="col-sm-5">

    <input type='submit' name='adicionar' value='Adicionar' >
    <input type='submit' name='remover' value='    Retirar    ' >
</div>

</form>
    </div>
</div>



</body>

 <? include "footer.html"  ; ?>
