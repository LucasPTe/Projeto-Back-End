<!DOCTYPE html>
<html>
<head>
    <title>Tela de Log</title>
</head>
<body>
    <h2>Tela de Log</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="search">Pesquisar:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Buscar">
    </form>
</body>
</html>


<?php
// Configurações do banco de dados
$servername = "localhost:3307"; // Nome do servidor
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "dr_agenda"; // Nome do banco de dados

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicia a sessão
session_start();

// Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura o valor da barra de busca
    $search = $_POST['search'];

    // Query para buscar informações no banco de dados
    $sql = "SELECT usuario, CPF, data_criacao_login, ultimo_login FROM clientes WHERE usuario LIKE '%$search%' OR CPF LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibe os resultados
        echo "<table border='1'><tr><th>Usuário</th><th>CPF</th><th>Data de Criação do Login</th><th>Última Vez Logado</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["usuario"]."</td><td>".$row["CPF"]."</td><td>".$row["data_criacao_login"]."</td><td>".$row["ultimo_login"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
