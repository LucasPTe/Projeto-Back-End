<?php

// Informações do banco de dados:
    
    $dbHost = 'localhost:3307';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'dr_agenda';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($conexao->connect_errno) {
   
    $erro = $conexao->connect_error;
    
    
    echo "Erro ao conectar ao banco de dados: $erro";
    
} else {
    
    
    echo "banco de dados conectado com sucesso";
}



