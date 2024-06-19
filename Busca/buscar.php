<!DOCTYPE html>
<html>
<head>
    <title>Busca de Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Busca de Médicos</h1>
        <form method="POST" class="form-container">
            <div class="mb-3">
                <label for="especialidadeSelect" class="form-label">Selecione uma especialidade</label>
                <select name="especialidade" class="form-select" id="especialidadeSelect">
                    <option value="" selected disabled hidden>Selecione uma especialidade</option>
                    <option value="cardiologista">Cardiologista</option>
                    <option value="nutricionista">Nutricionista</option>
                    <option value="oftalmologista">Oftalmologista</option>
                    <option value="psicologo">Psicólogo</option>
                    <option value="pediatria">Pediatria</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['especialidade'])) {
            $especialidade = $_POST['especialidade'];

            // Conexão com o banco de dados
            $dbHost = 'localhost:3307';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'dr_agenda';

            $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }

            // Consulta SQL
            $sql = "SELECT nome_completo_medic, especializacao, endereco_medic, CRM, numero_cel_medic FROM medicos WHERE especializacao = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $especialidade);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $firstRow = $result->fetch_assoc();

                // Preenche o cartão com os dados da primeira linha
                $nomeCompleto = $firstRow['nome_completo_medic'];
                $endereco = $firstRow['endereco_medic'];
                $numeroCelular = $firstRow['numero_cel_medic'];
                $distancia = "xKm de distância";

                echo '<div class="card-especialista">';
                echo '  <div class="card">';
                echo '      <div class="card-header" id="nome_card">';
                echo            htmlspecialchars($nomeCompleto);
                echo '      </div>';
                echo '      <div class="card-body">';
                echo '          <p><i class="ri-map-pin-2-fill"></i> ' . htmlspecialchars($distancia) . '</p>';
                echo '          <p><i class="ri-map-pin-2-fill"></i> ' . htmlspecialchars($endereco) . '</p>';
                echo '          <p><i class="ri-phone-fill"></i> ' . htmlspecialchars($numeroCelular) . '</p>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';

                // Exibe os resultados em uma tabela
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr><th class="fixed-header">Nome</th><th>Especialização</th><th>Endereço</th><th>CRM</th><th>Celular</th></tr>';
                echo '</thead>';
                echo '<tbody>';

                do {
                    echo '<tr>';
                    echo '<td class="fixed-column">' . htmlspecialchars($firstRow['nome_completo_medic']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['especializacao']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['endereco_medic']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['CRM']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['numero_cel_medic']) . '</td>';
                    echo '</tr>';
                } while ($firstRow = $result->fetch_assoc());

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning" role="alert">Nenhum médico encontrado para a especialidade selecionada.</div>';
            }

            $stmt->close();
            $conexao->close();
        }
        ?>
        </div>

        <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['especialidade'])) {
            $especialidade = $_POST['especialidade'];

            // Conexão com o banco de dados
            $dbHost = 'localhost:3307';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'dr_agenda';

            $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }

            // Consulta SQL
            $sql = "SELECT nome_completo_medic, especializacao, endereco_medic, CRM, numero_cel_medic FROM medicos WHERE especializacao = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $especialidade);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $firstRow = $result->fetch_assoc(); // Pega a primeira linha dos resultados

                // Preenche o cartão com os dados da primeira linha
                $nomeCompleto = $firstRow['nome_completo_medic'];
                $endereco = $firstRow['endereco_medic'];
                $numeroCelular = $firstRow['numero_cel_medic'];
                $distancia = "xKm de distância"; // Você pode ajustar essa lógica para calcular a distância real

                echo '<div class="card-especialista">';
                echo '  <div class="card">';
                echo '      <div class="card-header" id="nome_card">';
                echo            htmlspecialchars($nomeCompleto);
                echo '      </div>';
                echo '      <div class="card-body">';
                echo '          <p><i class="ri-map-pin-2-fill"></i> ' . htmlspecialchars($distancia) . '</p>';
                echo '          <p><i class="ri-map-pin-2-fill"></i> ' . htmlspecialchars($endereco) . '</p>';
                echo '          <p><i class="ri-phone-fill"></i> ' . htmlspecialchars($numeroCelular) . '</p>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';

                // Exibe os resultados em uma tabela
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr><th class="fixed-header">Nome</th><th>Especialização</th><th>Endereço</th><th>CRM</th><th>Celular</th></tr>';
                echo '</thead>';
                echo '<tbody>';

                do {
                    echo '<tr>';
                    echo '<td class="fixed-column">' . htmlspecialchars($firstRow['nome_completo_medic']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['especializacao']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['endereco_medic']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['CRM']) . '</td>';
                    echo '<td>' . htmlspecialchars($firstRow['numero_cel_medic']) . '</td>';
                    echo '</tr>';
                } while ($firstRow = $result->fetch_assoc());

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning" role="alert">Nenhum médico encontrado para a especialidade selecionada.</div>';
            }

            $stmt->close();
            $conexao->close();
        }
        ?>
        </div>
    </div>
</body>
</html>