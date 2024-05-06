
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Med+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_login.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">

</head>

<!--Área de Login-->

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!--Login Container-->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #2fade3">
                
            <div class="featured-image mb-3">
                <img src="Img/login.png" class="img-fluid" style="width: 250px" alt="imagem_login">
            </div>
                
                <p class="text-white fs-2">Seja bem-vindo!</p>
                
                <small class="text-white text-wrap text-center" style="width: 17rem;"></small>
            </div>
            
            <!--Right Box-->

                <div class="col-md-6 right-box">

            <form action="Login_config.php" method="POST">

                    <div class="row align-items-center">
                        
                        <div class="input-group mb-3">
                            <a type="button" class="btn btn-primary" href="http://localhost/Projeto-Back-End/Tela%20Inicial/index.html" id="home">Home</a>
                        </div>
                        
                        <div class="header-text mb-4">
                            <p style="font-size: 25px;" class="bem_vindo d-flex justify-content-center">Entre em sua conta</p>
                        </div>
                        
                        <label for="nome_de_usuario" id="labelUsuario">Usuário</label>
                        
                        <div class="input-group mb-3">      
                            <input required type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" name="usuario" autocomplete="off" placeholder="Digite seu login">
                        </div>
                        
                        <label for="senha" id="labelSenha">Senha</label>
                        
                        <div class="input-group mb-1">
                            <input required type="password" class="form-control form-control-lg bg-light fs-6" minlength="8" maxlength="8" id="senha" name="senha" autocomplete="off" placeholder="Digite sua senha">
                        </div>

                        <div class="input-group mb-3">
                            <input type="submit" name="submit" class="btn btn-primary login_botao" value="Acessar">
                        </div>
                        
                        <p>Não possui conta ?</p>
                        
                        <div>
                            <a href="http://localhost/Projeto-Back-End/Cadastro/Clientes/cadastro.php" id="botao_cadastrar"><input type="button" value="Cadastrar-se" class="btn btn-lg btn-primary fs-6 cadastro_botao"></a>
                        </div>

            </form>
                    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>