<?php
 class Produto
 {
    public $id;
    public $preco;
    public $estoque;
    public $descricao;
    public $classificacao;

 function receberDados($conexao)
  {
  $id         = trim($_POST['id']);
  $preco      = trim($_POST['preco']);
  $estoque     = trim($_POST["estoque"]);
  $descricao     = trim($_POST["descricao"]);
  $classificacao     = trim($_POST["classificacao"]);

  $id       = $conexao->escape_string($id);
  $preco    = $conexao->escape_string($preco);
  $estoque    = $conexao->escape_string($estoque);
  $descricao    = $conexao->escape_string($descricao);
  $classificacao    = $conexao->escape_string($classificacao);

  //atribuir as variáveis às propriedades da instãncia da classe
  $this->id         = $id;
  $this->preco      = $preco;
  $this->estoque    = $estoque;
  $this->descricao    = $descricao;
  $this->classificacao    = $classificacao;
  }
 
 //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
 function cadastrar($conexao, $nomeDaTabela)
  {
  $sql = "INSERT $nomeDaTabela VALUES(
            $this->id, 
            $this->preco,
            $this->estoque,
           '$this->descricao',
           '$this->classificacao')";
// apostrofo apenas para dados do tipo varchar, numeros nao necessitam

  $conexao->query($sql) OR die($conexao->error);
  }

  function tabularDados($conexao, $nomeDaTabela){
    $sql = "SELECT * FROM $nomeDaTabela WHERE classificacao = 'produto perecivel' ORDER BY estoque DESC";
    $resultado = $conexao->query($sql) OR die($conexao->error);

    if($conexao->affected_rows == 0){
        exit("<p> Nenhum registro retornado da consulta."); // metodo encerra o programa e sai, nao executa o codigo abaixo
    }
    

    echo "<table>
        <caption> Dados produtos <span> $nomeDaTabela</span></caption>
        <tr>
        <th>ID</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Descrição</th>
        <th>Classificação</th>
        </tr>";

    while ($vetorRegistro = $resultado->fetch_array()) {
        $id             = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
        $preco          = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
        $estoque        = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
        $descricao      = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
        $classificacao  = htmlentities($vetorRegistro[4], ENT_QUOTES, "UTF-8");

        echo "<tr>
                <td> $id</td>
                <td> $preco</td>
                <td> $estoque</td>
                <td> $descricao</td>
                <td> $classificacao</td>
            </tr>
        </tables>";
    }
    }

    function mostrarDescricao($conexao, $nomeDaTabela){
        $sql = "SELECT descricao FROM $nomeDaTabela 
                WHERE estoque = (SELECT MIN(estoque) FROM $nomeDaTabela)";
        $resultado = $conexao->query($sql) or die($conexao->error);

        $vetorRegistro = $resultado->fetch_array();
        $descricao = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");

        echo "<p>O produto com a menor quantidade é: <span>$descricao</span></p>";
    }

    function calcularFaturamento(){
        
    }
 }
