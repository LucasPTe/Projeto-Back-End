<?php

    // Informações do banco de dados:
       
        $dbHost = 'localhost:3312';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'cadastro';

    // Conexão com o banco de dados
    
        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verifica se houve algum erro durante a conexão

        /*if ($conexao->connect_errno) {
            // Exibe uma mensagem de erro caso haja algum problema de conexão
            echo "Erro: " . $conexao->connect_error;
        } else {
            // Exibe uma mensagem de sucesso caso a conexão seja realizada corretamente
            echo "Conexão efetuada com sucesso";
        }*/

            // Testando o envio dos dados digitados no input:
            
                /*print_r($_REQUEST);*/

                    // Conexão da tela de login com o banco de dados:
                    
                        if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
                        {

                            // Caso tiver uma conta criada, irá acessar:
                                
                                include_once('Login_config.php');
                                
                                $login = $_POST['usuario'];
                                $senha = $_POST['senha'];

                                $sql = "SELECT * FROM usuarios WHERE usuario = '$login' and senha = '$senha'";

                                $result = $conexao->query($sql);


                                if(mysqli_num_rows($result) < 1)
                                {

                                    header('Location: http://localhost/Projeto-Back-End/Login/Tela_aviso.php');

                                }
                                else
                                {

                                    header('Location: http://localhost/Projeto-Back-End/Tela%20Principal/Principal.php');

                                }
                                
                            }

                        else
                        {
                            //Não irá acessar, seja por informações erradas ou conta não criada:
                            
                                header('Location: Login.php');

                        }



?>