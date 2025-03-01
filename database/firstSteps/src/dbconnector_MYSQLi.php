<?php
// Carregar o autoloader do Composer para carregar automaticamente todas as dependências
require '../vendor/autoload.php';
// include_once __DIR__ . '/vendor/autoload.php';

class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $connection;

    //Em PHP o constructor sempre é igual ao nome da classe para instanciar um objeto.
    public function __construct() {
        // Carregar as variáveis do arquivo .env
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->dbName = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public function connect() {
        if ($this->connection == null) {
            // Ativar o modo de relatório de erros do MySQLi para exceções
            mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
            
            try {
                $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbName);
                echo "<p>Conexão bem-sucedida!</p>";
            } catch (Exception $e) {
                // Registrar o erro e exibir uma mensagem amigável
                error_log("Erro de conexão com o banco de dados: " . $e->getMessage());
                echo "Erro ao conectar ao banco de dados. Tente novamente mais tarde.";
                exit();
            }
        }
        return $this->connection;
    }

    public function disconnect() {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = null;
            echo "<p>Conexão encerrada com sucesso!</p>";
        }
    }
}
?>
