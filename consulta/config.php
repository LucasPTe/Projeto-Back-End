<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Clientes</title>
</head>
<body>
    <h2>Consulta de Clientes</h2>
    <form method="post">
        <label for="search_term">Buscar por Usuário ou CPF:</label>
        <input type="text" name="search_term" id="search_term">
        <input type="submit" value="Buscar">
    </form>

    <?php


    session_start();
    
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

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexão com o banco de dados
        $servername = "localhost:3306"; // ou o endereço do seu servidor MySQL
        $username = "root";
        $password = '';
        $dbname = "dr_agenda";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Limpa e sanitiza o termo de busca
        $search_term = mysqli_real_escape_string($conn, $_POST['search_term']);

        // Consulta SQL para buscar usuários ou CPFs
        $sql = "SELECT * FROM clientes WHERE usuario LIKE '%$search_term%' OR CPF LIKE '%$search_term%'";

        $result = $conn->query($sql);

        // Exibe os resultados se houverem
        if ($result->num_rows > 0) {
            echo "<h3>Resultados:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Usuário</th><th>CPF</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["usuario"]."</td><td>".$row["CPF"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>
</body>
</html>
