<?php
require 'Database.php';


// Criar uma instância e conectar ao banco
$db = new Database();
$connection = $db->connect();

// Executar operações no banco de dados
try {
    $query = $connection->query("SELECT * FROM produtos");
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
