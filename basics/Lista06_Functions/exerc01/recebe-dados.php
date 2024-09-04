<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Vetores em PHP </title> 
  <link rel="stylesheet" href="../assets/css/style.css">
</head> 

<body> 
<h2 id="idcabelho">  Tratamento de matrizes em PHP - Lista05 - Exercicio 02<br> <span class="blinking-text">Resposta do Servidor</span></h2> 
<?php
  //criando variáveis escalares para receber os dados do formulário

  function testaNome($nome)
  {
    $nome = trim($nome);
    if(strlen($nome)==0)
    {
      exit("<p> Caixa Vazia. Entre com os dados corretamente</p>");
    }
  }
  

  //Script Principal
  // Receber os dados do formulario
  $aluno = $_POST['aluno'];
  $nota01 = $_POST['nota01'];
  $nota02 = $_POST['nota02'];

  // Invocar funcao


  echo "<pre>";
  print_r($matrizAlunos);
  echo "</pre>";
  
  echo "<table>
         <caption> CTDS - PRWI - rendimento semestral do aluno </caption>
         <tr>
           <th> Matrícula do aluno </th>
           <th> Nome do aluno </th>
           <th> Média de PRWI </th>
         </tr>";

  //percorrer a matriz para montar a tabela na página web, por meio do laço foreach()
  foreach($matrizAlunos as $matric => $vetorInterno)
   {
   echo "<tr>
          <td> $matric </td>
          <td> $vetorInterno[0] </td>
          <td> $vetorInterno[1] </td>
         </tr>";
   }

  echo "</table>";
  echo "<form action='exerc1.html' method='post'>
          <button> Retornar ao início </button>
        </form>";
 ?> 
</body> 
</html> 