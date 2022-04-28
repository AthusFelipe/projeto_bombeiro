<?php
include "../../models/Conexao.php";
include "../../models/Produto.php";
include "../../models/User.php";




//LISTA TODOS OS PRODUTOS

{
    $conn = Conexao::conectar();
    $estoque = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_OBJ);
}


//LISTA OS PRODUTOS RETIRADOS ORDENADO POR NOME NA PAGINA RETIRADAS.PHP
{
    $retiradas = $conn->query('SELECT produtosretiradas.idprodutos, produtosretiradas.quantidaderetirada,  produtos.nomeprodutos 
                          FROM produtosretiradas, produtos 
                          WHERE produtosretiradas.idprodutos = produtos.idprodutos 
                          ORDER BY produtos.nomeprodutos')->fetchAll(PDO::FETCH_OBJ);
}
