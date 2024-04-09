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
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="nome_completo" minlength="15" maxlength="80" required placeholder="">
                    </div>
                    
                    <label for="data_de_nascimento" id="label-data">Data de Nascimento</label>                  
                    <div class="input-group mb-3">
                        <input type="date" class="form-control form-control-lg bg-light fs-6" id="data" required placeholder="">
                    </div>

                    <label for="e-mail" id="e-mail">E-mail</label>
                    <div class="input-group mb-3">
                        <input type="e-mail" class="form-control form-control-lg bg-light fs-6" required id="e-mail" placeholder="">
                    </div>
                    
                    <div class="input-group mx-1">
                        
                        <form class="pb-3 form_sexo" id="sexo">
                            <p class="sexo_titulo" id="sexo_titulo">Sexo</p>
                            <input required type="radio" name="Sexo" value="Masculino" id="masculino">
                            <label for="masculino">Masculino</label><br>
                            <input required type="radio" name="Sexo" value="Feminino" id="feminino">
                            <label for="feminino">Feminino</label><br>
                            <input required type="radio" name="Sexo" value="Prefiro_nao_informar" id="nao_informar">
                            <label for="prefiro_não_informar">Prefiro não informar</label>
                        </form>
                    
                    </div>
                    
                    <label for="nome_da_mae" id="labelMae">Nome da Mãe</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="mae" minlength="15" maxlength="80" required placeholder="">
                    </div>
                    
                    <label for="CPF" id="labelCpf">CPF</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required id="cpf" placeholder="">
                    </div>
                    
                    <label for="numero_de_celular" id="labelCelular">Número de Celular</label>
                    <div class="input-group mb-3">
                        <input type="tel" class="form-control form-control-lg bg-light fs-6" required id="celular" placeholder="">
                    </div>

                    <label for="telefone_fixo" id="labelFixo">Telefone Fixo</label>
                    <div class="input-group mb-3">
                        <input type="tel" class="form-control form-control-lg bg-light fs-6" required id="fixo" placeholder="">
                    </div>
                
                </div>

            </div>

            <!--Right Box-->
            <div class="col-md-6 right-box" id="right-box">
                <div class="row align-items-center">

                    <label for="CEP" id="labelCep">CEP</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required id="CEP" placeholder="">
                    </div>

                    <label for="bairro" id="labelBairro">Bairro</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required id="bairro" placeholder="">
                    </div>

                    <label for="estado" id="labelEstado">Estado</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required id="estado" placeholder="">
                    </div>

                    <label for="endereco" id="labelRua">Endereço e N°</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required id="endereco" placeholder="Ex: Rua Castro, n° 105">
                    </div>

                    <label for="nome_de_usuario" id="labelUsuario">Login</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" required id="usuario" placeholder="">
                    </div>

                    <label for="senha" id="labelSenha">Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" required id="senha" minlength="8" maxlength="8" placeholder="">
                    </div>

                    <label for="confirmar_senha" id="labelConfirmSenha">Confirmar Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" required id="confirmSenha" minlength="8" maxlength="8" placeholder="">
                    </div>

                </div>
                
                <div style="margin-top: 57px;" class="d-grid gap-2 d-md-block">
                <button style="font-size: 18px;" class="btn btn-primary" type="button">Cadastre-se</button>
                <button style="font-size: 18px;" class="btn btn-primary" type="button">Limpar Dados</button>
                </div>
            
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
