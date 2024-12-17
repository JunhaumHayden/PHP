<?php
 class Livro
 {
    // Atributos privados com tipos definidos
    public $isbn;
    public $titulo;
    public $autor;
    public $preco;
    public $data;



    function receberDados($conexao)
    {
        //   $isbn         = trim($conexao->escape_string($_POST['isbn']));
        //   $preco      = trim($conexao->escape_string($_POST['preco']));
        //   $titulo     = trim($conexao->escape_string($_POST['titulo']));
        //   $autor     = trim($conexao->escape_string($_POST['autor']));
        //   $data     = trim($conexao->escape_string($_POST['data']));


        //atribuir as variáveis às propriedades da instãncia da classe
        $this->isbn         = trim($conexao->escape_string($_POST['isbn']));
        $this->preco      = trim($conexao->escape_string($_POST['preco']));
        $this->titulo    = trim($conexao->escape_string($_POST['titulo']));
        $this->autor    = trim($conexao->escape_string($_POST['autor']));
        $this->data    = trim($conexao->escape_string($_POST['data']));
    }
 
    //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
    function cadastrar($conexao, $nomeDaTabela)
    {
        $sql = "INSERT $nomeDaTabela VALUES(
                '$this->isbn',
                '$this->titulo',
                '$this->autor',
                $this->preco,
                '$this->data')";
        // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

        $conexao->query($sql) OR die($conexao->error);
    }

    function alterarData($conexao, $nomeDaTabela){
        $isbnProcurado = trim($conexao->escape_string($_POST['procura-isbn']));
        $novaData      = trim($conexao->escape_string($_POST['alterar-data']));
        $sql = "UPDATE $nomeDaTabela SET data_lancamento = '$novaData' WHERE isbn = '$isbnProcurado'";
        $conexao->query($sql) OR die($conexao->error);

        if($conexao->affected_rows == 0){
            exit("<p> ISBN não encontrado."); // metodo encerra o programa e sai, nao executa o codigo abaixo
        }

        // Converter data
        $vetorDataOriginal = explode("-", $novaData);
        $dataConvertida = $vetorDataOriginal[2]."/". $vetorDataOriginal[1] ."/". $vetorDataOriginal[0];
        echo "<p> Resultado da operacao de alterar data:<br>
        ISBN do livro procurado = <span> $isbnProcurado </span><br>
        Nova data cadastrada e convertida = <span> $dataConvertida </span> <br><br>
        Nova data cadastrada = <span> $novaData </span> </p>";

    }

    function excluirLivros($conexao, $nomeDaTabela){
        $sql = "DELETE FROM $nomeDaTabela WHERE DATEDIFF(CURDATE(),data_lancamento) > 730";
        $conexao->query($sql) OR die($conexao->error);
        $quantosExcluidos = $conexao->affected_rows;
        echo "<p> Resultado da operacao de excluir por data:<br>
        Foram excluidos <span> $quantosExcluidos </span> </p>";

    }

    function tabularDados($conexao, $nomeDaTabela){
        $sql = "SELECT * FROM $nomeDaTabela";
        $resultado = $conexao->query($sql) OR die($conexao->error);

        if($conexao->affected_rows == 0){
            exit("<p> Nenhum registro retornado da consulta."); // metodo encerra o programa e sai, nao executa o codigo abaixo
        }
        
        echo "<table>
            <caption> Dados Livros <span> $nomeDaTabela</span></caption>
            <tr>
            <th>ISBN</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Preço</th>
            <th>Data Lançamento</th>
            </tr>";

        while ($vetorRegistro = $resultado->fetch_array()) {
            $isbn             = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
            $titulo          = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
            $autor        = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
            $preco      = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
            $data  = htmlentities($vetorRegistro[4], ENT_QUOTES, "UTF-8");
            $precoFormatado = number_format($preco,2,",",".");
            // Converter data
            $vetorDataOriginal = explode("-", $data);
            $dataConvertida = $vetorDataOriginal[2]."/". $vetorDataOriginal[1] ."/". $vetorDataOriginal[0];

            echo "<tr>
                    <td> $isbn</td>
                    <td> $titulo</td>
                    <td> $autor</td>
                    <td> $precoFormatado</td>
                    <td> $dataConvertida</td>
                </tr>";
        }
        echo "</tables>";
    }    
 }
