<?php

// Caminho relativo para incluir o arquivo conexao.php
// __DIR__ retorna o diretório atual do arquivo index.php, que está em public/.
// Usamos __DIR__ . '/../src/conexao.php' para especificar o caminho de index.php para src/conexao.php subindo um nível (..).
// include_once garante que conexao.php seja incluído uma única vez, evitando duplicações.
include_once __DIR__ . '/../src/dbconnector_MYSQLi.php';


// Criar uma instância e conectar ao banco
$db = new Database();
try {
    // Estabelecer a conexão
    $connection = $db->connect();
    
    // Verificar se a conexão foi bem-sucedida
    if ($connection) {
        // Executar uma consulta para listar as tabelas do banco de dados
        $query = "SHOW TABLES";
        $result = $connection->query($query);

        if ($result) {
            echo "<h2>Tabelas no banco de dados '" . $_ENV['DB_DATABASE'] . "':</h2>";
            echo "<ul>";

            // Listar as tabelas encontradas
            while ($row = $result->fetch_array()) {
                echo "<li>" . $row[0] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Erro ao executar a consulta para listar as tabelas.";
        }

        // Liberar o resultado
        $result->free();
    }
} catch (Exception $e) {
    echo "Ocorreu um erro: " . $e->getMessage();
} finally {
    // Encerrar a conexão ao final da execução
    $db->disconnect();
}
?>
