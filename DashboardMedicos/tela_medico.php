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

// Verifica se o usuário está logado como médico
if (!isset($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'medico') {
    header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
    exit;
}

// Obtém informações do médico logado
if (isset($_SESSION['user_id'])) {
    $doutor_id = $_SESSION['user_id'];

    $sql_medico = "SELECT nome_completo_medic, especializacao, CRM, numero_cel_medic, email_medic, usuario_medic FROM medicos WHERE doutor = ?";
    $stmt_medico = $conexao->prepare($sql_medico);
    $stmt_medico->bind_param("i", $doutor_id);
    $stmt_medico->execute();
    $result_medico = $stmt_medico->get_result();

    if ($result_medico->num_rows > 0) {
        $row_medico = $result_medico->fetch_assoc();
        $nomeMedico = $row_medico['nome_completo_medic'];
        $especialidade = $row_medico['especializacao'];
        $crm = $row_medico['CRM'];
        $celular = $row_medico['numero_cel_medic'];
        $email = $row_medico['email_medic'];
        $login_medico = $row_medico['usuario_medic'];
    } else {
        die("Erro: Não foi possível obter as informações do médico logado.");
    }
} else {
    die("Erro: ID do médico não encontrado na sessão.");
}

// Mensagem de feedback após alteração de senha
$alterarSenhaMsg = isset($_SESSION['alterar_senha_msg']) ? $_SESSION['alterar_senha_msg'] : null;
unset($_SESSION['alterar_senha_msg']); // Limpa a variável de sessão após exibir a mensagem
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr agenda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="tela_medico.css">
    <style>
        .card {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h1 class="titulo">Olá <?php echo htmlspecialchars($login_medico); ?></h1>
        <p class="titulo">Abaixo estão suas informações:</p>

        <?php if ($alterarSenhaMsg): ?>
        <div class="alert alert-<?php echo strpos($alterarSenhaMsg, 'Erro') !== false ? 'danger' : 'success'; ?>" role="alert">
            <?php echo htmlspecialchars($alterarSenhaMsg); ?>
        </div>
        <?php endif; ?>

        <div class="row gx-4">
            <div class="col-md-6" style="margin-top: 20px;">
                <div class="card mb-3 h-100">
                    <div class="card-body d-flex flex-column" id="conteiner_informações_medicos">
                        <h5 class="card-title">Suas Informações!</h5>
                        <p><strong>Nome Completo:</strong><span class="letras_php"><?php echo htmlspecialchars($nomeMedico); ?></span></p>
                        <p><strong>Especialização:</strong><span class="letras_php"><?php echo htmlspecialchars($especialidade); ?></span></p>
                        <p><strong>CRM:</strong><span class="letras_php"><?php echo htmlspecialchars($crm); ?></span></p>
                        <p><strong>Celular:</strong><span class="letras_php"><?php echo htmlspecialchars($celular); ?></span></p>
                        <p><strong>Email:</strong><span class="letras_php"><?php echo htmlspecialchars($email); ?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 20px;">
                <div class="card h-100 conteiner_cards_pica">
                    <div class="card-body d-flex flex-column ">
                        <h4>Alterar Senha</h4>
                        <a href="http://localhost/Projeto-Back-End/landingPage/index.php" style="width: 50px; text-decoration: none;">Voltar</a>
                        <form method="post" action="alterar_senha_medic.php">
                            <div class="mb-3">
                                <label for="senhaAtual" class="form-label">Senha Atual</label>
                                <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" minlength="8" maxlength="8" required>
                            </div>
                            <div class="mb-3">
                                <label for="novaSenha" class="form-label">Nova Senha</label>
                                <input type="password" class="form-control" id="novaSenha" name="novaSenha" minlength="8" maxlength="8" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" minlength="8" maxlength="8" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>