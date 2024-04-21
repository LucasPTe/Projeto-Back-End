<?php

// Informações do banco de dados:
    
    $dbHost = 'localhost:3312';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro';

// Conexão com o banco de dados

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro durante a conexão

    if ($conexao->connect_errno) {
        
        // Exibe uma mensagem de erro caso haja algum problema de conexão
        
            //echo "Erro: " . $conexao->connect_error;
            header('Location: http://localhost/Projeto-Back-End/Cadastro/Tela_erro.php');
    } 

    else {
        
        // Envia o cliente para tela de login, caso a conta for criada:
        
            header('Location: http://localhost/Projeto-Back-End/Login/Login.php');
    }

?>