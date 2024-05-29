<?php

if (isset($_SESSION['usuario'])) {
    echo "<a href='logout.php'>Sair</a>";
    }else {
    echo "<a href='http://localhost/Projeto-Back-End/Login/login.php'>Entrar</a>"; 
}

?>

