<?php


include "controller.php";



if (isset($_GET['excluir'])) {
    Produto::excluirProduto($_GET['excluir']);
}
