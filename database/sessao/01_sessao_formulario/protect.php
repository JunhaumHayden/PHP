<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['aluno'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"indexx.php\">Entrar</a></p>");
}


?>