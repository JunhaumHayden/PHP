<?php
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

  function criarConexao()
   {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR die($conexao->error);
   return $conexao;
   }

  function criarBanco($conexao)
   {
   $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
   $conexao->query($sql) OR die($conexao->error);
   }

  function abrirBanco($conexao)
   {
   $conexao->select_db($this->nomeDoBanco);
   }
  
  function definirCharset($conexao)
   {
   $conexao->set_charset("utf8");
   }

  function criarTabela($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(300),
            estado VARCHAR(20),
            titulos INT) ENGINE=InnoDB";

   $conexao->query($sql) OR die($conexao->error);
   }

   function terminarConexao($conexao)
   {
    $conexao->close();
   }
  }