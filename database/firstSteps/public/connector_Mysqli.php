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
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully! <br>";

// Executar uma consulta para listar os bancos de dados

// A função SHOW DATABASES é usada para listar todos os bancos de dados disponíveis no servidor MySQL.
// A consulta é executada pelo método query e o resultado é armazenado em $result.
$result = $conn->query("SHOW DATABASES");

if ($result->num_rows > 0) {
  echo "Bancos de dados existentes no servidor:<br>";
   // A estrutura while é usada para iterar sobre os resultados e exibir cada banco de dados encontrado.
    // O método fetch_array() itera pelos resultados, exibindo o nome de cada tabela.
  while ($row = $result->fetch_assoc()) {
    
    echo "- " . $row['Database'] . "<br>";
  }
} else {
  echo "Nenhum banco de dados encontrado.";
}

// Fechar a conexão
$conn->close();
?>