<?php

    session_start();
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);
    header('Location: http://localhost/Projeto-Back-End/Login/Login.php');

?>