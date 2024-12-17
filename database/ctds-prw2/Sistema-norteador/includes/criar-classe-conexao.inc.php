<?php
 //definir a classe BancoDeDados, que conterá informações básicas (métodos e atributos) da ligação do PHP com o MySQL
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela01;
  public $nomeDaTabela02;
  public $nomeDaTabela03;
  public $servidor;
  public $usuario;
  public $senha;

  //construtor da classe
  function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela01, $nomeTabela02, $nomeTabela03)
   {
   $this->servidor       = $servidorBanco;
   $this->usuario        = $usuarioBanco;
   $this->senha          = $senhaBanco;
   $this->nomeDoBanco    = $nomeBanco;
   $this->nomeDaTabela01 = $nomeTabela01;
   $this->nomeDaTabela02 = $nomeTabela02;
   $this->nomeDaTabela03 = $nomeTabela03;
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

  
  //método para a criação da tabela 02
  function criarTabelaCliente($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela01(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(20),
            endereco VARCHAR(200),
            email VARCHAR(200) NOT NULL,
            celular VARCHAR(20) NOT NULL,
            cpf VARCHAR(20) NOT NULL UNIQUE,
            usuario VARCHAR(200) NOT NULL,
            senha VARCHAR(200) NOT NULL
    ) ENGINE=InnoDB;";
   $conexao->query($sql) OR die($conexao->error);
   }

   function criarTabelaVeiculo($conexao){
    $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela02(
        id INT AUTO_INCREMENT PRIMARY KEY,
        fabricante VARCHAR(200) NOT NULL,
        modelo VARCHAR(200) NOT NULL,
        placa VARCHAR(20) NOT NULL,
        cpf_proprietario VARCHAR(20) NOT NULL,
        FOREIGN KEY (cpf_proprietario) REFERENCES $this->nomeDaTabela01(cpf)
    ) ENGINE=InnoDB";
    $conexao->query($sql) OR die($conexao->error);
   }

   function criarTabelaAdministrador($conexao){
    $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela03(
        id INT AUTO_INCREMENT PRIMARY KEY,
        login_admin VARCHAR(100),
        senha_admin VARCHAR(256)
    ) ENGINE=InnoDB";
    $conexao->query($sql) OR die($conexao->error);
   }



   function terminarConexao($conexao)
   {
    $conexao->close();
   }
  }