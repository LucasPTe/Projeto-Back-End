<?php
session_start();
require '\Xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST['nome_completo'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $genero = $_POST['exampleRadios'];
    $nome_da_mae = $_POST['mae'];
    $CPF = $_POST['cpf'];
    $celular = $_POST['celular'];
    $telefone = $_POST['fixo'];
    $CEP = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirm = $_POST['confirmsenha'];
}

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

if (!isset($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
    header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
    exit;
}

if (isset($_SESSION['user_id'])) {
    $paciente_id = $_SESSION['user_id'];

    $sql_cliente = "SELECT nome_completo, numero_cel, email, usuario FROM clientes WHERE pacientes = ?";
    $stmt_cliente = $conexao->prepare($sql_cliente);
    $stmt_cliente->bind_param("i", $paciente_id);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    if ($result_cliente->num_rows > 0) {
        $row_cliente = $result_cliente->fetch_assoc();
        $nomeCompleto = $row_cliente['nome_completo'];
        $celular = $row_cliente['numero_cel'];
        $email = $row_cliente['email'];
        $login_cliente = $row_cliente['usuario'];
    } else {
        die("Erro: Não foi possível obter as informações do cliente logado.");
    }
} else {
    die("Erro: ID do cliente não encontrado na sessão.");
}

$alterarSenhaMsg = isset($_SESSION['alterar_senha_msg']) ? $_SESSION['alterar_senha_msg'] : null;
unset($_SESSION['alterar_senha_msg']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr agenda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="tela_paciente.css">

</head>
<body>
    <div class="container">
        <h1 class="titulo">Olá <?php echo htmlspecialchars($nomeCompleto); ?></h1>

        <?php if ($alterarSenhaMsg): ?>
        <div class="alert alert-<?php echo strpos($alterarSenhaMsg, 'Erro') !== false ? 'danger' : 'success'; ?>" role="alert">
            <?php echo htmlspecialchars($alterarSenhaMsg); ?>
        </div>
        <?php endif; ?>

        <div class="card conteiner_cards_pica">
            <div class="card-body">
                <h4 class="Alterar" style="text-align: center;">Alterar Senha</h4>
                <a style="width: 18%;" href="http://localhost/Projeto-Back-End/landingPage/index.php" class="voltar-link">Voltar</a>
                <form method="post" action="alterar_senha_cliente.php">
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
</body>
</html>
