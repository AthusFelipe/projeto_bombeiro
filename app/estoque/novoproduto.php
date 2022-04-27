<?php
include "./../../protegesessao.php";

include "Controllers/NovoProdutoController.php";
include "./../../style/header.html";
?>
<!DOCTYPE html>
<link href="./../../style/bootstrap2.css" rel="stylesheet">






<body>
    <div class='container'>
        <div class='botao-voltar'>
            <a href='./index.php'>VOLTAR</a>
        </div>
        <div class='formulario'>
            <h3 class=' '>Adicionar novo produto</h3>


            <form class='' method='post' action=''>

                <div class='items-formulario'>
                    <div class='item-formulario'>
                        <label class=' ' for='nomeproduto'> Nome do produto</label>
                        <input class=' ' type='text ' name='nomeproduto' placeholder='ex:Luva procedimento G caixa 100 unidades'>
                    </div>

                    <div class='item-formulario'>


                        <label class=' ' for='quantidadeproduto'>Quantidade: </label>
                        <input class=' ' type='number' name='quantidadeproduto' min='0'>
                    </div>
                </div>
                <div class='div-botao-criar'>
                    <input class='   botao-criar' class='botao-criar' type='submit' value='Cadastrar'>
                </div>
        </div>
    </div>
    </form>
    </div>
</body>

</html>

<?php include "layout/footer.html";
?>