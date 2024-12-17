<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos do PHP com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com MySQL - ATIVIDADE 3 - exercício avaliativo </h1>

 <form action="../php/exerc06.php" method="post">
    <fieldset>
        <legend> Empresa A projetista - Módulo de cadastro </legend>

        <label class="alinha"> ID do Projeto: </label>
        <input type="text" name="id"> <br>

        <label class="alinha"> Orçamento do Projeto: </label>
        <input type="number" name="orcamento" min="0" max="10000" step="0.01"> <br>

        <label class="alinha"> Data Início: </label>
        <input type="date" name="data" > <br>

        <label class="alinha"> Quantidade de horas para execução: </label>
        <input type="number" name="horas" min="0" max="10000" step="1"> <br>


        <div>
            <button name="cadastrar"> Efetuar Cadastro </button>
        </div>
    </fieldset>

    <fieldset>
        <legend> Outras operações  </legend>
        <label> Selecione outra operação a ser executada com os Projetos: </label><br>
        <input type="radio" name="operacao" value="1"><label> Listar todos os projeto</label><br>
        <input type="radio" name="operacao" value="2"><label> Contar projetos posterior a 01/01/2020</label><br>
        <input type="radio" name="operacao" value="3"><label> Excluir projetos menores que 100 horas e com orçamento inferior a R$1000,00</label><br>


        <div>
            <button name ="outras-oepracoes"> Executar Opercao selecionada</button>
        </div> 
    </fieldset>
    </form>
    <?php
    //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
    require_once "../includes/criar-classe-conexao.inc.php";
    require_once "../includes/criar-classe-projetos.inc.php";

    $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_projetos");
    //invocamos, agora, o método que cria a conexão do PHP com o MySQL
    $conexao = $banco->criarConexao();

    //a seguir, invocamos o método que cria o banco de dados. Lembrar que esta etapa é opcional  
    $banco->criarBanco($conexao);

    //na sequência, usamos o objeto $banco para abrirmos o banco de dados criados
    $banco->abrirBanco($conexao);

    //invocamos o método que define a tabela de símbolos utf-8 como tabela comum para representação de caracteres especiais
    $banco->definirCharset($conexao);

    //por último, invocamos o método do objeto $banco que cria a tabela. Este passo também é opcional
    $banco->criarTabela($conexao);

    $projeto = new Projeto();
    

    if (isset($_POST["cadastrar"])) {
        // Captura os valores enviados pelo formulário
        $id = $_POST['id'] ?? '';
        $orcamento = $_POST['orcamento'] ?? '';
        $data = $_POST['data'] ?? '';
        $horas = $_POST['horas'] ?? '';
    
        // Verifica se todos os campos obrigatórios foram preenchidos
        if (empty($id) || empty($orcamento) || empty($data) || empty($horas)) {
            echo "<p><span>Por favor, preencha todos os campos antes de cadastrar!</span></p>";
        } else {
            // Prossegue com o cadastro se todos os campos estiverem preenchidos
            $projeto->receberDados($conexao);
            $projeto->cadastrar($conexao, $banco->nomeDaTabela);
            echo "<p>Projeto cadastrado com sucesso!</p>";
        }
    }
    if (isset($_POST['outras-oepracoes'])) {
        if (!isset($_POST['operacao'])) {
            echo "<p><span>Por favor, selecione uma opção antes de continuar.</span></p>";
        } else {
            $operacao = $_POST['operacao'];
            if ($operacao == "1") {
                $projeto->tabularDados($conexao, $banco->nomeDaTabela);
            } elseif ($operacao == "2") {
                $projeto->contarProjetosPosteriores($conexao, $banco->nomeDaTabela);
            } elseif ($operacao == "3") {
                $projeto->excluirProjetos($conexao, $banco->nomeDaTabela);
            } else {
                echo "<p><span>Opção inválida selecionada.</span></p>";
            }
        }
    }
    $banco->terminarConexao($conexao);
    ?>
</body>
</html>