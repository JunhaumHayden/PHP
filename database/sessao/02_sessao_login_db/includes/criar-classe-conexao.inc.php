<?php
 //definir a classe BancoDeDados, que conterá informações básicas (métodos e atributos) da ligação do PHP com o MySQL
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela;
  public $servidor;
  public $usuario;
  public $senha;

  //construtor da classe
  function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela)
   {
   $this->servidor     = $servidorBanco;
   $this->usuario      = $usuarioBanco;
   $this->senha        = $senhaBanco;
   $this->nomeDoBanco  = $nomeBanco;
   $this->nomeDaTabela = $nomeTabela;
   }

  //método que estabelece a ligação entre o nosso código PHP e o nosso SGBD MySQL
  function criarConexao()
   {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR die($conexao->error);
   return $conexao;
   }

  //método da criação física do banco de dados no servidor
  function criarBanco($conexao)
   {
   $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
   $conexao->query($sql) OR die($conexao->error);
   }

  //método para abrir o banco de dados
  function abrirBanco($conexao)
   {
   $conexao->select_db($this->nomeDoBanco);
   }
  
  //método para padronizar o mesmo conjunto de caracteres para as tabelas no banco de dados 
  function definirCharset($conexao)
   {
   $conexao->set_charset("utf8");
   }

  //método para a criação da tabela dos alunos
  function criarTabela($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela(
            id int PRIMARY KEY AUTO_INCREMENT,
            nome VARCHAR(300),
            email VARCHAR(300),
            usuario VARCHAR(300),
            senha VARCHAR(130) ENGINE=InnoDB";

   $conexao->query($sql) OR die($conexao->error);
   }

   function terminarConexao($conexao)
   {
    $conexao->close();
   }
  }