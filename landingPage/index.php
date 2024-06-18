<?php
$pic="esse.jpg";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css"/>
    <title>Dr.Agenda</title>
</head>

<style>

    .home{

        background-image: url('<?php echo $pic;?>');
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;

    }

</style>

<body>
    <!--NAVBAR-->

<header>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" id="logo" href="http://localhost/Projeto-Back-End/landingPage/index.php">Dr.Agenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-offcanvas" aria-controls="navbar-offcanvas" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="0" id="navbar-offcanvas" aria-labelledby="navbar-offcanvas-label">
        <div class="offcanvas-header">
            <h5 id="navbar-offcanvas-label">Dr.Agenda</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
                
        <?php
            session_start();
                if (isset($_SESSION['usuario'])) {
                    $logado = $_SESSION['usuario'];
                    echo "<span class='mensagem-completa'>Olá, <b class='usu_logado'>$logado</b>. Deseja sair?</span>";
                    echo '<a type="button" class="mb-5 btn entrar_off" href="/Projeto-Back-End/Sair.php">Sair</a>';
                } else {
                    if (isset($_SESSION['usuario_medic'])) {
                        $logado_medico = $_SESSION['usuario_medic'];
                        echo "Olá, <b>$logado_medico</b>. Deseja sair?";
                        echo '<a type="button" class="mb-5 btn entrar_off" href="/Projeto-Back-End/Sair.php">Sair</a>';
                    } else {
                        echo '<a type="button" class="mb-5 btn entrar_off" href="/Projeto-Back-End/Login/Login.php">Entrar</a>';
                    }                   
                }
                ?>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <br>
                <br>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/Projeto-Back-End/landingPage/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Projeto-Back-End/Busca/index.php">Busca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/LucasPTe/Projeto-Back-End" target="_blank">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Projeto-Back-End/DashboardMedicos/tela_medico.php">Perfil medico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Projeto-Back-End/DashboardPacientes/tela_Paciente.php">Perfil Paciente</a>
                </li>
            </ul>
            <div class="nav-item mt-5 ms-2 row">
                    <button class="btn border-3 btna btn-fonte col-2" id="increaseFontBtn">
                        A+
                    </button>
                    <button class="btn border-3 btna btn-fonte col-2" id="decreaseFontBtn">
                        a-
                    </button>
                    <input type="checkbox" class="checkbox row" id="chk">
                    <label class="labelchk" for="chk">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"></div>
                    </label>
                </div>

                <div class="col-6 mt-1">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">
                        Fechar
                    </button>
                    <!-- <a type="button" class="mb-5 btn entrar_off" href="/Projeto-Back-End/Sair.php">Sair</a> -->
                </div>
            </div>
        </div>
    </div>
</header>

    <!--FIM NAVBAR-->
    <!--HERO-->
    <section class="d-flex allign-items-top h-75 home mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 content">
                    <h1 class="title"><span>Praticidade</span> para buscar o melhor para sua <span>saúde.</span></h1>
                    <p class="descricao">Encontre especialistas mais próximos a você e agende consultas com facilidade e rapidez.</p>
                </div>
                <div class="col-lg-6 d-flex justify-content-end imagem">
                    <img src="http://localhost/Projeto-Back-End/landingPage/imagens_LandingPage/Doctors-pana.png" class="img-fluid" alt="modavo_solucoes">
                </div>
            </div>
        </div>
    </section>
    <!-- FIM HERO-->

    <!--SOBRE-->
    <section id="sobre" class="section_sobre light-mode">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h1 class="display-4 fw-semibold mt-3 sobre_nos">Sobre</h1>
                        <div class="linha"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <img src="http://localhost/Projeto-Back-End/landingPage/imagens_LandingPage/img2.png" alt="imagem_sobre" class="img_2">
                </div>
                <div class="col-lg-5">
                    <h1 class="sob_dr">Sobre o Dr.Agenda</h1>
                    <p class="mt-3 mb-4 sob_dr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maxime!</p>
                    <div class="d-flex pt-2 mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-service-fill"></i>
                        </div>
                        <div>
                            <h5 class="titulo_info_sobre">Missão</h5>
                            <p class="texto_info_sobre">Nós, da equipe da Dr. Agenda, somos um grupo de estudantes comprometidos em simplificar e melhorar a vida cotidiana das pessoas por meio da tecnologia.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-crosshair-line"></i>
                        </div>
                        <div>
                            <h5 class="titulo_info_sobre">Objetivo</h5>
                            <p class="texto_info_sobre">Nosso objetivo é criar soluções que facilitem a rotina e promovam uma experiência mais eficiente e conveniente para todos.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="iconbox me-4">
                            <i class="ri-stethoscope-line"></i>
                        </div>
                        <div>
                            <h5 class="titulo_info_sobre">Funcionalidades</h5>
                            <p class="texto_info_sobre">A base do nosso projeto é um site e um aplicativo que utilizam tecnologia de geolocalização para encontrar médicos e laboratórios próximos à sua localização, facilitando o acesso a consultas médicas e exames de forma rápida e conveniente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="section_servicos mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h1 class="display-4 fw-semibold mt-3 sobre_nos">Serviços</h1>
                        <div class="linha"></div>
                    </div>
                </div>
                <div class="row text-center align-items-center">
                    <div class="col-lg-3 col-sm-6 mb-3 icobox_1 aa">
                        <div class="service theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="ri-stethoscope-line"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Encontre especialistas</h5>
                            <p>Busque por especialistas de saúde em sua região. Filtre por planos de saúde, tratamentos ou disponibilidade.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3 icobox_2 ">
                        <div class="service theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="ri-clipboard-line"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Marque Consultas</h5>
                            <p>Escolha o profissional, dia e horário que desejar, agendando sua consulta em até dois minutos. Sem complicação.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3 icobox_3 ">
                        <div class="service theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="ri-bar-chart-2-line"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Acompanhamento</h5>
                            <p>Acompanhe regularmente as atualizações dos seus exames, tratamentos e avaliações para garantir controle do seu bem-estar.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3 icobox_4">
                        <div class="service theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="ri-hospital-line"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Particular ou Público</h5>
                            <p>Oferecemos suporte para localizar os especialistas mais próximos, ajudando você a encontrar os profissionais de saúde.</p>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <footer class="bg-dark text-white pt-5 pb-4">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 c  ol-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Dr.Agenda</h5>
                        <p>O Doutor Agenda valoriza sua contribuição para aprimorar nosso atendimento e serviços. Entre em contato para sugestões, dúvidas ou reclamações. Estamos prontos para ajudar e atendê-lo da melhor forma.</p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Contato</h5>
                        <p>
                            <i class="fas fa-phone mr-3"></i>(21) 4002-8922
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i>sac@dragenda.com
                        </p>
                    </div>

                    <hr class="mb-4">
                    <div class="row align-items-center">

                        <div class="col-md-7 col-lg-8">
                            <p>Copyright ©2024 All rights reserved by:
                                <a href="https://github.com/LucasPTe/Projeto-Back-End" target="_blank">
                                    <strong>Dr.Agenda</strong>
                                </a>
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </footer>


    <script src="http://localhost/Projeto-Back-End/landingPage/darkmode.js"></script>
    <!--GSAP CDN LINK-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="script2.js"></script>
    <script src="script.js"></script>
    <script src="aumento.js"></script>
</body>

</html>