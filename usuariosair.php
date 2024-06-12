<?php

if (isset($_SESSION['usuario'])) {
    echo "<a href='sair.php'>Sair</a>";
    }else {
    echo "<a href='http://localhost/Projeto-Back-End/Login/login.php'>Entrar</a>"; 
}


