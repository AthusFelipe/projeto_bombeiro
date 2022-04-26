<?php


class Produto
{

    private $nomeprodutos;
    private $quantidadeprodutos;
    private $idprodutos;


    static function cadastrarProduto($name, $qtd)
    {
        global $conn;
        $conn->prepare('INSERT INTO produtos (nomeprodutos, quantidadeprodutos) VALUES (?, ?) ')->execute([$name, $qtd]);
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

    static function adicionarEstoque($id, $qtd)
    {

        global $conn;
        $conn->prepare("UPDATE produtos SET quantidadeprodutos = (quantidadeprodutos + ?) WHERE idprodutos = ? ")
            ->execute([$qtd, $id]);


        $conn->prepare('INSERT INTO produtosadicionados (idprodutos, quantidadeprodutos) VALUE (?,?)')
            ->execute([$id, $qtd]);

        header('Location: index.php');
    }


    static function retirarEstoque($id, $qtd)
    {
        global $conn;

        $conn->prepare('UPDATE produtos SET quantidadeprodutos = (quantidadeprodutos - ?) WHERE idprodutos = ?')
            ->execute([$qtd, $id]);

        $conn->prepare('INSERT INTO produtosretiradas (idprodutos, quantidaderetirada) VALUES (?, ?)')
            ->execute([$id, $qtd]);

        header('Location: index.php');
    }

    static function buscaProduto($id)
    {
        global $conn;
        $prod = $conn->query("SELECT * FROM produtos WHERE idprodutos = $id ")->fetch(PDO::FETCH_OBJ);
        $c1 = new Produto;
        $c1->buscarProduto($prod->idprodutos, $prod->nomeprodutos, $prod->quantidadeprodutos);

        return $c1;
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

    /**
     * Get the value of idprodutos
     */
    public function getIdprodutos()
    {
        return $this->idprodutos;
    }
}
