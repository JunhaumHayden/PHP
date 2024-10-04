<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Modularização de código em PHP </title> 
  <link rel="stylesheet" href="exerc2.css">
</head> 

<body> 
 <h1> Funções de usuário em PHP - listaL6 - exercício 2 </h1>
 <?php

  function testarIdade($idade)
   {
   //a função pronta do PHP, que realiza diversos tipos de teste em relação aos dados oriundos de um formulário, é a função filter_var(), que, dependendo do parâmetro utilizado, realiza vários tipos de validação
   $valorTestado = filter_var($idade, FILTER_VALIDATE_INT);

   //cuidado com o valor zero em comparações de igualdade: sempre use o operador de identidade do PHP, para que ele não converta, automaticamente, o zero para false

   if($valorTestado === false OR $valorTestado < 0)
    {
    exit("<p> Dado incorreto. A idade deve ter um valor inteiro. Aplicação encerrada! </p>

    <form action='exerc2.html' method='post'>
          <button> Retornar ao início </button>
         </form>");
    }
   }
 
  //=====================================================

  function aptoAVotar($idade)
   {
   if($idade >= 16)
    {
    echo "<p> Eleitor está apto a votar, com a idade igual a <span> $idade anos </span> </p>";
    }
   else
    {
    echo "<p> Eleitor NÃO está apto a votar, pois tem idade igual a <span> $idade anos </span> </p>";
    }
   }



  $idade = $_POST['idade'];

  testarIdade($idade);

  aptoAVotar($idade);

  echo "<form action='exerc2.html' method='post'>
          <button> Retornar ao início </button>
         </form>";
 ?> 
</body> 
</html> 