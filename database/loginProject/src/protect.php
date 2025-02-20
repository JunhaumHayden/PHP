<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    echo "<script> alert('Você não pode acessar esta página porque não está logado');</script>";
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"../public/index.php\">Entrar</a></p>");
}


?>