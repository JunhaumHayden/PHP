<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Fundamentos do PHp com banco de dados MySQL </title>
        <link rel="stylesheet" href="../css/formata-banco.css">
    </head>
    <body>
        <h1> Fundamentos do PHP com MySQL - exercício 1 </h1>

        <form action="cadastro.php" method="post">
        <fieldset>
        <legend> Módulo de cadastro de usuario </legend>

        <label class="alinha"> Nome Completo: </label>
        <input type="text" name="nome" autofocus> <br>

        <label class="alinha"> Email: </label>
        <input type="text" name="email" autofocus> <br>

        <label class="alinha"> Nome de Usuario: </label>
        <input type="text" name="usuario" autofocus> <br>

        <label class="alinha"> Senha de Usuario: </label>
        <input type="password" name="senha" autofocus> <br>

        <div>
            <button name="cadastrar"> Efetuar cadastro </button>
        </div>
        </fieldset>
            <p><a href="../html/exerc1"> Voltar </a></p>
        </form> 

        <?php
        //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
        require_once "../includes/criar-classe-conexao.inc.php";
        require_once "../includes/criar-classe-usuarios.inc.php";

        //o próximo passo é criarmos o objeto simbolizando o acesso ao banco de dados dados, por meio da classe implementada na include acima. Para isso, iremos usar o construtor da classe que já criamos
        $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_usuarios");

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

        //o próximo passo a ser codificado é a criação do objeto aluno, que corresponde a todas as operações a serem executadas sobre o banco de dados, em relação a cada aluno, por meio de classe Alunos
        $usuario = new Usuario();

        //antes de prosseguirmos, devemos fazer o PHP descobrir qual botão do formulário foi acionado, para podermos invocar os métodos adequados do objeto aluno
        if(isset($_POST['cadastrar']))
        {
        //aqui são feitas todas as operações de cadastro dos alunos no banco de dados
        $usuario->receberDados($conexao);
        $usuario->cadastrar($conexao, $banco->nomeDaTabela);
        echo "<p> Dados do usuario cadastrados com sucesso na base de dados. </p>";
        }

        $banco->terminarConexao($conexao);
        ?>
    </body>
</html>