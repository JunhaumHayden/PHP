<?php
 //neste arquivos, criamos a classe que representa todas as operações que serão feitas sobre os alunos cadastrados no banco de dados
 class Usuario 
  {
  public $nome;
  public $email;
  public $usuario;
  public $senha;
  

 //vamos implementar o método que recebe os dados cadastrais do aluno, dados estes vindo do formulário. Note o uso de comandos especiais, que barram a tenativa de invasão do servidor por meio do método de Injeção de SQL
 function receberDados($conexao)
  {
  $nome      = trim($conexao->escape_string($_POST['nome']));
  $email      = trim($conexao->escape_string($_POST['email']));
  $usuario      = trim($conexao->escape_string($_POST['usuario']));
  $senha      = trim($conexao->escape_string($_POST['senha']));

  $senhaCriptografada = password_hash($senha, PASSWORD_ARGON2I);

  //atribuir as variáveis às propriedades da instãncia da classe
  $this->nome      = $nome;
  $this->email      = $email;
  $this->usuario      = $usuario;
  $this->senha      = $senhaCriptografada;
  }
 
 //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
 function cadastrar($conexao, $nomeDaTabela)
  {
  $sql = "INSERT $nomeDaTabela VALUES(
              NULL,
             '$this->nome',
             '$this->email',
             '$this->usuario',
             '$this->senha'
              )";

  $conexao->query($sql) || die($conexao->error);
  }
 }
