<?php

    session_start();

    // Informações do banco de dados:

        $dbHost = 'localhost:3312';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'dr_agenda';

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

                    // Assim que apertar o botão de acessar, ele irá buscar no banco de dados o usuario e senha através do input:

                        if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
                        {

                            // Caso tiver uma conta criada, irá acessar:

                                include_once('Login_config.php');

                                $login = $_POST['usuario'];
                                $senha = $_POST['senha'];

                                // Buscando login e senha na tabela "clientes".
                                $clientes_result = $conexao->query("SELECT * FROM clientes WHERE usuario = '$login' and senha = '$senha'");
                                
                                // Buscando login e senha na tabela "medicos".
                                $medicos_result = $conexao->query("SELECT * FROM medicos WHERE usuario_medic = '$login' and senha_medic = '$senha'");

                                // Irá obter um dos três resultados declarados: IF, ELSEIF ou ELSE.
                                $result = array_merge(mysqli_fetch_all($clientes_result, MYSQLI_ASSOC), mysqli_fetch_all($medicos_result, MYSQLI_ASSOC));

                                if(mysqli_num_rows($clientes_result) > 0) {
                                    // Se a conta for de um cliente, irá criar essas duas váriaveis quando o sistema for acessado, para manter o usuário ativo.
                                    $_SESSION['usuario'] = $login;
                                    $_SESSION['senha'] = $senha;

                                    // Se a senha e o login estiverem no banco de dados, o usuário irá acessar a tela principal.
                                    header('Location: http://localhost/Projeto-Back-End/Tela%20Principal/Principal.php');
                                } elseif(mysqli_num_rows($medicos_result) > 0) {
                                    // Se a conta for de um médico, irá criar essas duas váriaveis quando o sistema for acessado, para manter o usuário ativo.
                                    $_SESSION['usuario'] = $login;
                                    $_SESSION['senha'] = $senha;

                                    // Se a senha e o login estiverem no banco de dados, o usuário irá acessar a tela do médico.
                                    header('Location: http://localhost/Projeto-Back-End/Tela%20Principal/Principal_medic.php');
                                } else {
                                    // Se não estiver com web aberto e logado, será descartado as duas variáveis.
                                    unset ($_SESSION['usuario']);
                                    unset ($_SESSION['senha']);

                                    // Caso a senha ou login estiver errado, será redirecionado para tela de aviso.
                                    header('Location: http://localhost/Projeto-Back-End/Login/Tela_aviso.php');
                                }
                            }