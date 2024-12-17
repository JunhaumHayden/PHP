<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos do PHP com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com MySQL - exercício 04 </h1>

 <form action="../php/exercicio04.php" method="post">
    <fieldset>
        <legend> Módulo Cadastro de Médicos </legend>

        <label class="alinha"> Nome do medico: </label>
        <input type="text" name="nome-medico" autofocus> <br>

        <label class="alinha"> CRM do medico: </label>
        <input type="text" name="crm"> 
        <!-- Nao é necessario a tag <br> pq a tag <button> nao é um elemento in line -->
        <div>
            <button name="cadastrar-medico"> Efetuar cadastro </button>
        </div>
    </fieldset>

    <fieldset>
    <legend> Modulo Cadastro de Paciente </legend>
        <label class="alinha"> Nome do Paciente: </label>
        <input type="text" name="nome-paciente"> <br>

        <label class="alinha"> CRM do medico responsavel: </label>
        <input type="text" name="crm-medico"> <br>

        <label class="alinha"> Data da internacao: </label>
        <input type="date" name="data-internacao"> <br>

        <div>
            <button name="cadastrar-paciente"> Efetuar cadastro </button>
        </div>
    </fieldset>

    <fieldset>
    <legend> Modulo Pesquisa de Pacientes </legend>
        <label class="alinha"> Forneca o nome do medico: </label>
        <input type="text" name="pesquisar-nome-medico"> <br>

        <div>
            <button name="pesquisar-medico"> Pesquisar Consultas </button>
        </div>
    </fieldset>

    <?php
    //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-medicos.inc.php";
    require_once "../includes/criar-classe-pacientes.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_medicos", "tb_pacientes");
    //invocamos, agora, o método que cria a conexão do PHP com o MySQL
    $conexao = $banco->criarConexao();

    //a seguir, invocamos o método que cria o banco de dados. Lembrar que esta etapa é opcional  
    $banco->criarBanco($conexao);

    //na sequência, usamos o objeto $banco para abrirmos o banco de dados criados
    $banco->abrirBanco($conexao);

    //invocamos o método que define a tabela de símbolos utf-8 como tabela comum para representação de caracteres especiais
    $banco->definirCharset($conexao);
    //por último, invocamos o método do objeto $banco que cria a tabela. Este passo também é opcional
    $banco->criarTabela01($conexao);
    $banco->criarTabela02($conexao);

    $medico = new Medico();
    $paciente = new Paciente();

    
    // obtendo o evento que foi disparado no formulario
    if(isset($_POST["cadastrar-medico"]))
    {
        //rastrear o primeiro botao
        $medico->receberDados($conexao);
        $medico->cadastrar($conexao, $banco->nomeDaTabela01);
        echo "<p>Medico cadastrado com sucesso no banco de dados. </p>";
    }
    // obtendo o evento que foi disparado no formulario
    if(isset($_POST["cadastrar-paciente"]))
    {
        //rastrear o primeiro botao
        $paciente->receberDados($conexao);
        echo "CADASTRO DE PACIENTE";
        $paciente->cadastrar($conexao, $banco->nomeDaTabela02);
        echo "<p>Paciente cadastrado com sucesso no banco de dados. </p>";
    }
    if(isset($_POST["pesquisar-medico"]))
    {
        //rastrear o primeiro botao
        $medico->contarNumeroPacientesAtendidos($conexao, $banco->nomeDaTabela01,$banco->nomeDaTabela02);


        $paciente->cadastrar($conexao, $banco->nomeDaTabela02);
        echo "<p>Paciente cadastrado com sucesso no banco de dados. </p>";
    }
    $banco->terminarConexao($conexao);
    ?>
</body>
</html>