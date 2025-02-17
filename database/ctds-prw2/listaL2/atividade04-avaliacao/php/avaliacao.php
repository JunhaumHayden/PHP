<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Avaliação - PHP com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> PHP com MySQL - Avaliação </h1>

<?php
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-clubes.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_clubes");

    $conexao = $banco->criarConexao();

    $banco->criarBanco($conexao);

    $banco->abrirBanco($conexao);

    $banco->definirCharset($conexao);

    $banco->criarTabela($conexao);

    $clube = new Clube();

    //Checar se o formulário foi submetido
    if(isset($_POST['cadastrar']))
    {
        //Verifica se os campos do formulário estão preenchidos
        if(empty($_POST['nome']) || empty($_POST['estado']) || empty($_POST['titulos'])){
            echo "<p>Por favor, preencha todos os campos do formulário.</p>";
            echo '<p><a href="../html/avaliacao.html">Voltar</a></p>';
            exit;
        }
        //Realiza as operações de cadastro do clube esportivo
        $clube->receberDados($conexao);
        $clube->cadastrar($conexao, $banco->nomeDaTabela);
        echo "<p> Dados do clube esportivo cadastrados com sucesso na base de dados. </p>";
        echo '<p><a href="../html/avaliacao.html">Voltar</a></p>';
    }
   
    if(isset($_POST['tabular-dados'])){
            $clube->mostrarTodosClubesBicampeoes($conexao, $banco->nomeDaTabela);
            echo '<p><a href="../html/avaliacao.html">Voltar</a></p>';
        }
        
    if(isset($_POST['maior-campeao'])){
            $clube->mostrarMaiorClubeCampeao($conexao, $banco->nomeDaTabela);
            echo '<p><a href="../html/avaliacao.html">Voltar</a></p>';
        }

    $banco->terminarConexao($conexao);
?>
</body>
</html>