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

// Criar a conexão
// para se conectar diretamente ao banco de dados especificado em $dbName.
$conn = new mysqli($servername, $username, $password, $dbName);

// Verificar a conexão
if ($conn->connect_error) {
  die("Falha de conexão: " . $conn->connect_error);
}
echo "Conexão com o banco de dados '" . $dbName . "' bem-sucedida!<br>";

// Consultar para listar as tabelas existentes
$result = $conn->query("SHOW TABLES");

if ($result->num_rows > 0) {
  echo "Tabelas existentes no banco de dados '$dbName':<br>";
  while ($row = $result->fetch_array()) {
    echo "- " . $row[0] . "<br>";
  }
} else {
  echo "Nenhuma tabela encontrada no banco de dados '$dbName'.";
}

echo "Criando uma tabela no banco de dados '$dbName':<br>";
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Tabela MyGuests criada com sucesso!";
  } else {
    echo "Erro ao criar a tabela: " . $conn->error;
  }

  $result = $conn->query("SHOW TABLES");

if ($result->num_rows > 0) {
  echo "Tabelas existentes no banco de dados '$dbName':<br>";
  while ($row = $result->fetch_array()) {
    echo "- " . $row[0] . "<br>";
  }
} else {
  echo "Nenhuma tabela encontrada no banco de dados '$dbName'.";
}

// Fechar a conexão
$conn->close();
?>