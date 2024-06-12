<?php

// Botão de sair da tela principal do cliente.
    session_start();
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);
    header('Location: http://localhost/Projeto-Back-End/Login/Login.php');

// Botão de sair da tela principal do médico.    
    session_start();
    unset ($_SESSION['usuario_medic']);
    unset ($_SESSION['senha_medic']);
    header('Location: http://localhost/Projeto-Back-End/Login/Login.php');

