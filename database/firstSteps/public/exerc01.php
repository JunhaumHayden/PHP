<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fundamentos PHP - My SQL</h1>
    <?php
    //Primeiro inserir a include com a classe responsavel por criar a conexao com o banco de dados e que realizam as operaçoes sobre o banco
    // Caminho relativo para incluir o arquivo conexao.php
    // __DIR__ retorna o diretório atual do arquivo index.php, que está em public/.
    // Usamos __DIR__ . '/../src/conexao.php' para especificar o caminho de index.php para src/conexao.php subindo um nível (..).
    // include_once garante que conexao.php seja incluído uma única vez, evitando duplicações.
    include_once __DIR__ . '/../src/dbconnector_MYSQLi.php';
    include_once __DIR__ . '/../src/domain/criar-classe-alunos.inc.php';
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

    $aluno = new Aluno("133","Ana","media");
    echo "<p>Mostrando os Dados do Aluno:<br>";
    echo "Nome do ALUNO: " . $aluno->getNome() . ":<br>";


    ?>

</body>
</html>