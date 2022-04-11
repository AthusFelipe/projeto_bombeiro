
      <?php
      include_once "./../models/Conexao.php";
/*
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['nomeusuario'];
$senha = $_POST['senhausuario'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$pdo = Conexao::conectar() ; 

$user = $pdo->prepare('SELECT * FROM usuarios WHERE nomeusuario = ? AND senhausuario = ?') ; 
       $user->execute([$login, $senha]);
      $usuario = $user->fetch(PDO::FETCH_OBJ) ; 


if(!$usuario)  { echo "Você não está conectado" ; 
    die(); } 
else {
    $_SESSION['codfunc'] = $usuario->codfunc;
     
   



}
*/
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./../bootstrap.css" rel="stylesheet">
    <title>INTRANET COLINAS</title>
    <style>

body {
    height: 100%;
    width: 100%;
  display: flex;
  align-items: center;
  padding-top: 10%;
  padding-bottom: 10%;
  background-color: #f0f9ce;
}

.container {
  
  display: grid;
  justify-content: center;
}
</style>
</head>


<body>



<div id='meio' class='container text-center center '>
    

            
      <a href='./estoque/'>  <div class="card text-white bg-primary mb-3" style="max-width: 16rem;">
  <div class="card-body">
    <h5 class="card-title">ESTOQUE</h5>
</div></div></a>

<a href='./servico/'>  <div class="card text-white bg-primary mb-3" style="max-width: 16rem;">
  <div class="card-body">
    <h5 class="card-title">SERVIÇO EXTRA</h5>
</div></div></a>
</div>
        
   
   
    </div>
        </div>

</div>





</body>