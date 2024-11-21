# PHPUnit

O `PHPUnit` é uma das ferramentas mais populares para testes automatizados em PHP. Ele permite criar testes unitários e de integração para garantir que seu código funcione corretamente. Aqui está um guia básico para começar a usá-lo:

## 1. Instalar o PHPUnit
> A maneira mais comum de instalar o PHPUnit é via `Composer`.

- Certifique-se de ter o `Composer` instalado.
- No terminal, no **diretório do seu projeto**, execute:
```bash
composer require --dev phpunit/phpunit
```
- Isso instalará o PHPUnit como uma dependência de desenvolvimento.
Para verificar se o PHPUnit foi instalado, execute:
```bash
./vendor/bin/phpunit --version
```
## 2. Estrutura do Projeto
Crie uma estrutura de pastas semelhante à seguinte para organizar seus testes:
```css
meu-projeto/
├── src/
│   └── MinhaClasse.php
├── tests/
│   └── MinhaClasseTest.php
├── vendor/
├── composer.json
└── phpunit.xml
```
* `src/`: Contém o código-fonte do projeto.
* `tests/`: Contém os testes do projeto.
  
## 3. Configurar o PHPUnit
Crie um arquivo `phpunit.xml` na raiz do projeto com a seguinte configuração básica:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php">
    <testsuites>
        <testsuite name="Testes do Projeto">
            <directory>./tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

## 4. Criar uma Classe para Testar
Vamos supor que você tenha uma classe chamada `MinhaClasse` em `src/MinhaClasse.php`:

```php
<?php
namespace Hayden\CtdsProjectIfsc;

class MinhaClasse
{
    public function somar($a, $b)
    {
        return $a + $b;
    }
}
```

## 5. Criar um Teste
Crie um arquivo chamado `MinhaClasseTest.php` em `tests/MinhaClasseTest.php`:
```php
<?php

use PHPUnit\Framework\TestCase;
use Hayden\CtdsProjectIfsc\MinhaClasse; // Importa a classe a ser testada

class MinhaClasseTest extends TestCase
{
    public function testSomar()
    {
        $obj = new MinhaClasse();
        $resultado = $obj->somar(2, 3);
        
        $this->assertEquals(5, $resultado);
    }
}
```

## 6. Rodar os Testes
No terminal, execute o PHPUnit:
```bash
./vendor/bin/phpunit
```

Se tudo estiver funcionando, você verá uma saída indicando que o teste passou:
```bash
PHPUnit X.X.X by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 00:00.020, Memory: 4.00 MB

OK (1 test, 1 assertion)
```
## 7. Dicas Adicionais
1. _Assertions_: O PHPUnit oferece diversos métodos de asserção, como:
    * `assertEquals($esperado, $real)`: Compara valores.
    * `assertTrue($condicao)`: Verifica se a condição é verdadeira.
    * `assertInstanceOf($classe, $objeto)`: Verifica se o objeto é uma instância de uma classe.
2. _Test Fixtures_: Você pode usar os métodos `setUp()` e `tearDown()` para preparar e limpar o ambiente antes e depois de cada teste.
```php
protected function setUp(): void
{
    $this->obj = new MinhaClasse();
}

public function testSomar()
{
    $resultado = $this->obj->somar(2, 3);
    $this->assertEquals(5, $resultado);
}
```

3. _Cobertura de Código_: Para medir o quanto do seu código é coberto pelos testes, você pode usar a extensão php-code-coverage. Configure-a no PHPUnit.

## A diferença entre usar `require` e usar `namespaces`
A diferença entre usar require diretamente e usar namespaces com autoload está relacionada à forma como o PHP gerencia a localização e o carregamento das classes em projetos maiores. Vamos detalhar as diferenças:

1. require diretamente
Usar require significa que você está incluindo o arquivo PHP no qual a classe está definida, de forma manual e estática.

Exemplo:

require "./src/MinhaClasse.php";

$obj = new MinhaClasse();
Características:

Manual: Você precisa incluir manualmente cada arquivo necessário no seu código.
Frágil: Em projetos maiores, a manutenção se torna complicada, pois você precisa garantir que cada arquivo foi incluído na ordem certa.
Propenso a erros: Se o caminho do arquivo estiver errado ou o arquivo não for encontrado, o PHP lançará um erro fatal.
Sem suporte a namespaces: Apenas importa o código sem contexto de organização.
Essa abordagem funciona bem para scripts pequenos ou projetos simples, mas não é escalável.

2. Autoload com namespaces
No passo 2, usamos o autoload do Composer junto com namespaces para gerenciar o carregamento de classes.

Exemplo:

use Hayden\CtdsProjectIfsc\MinhaClasse;

$obj = new MinhaClasse();
Aqui, o Composer gerencia o carregamento automático das classes usando um mapeamento definido no composer.json. Você não precisa especificar require manualmente para cada arquivo; o Composer encontra e carrega a classe para você.

Como funciona:

Namespaces:
A classe MinhaClasse está no namespace Hayden\CtdsProjectIfsc.
O namespace é mapeado para um diretório (src/) no composer.json.
Autoload:
Quando você tenta usar new MinhaClasse(), o PHP verifica o namespace e usa o autoloader gerado pelo Composer para encontrar e carregar o arquivo correspondente.
Características:

Automático: Não é necessário incluir arquivos manualmente.
Organização: Namespaces permitem organizar melhor o código, agrupando classes relacionadas.
Escalável: Em projetos maiores, você pode gerenciar centenas de arquivos sem precisar se preocupar com caminhos ou ordem de inclusão.
Padrões da indústria: O uso de namespaces e autoload é considerado uma boa prática em PHP, especialmente em projetos modernos.
Diferenças principais
| Aspecto                  | `require` diretamente           | Autoload com namespaces         |
|--------------------------|----------------------------------|----------------------------------|
| **Escalabilidade**       | Difícil em projetos grandes     | Fácil de gerenciar em projetos grandes |
| **Organização**          | Sem suporte a namespaces        | Usa namespaces para organizar o código |
| **Manutenção**           | Manual e sujeita a erros        | Automática e confiável           |
| **Padrão da indústria**  | Não é recomendada para projetos modernos | É a prática recomendada          |
| **Performance**          | Carrega todos os arquivos especificados | Carrega classes apenas quando necessário |

### Por que o erro ocorreu?
Quando você usou require, o arquivo foi incluído, mas o PHPUnit não conseguiu localizar a classe porque ela não estava registrada no autoloader do Composer, nem estava usando namespaces. Isso gerou inconsistência no ambiente.

Com o autoload do Composer, o PHPUnit foi capaz de encontrar e carregar a classe corretamente com base no namespace mapeado.

## Conclusão
Embora require funcione para projetos pequenos, o uso de autoload com namespaces é a abordagem recomendada para projetos modernos em PHP, como o seu. Ele torna o código mais organizado, sustentável e aderente às melhores práticas. 😊