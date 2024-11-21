<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos do PHP com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com MySQL - exercício 03 </h1>

 <form action="../php/exercicio03.php" method="post">
    <fieldset>
        <legend> Módulo de cadastro de produtos </legend>

        <label class="alinha"> id do produto: </label>
        <input type="text" name="id" autofocus> <br>

        <label class="alinha"> Preco do produto: </label>
        <input type="number" name="preco" min="0" step="0.01"> <br>

        <label class="alinha"> Quantidade em Estoque: </label>
        <input type="number" name="estoque" min="0"> <br>

    

        <div>
            <button name="cadastrar"> Efetuar cadastro </button>
        </div>
    </fieldset>

    <fieldset>
    <legend> Modulo Alteracao </legend>
        <label class="alinha"> Forneca o id: </label>
        <input type="text" name="procura-id"> <br>

        <label class="alinha"> Novo Preco do produto: </label>
        <input type="number" name="altera-preco" min="0" step="0.01"> <br>

        <div>
            <button name="alterar"> Alterar preco </button>
        </div>
    </fieldset>

    <fieldset>
    <legend> Modulo Exclusao de estoque </legend>
        <label class="alinha"> Forneca o estoque minimo para exclusao: </label>
        <input type="number" name="exclui-produto" min="0"> <br>

        <div>
            <button name="excluir"> Excluir produtos </button>
        </div>
    </fieldset>

    <?php
    //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-produtos.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_produtos_exerc3");
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
    
    // obtendo o evento que foi disparado no formulario
    if(isset($_POST["cadastrar"]))
    {
        //rastrear o primeiro botao
        $produto->receberDados($conexao);
        $produto->cadastrar($conexao, $banco->nomeDaTabela);
        echo "<p>Produto cadastrado com sucesso no banco de dados. </p>";
    }
    if(isset($_POST['alterar'])){
        $produto->alterarPreco($conexao, $banco->nomeDaTabela);
        echo "<p> Produto alterado com sucesso!</p>";
    }
    if(isset($_POST['excluir'])){
        $produto->excluirProduto($conexao, $banco->nomeDaTabela);
    }
    $banco->terminarConexao($conexao);
    ?>
</body>
</html>