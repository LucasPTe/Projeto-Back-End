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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/Tela inicial/sobre.css">
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
                    <a class="navbar-brand me-auto" href="/Tela inicial/index.html"> Dr.Agenda<!--<img src="/Tela inicial/archives/modavo_logo.png" id="logo_navbar" class="img-fluid" alt="Logo_Modavo">--></a>
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
                                    <a class="nav-link mx-lg-2 text-nav" href="/Projeto-Back-End/TelaBusca/busca.html">Buscar</a>
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
                        <h1 class="titulo_landing">Praticidade para buscar o melhor para sua saúde!</h1>
                        <p class="texto_landing">Encontre médicos próximos a você e agende
                            consultas com facilidade e rapidez. </p>
                        <div class="row">
                            <div class="col-xl-5 mb-3 mb-sm-0">
                                <label for="Especialista" id="labelUsuario"></label>
                                <div class="input-group mb-6">
                                    <input type="text" class="bg-light fs-6 especialista_busca" id="Especialista" placeholder="Especialista">
                                </div>
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
                        <img src="/Projeto-Back-End/Tela Inicial/archives/Med_logo_1.png" class="img-fluid" alt="modavo_solucoes">
                    </div>

                </div>
            </div>
        </section>
        <!-- FIM Seção Sobre-->


        <!--MAIN-->

        <section class="solucoes mb-5 pb-5 cards-con-1" id="solucoes">
            <div class="container cards-con-1 ">
                <div class="row">
                    <div class="col-md-3 cards pb-3">
                        <div class="card fundo_dark_mode_card">
                            <div class="card-body">
                                <h5 class="card-title my-3 titulo_card">Encontre especialistas</h5>
                                <p class="card-text mb-5 texto_card">Busque por especialistas de saúde em sua região. Filtre por planos de saúde, tratamentos ou disponibilidade.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 cards pb-3">
                        <div class="card fundo_dark_mode_card">
                            <div class="card-body">
                                <h5 class="card-title my-3 titulo_card">Marque Consultas</h5>
                                <p class="card-text mb-5 texto_card">Escolha o profissional, dia e horário que desejar, agendando sua consulta em até dois minutos. Sem complicação.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 cards pb-3">
                        <div class="card fundo_dark_mode_card">
                            <div class="card-body">
                                <h5 class="card-title my-3 titulo_card">Acompanhamento</h5>
                                <p class="card-text mb-4 texto_card">Acompanhe as atualizações dos seus exames, tratamentos e avaliações.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 cards pb-3">
                        <div class="card fundo_dark_mode_card">
                            <div class="card-body">
                                <h5 class="card-title my-3 titulo_card">Particular ou Público</h5>
                                <p class="card-text mb-4 texto_card">Oferecemos suporte para a localização dos especialistas mais próximos de ambas as áreas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about pb-5" id="sobre">
            <div class="container borda_baixo">
                <h2 class="text-center pb-5 quem_somos" id="quem_somos">Quem Somos?</h2>
                <div class="row mb-5 pb-5">
                    <div class="col-xl-5 espaco_entre">
                        <img src="/Projeto-Back-End/Tela Inicial/archives/dr_agenda.png" class="img-fluid" alt="dr_agenda_Imagem">
                    </div>
                    <div class="col-xl-7 d-flex align-items-center borda">
                        <p class="texto_quem_somos">Nós, da equipe da Dr. Agenda, somos um grupo de estudantes comprometidos em simplificar e melhorar a vida cotidiana das pessoas por meio da tecnologia. Nosso objetivo é criar soluções que facilitem a rotina e promovam uma experiência mais eficiente e conveniente para todos. A base do nosso projeto é um site e um aplicativo que utilizam tecnologia de geolocalização para encontrar médicos e laboratórios próximos à sua localização, facilitando o acesso a consultas médicas e exames de forma rápida e conveniente. </p>
                    </div>
                </div>
        </section>

        <section class="about pb-5" id="sobre">
            <div class="container">
                <h2 class="text-center pb-5 canais_atendimento_titulo" id="canais de atendimento">Canais de Atendimento</h2>
                <div class="row mb-5 pb-5">
                    <div class="col-xl-7 d-flex align-items-center borda">
                        <p>O Doutor Agenda valoriza sua contribuição para aprimorar nosso atendimento e serviços. Entre em contato para sugestões, dúvidas ou reclamações. Estamos prontos para ajudar e atendê-lo da melhor forma. </p>
                    </div>
                </div>
        </section>

        <section class="usos mb-5 pb-5" id="info_canais">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 cards pb-3">
                        <div>
                            <div class="card-body">
                                <h5 class="card-title text-center usos_titulo">E-mail</h5>
                                <p class="card-text text-center usos_texto">Reclamações, cancelamentos e informações gerais</p>
                                <p class="card-text text-center usos_texto">SAC@dragenda.com.br</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 cards pb-3">
                        <div>
                            <div class="card-body">
                                <h5 class="card-title text-center usos_titulo">Telefone</h5>
                                <p class="card-text text-center usos_texto">Em breve teremos um telefone para contato</p>
                                <p class="card-text text-center usos_texto">21 99999-9999</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <a href="#" target="_blank"><i class="fa-brands fa-instagram" class="links_footer" ></i></a>

                        <a href="#" target="_blank" class="links_footer"><i class="fa-brands fa-facebook"></i></a>

                        <a href="#" target="_blank" class="links_footer"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>