<?php
include "./../../protegesessao.php";

include "Controllers/controller.php";
include "header.html";




?>
<!DOCTYPE html>
<div class='form-group row'>
    <div class='container'>
        <form method='post' action='Controllers/controller.php' enctype="multipart/form-data">
            <label for='nomeproduto'> Nome do produto</label>
            <div class="col-sm-10">
                <input type='text' name='nomeproduto'>
            </div><br>
            <label for='quantidadeproduto'>Quantidade: </label>
            <div class="col-sm-10">
                <input type='number' name='quantidadeproduto'><br><br>
            </div>
            <div class="col-sm-10">
                <input type="file" name="imagem"><br>
                <input type='submit' value='Cadastrar'>
        </form>
    </div>
</div>
</div>


</html>

<?php include "footer.html";
?>