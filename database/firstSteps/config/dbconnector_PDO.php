<?php
// Carregar o autoloader do Composer para carregar automaticamente todas as dependências
require '../vendor/autoload.php';
// Carregar as variáveis do arquivo .env
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
// $dotenv->load();

class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        // Carregar as variáveis do arquivo .env
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
        $dotenv->load();
        // Carregar variáveis de ambiente do arquivo .env
        // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        // $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->dbName = $_ENV['DB_DATABASE'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public function connect() {
        if ($this->connection == null) {
            try {
                $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
                exit();
            }
        }
        return $this->connection;
    }

    public function disconnect() {
        $this->connection = null;
    }
}
?>
