<?php

include "controller.php";


if (isset($_POST['quantidadeproduto'])) {

    Produto::cadastrarProduto($_POST['nomeproduto'], $_POST['quantidadeproduto']);



    header('Location: index.php');
}
