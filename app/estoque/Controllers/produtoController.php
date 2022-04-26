<?php
include "controller.php";






if (isset($_GET['selecionado'])) {
    $retProd = Produto::buscaProduto($_GET['selecionado']);
}


if (isset($_GET['adicionar'])) {
    Produto::adicionarEstoque($_GET['idproduto'], $_GET['quantidade']);
}

if (isset($_GET['remover'])) {
    Produto::retirarEstoque($_GET['idproduto'], $_GET['quantidade']);
}
