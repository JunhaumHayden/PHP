<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> PHP </title> 
  <link rel="stylesheet" href="exerc4.css">
</head> 

<body> 
 <h1> Sessão em PHP - exercício 01 </h1>

 <form method="post" action="indexx.php">
  <fieldset>
   <legend> Sessão de usuário em PHP </legend>

   <label class="alinha"> Forneça o nome: </label>
   <input type="text" name="nome" autofocus> <br> <br>

   <label class="alinha"> Forneça média: </label> 
   <input type="number" name="media" min="0" step=".1"> <br> <br>


   <button name="criar-sessao"> Guardar dados nas variaveis de Sessão </button>
  </fieldset>
 </form>
 
 <?php
    if(isset($_POST['criar-sessao'])) {
      // Inicializa a sessão
      session_start();
      //variaveis de sessao identificada pela palavra reservada $_SESSION que representa um array associativo.
      
      $_SESSION['aluno'] = $_POST['nome'];
      $_SESSION['media'] = $_POST['media'];
      $_SESSION['data'] = date('d/m/Y');
      // link para redirecionar a pagina
      echo "<a href='sessao02.php'> Clique aqui para ver os dados armazenados na sessão </a><br>";
      
      
  }
  ?>
</body> 
</html> 