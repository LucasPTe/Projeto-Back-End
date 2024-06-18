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
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tela de Log</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="http://localhost/Projeto-Back-End/consulta/style.css"/>
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

        // Função para gerar o PDF a partir da tabela
        function gerarPDF() {
            var { jsPDF } = window.jspdf;
            var doc = new jsPDF();

            // Obter a tabela
            var table = document.querySelector("table");
            var rows = table.rows;
            var rowCount = rows.length;

            // Configurações iniciais para o PDF
            var startX = 10;
            var startY = 10;
            var lineHeight = 15; // Aumente este valor para mais espaçamento
            var colWidths = [40, 40, 40]; // Largura de cada coluna no PDF
            var tableWidth = colWidths.reduce((a, b) => a + b, 0);

            // Adiciona o cabeçalho da tabela ao PDF
            doc.text("Usuário", startX, startY);
            doc.text("CPF", startX + colWidths[0], startY);
            doc.text("Tipo de Usuário", startX + colWidths[0] + colWidths[1], startY);

            // Adiciona linhas horizontais para o cabeçalho
            doc.line(startX, startY + 2, startX + tableWidth, startY + 2);

            // Adiciona as linhas da tabela ao PDF
            for (var i = 1; i < rowCount; i++) {
                var cells = rows[i].cells;
                var rowY = startY + (i * lineHeight);

                doc.text(cells[0].innerText, startX, rowY); // Usuário
                doc.text(cells[1].innerText, startX + colWidths[0], rowY); // CPF

                // Centraliza o texto na coluna "Tipo de Usuário"
                var tipoUsuarioText = cells[4].innerText;
                var textWidth = doc.getTextWidth(tipoUsuarioText);
                var cellX = startX + colWidths[0] + colWidths[1];
                var centeredX = cellX + (colWidths[2] - textWidth) / 2;

                doc.text(tipoUsuarioText, centeredX, rowY); // Tipo de Usuário

                // Adiciona linhas horizontais para as células
                doc.line(startX, rowY + 2, startX + tableWidth, rowY + 2);
            }

            // Adiciona linhas verticais para as células
            for (var j = 0; j <= colWidths.length; j++) {
                var colX = startX + colWidths.slice(0, j).reduce((a, b) => a + b, 0);
                doc.line(colX, startY, colX, startY + rowCount * lineHeight);
            }

            // Salva o PDF
            doc.save('tabela.pdf');
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
        <input type="text" id="search" name="search" placeholder="Digite o CPF ou Usuário">
        <input type="submit" value="Buscar">
    </form>


<?php
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

    <!-- Botão para gerar o PDF -->
    <button onclick="gerarPDF()">Gerar PDF</button>

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