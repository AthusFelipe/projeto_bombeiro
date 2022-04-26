<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="./style/bootstrap.css" rel="stylesheet">
  <title>INTRANET COLINAS</title>

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f0f9ce;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .btn-primary {
      background-color: #bf0000;
    }

    .btn-primary:hover {
      color: #fff;
      background-color: #027c22;
      border-color: #027c22;
    }
  </style>
</head>


<body class="text-center">

  <main class="form-signin">
    <form method='post' action='./app/index.php' id='login'>
      <img class="mb-4" src="./style/imgs/logo.png" alt="" width="119" height="156">
      <h1 class="h3 mb-3 fw-normal">Área restrita</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name='nomeusuario' placeholder="name@example.com">
        <label for="floatingInput">Usuário</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name='senhausuario' placeholder="Password">
        <label for="floatingPassword">Senha</label>
      </div>

      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">COLINAS - 2ª CIA / 2º BBM </p>

    </form>
  </main>
</body>

</html>