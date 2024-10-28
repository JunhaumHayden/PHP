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

echo "Consultando dados na tabela no banco de dados '$dbName':<br>";
// sql to create table
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results <br><br>";
}
echo "Inserindo dados na tabela no banco de dados '$dbName':<br>";
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id. "<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "Consultado dados na tabela no banco de dados '$dbName':<br>";
// sql to create table
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " " ." - Email: " . $row["email"]. "<br>";
  }
} else {
  echo "0 results<br><br>";
}

// Fechar a conexão
$conn->close();
?>