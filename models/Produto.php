<?php


class Produto
{

    private $nomeprodutos;
    private $quantidadeprodutos;
    private $idprodutos;


    public function novoProduto($name, $qtd)
    {
        $this->nomeprodutos = $name;
        $this->quantidadeprodutos = $qtd;
    }

    public function buscarProduto($id, $nome, $qtd)
    {
        $this->nomeprodutos = $nome;
        $this->quantidadeprodutos = $qtd;
        $this->idprodutos = $id;
    }

    static function excluirProduto($id)
    {
        global $conn;
        if (isset($_GET['excluir'])) {
            $conn->query("DELETE FROM produtos WHERE idprodutos = {$_GET['excluir']} ");
            $conn->query("DELETE FROM produtosretiradas WHERE idprodutos = {$_GET['excluir']}");
            $conn->query("DELETE FROM produtosadicionados WHERE idprodutos = {$_GET['excluir']} ");
            header('location: ./index.php');
        }
    }

    /**
     * Get the value of nomeprodutos
     */
    public function getNomeprodutos()
    {
        return $this->nomeprodutos;
    }

    /**
     * Get the value of quantidadeprodutos
     */
    public function getQuantidadeprodutos()
    {
        return $this->quantidadeprodutos;
    }
}
