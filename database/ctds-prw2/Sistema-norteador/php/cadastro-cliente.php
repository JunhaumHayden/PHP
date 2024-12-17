<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Sistema Norteador - lavação de carros </title>
 <link rel="stylesheet" href="./../css/formata-cabecalho.css">
 <link rel="stylesheet" href="./../css/formata-principal.css">
 <link rel="stylesheet" href="./../css/formata-geral-sn.css">
 <link rel="stylesheet" href="./../css/formata-navegacao.css">
 <link rel="stylesheet" href="./../css/formata-rodape.css">
</head>

<body>
 <div class="conteiner">
  <header>
   <h2> Desenvolvimento Web - CTDS - Sistema Norteador - Lavação de carros </h2>
  </header>

  <nav>
   <div class="menu">
    <ul>
     <li>
      <a href="home.php"> Home </a>
     </li>

     <li>
      <a href="cadastro-veiculo.php"> Cadastrar veículo </a>
     </li>

     <li>
      <a href="login-administrador.php"> Área do administrador </a>
     </li>

     <li>
      <a href="login-cliente.php"> Login do cliente </a>
     </li>
    </ul>
   </div>
  </nav>

  <main>
        <form action="cadastro-cliente.php" method="post">
            <fieldset>
            <legend> Clientes - cadastro </legend>

            <div class="alinha">
            <label for="cliente"> Nome: </label>
            <input type="text" id="cliente" name="cliente" autofocus>
            </div>

            <div class="alinha">
            <label for="endereco"> Endereço: </label>
            <input type="text" id="endereco" name="endereco">
            </div>

            <div class="alinha">
            <label for="email"> E-mail: </label>
            <input type="email" id="email" name="email">
            </div>

            <div class="alinha">
            <label for="cpf"> CPF: </label>
            <input type="text" id="cpf" name="cpf">
            </div>

            <div class="alinha">
            <label for="fone"> Celular: </label>
            <input type="tel" id="fone" name="celular">
            </div>

            <div class="alinha">
            <label for="login"> Usuário: </label>
            <input type="text" id="login" name="login">
            </div>

            <div class="alinha">
            <label for="senha"> Senha: </label>
            <input type="password" id="senha" name="senha">
            </div>

            <div class="alinha">
            <button name="cadastrar-cliente"> Cadastrar cliente </button>
            </div>
            </fieldset>
        </form>
        <?php
            //antes de qualquer coisa, este script principal deve inserir as includes contendo as classes que criam a conexão com o banco e que realizam as operações sobre os dados dos alunos
            require_once "../includes/criar-classe-conexao.inc.php";
            require_once "../includes/criar-classe-clientes.inc.php";

            $banco = new BancoDeDados("localhost", "php", "php", "db_ctds", "tb_clientes", "tb_veiculos", "tb_administrador");
            //invocamos, agora, o método que cria a conexão do PHP com o MySQL
            $conexao = $banco->criarConexao();

            //a seguir, invocamos o método que cria o banco de dados. Lembrar que esta etapa é opcional  
            $banco->criarBanco($conexao);

            //na sequência, usamos o objeto $banco para abrirmos o banco de dados criados
            $banco->abrirBanco($conexao);

            //invocamos o método que define a tabela de símbolos utf-8 como tabela comum para representação de caracteres especiais
            $banco->definirCharset($conexao);
            //por último, invocamos o método do objeto $banco que cria a tabela. Este passo também é opcional
            $banco->criarTabelaCliente($conexao);
            // $banco->criarTabelaVeiculo($conexao);
            // $banco->criarTabelaAdministrador($conexao);

            $cliente = new Cliente();
            // $paciente = new Paciente();

            
            // obtendo o evento que foi disparado no formulario
            if(isset($_POST["cadastrar-cliente"]))
            {
                //rastrear o primeiro botao
                $cliente->receberDados($conexao);
                $cliente->cadastrar($conexao, $banco->nomeDaTabela01);
                echo "<p>Cliente cadastrado com sucesso! </p>";
            }
            $banco->terminarConexao($conexao);
        ?>
    </main>

  <footer>
   <div class="rodape">
    <p> CTDS - Web Design, turma do semestre 2023/2 - primeira fase <br>
     Copyright &copy;2023 - todos os direitos reservados. <br>
     Entre em contato conosco:
     <a href="contato.php"> Contato </a>
    </p>
   </div>
  </footer>
 </div>
</body>

</html>