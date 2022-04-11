
<?php  
include "./../../protegesessao.php"; 

include "controller.php" ;
include "header.html" ; 
?>
<!DOCTYPE html>
    <div class='form-group row'>
    <div class='container'>
    <form method='post' action=''>
    <label for='nomeproduto'> Nome do produto</label>
    <div class="col-sm-10">
    <input type='text' name='nomeproduto'>
</div><br>
    <label for='quantidadeproduto'>Quantidade: </label>
    <div class="col-sm-10">
    <input type='number' name='quantidadeproduto'><br><br>
</div>
<div class="col-sm-10">
    <input type='submit' value='Cadastrar'>  
</div>
</div>
</div>


</html>

<?php     include "footer.html"  ; 
?>