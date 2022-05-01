<?php

include "controller.php";
$conn = Conexao::conectar() ; 


if (isset($_POST['quantidadeproduto'])) {

    Produto::cadastrarProduto($_POST['nomeproduto'], $_POST['quantidadeproduto']);



    header('Location: index.php');
}
