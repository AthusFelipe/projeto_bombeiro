<?php
include_once "./../models/Conexao.php";


// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['nomeusuario'];
$senha = $_POST['senhausuario'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$pdo = Conexao::conectar();

$user = $pdo->prepare('SELECT * FROM usuarios WHERE nomeusuario = ? AND senhausuario = ?');
$user->execute([$login, $senha]);
$usuario = $user->fetch(PDO::FETCH_OBJ);


if (!$usuario) {
    echo "Você não está conectado";
    die();
} else {
    $_SESSION['codfunc'] = $usuario->codfunc;
}


?>


<!DOCTYPE html>


<body>

    <br>
    <a href='./estoque/'>Estoque</a>
    <br>
    <a href='./servico/'>Serviço extra </a>
</body>