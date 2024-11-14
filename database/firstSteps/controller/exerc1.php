<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos do PHp com banco de dados MySQL </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com MySQL - exercício 1 </h1>

 <?php
   //Primeiro inserir a include com a classe responsavel por criar a conexao com o banco de dados e que realizam as operaçoes sobre o banco
    // Caminho relativo para incluir o arquivo conexao.php
    // __DIR__ retorna o diretório atual do arquivo index.php, que está em public/.
    // Usamos __DIR__ . '/../src/conexao.php' para especificar o caminho de index.php para src/conexao.php subindo um nível (..).
    // include_once garante que conexao.php seja incluído uma única vez, evitando duplicações.
    include_once __DIR__ . '/../src/dbconnector_MYSQLi.php';
    include_once __DIR__ . '/../src/domain/criar-classe-alunos.inc.php';


    // Criar uma instância e conectar ao banco
    $db = new Database();

    try {
        // Estabelecer a conexão
        $connection = $db->connect();
        
        // Verificar se a conexão foi bem-sucedida
        if ($connection) {

            //o próximo passo a ser codificado é a criação do objeto aluno, que corresponde a todas as operações a serem executadas sobre o banco de dados, em relação a cada aluno, por meio de classe Alunos
            $aluno = new Aluno();

            //antes de prosseguirmos, devemos fazer o PHP descobrir qual botão do formulário foi acionado, para podermos invocar os métodos adequados do objeto aluno
            if(isset($_POST['cadastrar'])){
              //aqui são feitas todas as operações de cadastro dos alunos no banco de dados
              $aluno->receberDados($connection);
              $aluno->cadastrar($connection, "tb_alunos");
              echo "<p> Dados do aluno cadastrados com sucesso na base de dados. </p>";
            }

            if(isset($_POST['tabular-dados'])){
              $aluno->tabularDados($connection, "tb_alunos");
            }

        }
      } catch (Exception $e) {
          echo "Ocorreu um erro: " . $e->getMessage();
      } finally {
          // Encerrar a conexão ao final da execução
          $db->disconnect();
      }
?>
</body>
</html>