<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Modularização de código em PHP </title> 
  <link rel="stylesheet" href="exerc1.css">
</head> 

<body> 
 <h1> Funções de usuário em PHP - listaL6 - exercício 1 </h1>
 <?php

 //área de declaração das funções
 function testarnome($nome)
  {
  $nome = trim($nome);
  if(strlen($nome) == 0)
   {
   exit("<form action='exerc1.html' method='post'>
          <button> Retornar ao início </button>
         </form>

         <p> Prezado usuário, a caixa nome não pode estar em branco. Aplicação encerrada! </p>");
   }
  }
 
  //========================================================

  function calcularMedia($n1, $n2)
   {
   $media = ($n1 + $n2)/2;
   return $media;  
   }

  //========================================================
  
  function verificarAprovado($media)
   {
   if($media >= 6)
    {
    echo "<p> Aluno aprovado, com media <span> $media </span>! </p>";
    }
   else
    {
    echo "<p> Aluno reprovado, com media <span> $media </span>! </p>";
    }
   } 
  
  //script principal
  //receber os dados do formulário
  $aluno = $_POST['aluno'];
  $nota1 = $_POST['nota1'];
  $nota2 = $_POST['nota2'];

  //vamos invocar cada função, passando a lista de argumentos, se necessário
  testarNome($aluno);
  $media = calcularMedia($nota1, $nota2);
  verificarAprovado($media);  

  echo "<form action='exerc1.html' method='post'>
          <button> Retornar ao início </button>
         </form>";
 ?> 
</body> 
</html> 