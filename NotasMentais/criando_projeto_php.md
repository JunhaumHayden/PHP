# Criando um projeto com PHP

![Static Badge](https://img.shields.io/badge/STATUS-Em_Constru%C3%A7%C3%A3o-green)

![Static Badge](https://img.shields.io/badge/Powered_by-PHP-blue)
![Static Badge](https://img.shields.io/badge/Powered_by-PHPUnit-4CAF50) ![Static Badge](https://img.shields.io/badge/Powered_by-MySQL-F29111) 
![Static Badge](https://img.shields.io/badge/Powered_by-Composer-4d00fe) ![Static Badge](https://img.shields.io/badge/Powered_by-phpdotenv-90caef)

A seguir está um guia passo a passo para criar um projeto PHP bem estruturado, utilizando boas práticas de programação e ferramentas modernas, como o `Composer`, `phpdotenv` e `PHPUnit`. Este exemplo usa **Apache** e **VS Code**, conforme seu ambiente.
O Composer é uma ferramenta essencial para projetos PHP modernos e pode ser usado perfeitamente para estruturar e gerenciar projetos que seguem o padrão MVC (Model-View-Controller). Ele facilita a organização, autoloading e gerenciamento de dependências, o que é ideal para implementar esse padrão arquitetural.

## 1. Estrutura Inicial do Projeto
Seguindo os passo básico de construção de projetos com o Composer a estrutura básica do projeto será:
```css

meu-projeto/
├── public/             // Contém os arquivos acessíveis pelo navegador (ex: index.php)
├── src/                // Contém o código-fonte principal do projeto
│   ├── Database.php    // Classe para conexão com o banco de dados
│   └── Models/         // Modelos de domínio
├── tests/              // Testes unitários
├── config/             // Configurações como o arquivo .env
├── vendor/             // Diretório criado automaticamente pelo Composer
├── composer.json       // Configuração do Composer
└── .env                // Arquivo com variáveis de ambiente
```

Estrutura de Diretórios de projeto MVC seria:
```css
/meu_projeto
│
├── /app
│   ├── /Controllers       # Controladores da aplicação
│   │   ├── HomeController.php
│   │   └── UserController.php
│   ├── /Models            # Modelos da aplicação
│   │   └── User.php
│   └── /Views             # Arquivos de visualização (HTML, PHP)
│       ├── home.php
│       └── user.php
│
├── /public                # Ponto de entrada para a aplicação
│   ├── index.php
│   └── assets             # Arquivos CSS, JS, imagens, etc.
│
├── /config                # Configurações (ex.: banco de dados)
│   └── config.php
│
├── /vendor                # Pacotes instalados pelo Composer
│
├── composer.json          # Configuração do Composer
│
└── README.md
```

## 2. Inicializar o Projeto com o Composer

- 1. Abra o terminal no **diretório do projeto**.
- 2. Inicialize o projeto com:
```bash
composer init
```
> Responda às perguntas para configurar o projeto.

### Campos na configuração do composer.json representa durante a criação de um projeto com o Composer:
* ### 1. Package name
```bash
This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [hayden/ctds.project.ifsc]: 
```
* __Descrição__: Nome único do seu pacote ou projeto. Geralmente segue o formato `<vendor>/<name>`, onde:
`<vendor>`: Seu namespace ou identificador (ex.: seu nome de usuário no GitHub ou outro identificador único).
`<name>`: Nome do projeto ou pacote.
Neste Exemplo:
hayden/ctds.project.ifsc
> Isso significa que o pacote pertence ao "vendor" hayden e o nome é ctds.project.ifsc.

* ### 2. Description
```bash
Description []: Projeto das atividades do curso de programação web II do curso de CTDS do IFSC 
```
* __Descrição__: Breve descrição do projeto.

Neste Exemplo:
"Projeto das atividades do curso de programação web II do curso de CTDS do IFSC"
>Essa descrição será exibida para quem acessar seu projeto (ex.: em um repositório no GitHub ou no Packagist).

* ### 3. Author
```bash
Author [JunhaumHayden <junhaumhayden@hotmail.com>, n to skip]: 
```
* __Descrição__: Nome e e-mail do autor do projeto.
* __Formato__: [Nome] <email@example.com>

Neste Exemplo:
- * JunhaumHayden <junhaumhayden@hotmail.com>
>Isso ajuda a identificar quem criou o projeto. Se houver mais de um autor, eles podem ser adicionados diretamente no arquivo composer.json.

* ### 4. Minimum Stability
```bash
Minimum Stability []:  
```
* __Descrição__: Define o nível de estabilidade permitido para as dependências que você instalar.
* __Opções Comuns__:

  - `stable`: Apenas versões estáveis (recomendado para projetos de produção).
  - `beta`: Inclui versões em beta.
  - `alpha`: Inclui versões em alfa.
  - `dev`: Inclui versões em desenvolvimento.
* `Padrão`: Se você não preencher, o Composer assume stable. que foi utilizado neste exemplo.

* ### 5. Package Type
```bash
Package Type (e.g. library, project, metapackage, composer-plugin) []: project  
```
* __Descrição__: Especifica o tipo do pacote.
Opções Comuns:
  - `library`: Para bibliotecas reutilizáveis.
  - `project`: Para projetos completos (ex.: aplicativos web).
  - `metapackage`: Um pacote que não contém código, mas apenas dependências.
  - `composer-plugin`: Um plugin para o Composer.
Exemplo:
Neste caso, usou-se project, pois está criando um projeto completo.

* ### 6. License
```bash
License []: 
```
* __Descrição__: Especifica o tipo de licença do pacote.

Exemplo:
Neste caso, usou-se a licença padrão deixando sem preenchimento e pressionando `enter`.

* ### 7. Define your dependencies
```bash
Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? 
Search for a package: 
```
Quando o Composer pergunta se você deseja definir as dependências do seu projeto interativamente com a pergunta:
```bash
"Would you like to define your dependencies (require) interactively [yes]?"
```

A resposta "yes" (sim) permitirá que você adicione dependências ao seu projeto durante o processo de configuração, como bibliotecas ou pacotes que o seu projeto usará. Nesse caso, você pode adicionar essas dependências manualmente durante a criação do projeto ou deixá-las para adicionar depois.

#### Como funciona:
`Sim (yes)`: O Composer irá guiá-lo na adição de pacotes como `phpdotenv`, `phpunit`, ou outras bibliotecas que você deseja usar em seu projeto. Ele pedirá o nome do pacote e a versão desejada, e você pode continuar a adição dessas dependências. Por exemplo:
`phpdotenv` para o gerenciamento de variáveis de ambiente.
`phpunit` para testes unitários.
`Não (no)`: Se você escolher não definir as dependências no momento, o Composer criará apenas o arquivo `composer.json` básico, e você poderá adicionar as dependências mais tarde usando o comando composer require ou editar manualmente o `composer.json`.
Exemplo:
Como neste exemplo escolheu-se `"yes"`, o Composer irá pedir para digitar o nome do pacote e para este exemplo digita-se `phpdotenv` e escolhe-se a versão na lista apresentada (neste exemplo "0") e deverá ter a saída como mostrado abaixo:

Após é apresentado novamento a opçao de escolher um novo pacote e escolheu-se o `phpunit` e escolhe-se a versão na lista apresentada (neste exemplo "0") e deverá ter a saída como mostrado abaixo:

O Composer então adicionará esse pacote ao arquivo composer.json sob a seção "require", que se parecerá com isso:
```css
{
    "require": {
        "phpdotenv/phpdotenv": "^5.0"
    }
}
```

Dependências comuns para seu projeto:
phpdotenv: Para gerenciar variáveis de ambiente (como informações de configuração do banco de dados no arquivo .env).
```bash
Would you like to define your dependencies (require) interactively [yes]? 
Search for a package: phpdotenv

Found 15 packages matching phpdotenv

   [0] vlucas/phpdotenv 
   [1] sixlive/dotenv-editor 
   [2] yiithings/yii2-dotenv 
   [3] devcoder-xyz/php-dotenv Abandoned. Use phpdevcommunity/php-dotenv instead.
   [4] phpdevcommunity/php-dotenv 
   [5] beebmx/kirby-env 
   [6] justcoded/dotenv-sync Abandoned. No replacement was suggested.
   [7] wpscholar/phpdotenv 
   [8] stefanocbt/phpdotenv-sync 
   [9] dotenv-org/phpdotenv-vault 
  [10] cyberinferno/yii2-phpdotenv 
  [11] chillerlan/php-dotenv 
  [12] abacaphiliac/zend-phpdotenv 
  [13] code-distortion/fluent-dotenv 
  [14] sebastiansulinski/dotenv 

Enter package # to add, or the complete package name if it is not listed: 0
Enter the version constraint to require (or leave blank to use the latest version): 
Using version ^5.6 for vlucas/phpdotenv
```
phpunit: Para adicionar suporte a testes unitários.
```bash
Search for a package: phpunit

Found 15 packages matching phpunit

   [0] phpunit/phpunit 
   [1] phpunit/php-timer 
   [2] phpunit/php-text-template 
   [3] phpunit/php-file-iterator 
   [4] phpunit/php-code-coverage 
   [5] phpunit/phpunit-mock-objects Abandoned. No replacement was suggested.
   [6] symfony/phpunit-bridge 
   [7] jean85/pretty-package-versions 
   [8] brianium/paratest 
   [9] phpunit/php-invoker 
  [10] phpunit/php-token-stream Abandoned. No replacement was suggested.
  [11] johnkary/phpunit-speedtrap 
  [12] phpstan/phpstan-phpunit 
  [13] yoast/phpunit-polyfills 
  [14] ta-tikoma/phpunit-architecture-test 

Enter package # to add, or the complete package name if it is not listed: 0
Enter the version constraint to require (or leave blank to use the latest version): 
Using version ^11.4 for phpunit/phpunit
```
Essas dependências garantirão que você tenha as ferramentas necessárias para uma boa organização e testes de qualidade em seu projeto.

> Deixando vazia a entrada saíra da seleção de pacotes.
* ### 8. Add PSR-4 autoload mapping
```bash
Add PSR-4 autoload mapping? Maps namespace "Hayden\CtdsProjectIfsc" to the entered relative path. [src/, n to skip]: 
```

Quando o Composer pergunta "Add PSR-4 autoload mapping?" e sugere o mapeamento de namespaces, como:

"Maps namespace 'Hayden\CtdsProjectIfsc' to the entered relative path. [src/, n to skip]:"

Está perguntando se você deseja configurar o autoload para o seu projeto, com base no padrão PSR-4. O PSR-4 é um padrão que define como o autoload de classes deve funcionar no PHP. Ele permite que você mapeie namespaces para caminhos de diretórios específicos.

PSR-4 autoload mapping: Mapeie o namespace principal para o diretório app/.
Exemplo de composer.json:
```json

{
    "name": "hayden/mvc-project",
    "description": "Projeto MVC em PHP",
    "type": "project",
    "require": {
        "vlucas/phpdotenv": "^5.6"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    },
    "authors": [
        {
            "name": "Hayden",
            "email": "junhaumhayden@hotmail.com"
        }
    ]
}
```
> Após configurar, gere o autoload:
>```bash
>composer dump-autoload
>```


* ### 9. Confirmaçao da construcao do projeto
```bash
Do you confirm generation [yes]? 
Would you like to install dependencies now [yes]? 
```
Após confirmar  projeto será criado.
> Caso nao tenha selecionado os pacotes durante a construcao do pacote (passo 7)
>
>   1.  Instale o `phpdotenv`:
>```bash
>composer require vlucas/phpdotenv
>```
>   1. Instale o `PHPUnit` para testes:
>```bash
>composer require --dev phpunit/phpunit
>```

## 3. Configurar o Arquivo .env
No diretório `config/`, crie o arquivo `.env`:
```env
DB_HOST=localhost
DB_DATABASE=meu_banco
DB_USER=root
DB_PASSWORD=minha_senha
```
> Criar um arquivo `.env.txt`para subir para o repositorio
## 4. Continuar a Implementar o Padrão MVC
2. Configurar o Ponto de Entrada

O arquivo public/index.php será o ponto de entrada para a aplicação.

Exemplo:
```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

// Instanciar e chamar o controlador principal
$controller = new HomeController();
$controller->index();
```

3. Criar os Componentes do Padrão MVC

### Models
Os modelos interagem com o banco de dados. Exemplo (app/Models/User.php):
```php
<?php

namespace App\Models;

class User
{
    public function getAll()
    {
        // Simulação de dados do banco
        return [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe']
        ];
    }
}
```

### Controllers
Os controladores lidam com a lógica de negócios. Exemplo (app/Controllers/HomeController.php):
```php
<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAll();

        require_once __DIR__ . '/../Views/home.php';
    }
}
Views
As visualizações exibem o conteúdo. Exemplo (app/Views/home.php):

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['name']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```

4. Gerenciar Configurações com phpdotenv

Crie um arquivo .env para variáveis de ambiente no diretório config: Exemplo (.env):
```bas
DB_HOST=localhost
DB_NAME=meu_banco
DB_USER=root
DB_PASS=senha
```

Carregar Configurações no Código (config/config.php):
```php
<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

return [
    'db_host' => $_ENV['DB_HOST'],
    'db_name' => $_ENV['DB_NAME'],
    'db_user' => $_ENV['DB_USER'],
    'db_pass' => $_ENV['DB_PASS']
];
```

5. Testar com PHPUnit

Adicione testes no diretório tests para validar os componentes.

Exemplo (tests/UserTest.php):
```php
<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function testGetAll()
    {
        $user = new User();
        $result = $user->getAll();

        $this->assertCount(2, $result);
        $this->assertEquals('John Doe', $result[0]['name']);
    }
}
```

Execute os testes:
```bash
./vendor/bin/phpunit
```

### Vantagens de Usar Composer no MVC
- Autoload Automático: Gerencia automaticamente o carregamento das classes.
- Gerenciamento de Dependências: Facilita o uso de bibliotecas externas, como phpdotenv e phpunit.
- Organização: Ajuda a manter uma estrutura de projeto limpa e escalável.
- Padronização: Seguir o PSR-4 facilita a integração com outros projetos e ferramentas.
Com essas práticas, você terá uma aplicação PHP bem estruturada e aderente às melhores práticas do mercado. 🚀

## 4. Continuar a Implementar padrão 
#### Criar a Classe de Conexão com o Banco de Dados
No diretório `src/`, crie o arquivo `Database.php`:
```php
<?php

namespace App;

use mysqli;
use Dotenv\Dotenv;

class Database
{
    private $connection;

    public function __construct()
    {
        // Carrega variáveis do arquivo .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../config');
        $dotenv->load();

        // Configurações do banco
        $host = $_ENV['DB_HOST'];
        $database = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        // Conexão com o MySQL
        $this->connection = new mysqli($host, $user, $password, $database);

        if ($this->connection->connect_error) {
            die("Erro de conexão: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}
```
## 5. Criar o Arquivo de Entrada (`public/index.php`)
No diretório `public/`, crie o arquivo `index.php`:
```php
<?php

require '../vendor/autoload.php';

use App\Database;

// Instancia a conexão
$db = new Database();

// Testa a conexão
$conn = $db->getConnection();
echo "Conexão bem-sucedida com o banco de dados.";

// Fecha a conexão
$db->closeConnection();
```
## 6. Configurar o Servidor Apache
1. Certifique-se de que o `Apache` esteja configurado para apontar o diretório `public/` como raiz do projeto.
No arquivo de configuração do `Apache`, adicione:
```bash
<VirtualHost *:80>
    DocumentRoot "/caminho/para/seu/projeto/public"
    ServerName meu-projeto.local
</VirtualHost>
```
3. Reinicie o Apache:
```bash
sudo apachectl restart
```
4. Acesse o projeto via navegador: `http://meu-projeto.local`.
## 7. Configurar e Executar os Testes Unitários
No diretório `tests/`, crie um arquivo de teste, por exemplo, `DatabaseTest.php`:
```php
<?php

use PHPUnit\Framework\TestCase;
use App\Database;

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $db = new Database();
        $this->assertNotNull($db->getConnection());
        $db->closeConnection();
    }
}
```

Para rodar os testes, execute:
```bash
./vendor/bin/phpunit tests
```
## 8. Configuração do VS Code
1. Instale a extensão **PHP Intelephense** para suporte a PHP.
2. Configure um arquivo `.vscode/launch.json` para depuração (opcional).
3. Adicione o seguinte ao seu arquivo de configurações para facilitar o uso do PHPUnit:
```json
{
    "php.validate.executablePath": "/caminho/para/php",
    "phpunit.phpunitExecutablePath": "./vendor/bin/phpunit"
}
```

Com essa estrutura e organização, você estará seguindo as melhores práticas e terá um ambiente robusto para o desenvolvimento em PHP.