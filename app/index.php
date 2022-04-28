<?php
include_once "./../models/Conexao.php";
include_once "./../models/User.php";

$conn = Conexao::conectar();


session_start();

if(isset($_POST['nomeusuario']) && isset($_POST['senhausuario'])){
$username = $_POST['nomeusuario'];
$password = $_POST['senhausuario'];
$user = new Usuario;
$user->logar($username, $password);

$_SESSION['codfunc'] = $user->getCodfunc();
$_SESSION['nomeguerra'] = $user->getNomeguerra();
$_SESSION['cargo'] = $user->getCargo() ; 
$_SESSION['nivelacesso'] = $user->getNivelAcesso() ; 

header('location: http://127.0.0.1/bombeiros/app/estoque/index.php') ;

}

elseif(!$_SESSION['codfunc']){
    echo "Você não está conectado" ;
    header('location: http://127.0.0.1/bombeiros/');
    die();

}
else {

    header('location: http://127.0.0.1/bombeiros/app/estoque/index.php') ;

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="./../style/bootstrap.css" rel="stylesheet">
  <title>INTRANET COLINAS</title>
  <style>
    .body {
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      padding-top: 10%;
      padding-bottom: 10%;
      background-color: #f0f9ce;
    }

    body {
      background-color: #f0f9ce;
    }


    .container {

      display: grid;
      justify-content: center;
    }

    .card {
      background-color: red;
    }

    a {
      color: #0d6efd;
      text-decoration: none;
    }

    .navbar {
      background-color: #bf0000;
    }

    .card {
      background-color: #bf0000;
    }
  </style>

</head>




<div class='body'>


  <div id='meio' class='container text-center center '>



    <a href='./estoque/'>
      <div class="card text-white  mb-3" style="max-width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">ESTOQUE</h5>
        </div>
      </div>
    </a>

    <a href='./servico/'>
      <div class="card text-white  mb-3" style="max-width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">SERVIÇO EXTRA</h5>
        </div>
      </div>
    </a>

    
    <a href='./viaturas/'>
      <div class="card text-white  mb-3" style="max-width: 16rem;">
        <div class="card-body">
          <h5 class="card-title">SYSFROTA</h5>
        </div>
      </div>
  </div>



</div>
</div>

</div>

</div>



</body>