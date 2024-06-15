<?php
session_start();

// Verifica se a sessão do médico está iniciada
if (!isset($_SESSION['medico'])) {
    header('Location: http://localhost/Projeto-Back-End/Login/Login.php');
    exit(); // Certifique-se de sair após o redirecionamento para evitar execução adicional do código
}

// Conexão com o banco de dados (altere as credenciais conforme necessário)
$dbHost = 'localhost:3307'; // Seu host de banco de dados
$dbUsername = 'root'; // Seu usuário do banco de dados
$dbPassword = ''; // Sua senha do banco de dados
$dbName = 'dr_agenda'; // Nome do seu banco de dados

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Consulta SQL para obter as informações do médico
$logado_medico = $_SESSION['usuario_medic'];
$sql_medico = "SELECT nome_completo_medic, especializacao, CRM, numero_cel_medic, email_medic FROM medicos WHERE usuario_medic = ?";
$stmt_medico = $conexao->prepare($sql_medico);
$stmt_medico->bind_param("s", $logado_medico);
$stmt_medico->execute();
$result_medico = $stmt_medico->get_result();

if ($result_medico->num_rows > 0) {
    $row_medico = $result_medico->fetch_assoc();
    $nomeMedico = $row_medico['nome_completo_medic'];
    $especialidade = $row_medico['especializacao'];
    $crm = $row_medico['CRM'];
    $celular = $row_medico['numero_cel_medic'];
    $email = $row_medico['email_medic'];
} else {
    die("Erro: Não foi possível obter as informações do médico logado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Perfil do Médico</h2>
        <hr>

        <h4>Informações Pessoais</h4>
        <ul>
            <li><strong>Nome:</strong> <?php echo $nomeMedico; ?></li>
            <li><strong>Especialidade:</strong> <?php echo $especialidade; ?></li>
            <li><strong>CRM:</strong> <?php echo $crm; ?></li>
        </ul>

        <h4>Contato</h4>
        <ul>
            <li><strong>Telefone:</strong> <?php echo $telefone; ?></li>
            <li><strong>Email:</strong> <?php echo $email; ?></li>
        </ul>

        <hr>
        <h4>Alterar Senha</h4>
        <form method="post" action="alterar_senha.php">
            <div class="mb-3">
                <label for="senhaAtual" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" required>
            </div>
            <div class="mb-3">
                <label for="novaSenha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
            </div>
            <div class="mb-3">
                <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Senha</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>