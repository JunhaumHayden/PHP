<?php
 class Projeto
 {
    // Atributos privados com tipos definidos
    public $id;
    public $orcamento;
    public $data;
    public $horas;



    function receberDados($conexao)
    {
        //atribuir as variáveis às propriedades da instãncia da classe
        $this->id         = trim($conexao->escape_string($_POST['id']));
        $this->orcamento      = trim($conexao->escape_string($_POST['orcamento']));
        $this->data    = trim($conexao->escape_string($_POST['data']));
        $this->horas   = trim($conexao->escape_string($_POST['horas']));
    }
 
    //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
    function cadastrar($conexao, $nomeDaTabela)
    {
        $sql = "INSERT $nomeDaTabela VALUES(
                '$this->id',
                $this->orcamento,
                '$this->data',
                $this->horas)
                ";
        // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

        $conexao->query($sql) OR die($conexao->error);
    }

    function excluirProjetos($conexao, $nomeDaTabela){
        $sql = "DELETE FROM $nomeDaTabela WHERE horas < 100 AND orcamento < 1000.00";
        $conexao->query($sql) OR die($conexao->error);
        $quantosExcluidos = $conexao->affected_rows;
        echo "<p> Resultado da operacao de excluir projetos menores de 100 horas de execução e inferiores a R$1000,00 de orçamento:<br>";
        if ($quantosExcluidos == 0){
            echo "- Sem dados à excluir </p>";
        }
        if ($quantosExcluidos == 1){
            echo "- Foi xcluido <span> $quantosExcluidos </span> projeto do sisitema </p>";
        }
        if ($quantosExcluidos >1){
            echo "- Foram excluidos <span> $quantosExcluidos </span> projetos do sisitema </p>";
        }
    }
    
    function contarProjetosPosteriores($conexao, $nomeDaTabela){
        $sql = "SELECT * FROM $nomeDaTabela WHERE data_inicio > '2020-01-01'";
        $conexao->query($sql) OR die($conexao->error);
        $quantosExcluidos = $conexao->affected_rows;
        if ($quantosExcluidos == 0){
            echo "<p> Não há projetos posteriores à 01/01/2020 </p>";
        }
        if ($quantosExcluidos == 1){
            echo "<p> Foi encontrado <span> $quantosExcluidos </span> projeto no sisitema </p>";
        }
        else {
            echo "<p> Foram encontrados <span> $quantosExcluidos </span> projetos no sisitema </p>";
        }
    }

    function tabularDados($conexao, $nomeDaTabela){
        $sql = "SELECT * FROM $nomeDaTabela";
        $resultado = $conexao->query($sql) OR die($conexao->error);

        if($conexao->affected_rows == 0){
            exit("<p> Nenhum registro retornado da consulta."); // metodo encerra o programa e sai, nao executa o codigo abaixo
        }
        
        echo "<table>
            <caption> Dados do Projeto </caption>
            <tr>
            <th>Id</th>
            <th>Orçamento</th>
            </tr>";

        while ($vetorRegistro = $resultado->fetch_array()) {
            $id             = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
            $orcamento      = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
            $orcamentoFormatado = number_format($orcamento,2,",",".");
            

            echo "<tr>
                    <td> $id</td>
                    <td> $orcamentoFormatado</td>
                </tr>";
        }
        echo "</tables>";
    }    
 }
