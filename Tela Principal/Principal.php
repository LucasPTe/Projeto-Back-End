<?php
    session_start();
    
    /* Informações de quem fez o login*/ 
    //print_r($_SESSION);
    

    // Se não existir essas duas variáveis logadas no web aberto, irá retornar para a tela de login, caso tente acessar a tela principal por link.
        if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
        {

        // Irá descartar as duas variáveis e voltar para tela de login.
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            header('Location: http://localhost/Projeto-Back-End/Login/Login.php');

        }

    // Irá manter o usuário logado na tela principal.
        $logado = $_SESSION['usuario'];


?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela Principal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap -->
        <link rel="stylesheet" href="Tela_principal.css">
        <link rel="stylesheet" href="fonts/stylesheet.css">
    </head>
    <body>
    
    <!-- MENU -->
  <nav style="font-family: poppinsbold;" class="navbar navbar-expand-sm bg-white navbar-light fixed-top" id="conteiner_header">
    <div class="container-fluid" id="conteiner_nav">
      <a href="https://modavo.com.br/" target="_blank"><img src="/Tela Principal/imagens/modavo_paginas/modavo_logo.png" alt="" id="logo_modavo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <!-- O que vc por: -->
          <li class="nav-item dropdown links_header" >
            <a style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Exemplo</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">1</a></li>
              <li><a class="dropdown-item" href="#">2</a></li>
              <li><a class="dropdown-item" href="#">3</a></li>
              <li><a class="dropdown-item" href="#">4</a></li>
            </ul>
          </li>
          <!-- O que vc por: -->
          <li class="nav-item dropdown links_header">
            <a style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Exemplo</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">1</a></li>
              <li><a class="dropdown-item" href="#">2</a></li>
              <li><a class="dropdown-item" href="#">3</a></li>
            </ul>
          </li>

          <!-- Botão de desconectar: -->
            <div class="d-flex">
            
                <a class="btn btn-primary" href="Sair.php" role="button">Sair</a>
          
            </div>

        </ul>
      </div>
    </div>
  </nav>  
  
    <br><br><br>
        
        <h1> Seja bem vindo!</h1>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.14/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>    
</body>
</html>