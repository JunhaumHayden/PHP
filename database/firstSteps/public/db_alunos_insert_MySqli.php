<?php
include_once __DIR__ . '/../src/dbconnector_MYSQLi.php';
include_once __DIR__ . '/../src/domain/criar-classe-alunos.inc.php';
// Criar uma instância e conectar ao banco
$db = new Database();

// // Carregar o autoloader do Composer para carregar automaticamente todas as dependências
// require '../vendor/autoload.php';
// Carregar as variáveis do arquivo .env
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
// $dotenv->load();


// $servername = $_ENV['DB_HOST'];
// $username = $_ENV['DB_USER'];
// $password = $_ENV['DB_PASSWORD'];
// $dbName = $_ENV['DB_DATABASE'];

// // Criar a conexão
// // para se conectar diretamente ao banco de dados especificado em $dbName.
// $conn = new mysqli($servername, $username, $password, $dbName);
try {
    // Estabelecer a conexão
  $conn = $db->connect();
    // Verificar a conexão
  if ($conn){
    echo "<br>";

    echo "Consultando dados na tabela no banco de dados tb_alunos:<br>";
    // sql to create table
    $sql = "SELECT * FROM tb_alunos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["matricula"]. " - Name: " . $row["nome"]. " " . $row["media"]. "<br>";
      }
    } else {
      echo "0 results <br><br>";
    }
    echo "Inserindo dados na tabela no banco de dados tb_alunos:<br>";
    $sql = "INSERT INTO tb_alunos (firstname, lastname, email)
    VALUES ('3', 'Clara', 5.5)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id. "<br>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "Consultado dados na tabela no banco de dados tb_alunos:<br>";
    // sql to create table
    $sql = "SELECT * FROM tb_alunos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[3]. "<br>";
      }
    } else {
      echo "0 results<br><br>";
    }
  }
} catch (Exception $e) {
  echo "Ocorreu um erro: " . $e->getMessage();
} finally {
  // Encerrar a conexão ao final da execução
  $db->disconnect();
}
?>