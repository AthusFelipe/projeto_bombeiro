<?php
include "./Controllers/controller.php";

include "./../login.php";
include "Controllers/produtoController.php";

include "./../../style/header.html";




?>


<!DOCTYPE html>

<body>

    <div class='container'>
        <div class='formulario'>
            <img class='img-fluid' src="imagens/<?= $retProd->get ?>">
            <form method='get' action=''>
                <div class='items-formulario'>
                    <div class='item-formulario'>

                        <input type='number' name='idproduto' value='<?php echo $retProd->getIdprodutos(); ?>' hidden><br>

                        <input class='nomeproduto-estoque' type='text' name='nomeproduto' value='<?php echo  $retProd->getNomeprodutos() ?>' disabled><br><br>
                    </div>
                    <div class='item-formulario'>

                        <label for='quantidade'>Quantidade</label>
                        <input type='number' name='quantidade' min='0'>
                    </div>

                    <div class='item-formulario'>


                        <input class='div-botao-criar botao-estoque-adicionar' type='submit' name='adicionar' value='Adicionar'>
                        <input class='div-botao-criar botao-estoque-retirar' type='submit' name='remover' value='Retirar'>
                    </div>
                </div>


            </form>
        </div>
    </div>


</body>

<? include "footer.html"; ?>