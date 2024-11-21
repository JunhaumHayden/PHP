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

 <?php
  //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
  require_once "../includes/criar-classe-conexao.inc.php";
  require_once "../includes/criar-classe-alunos.inc.php";

  //o próximo passo é criarmos o objeto simbolizando o acesso ao banco de dados dados, por meio da classe implementada na include acima. Para isso, iremos usar o construtor da classe que já criamos
  $banco = new BancoDeDados("localhost", "php", "php", "db_alunos", "tb_alunos");

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
  $aluno = new Alunos();

  //antes de prosseguirmos, devemos fazer o PHP descobrir qual botão do formulário foi acionado, para podermos invocar os métodos adequados do objeto aluno
  if(isset($_POST['cadastrar']))
   {
   //aqui são feitas todas as operações de cadastro dos alunos no banco de dados
   $aluno->receberDados($conexao);
   $aluno->cadastrar($conexao, $banco->nomeDaTabela);
   echo "<p> Dados do aluno cadastrados com sucesso na base de dados. </p>";
   }
   
 ?>
</body>
</html>