<?php
// Inclui as configurações do banco de dados
$servidor = "localhost:3307";
$usuario = "root";
$senha = "";
$banco = "dr_agenda";

// Cria a conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
};

// Verifica se o formulário foi enviado
if (isset($_POST["cadastrar"])) {
    // Captura os valores do formulário
    $nome_completo = $_POST['nome_completo'];
    $data = $_POST['data'];
    $email = $_POST['email'];
    $especializacao = $_POST['especializacao'];
    $genero = $_POST['ExampleRadios'];
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
    $CRM = $_POST['CRM']; // Captura o CRM do formulário

    // Validação de senha
    if ($senha !== $confirm) {
        echo "Senhas não coincidem!";
        exit();
    }

    // Insere os dados no banco de dados
    $sql = "INSERT INTO medicos (nome_completo_medic, data_nasc_medic, email_medic, especializacao, sexo_medic, nome_mae_medic, CPF_medic, numero_cel_medic, numero_tel_medic, CRM, CEP_medic, bairro_medic, municipio_medic, estado_medic, endereco_medic, numero_medic, usuario_medic, senha_medic, confirm_senha_medic, tipo_usuario) 
    VALUES ('$nome_completo', '$data', '$email','$especializacao', '$genero', '$nome_da_mae', '$CPF', '$celular', '$telefone', '$CRM', '$CEP', '$bairro', '$municipio', '$estado', '$endereco', '$numero', '$login', '$senha', '$confirm', 'Médico')";

    if (mysqli_query($conexao, $sql)) {
        header('Location: http://localhost/Projeto-Back-End/Cadastro/Tela_aviso.php');
    } else {
        // Exibe o erro do SQL
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
    <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Dr.agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="cadastro_medic.php" method="POST">
        <!--Main Container-->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!--Login Container-->
            <div class="row border rounded-5 p-3 bg-white shadow box-area" id="box-area">   
                <div class="input-group mb-3">
                    <a style="border-radius: 15px" class="btn btn-primary botao_card" href="http://localhost/Projeto-Back-End/Login/Login.php" role="button">Tenho Login</a>
                    <a style=" border-radius: 15px;" class="btn btn-primary botao_card" id="botao_medic" href="http://localhost/Projeto-Back-End/Cadastro/Clientes/cadastro.php" role="button">Sou Paciente</a>
                </div>
                
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

                        <label for="email">E-mail</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" required id="email" name="email" autocomplete="off" placeholder="">
                        </div>

                        <label for="especializacao">Especialização</label>
                        <div class="input-group mb-3">
                        <select class="form-control form-control-lg bg-light fs-6" aria-label="Default select example" required id="especializacao" name="especializacao">
                                <option value="psicologia">Psicologia</option>
                                <option value="cardiologista">Cardiologista</option>
                                <option value="pediatria">Pediatria</option>
                                <option value="oftalmologista">Oftalmologista</option>
                        </select>
                        </div>
                        <p>Gênero</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ExampleRadios" id="exampleRadios1" value="Masculino" checked>
                                <label style="margin-left: 10px;" class="form-check-label" for="exampleRadios1">
                                        Masculino
                                    </label>
                            </div>
                            <div class="form-check" >
                                <input style="margin-right: 20px;" class="form-check-input" type="radio" name="ExampleRadios" id="exampleRadios1" value="Feminio" checked>
                                     <label class="form-check-label" for="exampleRadios1">
                                         Feminino
                                    </label>
                            </div>
                            <div class="form-check">
                                <input style="margin-right: 20px;" class="form-check-input" type="radio" name="ExampleRadios" id="exampleRadios1" value="N_informado" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Prefiro não dizer
                                    </label>
                            </div>
                        <label style="margin-top: 10px;" for="mae" id="labelMae">Nome da Mãe</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="mae" name="mae" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                        </div>
                        
                        <label for="cpf" id="labelCpf">CPF</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" required id="cpf" name="cpf" maxlength="11" autocomplete="off" placeholder="">
                        </div>
                        
                        <label for="celular" id="labelCelular">Número de Celular</label>
                        <div class="input-group mb-3">
                            <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="11" maxlength="11" required id="celular" name="celular" autocomplete="off" placeholder="">
                        </div>

                        <label for="fixo" id="labelFixo">Telefone Fixo</label>
                        <div class="input-group mb-3">
                            <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="10" maxlength="10" required id="fixo" name="fixo" autocomplete="off" placeholder="">
                        </div>
                    </div>
                </div>

                <!--Right Box-->
                <div class="col-md-6 right-box" id="right-box">
                    <div class="row align-items-center">
                        <label for="CRM" id="labelCRM">Certificado de Registro Médico</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="9" maxlength="9" required id="CRM" name="CRM" autocomplete="off" placeholder="Digite seu CRM" oninput="validateCRM(this)">
                        </div>

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
                            <input type="text" class="form-control form-control-lg bg-light fs-6" required id="numero" name="numero" autocomplete="off" placeholder="Ex: n° 105" maxlength="6">
                        </div>

                        <label for="usuario" id="labelUsuario">Login</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" name="usuario" autocomplete="off" required placeholder="">
                        </div>

                        <label for="senha" id="labelSenha">Senha</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" required id="senha" name="senha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                        </div>

                        <label for="confirmSenha" id="labelConfirmSenha">Confirmar Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="confirmSenha" name="confirmsenha" minlength="8" maxlength="8" autocomplete="off" placeholder="">
                            </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button style="font-size: 18px;" class="btn btn-primary" id="cadastrar" name="cadastrar" type="submit">Cadastre-se</button>
                    <button style="font-size: 18px;" class="btn btn-primary" id="botaoLimpar" type="button" onclick="limparInputs()">Limpar Dados</button>
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

        <script>
            // Script para validar usuário (permitindo apenas letras)
            $(document).ready(function(){
                $("#nome_completo, #mae").on("input", function(){
                    // Remover caracteres não alfabéticos
                    var sanitized = $(this).val().replace(/[^a-zA-Z\s]/g, '');
                    // Atualizar valor do input
                    $(this).val(sanitized);
                });
            });
        </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/Projeto-Back-End/Cadastro/Medico/validacao_medic.js"></script>
</body>

</html>
