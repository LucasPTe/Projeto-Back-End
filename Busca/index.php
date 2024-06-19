<?php
session_start();

// Função para calcular a distância entre dois pontos usando a fórmula Haversine
function calcularDistanciaHaversine($lat1, $lon1, $lat2, $lon2) {
    $raio_terra = 6371;

    // Conversão de graus para radianos
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    // Fórmula de Haversine
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    // Distância em km
    $distancia = $raio_terra * $c;

    return $distancia;
}

// Verificação de login
if (!isset($_SESSION['usuario'])) {
    header('Location: http://localhost/Projeto-Back-End/Login/Login.php');
    exit;
}

// Dados de conexão com o banco de dados
$dbHost = 'localhost:3307';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'dr_agenda';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// ID do usuário logado e o tipo de usuário
$user_id = $_SESSION['user_id'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$latitude_usuario = null;
$longitude_usuario = null;

// coordenadas do usuário logado
if ($tipo_usuario === 'cliente') {
    $stmt = $conexao->prepare("SELECT latitude, longitude FROM clientes WHERE pacientes = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latitude_usuario = $row['latitude'];
        $longitude_usuario = $row['longitude'];
    }
    $stmt->close();
} else if ($tipo_usuario === 'medico') {
    $stmt = $conexao->prepare("SELECT latitude, longitude FROM medicos WHERE doutor = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latitude_usuario = $row['latitude'];
        $longitude_usuario = $row['longitude'];
    }
    $stmt->close();
}

// Verifica se foi submetido um formulário de busca por especialidade
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['especialidade']) && $latitude_usuario !== null && $longitude_usuario !== null) {
    $especialidade = $_POST['especialidade'];

    // Consulta SQL para buscar médicos pela especialização selecionada
    $sql = "SELECT *, 
    (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distancia 
    FROM medicos 
    WHERE especializacao = ? 
    ORDER BY distancia ASC";

    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ddds", $latitude_usuario, $longitude_usuario, $latitude_usuario, $especialidade);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $medicos = [];

    // Verifica se há médicos encontrados
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            
            $distancia = calcularDistanciaHaversine($latitude_usuario, $longitude_usuario, $row['latitude'], $row['longitude']);
            $row['distancia'] = round($distancia, 1); // Arredonda a distância para 1 casa decimal
            $medicos[] = $row;
        }
    } else {
        
        $no_results = true;
    }

    
    $stmt->close();
}


$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
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
                                    if (isset($no_results)) {
                                        echo '<div class="alert alert-warning" role="alert">Nenhum médico encontrado para a especialidade selecionada.</div>';
                                    }
                                    ?>
                                    <label for="especialidadeSelect" class="form-label"></label>
                                    <select name="especialidade" class="form-select" id="especialidadeSelect">
                                        <option value="" selected disabled hidden>Selecione uma especialidade</option>
                                        <option value="Cardiologista">Cardiologista</option>
                                        <option value="Nutrologia">Nutrologia</option>
                                        <option value="Oftalmologista">Oftalmologista</option>
                                        <option value="Psicologia">Psicologia</option>
                                        <option value="Pediatria">Pediatria</option>
                                        <!-- Adicione mais especialidades conforme necessário -->
                                    </select>
                                    <button type="submit" class="btn_1">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-flex justify-content-end imagem">
                    <img src="http://localhost/Projeto-Back-End/Busca/imgs/mapa.png" class="img-fluid" alt="mapa">
                </div>
            </div>
        </div>
    </section>
    <!-- FIM HERO-->

    <!-- Resultados da Busca -->
    <div class="container mt-5">
        <div class="row">
            <?php
            if (!empty($medicos)) {
                foreach ($medicos as $medico) {
                    $nomeCompleto = htmlspecialchars($medico['nome_completo_medic']);
                    $especializacao = htmlspecialchars($medico['especializacao']);
                    $endereco = htmlspecialchars($medico['endereco_medic']);
                    $numero = htmlspecialchars($medico['numero_medic']);
                    $bairro = htmlspecialchars($medico['bairro_medic']);
                    $CRM = htmlspecialchars($medico['CRM']);
                    $numeroCelular = htmlspecialchars($medico['numero_cel_medic']);
                    $distancia = round($medico['distancia'], 2);

                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $nomeCompleto . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $especializacao . '</h6>';
                    echo '<p class="card-text">';
                    echo '<strong>Endereço:</strong> ' . $endereco . '<br>';
                    echo '<strong>N°:</strong> ' . $numero . '<br>';
                    echo '<strong>Bairro:</strong> ' . $bairro . '<br>';
                    echo '<strong>CRM:</strong> ' . $CRM . '<br>';
                    echo '<strong>Telefone:</strong> ' . $numeroCelular . '<br>';
                    echo '<strong>Distância:</strong> ' . number_format($distancia, 1, ',', '.') . ' Km';
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold">Dr.Agenda</h5>
                        <p>O Dr. Agenda valoriza sua contribuição para aprimorar nosso atendimento e serviços. Entre em contato para sugestões, dúvidas ou reclamações. Estamos prontos para ajudar e atendê-lo da melhor forma.</p>
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
        </section>
    </footer>

    <!-- Scripts -->
    <script src="cards.js"></script>
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
