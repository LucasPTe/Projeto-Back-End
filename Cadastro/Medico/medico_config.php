<?php

// Informações do banco de dados:
    
    $dbHost = 'localhost:3307';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'dr_agenda';

// Conexão com o banco de dados

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro durante a conexão

if ($conexao->connect_errno) {

        // Captura o erro de conexão
        $erro = $conexao->connect_error;
    
        // Exibe uma mensagem de erro detalhada para o usuário
        echo "Erro ao conectar ao banco de dados: $erro";
}  

else {
        
        // Exibe uma mensagem informando que o banco de dados foi conectado com sucesso
        echo "banco de dados conectado com sucesso";

    }

