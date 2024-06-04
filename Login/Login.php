<?php
$pic="fundo.jpg"

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr Agenda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<style>

body {
  /* background-color: #d5dcf1;  */ /* #d5dcf1 */
  background-image: url('<?php echo $pic;?>');
  background-size: cover; /* cobre toda a tela */
  background-repeat: no-repeat; /* não repete a imagem */
  background-position: center center; /* centraliza a imagem */
  min-height: 100vh;
}
</style>


<body>

    <div class="container d-flex justify-content-center align-items-center vh-100 container-principal">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box text-center conteiner-esquerdo ">

                <div class="featured-image mb-3">
                    <img src="http://localhost/Projeto-Back-End/Login/Img/Enthusiastic-pana.png" alt="logo" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text fs-2 text-center">Pertinho de você</p>
                <small class="text text-wrap text-center">Os melhores especialistas e exames mais próximos de você</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="input-group mb-3 conteiner_botão">
                    <a class="btn btn-lg btn-primary fs-6 btn_voltar" href="http://localhost/Projeto-Back-End/landingPage/index.php">Voltar</a>
                </div>
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Seja bem vindo</h2>
                        <p>Ficamos felizes em ver você por aqui</p>
                    </div>
                    <form action="Login_config.php" method="POST">
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
                    </form>
                        <small class="text-center small-cadastro">Não tem uma conta? cadastre-se como <a href="http://localhost/Projeto-Back-End/Cadastro/Clientes/cadastro.php">Paciente</a> ou <a href="http://localhost/Projeto-Back-End/Cadastro/Medico/cadastro_medic.php">Médico</a> aqui.</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>