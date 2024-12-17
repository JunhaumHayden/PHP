# Utilizar Arquivo .env

## Preparação do hambiente

Para configurar um conector de banco de dados em PHP utilizando um arquivo .env para armazenar as informações sensíveis (como as credenciais do banco de dados), siga os passos abaixo. Usar um arquivo .env ajuda a manter boas práticas de segurança, evitando expor dados confidenciais diretamente no código.

## Passos para Configuração:
### 1. Instalar a Biblioteca vlucas/phpdotenv:
Para manipular arquivos .env, você pode usar a biblioteca vlucas/phpdotenv, que é uma das mais populares para esse propósito.

#### Passos para Instalar o phpdotenv no macOS:
1. Verificar se o Composer está Instalado:
Para verificar se o Composer já está instalado, execute:
```bash
composer --version
```
> Se o Composer estiver instalado, você verá a versão do Composer. Caso contrário, siga para o próximo passo para instalá-lo.
2. Instalar o Composer (se necessário):
Execute o comando abaixo para baixar e instalar o Composer:
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
> Isso instalará o Composer e permitirá que você o use como um comando global (composer).
3. Inicializar um Projeto PHP (se ainda não houver um):
No diretório onde você quer usar o phpdotenv, crie um novo projeto PHP (se ainda não tiver um):
```bash
mkdir meu_projeto
cd meu_projeto
composer init
```
> O comando composer init criará um arquivo composer.json, e você poderá seguir as instruções para configurar seu projeto.
4. Instalar o phpdotenv via Composer:
No diretório do seu projeto, execute:
```bash
composer require vlucas/phpdotenv
```
> Esse comando vai adicionar o phpdotenv ao seu projeto e atualizar o arquivo composer.json para incluir essa dependência.
5. Criar o Arquivo `.env`:
No diretório do projeto, crie um arquivo chamado .env para armazenar suas variáveis de ambiente:
```bash
touch .env
```
6. Usar o phpdotenv no seu Projeto PHP:
Agora, você pode incluir e usar o phpdotenv no seu código PHP. Por exemplo:
```php
<?php
require 'vendor/autoload.php';

// Carregar as variáveis do arquivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Acessar uma variável de ambiente
echo $_ENV['DB_HOST'];
```
Certifique-se de que o arquivo `.env` contenha as variáveis necessárias, como:
```bash
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=meu_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```
7. Criar o arquivo .env:
```bash
touch .env
```
Seguindo esses passos, você terá o phpdotenv instalado e configurado no seu projeto PHP no macOS, usando PHP via Homebrew. Isso permitirá que você gerencie variáveis sensíveis e de configuração de forma segura e organizada.


### 2. Criar o Arquivo `.env`:
No diretório raiz do seu projeto, crie um arquivo chamado .env e adicione as configurações do banco de dados:
```bash
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
3. Configurar o Script PHP para Ler o `.env` (Procedural):
Crie um arquivo chamado `config.php` para configurar a conexão com o banco de dados:
```php
<?php
require 'vendor/autoload.php';

// Carregar as variáveis do arquivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Função para conectar ao banco de dados
function getDatabaseConnection() {
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $db = $_ENV['DB_DATABASE'];
    $user = $_ENV['DB_USERNAME'];
    $pass = $_ENV['DB_PASSWORD'];

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
        exit();
    }
}
?>
```
4. Usar a Conexão em um Script PHP:
Agora, em qualquer script PHP que precise acessar o banco de dados, você pode incluir o `config.php` e utilizar a função `getDatabaseConnection` para conectar:
```php
<?php
require 'config.php';

// Conectar ao banco de dados
$db = getDatabaseConnection();

// Realizar uma consulta de exemplo
try {
    $stmt = $db->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtos as $produto) {
        echo $produto['nome'] . " - R$ " . $produto['preco'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erro ao buscar produtos: " . $e->getMessage();
}
?>
```
4. Configurar o Script PHP para Ler o `.env` (Object-Oriented):
```php
<?php
require 'vendor/autoload.php';

class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        // Carregar variáveis de ambiente
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->dbName = $_ENV['DB_NAME'];
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
```
5. Usar a Conexão em um Script PHP:
```php 
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
```
#### Explicação:
Classe Database:
Construtor: Inicializa as credenciais de conexão.
Método connect: Conecta ao banco de dados e retorna uma instância PDO.
Método disconnect: Fecha a conexão.
Uso de .env: Separar credenciais de forma segura.
Uso em Scripts:
Importa a classe e cria uma instância para conectar.
Realiza consultas e manipulações usando o objeto PDO.
Essa abordagem modular e orientada a objetos facilita o gerenciamento de conexões e melhora a manutenção do código.




#### Explicação dos Passos:
Instalação da Biblioteca:
- A biblioteca `phpdotenv` facilita o carregamento de variáveis de ambiente a partir de um arquivo `.env`. Ela é instalada via Composer, o que é uma prática comum para gerenciar dependências em PHP.
- Arquivo `.env`:
Este arquivo contém as configurações sensíveis (host, porta, nome do banco de dados, usuário e senha). Como ele não está embutido no código principal, é mais seguro e fácil de modificar para diferentes ambientes (desenvolvimento, teste, produção).
- Arquivo `config.php`:
Aqui, o script lê as variáveis do .env e cria uma conexão com o banco de dados usando PDO, que é uma extensão recomendada para interagir com bancos de dados em PHP.
`PDO` é preferível porque oferece segurança (usando prepared statements) e suporte a múltiplos tipos de bancos de dados.
- Incluir e Usar a Conexão:
Qualquer script que precisar se conectar ao banco de dados pode simplesmente incluir o arquivo `config.php`, e a função `getDatabaseConnection()` fornecerá uma conexão segura.
- Segurança:
Nunca versione o arquivo `.env` no controle de versão (como Git). Crie um arquivo `.env.example` com os mesmos nomes de variáveis, mas sem valores, para que outros desenvolvedores possam configurar seus próprios ambientes.
Adicione `.env` ao `.gitignore`:
```bash
.env
```
Seguindo esses passos, você conseguirá separar informações sensíveis e manter uma conexão de banco de dados segura e bem organizada no seu projeto PHP.