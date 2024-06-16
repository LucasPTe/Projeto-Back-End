<?php
session_start();
require '\Xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Verifica se o usuário está logado como cliente
if (!isset($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
    header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
    exit;
}

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente_id = $_SESSION['user_id'];
    $senhaAtual = $_POST['senhaAtual'];
    $novaSenha = $_POST['novaSenha'];
    $confirmarSenha = $_POST['confirmarSenha'];

    // Verifica se a nova senha e a confirmação são iguais
    if ($novaSenha !== $confirmarSenha) {
        $_SESSION['alterar_senha_msg'] = "Erro: A nova senha e a confirmação da nova senha não correspondem.";
        header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_paciente.php');
        exit;
    }

    // Obtém a senha atual do banco de dados
    $sql = "SELECT senha FROM clientes WHERE pacientes = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $paciente_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Verifica se a senha atual digitada corresponde à senha do banco de dados
    if (password_verify($senhaAtual, $row['senha'])) {
        // Gera o hash da nova senha
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualiza a senha no banco de dados
        $sql_update = "UPDATE clientes SET senha = ? WHERE pacientes = ?";
        $stmt_update = $conexao->prepare($sql_update);
        $stmt_update->bind_param("si", $novaSenhaHash, $paciente_id);

        // Verifica se a atualização ocorreu com sucesso
        if ($stmt_update->execute()) {
            $_SESSION['alterar_senha_msg'] = "Senha alterada com sucesso.";
        } else {
            $_SESSION['alterar_senha_msg'] = "Erro ao alterar a senha.";
        }
    } else {
        $_SESSION['alterar_senha_msg'] = "Erro: A senha atual está incorreta.";
    }
}

header('Location: http://localhost/Projeto-Back-End/DashboardPacientes/tela_paciente.php');
exit;
?>