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
      <a href="login-cliente.php"> Login do cliente </a>
     </li>

     <li>
      <a href="cadastro-cliente.php"> Cadastro do cliente </a>
     </li>
    </ul>
   </div>
  </nav>

  <main>
   <form action="login-administrador.php" method="post">
    <fieldset>
     <legend> Administrador - login </legend>

     <div class="alinha">
      <label for="login"> Usuário: </label>
      <input type="text" id="login" name="login">
     </div>

     <div class="alinha">
      <label for="senha"> Senha: </label>
      <input type="password" id="senha" name="senha">
     </div>

     <div class="alinha">
      <button name="logar-administrador"> Logar administrador </button>
     </div>
    </fieldset>
   </form>
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