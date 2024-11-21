<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos do PHP com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com MySQL - exercício 02 </h1>

 <form action="../php/exercicio02.php" method="post">
    <fieldset>
        <legend> Módulo de cadastro de produtos </legend>

        <label class="alinha"> id do produto: </label>
        <input type="text" name="id" autofocus> <br>

        <label class="alinha"> Preco do produto: </label>
        <input type="number" name="preco" min="0" step="0.01"> <br>

        <label class="alinha"> Quantidade em Estoque: </label>
        <input type="number" name="estoque" min="0"> <br>

        <label class="alinha"> Descricao doproduto: </label>
        <textarea name="descricao"></textarea> <br>

        <label>Classificacao do produto: </label><br>
        <input type = 'radio' name="classificacao" value="Produto Perecivel">
        <label>Produto Perecivel</label><br>
        <input type = 'radio' name="classificacao" value="Produto Nao-Perecivel"><label>Produto Nao-Perecivel</label><br>

        <div>
            <button name="cadastrar"> Efetuar cadastro </button>
        </div>
    </fieldset>

    <fieldset>
        <legend> Outras operações sobre os produtos </legend>
        <label> Selecione outra operação a ser executada no banco de dados: </label>
        <select name="operacao">
            <option> Tabular dados </option>
            <option> Mostrar descrição </option>
            <option> Calcular faturamento </option>
        </select> 

        <div>
            <button name ="outras-oepracoes"> Executar Opercaos selecionada</button>
        </div> 
    </fieldset>
    </form>
    <?php
    //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-produtos.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_produtos");
    //invocamos, agora, o método que cria a conexão do PHP com o MySQL
    $conexao = $banco->criarConexao();

    //a seguir, invocamos o método que cria o banco de dados. Lembrar que esta etapa é opcional  
    $banco->criarBanco($conexao);

    //na sequência, usamos o objeto $banco para abrirmos o banco de dados criados
    $banco->abrirBanco($conexao);

    //invocamos o método que define a tabela de símbolos utf-8 como tabela comum para representação de caracteres especiais
    $banco->definirCharset($conexao);

    //por último, invocamos o método do objeto $banco que cria a tabela. Este passo também é opcional
    $banco->criarTabela($conexao);

    $produto = new Produto();
    

    if(isset($_POST["cadastrar"]))
    {
        $produto->receberDados($conexao);
        $produto->cadastrar($conexao, $banco->nomeDaTabela);
        echo "<p>Produto cadastrado com sucesso no banco de dados. </p>";
    }
    if(isset($_POST['outras-oepracoes'])){
        $operacao = $_POST["operacao"];

        if ($operacao == "Tabular dados"){
            $produto->tabularDados($conexao, $banco->nomeDaTabela);
        }
        elseif($operacao == "Mostrar descrição"){
            $produto->mostrarDescricao($conexao, $banco->nomeDaTabela);
        }
        else{
            $produto->calcularFaturamento($conexao, $banco->nomeDaTabela);
        }
    }
    $banco->terminarConexao($conexao);
    ?>
</body>
</html>