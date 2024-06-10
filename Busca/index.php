<?php
    session_start();
    //include_once('buscar.php');
    
    /* Informações de quem fez o login*/ 
    //print_r($_SESSION);
    

    // Se não existir essas duas variáveis logadas no web aberto, irá retornar para a tela de login, caso tente acessar a tela principal por link.
        if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
        {

        // Irá descartar as duas variáveis e voltar para tela de login.
            unset ($_SESSION['usuario']);
            unset ($_SESSION['senha']);
            header('Location: http://localhost/Projeto-Back-End/Login/Login.php');

        }

    // Irá manter o usuário logado na tela principal.
        $logado = $_SESSION['usuario'];


        $dbHost ='localhost:3306';
        $dbUsername ='root';
        $dbPassword ='';
        $dbName ='dr_agenda';
        
        $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }
        // Verifica se a especialidade foi selecionada

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Dr.Agenda</title>
</head>

<body>
    <!--NAVBAR-->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" id="logo" href="http://localhost/Projeto-Back-End/landingPage/index.php">Dr.Agenda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar-offcanvas" aria-controls="navbar-offcanvas" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <div class="poschk">
                            <input type="checkbox" class="checkbox" id="chk">
                            <label class="labelchk" for="chk">
                                <i class="fas fa-moon"></i>
                                <i class="fas fa-sun"></i>
                                <div class="ball"></div>
                            </label>
                            <script src="script.js"></script>
                            <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
                        </div>
                            <div class="nav-item ms-2">
                                <button class="btn border-3 btna btn-fonte" id="increaseFontBtn">
                                     A+
                                </button>
                            </div>
                            <div class="nav-item ms-2">
                                <button class="btn border-3 btna btn-fonte" id="decreaseFontBtn">
                                    a-
                                </button>
                            </div>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="http://localhost/Projeto-Back-End/landingPage/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/Projeto-Back-End/Busca/index.php">Busca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-3" href="#">Sobre</a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btna" href="/Projeto-Back-End/Sair.php" role="button">Sair</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="b" id="entrar" href="http://localhost/Projeto-Back-End/Login/login.php">Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Modal-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbar-offcanvas" aria-labelledby="navbar-offcanvas-label">
            <div class="offcanvas-header">
                <h2 id="navbar-offcanvas-label">Dr.Agenda</h2>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/Projeto-Back-End/landingPage/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Projeto-Back-End/TeladeBusca/index.php">Busca</a>
                    </li>

                    <li class="nav-item">
                            <a class="btn btn-primary" href="/Projeto-Back-End/Sair.php" role="button">Sair</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                </ul>
            <div class="row">
                <div class="col-12 mt-3 mb-5">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="b entrar_off" href="http://localhost/Projeto-Back-End/Login/login.php">Entrar</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 mt-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">
                        Fechar
                    </button>
                </div>
                <div class="col-6 mt-3">
                    <input type="checkbox" class="checkbox" id="chk">
                    <label class="labelchk" for="chk">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"></div>
                    </label>
                    </label>
                </div>
            </div>
        </div>
    </header>


         <!--HERO-->
<!--HERO-->
<section class="d-flex allign-items-top h-75 home mb-5 fundo_busca">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 content">
                <h1 class="title"><span>Buscar</span> especialistas nunca foi tão <span>fácil</span></h1>
                <p class="descricao">Escolha a especialidade que deseja: </p>        
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-body-busca">
                                <?php 
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['especialidade'])) {
                                        $especialidade = $_POST['especialidade'];
                                    
                                        // Consulta SQL para buscar médicos pela especialização selecionada
                                        $sql = "SELECT nome_completo_medic, especializacao, endereco_medic, CRM FROM medicos WHERE especializacao = ?";
                                        
                                        $stmt = $conexao->prepare($sql);
                                        $stmt->bind_param("s", $especialidade);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                    
                                        // Verifica se há resultados
                                        if ($result->num_rows > 0) {
                                            echo "<table border='1'>";
                                            echo "<tr><th>Nome Completo</th><th>Especialização</th><th>Endereço</th><th>CRM</th></tr>";
                                    
                                            // Exibe os resultados em uma tabela
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['nome_completo_medic'] . "</td>";
                                                echo "<td>" . $row['especializacao'] . "</td>";
                                                echo "<td>" . $row['endereco_medic'] . "</td>";
                                                echo "<td>" . $row['CRM'] . "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        } else {
                                            echo "Nenhum médico encontrado para a especialidade selecionada.";
                                        }
                                        
                                        $stmt->close();
                                    }
                                    
                                    $conexao->close();
                                ?>
                                <form method="POST">
                                    <label for="especialidadeSelect" class="form-label"></label>
                                    <select name="especialidade" class="form-select" id="especialidadeSelect">
                                        <option value="" selected disabled hidden>Selecione uma especialidade</option>
                                        <option value="cardiologista">Cardiologista</option>
                                        <option value="nutricionista">Nutricionista</option>
                                        <option value="oftalmologista">Oftalmologista</option>
                                        <option value="psicologo">Psicólogo</option>
                                        <option value="pediatria">Pediatria</option> 
                                    <!-- Adicione mais especialidades conforme necessário -->
                                    </select>
                                    <button type="submit" class="btn_1">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- <a type="submit" href="" class="btn_1">Buscar</a> -->
                </form>
            </div>
            <div class="col-lg-6 d-flex justify-content-end imagem">
                <img src="http://localhost/Projeto-Back-End/Busca/imgs/mapa.png" class="img-fluid" alt="mapa">
            </div>
        </div>
    </div>
</section>
<!-- FIM HERO-->

<!-- FIM HERO-->
    
<div class="container mt-4">
    <div class="row">
      <div class="col-md-6 card_especialista">
        <div class="card">
          <div class="card-header">
            Dr. Rodrigo Menezes Gomes
          </div>
          <div class="card-body">
            <p><i class="bi bi-geo-alt-fill"></i> xKm de distância</p>
            <p><i class="bi bi-telephone-fill"></i> (21) 94256-5486</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Dr. Claudia Piris
          </div>
          <div class="card-body">
            <p><i class="bi bi-geo-alt-fill"></i> xKm de distância</p>
            <p><i class="bi bi-telephone-fill"></i> (21) 9745-3594</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Dr. Gabriel Monteiro
          </div>
          <div class="card-body">
            <p><i class="bi bi-geo-alt-fill"></i> xKm de distância</p>
            <p><i class="bi bi-telephone-fill"></i> (21) 94256-5486</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="map"></div>
      </div>
    </div>
  </div>


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
                        <i class="fas fa-phone mr-3"></i> (21) 4002-8922
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> sac@dragenda.com
                    </p>
                </div>

                <hr class="mb-4">
                <div class="row align-items-center">

                    <div class="col-md-7 col-lg-8">
                        <p>Copyright ©2024 All rights reserved by:
                            <a href="">
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
    <script src="http://localhost/Projeto-Back-End/landingPage/script2.js"></script>
    <script src="http://localhost/Projeto-Back-End/landingPage/script.js"></script>
    <script src="http://localhost/Projeto-Back-End/landingPage/aumento.js"></script>   
    <script src="/Busca/especialista.js"></script>


</body>
</html>