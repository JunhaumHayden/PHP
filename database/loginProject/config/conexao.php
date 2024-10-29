<?php

// Carregar o autoloader do Composer para carregar automaticamente todas as dependências
require '../vendor/autoload.php';
// Carregar as variáveis do arquivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();


$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbName = $_ENV['DB_DATABASE'];

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbName);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}