<?php
session_start();
require '\xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

$dbHost = 'localhost:3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

if (!isset($_SESSION['tentativas_2fa'])) {
    $_SESSION['tentativas_2fa'] = 0;
}

if (!isset($_SESSION['ultima_tentativa_2fa'])) {
    $_SESSION['ultima_tentativa_2fa'] = time();
}

if (time() - $_SESSION['ultima_tentativa_2fa'] > 30) { // 300 segundos = 5 minutos
    $_SESSION['tentativas_2fa'] = 0;
    $_SESSION['ultima_tentativa_2fa'] = time();
}

if (isset($_POST['verificar'])) {
    $codigo2FA = $_POST['codigo2FA'];
    $user_id = $_SESSION['user_id'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

    $stmt = $conexao->prepare("SELECT codigo_2fa, expira_em FROM two_fa_codes WHERE user_id = ? AND tipo_usuario = ? ORDER BY id DESC LIMIT 1");
    $stmt->bind_param("is", $user_id, $tipo_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($_SESSION['tentativas_2fa'] >= 3) {
            echo "Número de tentativas excedido. Tente novamente mais tarde.";
        } elseif ($row['codigo_2fa'] == $codigo2FA && time() < strtotime($row['expira_em'])) {
            unset($_SESSION['tentativas_2fa']);
            unset($_SESSION['ultima_tentativa_2fa']);

            if ($_SESSION['tipo_usuario'] == 'cliente') {
                header('Location: http://localhost/Projeto-Back-End/landingPage/index.php');
            } elseif ($_SESSION['tipo_usuario'] == 'medico') {
                header('Location: http://localhost/Projeto-Back-End/landingPage/index.php');
            }
            exit;
        } else {
            $_SESSION['tentativas_2fa'] += 1;
            $_SESSION['ultima_tentativa_2fa'] = time();
            echo "Código de autenticação inválido ou expirado.";
        }
    } else {
        echo "Código de autenticação não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação 2FA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-image: linear-gradient(#d5dcf1, #2d3f6c);">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6">
                <h2>Verificação 2FA</h2>
                <p>Insira o código enviado ao seu email.</p>
                <form action="verificar_2fa.php" method="POST">
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control form-control-lg bg-light fs-6" id="codigo2FA" name="codigo2FA" placeholder="Digite o código 2FA" minlength="6" maxlength="6" >
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" name="verificar" class="btn btn-primary" value="Verificar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>