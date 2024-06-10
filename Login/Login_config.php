<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '\xampp\htdocs\Projeto-Back-End\lib\vendor\autoload.php';

$dbHost = 'localhost:3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

function enviarCodigo2FA($conexao, $user_id, $tipo_usuario, $email) {
    $codigo2FA = mt_rand(100000, 999999);
    $expira_em = date("Y-m-d H:i:s", time() + 300);

    $stmt = $conexao->prepare("INSERT INTO two_fa_codes (user_id, codigo_2fa, expira_em, tipo_usuario) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $codigo2FA, $expira_em, $tipo_usuario);
    $stmt->execute();

    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username   = 'a7e8021047fef0';
        $mail->Password   = '06f12a3c882c51';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;
        
        $mail->setFrom('dr.agenda@gmail.com', 'Dr.agenda');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Seu código de autenticação de dois fatores';
        $mail->Body    = "Seu código 2FA é: <b>$codigo2FA</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erro ao enviar email: {$mail->ErrorInfo}");
        return false;
    }
}

function fazerLogin($conexao, $login, $senha) {
    $stmt = $conexao->prepare("SELECT pacientes AS id, email, 'cliente' AS tipo_usuario FROM clientes WHERE usuario = ? AND senha = ? UNION SELECT doutor AS id, email_medic AS email, 'medico' AS tipo_usuario FROM medicos WHERE usuario_medic = ? AND senha_medic = ?");
    $stmt->bind_param("ssss", $login, $senha, $login, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    $conexao->query("UPDATE clientes SET ultimo_login = CURRENT_TIMESTAMP WHERE usuario = '$login'");
    $conexao->query("UPDATE medicos SET ultimo_login = CURRENT_TIMESTAMP WHERE usuario_medic = '$login'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $email = $user['email'];
        $tipo_usuario = $user['tipo_usuario'];

        $_SESSION['usuario'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo_usuario'] = $tipo_usuario;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['login_sucesso'] = true; // Adiciona esta linha

        if (enviarCodigo2FA($conexao, $user_id, $tipo_usuario, $email)) {
            header('Location: http://localhost/Projeto-Back-End/Login/login.php');
            exit;
        } else {
            header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
            exit;
        }
    } else {
        header('Location: http://localhost/Projeto-Back-End/Login/tela_aviso.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    fazerLogin($conexao, $login, $senha);
}
?>
<!-- 
       Assim que apertar o botão de acessar, ele irá buscar no banco de dados o usuario e senha através do input:
 */
        /* if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
{

        // Caso tiver uma conta criada, irá acessar:

        include_once('Login_config.php');

        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

         // Buscando login e senha na tabela "clientes".
         $clientes_result = $conexao->query("SELECT * FROM clientes WHERE usuario = '$login' and senha = '$senha' and codigo_autenticacao = '$codigo' and data_codigo = '$data_codigo'");
                                
        // Buscando login e senha na tabela "medicos".
        $medicos_result = $conexao->query("SELFROM medicos WHERE usuario_medic = '$land senha_medic = '$senha'");

        // Irá obter um dos três resultados declarados: IF, ELSEIF ou ELSE.
        $result = array_merge(mysqli_fetch_all($clientes_result, MYSQLI_ASSOC), mysqli_fetch_all($medicos_reMYSQLI_ASSOC));

        if(mysqli_num_rows($clientes_result) > 0) {
        // Se a conta for de um cliente, irá criar essas duas váriaveis quando o sistema for acessado, para manter o usuário ativo.
        $_SESSION['usuario'] = $login;
        $_SESSION['senha'] = $senha;

        // Se a senha e o login estiverem no banco de dados, o usuário irá acessar a tela principal.
                                    header('Location: http://localhost/Projeto-Back-End/Busca/index.php');
                                } elseif(mysqli_num_rows($medicos_result) > 0) {
                                    // Se a conta for de um médico, irá criar essas duas váriaveis quando o sistema for acessado, para manter o usuário ativo.
                                    $_SESSION['usuario'] = $login;
                                    $_SESSION['senha'] = $senha;
 // 
                                    // Se a senha e o login estiverem no banco de dados, o usuário irá acessar a tela do médico.
                                    header('Location: http://localhost/Projeto-Back-End/Tela Principal/Principal_medic.php');
                                } else {
                                    // Se não estiver com web aberto e logado, será descartado as duas variáveis.
                                    unset ($_SESSION['usuario']);
                                    unset ($_SESSION['senha']);

                                    // Caso a senha ou login estiver errado, será redirecionado para tela de aviso.
                                    header('Location: http://localhost/Projeto-Back-End/Login/Tela_aviso.php');
                                }
                            } */