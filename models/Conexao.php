<?php


class Conexao extends PDO
{
    public $pdo;

    public static function conectar()
    {
        //$pdo = new PDO("mysql:host=localhost;dbname=intranet", "root", "");
        $pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
        return $pdo;
    }

    public function __construct($pdo)
    {
        //$this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "root", "");
        $this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
        return $pdo;
    }


    public function database($query, $values = null)
    {

        $this->pdo->prepare($query)->execute($values);
    }

    public function select($query, $values = null)
    {
        $result = $this->pdo->prepare($query);
        $result->execute($values);
        return  $result->fetch(PDO::FETCH_OBJ);
    }
}
