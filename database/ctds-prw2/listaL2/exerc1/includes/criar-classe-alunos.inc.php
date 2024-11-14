<?php
 //neste arquivos, criamos a classe que representa todas as operações que serão feitas sobre os alunos cadastrados no banco de dados
 class Alunos 
  {
  public $matricula;
  public $nome;
  public $media;
  

 //vamos implementar o método que recebe os dados cadastrais do aluno, dados estes vindo do formulário. Note o uso de comandos especiais, que barram a tenativa de invasão do servidor por meio do método de Injeção de SQL
 function receberDados($conexao)
  {
  $matricula = trim($_POST['matric']);
  $nome      = trim($_POST['nome']);
  $media     = trim($_POST["media-prw2"]);

  $matricula = $conexao->escape_string($matricula);
  $nome      = $conexao->escape_string($nome);
  $media     = $conexao->escape_string($media);

  //atribuir as variáveis às propriedades da instãncia da classe
  $this->matricula = $matricula;
  $this->nome      = $nome;
  $this->media     = $media;
  }
 
 //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
 function cadastrar($conexao, $nomeDaTabela)
  {
  $sql = "INSERT $nomeDaTabela VALUES(
           '$this->matricula',
           '$this->nome',
           $this->media)";

  $conexao->query($sql) || die($conexao->error);
  }
 }
