<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/Tela inicial/archives/telecall.png">
    <link rel="shortcut icon" href="/Tela inicial/archives/telecall.png" type="image/x-icon">
    <link rel="stylesheet" href="Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>

<!--Área de Login-->

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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

                <div class="row align-items-center">
                    <div class="input-group mb-3">
                       
                        <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button">Limpar Dados</button>
                        </div>
                    
                    </div>

                    <div class="header-text mb-4">
                        <p class="bem_vindo d-flex justify-content-center">Entre em sua conta</p>
                    </div>

                    <label for="nome_de_usuario" id="labelUsuario">Usuário</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" minlength="6" maxlength="6" id="usuario" required>

                    </div>
                    
                    <label for="senha" id="labelSenha">Senha</label>
                    
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" minlength="8" maxlength="8" id="senha" required>
                    </div>

                    <div class="input-group mb-3">
                        
                        <input type="button" value="Entrar" class="btn btn-lg btn-primary fs-6 login_botao" onclick="login()">
                    
                    </div>
                    
                    <p>Já possui uma conta ?</p>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="button">Registra-se</button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="redirect()"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="modalMessage"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="redirect()">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/Login/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>