<?php



Usuario::sessionStart();



if (!$_SESSION['codfunc']) {
    header('location: http://127.0.0.1/bombeiros/');
} else {

    $usuarioLogado = new Usuario;
    $usuarioLogado->carregarUsuario($_SESSION['codfunc'], $_SESSION['nomeguerra'], $_SESSION['cargo'], $_SESSION['nivelacesso']);
    $usuarioLogado->nivelAcesso(1);
}

if (isset($_GET['sair'])) {


    Usuario::sessionEnd();
}
