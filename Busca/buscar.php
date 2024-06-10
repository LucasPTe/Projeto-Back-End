<?php
// Conexão com o banco de dados
$dbHost ='localhost:3306';
$dbUsername ='root';
$dbPassword ='';
$dbName ='dr_agenda';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

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

<!DOCTYPE html>
<html>
<head>
    <title>Busca de Médicos</title>
</head>
<body>
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
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
