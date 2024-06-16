<?php
session_start();
require '\Xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se todos os campos foram submetidos
    if (isset($_POST['senhaAtual'], $_POST['novaSenha'], $_POST['confirmarSenha'])) {
        $senhaAtual = $_POST['senhaAtual'];
        $novaSenha = $_POST['novaSenha'];
        $confirmarSenha = $_POST['confirmarSenha'];

        // Verificar se o usuário está logado e é um cliente
        if (!isset($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
            $_SESSION['alterar_senha_msg'] = "Acesso não autorizado.";
            header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
            exit;
        }

        // Verificar se há um ID de usuário na sessão
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['alterar_senha_msg'] = "ID do cliente não encontrado na sessão.";
            header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
            exit;
        }

        // ID do cliente
        $paciente_id = $_SESSION['user_id'];

        // Consultar o banco de dados para obter a senha atual do cliente
        $sql_verifica_senha = "SELECT senha FROM clientes WHERE pacientes = ?";
        $stmt_verifica_senha = $conexao->prepare($sql_verifica_senha);
        $stmt_verifica_senha->bind_param("i", $paciente_id);
        $stmt_verifica_senha->execute();
        $result_verifica_senha = $stmt_verifica_senha->get_result();

        if ($result_verifica_senha->num_rows == 1) {
            $row = $result_verifica_senha->fetch_assoc();
            $senha_hash = $row['senha'];

            // Verifica se a senha atual está correta
            if (password_verify($senhaAtual, $senha_hash)) {
                // Verifica se a nova senha e a confirmação são iguais
                if ($novaSenha === $confirmarSenha) {
                    // Hash da nova senha
                    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

                    // Atualiza a senha no banco de dados
                    $sql_atualiza_senha = "UPDATE clientes SET senha = ? WHERE pacientes = ?";
                    $stmt_atualiza_senha = $conexao->prepare($sql_atualiza_senha);
                    $stmt_atualiza_senha->bind_param("si", $novaSenhaHash, $paciente_id);

                    if ($stmt_atualiza_senha->execute()) {
                        $_SESSION['alterar_senha_msg'] = "Senha alterada com sucesso.";
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

        // Redireciona de volta para a página do paciente
        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_Paciente.php');
        exit;
    } else {
        $_SESSION['alterar_senha_msg'] = "Por favor, preencha todos os campos.";
        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_Paciente.php');
        exit;
    }
} else {
    $_SESSION['alterar_senha_msg'] = "Acesso inválido.";
    header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
    exit;
}

