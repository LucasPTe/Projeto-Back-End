<?php

    // banco de dados:

if(isset($_POST["cadastrar"]))
{


    // Teste de conexão com o banco de dados

    /*print_r('Nome: ' . $_POST['nome_completo']);
    print_r('<br>');
    print_r('Data de Nascimento: ' . $_POST['data']);
    print_r('<br>');
    print_r('E-mail: ' . $_POST['email']);
    print_r('<br>');
    print_r('Gênero: ' . $_POST['exampleRadios']);
    print_r('<br>');
    print_r('Nome da Mãe: ' . $_POST['mae']);
    print_r('<br>');
    print_r('CPF: ' . $_POST['cpf']);
    print_r('<br>');
    print_r('Número do Celular: ' . $_POST['celular']);
    print_r('<br>');
    print_r('Número do Telefone: ' . $_POST['fixo']);
    print_r('<br>');
    print_r('CEP: ' . $_POST['cep']);
    print_r('<br>');
    print_r('Bairro: ' . $_POST['bairro']);
    print_r('<br>');
    print_r('Municipio: ' . $_POST['municipio']);
    print_r('<br>');
    print_r('Estado: ' . $_POST['estado']);
    print_r('<br>');
    print_r('Endereço: ' . $_POST['endereco']);
    print_r('<br>');
    print_r('Número do Local: ' . $_POST['numero']);
    print_r('<br>');
    print_r('Login: ' . $_POST['usuario']);
    print_r('<br>');
    print_r('Senha: ' . $_POST['senha']);
    print_r('<br>');
    print_r('Senha Confirmada: ' . $_POST['confirmsenha']);*/
    
    include_once('cadastro_config.php');

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
    
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome_completo,data_nasc,email,sexo,nome_mae,CPF,numero_cel,numero_tel,CEP,bairro,municipio,estado,endereco,numero,usuario,senha,confirm_senha) 
    VALUES ('$nome_completo','$data','$email','$genero','$nome_da_mae','$CPF','$celular','$telefone','$CEP','$bairro','$municipio','$estado','$endereco','$numero','$login','$senha','$confirm')");

 }


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Med+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <form action="cadastro.php" method="POST">

        <!--Main Container-->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">


            <!--Login Container-->

            <div class="row border rounded-5 p-3 bg-white shadow box-area" id="box-area">   
            
                    <div class="input-group mb-3">
                        <a class="btn btn-primary botao_card" href="http://localhost/Projeto-Back-End/Login/Login.php" role="button">Tenho Login</a>
                    </div>
                    
                    <p class="d-flex justify-content-center cadastro_titulo" id="cadastro_titulo">CADASTRE-SE</p>

                    <!--Left Box-->

                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">
                            
                            <label for="nome_completo" id="labelNome">Nome completo</label>                   
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="nome_completo" name="nome_completo" minlength="15" maxlength="80" required placeholder="">
                            </div>
                            
                            <label for="data_de_nascimento" id="label-data">Data de Nascimento</label>                  
                            <div class="input-group mb-3">
                                <input type="date" class="form-control form-control-lg bg-light fs-6" id="data" name="data" autocomplete="off" required placeholder="">
                            </div>

                            <label for="e-mail">E-mail</label>
                            <div class="input-group mb-3">
                                <input type="e-mail" class="form-control form-control-lg bg-light fs-6" required id="email" name="email" autocomplete="off" placeholder="">
                            </div>

                                    <p>Gênero</p>

                                    <div class="form-check">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Masculino" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Másculino
                                        </label>

                                    </div>

                                    <div class="form-check" id="genero">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Feminio" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Feminino
                                        </label>

                                    </div>

                                    <div class="form-check" id="genero">
                                        
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Discreto" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Prefiro não dizer
                                        </label>

                                    </div>   
                            
                            <label style="margin-top: 10px;" for="nome_da_mae" id="labelMae">Nome da Mãe</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" id="mae" name="mae" autocomplete="off" minlength="15" maxlength="80" required placeholder="">
                            </div>
                            
                            <label for="CPF" id="labelCpf">CPF</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="cpf" name="cpf" maxlength="11" autocomplete="off" placeholder="">
                            </div>
                            
                            <label for="numero_de_celular" id="labelCelular">Número de Celular</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="11" maxlength="11" required id="celular" name="celular" autocomplete="off" placeholder="">
                            </div>

                            <label for="telefone_fixo" id="labelFixo">Telefone Fixo</label>
                            <div class="input-group mb-3">
                                <input type="tel" class="form-control form-control-lg bg-light fs-6" minlength="10" maxlength="10" required id="fixo" name="fixo" autocomplete="off" placeholder="">
                            </div>

                            <div class="d-grid gap-2 d-md-block">
                                <button style="font-size: 18px;" class="btn btn-primary" name="cadastrar" type="submit">Cadastre-se</button>
                                <button style="font-size: 18px;" class="btn btn-primary" name="limpar" type="submit">Limpar Dados</button>
                            </div>
                        
                        </div>

                    </div>

                    <!--Right Box-->
                    <div class="col-md-6 right-box" id="right-box">
                        <div class="row align-items-center">

                            <label for="CEP" id="labelCep">CEP</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="CEP" name="cep" autocomplete="off" placeholder="">
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
                                <input type="text" class="form-control form-control-lg bg-light fs-6" required id="numero" name="numero" autocomplete="off" placeholder="Ex: n° 105">
                            </div>

                            <label for="nome_de_usuario" id="labelUsuario">Login</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" name="usuario" autocomplete="off" required placeholder="">
                            </div>

                            <label for="senha" id="labelSenha">Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="senha" name="senha" minlength="8" maxlength="16" autocomplete="off" placeholder="">
                            </div>

                            <label for="confirmar_senha" id="labelConfirmSenha">Confirmar Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" required id="confirmSenha" name="confirmsenha" minlength="8" maxlength="16" autocomplete="off" placeholder="">
                            </div>

                        </div>
                
                    </div>

            </div>

        </div>

    </form>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
