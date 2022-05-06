<?php
include "../../models/Conexao.php";
include "../../models/Produto.php";
include "../../models/User.php";

$conn = Conexao::conectar();

//LISTA TODOS OS PRODUTOS

{
    $estoque = Conexao::BuscarDB("SELECT * FROM produtos");
}


//LISTA OS PRODUTOS RETIRADOS ORDENADO POR NOME NA PAGINA RETIRADAS.PHP
{


    $retiradas = Conexao::BuscarDB('SELECT produtosretiradas.idprodutos, produtosretiradas.quantidaderetirada,produtosretiradas.dataretirada,
produtos.nomeprodutos, usuarios.cargo, usuarios.nomeguerra
                        FROM produtosretiradas, produtos, usuarios 
                        WHERE produtosretiradas.idprodutos = produtos.idprodutos  AND produtosretiradas.codfunc = usuarios.codfunc
                        ORDER BY produtosretiradas.dataretirada DESC');
}
