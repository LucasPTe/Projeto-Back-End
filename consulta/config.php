<!DOCTYPE html>
<html>
<head>
    <title>Tela de Log</title>
    <script>
        function confirmarExclusao(event, cpf, tabela) {
            event.preventDefault(); // Previna o envio do formulário
            
            var modal = document.getElementById("confirmModal");
            var cpfInput = document.getElementById("cpfToDelete");
            var tabelaInput = document.getElementById("tabelaToDelete");
            cpfInput.value = cpf; // Define o CPF no input escondido
            tabelaInput.value = tabela; // Define a tabela no input escondido

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
</head>
<body>
    <h2>Tela de Log</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="search">Pesquisar:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Buscar">
    </form>

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

    // Função para excluir usuário
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
        $cpf_to_delete = $_POST['delete_user'];
        $tabela = $_POST['tabela'];

        if ($tabela == 'clientes') {
            $delete_sql = "DELETE FROM clientes WHERE CPF = '$cpf_to_delete'";
        } else if ($tabela == 'medicos') {
            $delete_sql = "DELETE FROM medicos WHERE CPF_medic = '$cpf_to_delete'";
        }

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

        // Query para buscar informações na tabela clientes
        $sql_clientes = "SELECT usuario, CPF, data_criacao_login, ultimo_login, tipo_usuario, tipo_2fa FROM clientes WHERE usuario LIKE '%$search%' OR CPF LIKE '%$search%'";
        $result_clientes = $conn->query($sql_clientes);

        // Query para buscar informações na tabela medicos
        $sql_medicos = "SELECT usuario_medic, CPF_medic, data_criacao_login, ultimo_login, tipo_usuario, tipo_2fa FROM medicos WHERE usuario_medic LIKE '%$search%' OR CPF_medic LIKE '%$search%'";
        $result_medicos = $conn->query($sql_medicos);

        if ($result_clientes->num_rows > 0 || $result_medicos->num_rows > 0) {
            // Exibe os resultados
            echo "<table border='1'><tr><th>Usuário</th><th>CPF</th><th>Data de Criação do Login</th><th>Última Vez Logado</th><th>Tipo de Usuário</th><th>Tipo de 2FA</th><th>Ações</th></tr>";
            
            // Exibindo dados da tabela clientes
            while($row = $result_clientes->fetch_assoc()) {
                echo "<tr><td>".$row["usuario"]."</td><td>".$row["CPF"]."</td><td>".$row["data_criacao_login"]."</td><td>".$row["ultimo_login"]."</td><td>".$row["tipo_usuario"]."</td><td>".$row["tipo_2fa"]."</td>
                <td>
                    <button onclick=\"confirmarExclusao(event, '".$row["CPF"]."', 'clientes')\">Excluir</button>
                </td></tr>";
            }

            // Exibindo dados da tabela medicos
            while($row = $result_medicos->fetch_assoc()) {
                echo "<tr><td>".$row["usuario_medic"]."</td><td>".$row["CPF_medic"]."</td><td>".$row["data_criacao_login"]."</td><td>".$row["ultimo_login"]."</td><td>".$row["tipo_usuario"]."</td><td>".$row["tipo_2fa"]."</td>
                <td>
                    <button onclick=\"confirmarExclusao(event, '".$row["CPF_medic"]."', 'medicos')\">Excluir</button>
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="deleteForm">
                <input type="hidden" name="delete_user" id="cpfToDelete">
                <input type="hidden" name="tabela" id="tabelaToDelete">
                <button type="button" onclick="confirmarAcao()">Sim</button>
                <button type="button" onclick="fecharModal()">Não</button>
            </form>
        </div>
    </div>
</body>
</html>
