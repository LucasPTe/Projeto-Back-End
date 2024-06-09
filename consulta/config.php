<!DOCTYPE html>
<html>
<head>
    <title>Tela de Log</title>
<<<<<<< Updated upstream
=======
    <script>
        function confirmarExclusao(event, cpf) {
            event.preventDefault(); // Previna o envio do formulário
            
            var modal = document.getElementById("confirmModal");
            var cpfInput = document.getElementById("cpfToDelete");
            cpfInput.value = cpf; // Define o CPF no input escondido

            modal.style.display = "block"; // Mostra o modal
        }

        function fecharModal() {
            var modal = document.getElementById("confirmModal");
            modal.style.display = "none"; // Esconde o modal
        }

        function confirmarAcao() {
            document.getElementById("deleteForm").submit(); // Envia o formulário
        }
    </script>
    <style>
        /* Estilos básicos para o modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
>>>>>>> Stashed changes
</head>
<body>
    <h2>Tela de Log</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="search">Pesquisar:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Buscar">
    </form>
<<<<<<< Updated upstream
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
=======

    <?php
    // Configurações do banco de dados
    $servername = "localhost:3306"; // Nome do servidor
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

    // Função para excluir usuário
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
        $cpf_to_delete = $_POST['delete_user'];
        $delete_sql = "DELETE FROM clientes WHERE CPF = '$cpf_to_delete'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Usuário excluído com sucesso.";
        } else {
            echo "Erro ao excluir usuário: " . $conn->error;
        }
    }

    // Verifica se o formulário de login foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        // Captura o valor da barra de busca
        $search = $_POST['search'];

        // Query para buscar informações no banco de dados
        $sql = "SELECT usuario, CPF, data_criacao_login, ultimo_login, tipo_usuario FROM clientes WHERE usuario LIKE '%$search%' OR CPF LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibe os resultados
            echo "<table border='1'><tr><th>Usuário</th><th>CPF</th><th>Data de Criação do Login</th><th>Última Vez Logado</th><th>Tipo de Usuário</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["usuario"]."</td><td>".$row["CPF"]."</td><td>".$row["data_criacao_login"]."</td><td>".$row["ultimo_login"]."</td><td>".$row["tipo_usuario"]."</td>
                <td>
                    <form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' id='deleteForm' style='display:inline;'>
                        <input type='hidden' name='delete_user' value='".$row["CPF"]."' id='cpfToDelete'>
                        <input type='button' value='Excluir' onclick=\"confirmarExclusao(event, '".$row["CPF"]."')\">
                    </form>
                </td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>

    <!-- Modal de confirmação -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <p>Você tem certeza que deseja excluir este usuário?</p>
            <button onclick="confirmarAcao()">Sim</button>
            <button onclick="fecharModal()">Não</button>
        </div>
    </div>
</body>
</html>
>>>>>>> Stashed changes
