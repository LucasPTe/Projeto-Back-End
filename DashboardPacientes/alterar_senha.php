<?php
session_start();
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

require '\Xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

// Conexão com o banco de dados
$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se a conexão foi estabelecida
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos foram submetidos
    if (isset($_POST['senhaAtual']) && isset($_POST['novaSenha']) && isset($_POST['confirmarSenha'])) {
        $senhaAtual = $_POST['senhaAtual'];
        $novaSenha = $_POST['novaSenha'];
        $confirmarSenha = $_POST['confirmarSenha'];

        // Verificar se o usuário está logado
        if (!isset($_SESSION['usuario'])) {
            $_SESSION['alterar_senha_msg'] = "Acesso não autorizado.";
            header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
            exit;
        }

        // Nome de usuário
        $usuario = $_SESSION['usuario'];

        // Consultar o banco de dados para obter a senha atual do cliente
        $sql_verifica_senha = "SELECT senha FROM clientes WHERE usuario = ?";
        $stmt_verifica_senha = $conexao->prepare($sql_verifica_senha);
        $stmt_verifica_senha->bind_param("s", $usuario);
        $stmt_verifica_senha->execute();
        $result_verifica_senha = $stmt_verifica_senha->get_result();

        if ($result_verifica_senha->num_rows == 1) {
            $row = $result_verifica_senha->fetch_assoc();
            $senha_atual = $row['senha'];

            // Verifica se a senha atual está correta (comparação em texto plano)
            if ($senhaAtual == $senha_atual) {
                // Verifica se a nova senha e a confirmação são iguais
                if ($novaSenha === $confirmarSenha) {
                    // Atualiza a senha e confirm_senha no banco de dados
                    $sql_atualiza_senha = "UPDATE clientes SET senha = ?, confirm_senha = ? WHERE usuario = ?";
                    $stmt_atualiza_senha = $conexao->prepare($sql_atualiza_senha);
                    $stmt_atualiza_senha->bind_param("sss", $novaSenha, $novaSenha, $usuario);

                    if ($stmt_atualiza_senha->execute()) {
                        $_SESSION['alterar_senha_msg'] = "Senha alterada com sucesso.";
                        $_SESSION['senha'] = $novaSenha; // Atualiza a sessão com a nova senha
                        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_paciente.php');
                        exit;
                    } else {
                        $_SESSION['alterar_senha_msg'] = "Erro ao alterar a senha.";
                    }
                } else {
                    $_SESSION['alterar_senha_msg'] = "A nova senha e a confirmação não correspondem.";
                }
            } else {
                $_SESSION['alterar_senha_msg'] = "A senha atual está incorreta.";
            }
        } else {
            $_SESSION['alterar_senha_msg'] = "Erro: Não foi possível verificar a senha atual.";
        }

        // Redireciona de volta para a página de alteração de senha
        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_paciente.php');
        exit;
    } else {
        $_SESSION['alterar_senha_msg'] = "Por favor, preencha todos os campos.";
        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_paciente.php');
        exit;
    }
} else {
    $_SESSION['alterar_senha_msg'] = "Acesso inválido.";
    header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
    exit;
}

