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

 <form action="../php/exercicio05.php" method="post">
    <fieldset>
        <legend> Livrarias AAA - Módulo de cadastro </legend>

        <label class="alinha"> Titulo: </label>
        <input type="text" name="titulo"> <br>

        <label class="alinha"> Autor: </label>
        <input type="text" name="autor" > <br>

        <label class="alinha"> ISBN: </label>
        <input type="text" name="isbn" autofocus placeholder="ISBN"> <br>

        <label class="alinha"> Preco de venda: </label>
        <input type="number" name="preco" min="0" max="10000" step="0.01"> <br>

        <label class="alinha"> Data Lançamento: </label>
        <input type="date" name="data" min="02/12/2017" max="25/12/2024"> <br>


        <div>
            <button name="cadastrar"> Efetuar Cadastro </button>
        </div>
    </fieldset>

    <fieldset>
        <legend> Livrarias AAA - Módulo Alteração data Lançamento </legend>

        <label class="alinha"> ISBN do livro procurado: </label>
        <input type="text" name="procura-isbn"> <br>

        <label class="alinha"> Nova Data Lançamento: </label>
        <input type="date" name="alterar-data" min="02/12/2017" max="25/12/2024">

        <div>
            <button name="alterar"> Alterar Cadastro </button>
        </div>
    </fieldset>

    <fieldset>
        <legend> Outras operações da Livraria </legend>
        <label> Selecione outra operação a ser executada na Livraria: </label><br>
        <input type="radio" name="operacao" value="1"><label> Ecluir a mais de 2 anos</label><br>
        <input type="radio" name="operacao" value="2"><label> Listar todos os livros</label><br>


        <div>
            <button name ="outras-oepracoes"> Executar Opercao selecionada</button>
        </div> 
    </fieldset>
    </form>
    <?php
    //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-livros.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_livros");
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

    $livro = new livro();
    

    if(isset($_POST["cadastrar"]))
    {
        $livro->receberDados($conexao);
        $livro->cadastrar($conexao, $banco->nomeDaTabela);
        echo "<p>livro cadastrado com sucesso no banco de dados. </p>";
    }
    if(isset($_POST['outras-oepracoes'])){
        // $operacao = $_POST["operacao"];

        // if ($operacao == "Tabular dados"){
        //     $produto->tabularDados($conexao, $banco->nomeDaTabela);
        // }
        // elseif($operacao == "Mostrar descrição"){
        //     $produto->mostrarDescricao($conexao, $banco->nomeDaTabela);
        // }
        // else{
        //     $produto->calcularFaturamento($conexao, $banco->nomeDaTabela);
        // }
        echo "<p>livro cadastrado com sucesso no banco de dados. </p>";
    }
    $banco->terminarConexao($conexao);
    ?>
</body>
</html>