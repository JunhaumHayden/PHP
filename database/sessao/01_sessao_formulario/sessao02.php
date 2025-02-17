<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> PHP </title> 
  <link rel="stylesheet" href="exerc4.css">
</head> 

<body> 
 <h1> Sessão em PHP - exercício 01 </h1>

 <form method="post" action="sessao02.php">
  <fieldset>
   <legend> Operaçoes com Sessão em PHP - ler e apagar</legend>

   <button name="mostrar-sessao"> Ler as variaveis de Sessão </button>
   <button name="apagar-sessao"> Apagar as variaveis de Sessão </button>

  </fieldset>
 </form>
 
  <?php
    // Inicializa a sessão
    session_start();
    //variaveis de sessao identificada pela palavra reservada $_SESSION que representa um array associativo.
    if(isset($_POST['mostrar-sessao'])) {
      // sempre testar se a variavel de sessao existe
      if(isset($_SESSION['aluno']) && isset($_SESSION['media']) && isset($_SESSION['data'])) {
        echo "<h2> Dados armazenados na sessão </h2>";
        echo "<p> Nome do aluno: ".$_SESSION['aluno']."</p>";
        echo "<p> Média do aluno: ".$_SESSION['media']."</p>";
        echo "<p> Data de armazenamento: ".$_SESSION['data']."</p>";
      } else {
        echo "<h2> Não existem dados armazenados na sessão </h2>";
      }
    }
    if(isset($_POST['apagar-sessao'])) {
      // sempre testar se a variavel de sessao existe
      if(isset($_SESSION['aluno']) && isset($_SESSION['media']) && isset($_SESSION['data'])) {
      
        echo "<a href='logout.php'>Sair</a>";
        
      } else {
        echo "<h2> Não existem dados armazenados na sessão </h2>";
      }
    }
    // link para redirecionar a pagina
    echo "<a href='painel.php'> Clique aqui para ver as boas vindas </a><br>";
    echo "<a href='indexx.php'> Clique aqui para ao inicio da sessão </a><br>";
  ?>
</body> 
</html> 