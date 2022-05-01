<?php

//WINDOWS 
define('HOST', 'localhost');
define('DBNAME', 'intranet');
define('USER', 'root');
define('PASS', '');

//LINUX
// define('HOST', 'localhost');
// define('DBNAME', 'intranet');
// define('USER', 'devbombeiro');
// define('PASS', '193');





class Conexao extends PDO
{
    public $pdo;

    public static function conectar()
    {
        $pdo =  new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);
        // $pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
        return $pdo;
    }

    public function __construct($pdo)
    {

        $this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);
      //  $this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "root", "");
        // $this->pdo = new PDO("mysql:host=localhost;dbname=intranet", "devbombeiro", "193");
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

    public function buscar($tabela, $valores = '*', $where = '')
    {
        if ($where == '') {
            $this->pdo->query("SELECT $valores FROM $tabela ")->fetchAll(PDO::FETCH_OBJ);
        } else {
            $this->pdo->query("SELECT $valores FROM $tabela WHERE $where")->fetchAll(PDO::FETCH_OBJ);
        }
    }
    public static function BuscarDB($query){
         $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);
         return $conn->query($query)->fetchAll(PDO::FETCH_OBJ);

    }
}
