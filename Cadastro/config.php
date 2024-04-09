<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'hugo91437639';
$dbName = 'cadastro';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) 
    {

    echo "Erro";
 }

 else
 {

    echo "Conexão efetuada com sucesso";

 }

?>