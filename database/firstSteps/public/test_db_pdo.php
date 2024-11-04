<?php

// Caminho relativo para incluir o arquivo conexao.php
// __DIR__ retorna o diretório atual do arquivo index.php, que está em public/.
// Usamos __DIR__ . '/../src/conexao.php' para especificar o caminho de index.php para src/conexao.php subindo um nível (..).
// include_once garante que conexao.php seja incluído uma única vez, evitando duplicações.
include_once __DIR__ . '/../src/dbconnector_PDO.php';


// Criar uma instância e conectar ao banco
$db = new Database();
$connection = $db->connect();

// Executar operações no banco de dados
try {
    $query = $connection->query("SELECT * FROM produto");
    $produtos = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Preço</th></tr>";
    foreach ($produtos as $produto) {
        echo "<tr><td>{$produto['id']}</td><td>{$produto['nome']}</td><td>{$produto['preco']}</td></tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}

// Fechar conexão
$db->disconnect();
?>
