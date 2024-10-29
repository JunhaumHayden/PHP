<?php
// Caminho relativo para incluir o arquivo conexao.php
include_once __DIR__ . '/../src/conexao.php';

// Inicializar a conexão com o banco de dados usando a classe em conexao.php

// Consultar para listar as tabelas existentes
$result = $mysqli->query("SHOW TABLES");

if ($result->num_rows > 0) {
  echo "Tabelas existentes no banco de dados '$dbName':<br>";
  while ($row = $result->fetch_array()) {
    echo "- " . $row[0] . "<br>";
  }
} else {
  echo "Nenhuma tabela encontrada no banco de dados '$dbName'.";
}
