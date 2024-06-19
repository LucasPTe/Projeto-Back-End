<?php
// Inclui as configurações do banco de dados
$servidor = "localhost:3307";
$usuario = "root";
$senha = "";
$banco = "dr_agenda";


$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);


if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$cpf_error = '';
$login_error = '';
$email_error = '';
$cadastro_sucesso = '';

// Função para geocodificar usando API do Google Maps
function geocodeAddress($address, $api_key) {
    $address = urlencode($address);
    $api_url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$api_key}";

    $response = file_get_contents($api_url);

    if ($response === false) {
        echo 'Erro ao obter resposta da API do Google Maps';
        return [null, null];
    }

    $json = json_decode($response);

    if ($json->status == 'OK') {
        $latitude = $json->results[0]->geometry->location->lat;
        $longitude = $json->results[0]->geometry->location->lng;
        return [$latitude, $longitude];
    } else {
        echo 'Erro ao obter coordenadas. Status da API: ' . $json->status;
        return [null, null];
    }
}

// Assim que apertar o botão de cadastrar, ele irá executar:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Criando às variáveis para as colunas da tabela "clientes":
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

    // Remover caracteres não numéricos do CPF
    $CPF = preg_replace('/\D/', '', $CPF);

    // Remover caracteres não numéricos do Celular
    $celular = preg_replace('/\D/', '', $celular);

    // Remover caracteres não numéricos do Telefone
    $telefone = preg_replace('/\D/', '', $telefone);

    // Monta o endereço completo para geocodificação
    $endereco_completo = "{$endereco}, {$numero}, {$bairro}, {$municipio}, {$estado}, Brasil";

    // Chave da API do Google Maps
    $api_key = 'AIzaSyAltS5otXiMPc2aLJTWSfDEyxcwfpmwwcA';

    // Geocodificar o endereço completo para obter latitude e longitude usando a API do Google Maps
    list($latitude, $longitude) = geocodeAddress($endereco_completo, $api_key);

    // Verifica se as coordenadas foram obtidas com sucesso
    if ($latitude === null || $longitude === null) {
        die('Erro ao obter coordenadas. Por favor, verifique o endereço.');
    }

    // Verifica se o CPF já está cadastrado
    $query_cpf = "SELECT * FROM clientes WHERE CPF = ?";
    $stmt_cpf = mysqli_prepare($conexao, $query_cpf);
    mysqli_stmt_bind_param($stmt_cpf, "s", $CPF);
    mysqli_stmt_execute($stmt_cpf);
    mysqli_stmt_store_result($stmt_cpf);
    $num_rows_cpf = mysqli_stmt_num_rows($stmt_cpf);

    if ($num_rows_cpf > 0) {
        $cpf_error = 'CPF já cadastrado.';
        $CPF = '';
    }

    // Verifica se o Login já está em uso
    $query_login = "SELECT * FROM clientes WHERE usuario = ?";
    $stmt_login = mysqli_prepare($conexao, $query_login);
    mysqli_stmt_bind_param($stmt_login, "s", $login);
    mysqli_stmt_execute($stmt_login);
    mysqli_stmt_store_result($stmt_login);
    $num_rows_login = mysqli_stmt_num_rows($stmt_login);

    if ($num_rows_login > 0) {
        $login_error = 'Login já em uso.';
        $login = '';
    }

    // Verifica se o e-mail já está em uso
    $query_email = "SELECT * FROM clientes WHERE email = ?";
    $stmt_email = mysqli_prepare($conexao, $query_email);
    mysqli_stmt_bind_param($stmt_email, "s", $email);
    mysqli_stmt_execute($stmt_email);
    mysqli_stmt_store_result($stmt_email);
    $num_rows_email = mysqli_stmt_num_rows($stmt_email);

    if ($num_rows_email > 0) {
        $email_error = 'E-mail já cadastrado.';
        $email = '';
    }

    // Insere os dados no banco de dados
    if ($num_rows_cpf == 0 && $num_rows_login == 0 && $num_rows_email == 0) {
        $query_insert = "INSERT INTO clientes (nome_completo, data_nasc, email, sexo, nome_mae, CPF, numero_cel, numero_tel, CEP, bairro, municipio, estado, endereco, numero, usuario, senha, confirm_senha, tipo_usuario, latitude, longitude) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Paciente', ?, ?)";

        $stmt_insert = mysqli_prepare($conexao, $query_insert);
        mysqli_stmt_bind_param($stmt_insert, "sssssssssssssssssdd",
            $nome_completo, $data, $email, $genero, $nome_da_mae, $CPF, $celular,
            $telefone, $CEP, $bairro, $municipio, $estado, $endereco, $numero,
            $login, $senha, $confirm, $latitude, $longitude);

        $result = mysqli_stmt_execute($stmt_insert);

        if ($result) {
            // Limpa os campos após o cadastro bem-sucedido (opcional)
            $nome_completo = $data = $email = $genero = $nome_da_mae = $CPF = $celular = '';
            $telefone = $CEP = $bairro = $municipio = $estado = $endereco = $numero = $login = '';
            $senha = $confirm = '';

            // Exibe mensagem de sucesso
            $cadastro_sucesso = '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
        } else {
            // Exibe mensagem de erro em caso de falha na inserção
            echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar. Por favor, tente novamente.</div>';
        }

        
        mysqli_stmt_close($stmt_insert);
    }

   
    mysqli_stmt_close($stmt_cpf);
    mysqli_stmt_close($stmt_login);
    mysqli_stmt_close($stmt_email);
    mysqli_close($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Dr.Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    

</head>

<body>
    
    <form action="cadastro.php" method="POST">

        <!--Main Container-->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">


            <!--Login Container-->

            <div class="row border rounded-5 p-3 bg-white shadow box-area" id="box-area">   
            
                    <div class="input-group mb-3">
                        
                        <a style="border-radius: 15px" class="btn btn-primary botao_card" href="http://localhost/Projeto-Back-End/Login/login.php" role="button">Tenho Login</a>
                        <a style="margin-left: 20rem; border-radius: 15px;" class="btn btn-primary botao_card" id="botao_medic" href="http://localhost/Projeto-Back-End/Cadastro/Medico/cadastro_medic.php" role="button">Sou Médico</a>

                    </div>
                    <?php echo $cadastro_sucesso; ?>
                    <p class="d-flex justify-content-center cadastro_titulo" id="cadastro_titulo">CADASTRE-SE</p>

                    <!--Left Box-->

                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">
                            
                            <label for="nome_completo" id="labelNome">Nome completo</label>                   
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="nome_completo" name="nome_completo" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                            </div>
                            
                            <label for="data" id="label-data">Data de Nascimento</label>                  
                            <div class="input-group mb-3">
                                <input type="date" class="form-control form-control-lg bg-light fs-6" id="data" name="data" autocomplete="off" required placeholder="">
                            </div>

                            <?php if (!empty($email_error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $email_error; ?>
                                </div>
                            <?php endif; ?>

                            <label for="email">E-mail</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control form-control-lg bg-light fs-6" required id="email" name="email" autocomplete="off" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'example@domain.com'">
                            </div>

                                    <p>Gênero</p>

                                    <div class="form-check genero-input">
                                        
                                        <input style="margin-right: 20px;" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Masculino" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Masculino
                                        </label>

                                    </div>

                                    <div class="form-check genero-input">
                                        
                                        <input style="margin-right: 20px;" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Feminino" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Feminino
                                        </label>

                                    </div>

                                    <div class="form-check genero-input">
                                        
                                        <input style="margin-right: 20px;" class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios1" value="N_Informado" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Prefiro não dizer
                                        </label>

                                    </div>   
                            
                            <label style="margin-top: 10px;" for="mae" id="labelMae">Nome da Mãe</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="mae" name="mae" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                            </div>

                            <?php if (!empty($cpf_error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $cpf_error; ?>
                                </div>
                            <?php endif; ?>
                        
                            <label for="cpf" id="labelCpf">CPF</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6 cpf-input" required id="cpf" name="cpf" maxlength="11" autocomplete="off" placeholder="">
                            </div>
                            
                            <label for="celular" id="labelCelular">Número de Celular</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="11" maxlength="11" required id="celular" name="celular" autocomplete="off" placeholder="">
                            </div>

                            <label for="fixo" id="labelFixo">Telefone Fixo</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="10" maxlength="10" required id="fixo" name="fixo" autocomplete="off" placeholder="">
                            </div>
                            
                            <div class="button-group">
                                <button style="font-size: 18px;" class="btn btn-primary" id="cadastrar" name="cadastrar" type="submit">Cadastre-se</button>
                                <button style="font-size: 18px;" class="btn btn-primary" id="botaoLimpar" type="button" onclick="limparInputs()">Limpar Dados</button>
                            </div>
                        </div>

                    </div>

                    <!--Right Box-->
                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">

                            <label for="CEP" id="labelCep">CEP</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="CEP" name="cep" maxlength="8" autocomplete="off" placeholder="" onkeypress="return isNumberKey(event)">
                            </div>

                            <label for="bairro" id="labelBairro">Bairro</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="bairro" name="bairro" autocomplete="off" placeholder="">
                            </div>

                            <label for="municipio" id="labelMinicipio">Município</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="municipio" name="municipio" autocomplete="off" placeholder="">
                            </div>

                            <label for="estado" id="labelEstado">Estado</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="estado" name="estado" autocomplete="off" placeholder="">
                            </div>

                            <label for="endereco" id="labelEndereco">Endereço</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="endereco" name="endereco" autocomplete="off" placeholder="Ex: Rua Castro">
                            </div>

                            <label for="numero" id="labelNumero">Número</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6 numero-input" required id="numero" name="numero" autocomplete="off" placeholder="Ex: n° 105" maxlength="6">
                            </div>

                            <?php if (!empty($login_error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $login_error; ?>
                                </div>
                            <?php endif; ?>

                            <label for="usuario" id="labelUsuario">Login</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" name="usuario" autocomplete="off" required placeholder="">
                            </div>

                            <label for="senha" id="labelSenha">Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="senha" name="senha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                                <button type="button" class="btn btn-outline-secondary ri-eye-line" id="toggleSenha"></button>
                            </div>

                            <label for="confirmSenha" id="labelConfirmSenha">Confirmar Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="confirmSenha" name="confirmsenha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                                <button type="button" class="aa btn ri-eye-line" id="toggleConfirmSenha"></button>
                            </div>

                        </div>

                    </div>

            </div>

        </div>

    </form>

        <style>

            .is-invalid {
                border-color: red;
            }

            .is-valid {
                border-color: green;
            }

        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="/Projeto-Back-End/Cadastro/Clientes/validacao_usuario.js"></script>
        <script>
            // Script para validar usuário (permitindo apenas letras)
            $(document).ready(function(){
                $("#nome_completo, #mae").on("input", function(){
                    var sanitized = $(this).val().replace(/[^a-zA-Z\s]/g, '');
                    $(this).val(sanitized);
                });
            });


            //função para cep aceitar apenas números.
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                 return true;
                }
                document.getElementById('toggleSenha').addEventListener('click', function() {
                const senhaInput = document.getElementById('senha');
                const senhaIcon = document.getElementById('toggleSenhaIcon');
                if (senhaInput.type === 'password') {
                    senhaInput.type = 'text';
                } else {
                    senhaInput.type = 'password';
                }
            });
    document.getElementById('toggleConfirmSenha').addEventListener('click', function() {
        const confirmSenhaInput = document.getElementById('confirmSenha');
        const confirmSenhaIcon = document.getElementById('toggleConfirmSenhaIcon');
        if (confirmSenhaInput.type === 'password') {
            confirmSenhaInput.type = 'text';
        } else {
            confirmSenhaInput.type = 'password';
        }
    });

            $(document).ready(function(){
            $("#numero").on("input", function(){
             // Remover caracteres não numéricos
            var sanitized = $(this).val().replace(/[^0-9]/g, '');
            // Atualizar valor do input
            $(this).val(sanitized);
         });
    });
        </script>
</body>

</html>