<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr.Agenda</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="/TelaInicial/sobre.css">
    <link rel="stylesheet" href="dark-mode.css" id="dark-mode-stylesheet">
    <script src="dark-mode.js"></script>

</head>

<body id="body">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <header>
        <div id="aa">
            <nav class="navbar navbar-expand-lg fixed-top nav-bar-fundo">
                <div class="container-fluid">
                    <a class="navbar-brand me-auto" href="/TelaInicial/index.html"> Dr.Agenda<!--<img src="/TelaInicial/archives/modavo_logo.png" id="logo_navbar" class="img-fluid" alt="Logo_Modavo">--></a>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body" id="drop">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2 text-nav" aria-current="page" href="/Projeto-Back-End/Tela%20Inicial/index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2 text-nav" href="/Projeto-Back-End/TelaBusca/busca.php">Buscar</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="container-dark">
                        <label class="switch">
                            <input type="checkbox" id="darkModeToggle">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div class="nav-item conteiner_botao_fonts">
                    <button class="btn btn-primary border-3 m-0 mx-0 btn-fonte botao_a-" id="increaseFontBtn">
                        A+
                    </button>
                    <button class="btn btn-primary border-3 m-0 mx-1 btn-fonte botao_a" id="decreaseFontBtn">A - </button>
                </div>
                <button class="btn btn-danger ms-2 sair_botao" onclick="sair()">Sair</button>
                <a href="/Projeto-Back-End/Login/Login.php" class="login-button">Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

        </div>
        </nav>
        </div>
        <!-- Fim Navbar -->

    </header>
    <article>


        <!-- Seção Sobre-->

        <section class="d-flex allign-items-top h-75 home mb-5">
            <div class="container distancia_navbar">
                <div class="row d-flex">
                    <div class="col-sm-6">
                        <h1 class="titulo_landing">Buscar e contratar nunca foi tão fácil!</h1>
                        <div class="row">
                            <div class="col-xl-5 mb-3 mb-sm-0">
                            <div class="form-floating conteiner_select">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="1">Cardiologia</option>
                            <option value="2">Ortopedia</option>
                            <option value="3">Otorrinolaringologia</option>
                            <option value="4">Nutrologia</option>
                            <option value="5">Oftalmologia</option>
                            </select>
                            <label for="floatingSelect">Selecione Abaixo</label>
                        </div>
                                <!-- <label for="Especialista" id="labelUsuario"></label>
                                <div class="input-group mb-6">
                                    <input type="text" class="bg-light fs-6 especialista_busca" id="Especialista" placeholder="Especialista">
                                </div> -->
                            </div>
                            <div class="col-xl-5 div_localidade">
                                <label for="senha" id="labelLocalidade"></label>
                                <div class="input-group mb-6">
                                    <input type="text" class="bg-light fs-6 localidade_busca" id="Localidade" placeholder="Localidade">
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3 mx-auto d-block">
                            <button class="btn btn-primary botao_buscar" type="button">Buscar</button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <img src="/Projeto-Back-End/TelaBusca/archives/pino.png" class="img-fluid" alt="modavo_solucoes">
                    </div>
                </div>
            </div>
        </section>
        <!-- FIM Seção Sobre-->

        <div class="section_resultado">
            <h4>Resultado:</h4>
            <br>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body ll conteiner-cards">
                            <div class="row titulo_card">

                                <div class="conteiner-titulo-card">
                                    <h5 class="card-title card_text h5_doutor">Dra. Paula Tejano</h5>

                                    <h5 class="card-title card_text2">Cardiologia</h5>
                                </div>

                            </div>
                            <p class="card-text">Rua Fora Tite, 84 - Gávea </p>
                            <p class="card-text">(21) 96969-6969 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <footer>
            <div class="container text-center aa">
                <div class="row text-center align-items-center">
                    <div class="col-md-4">
                        <p>Desenvolvido por <a href="https://github.com/LucasPTe/Projeto-Back-End" class="link_alunos" target="_blank">Alunos</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2><a href="index.html">Dr Agenda</a></h2>
                    </div>
                    <div class="col-md-4 conteiner_links_footer">
                        <a href="#" target="_blank"><i class="fa-brands fa-instagram" class="links_footer"></i></a>

                        <a href="#" target="_blank" class="links_footer"><i class="fa-brands fa-facebook"></i></a>

                        <a href="#" target="_blank" class="links_footer"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>