<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Vetores em PHP </title> 
  <link rel="stylesheet" href="exerc1.css">
</head> 

<body> 
 <h1> Tratamento de matrizes em PHP - listaL5 - exercício 1 - resposta do servidor </h1>
 <?php
  //criando variáveis escalares para receber os dados do formulário
  $aluno1 = $_POST['aluno1'];
  $aluno2 = $_POST['aluno2'];
  $aluno3 = $_POST['aluno3'];

  $matric1 = $_POST["matric1"];
  $matric2 = $_POST["matric2"];
  $matric3 = $_POST["matric3"];

  $media1  = $_POST['media1'];
  $media2  = $_POST['media2'];
  $media3  = $_POST['media3'];

  //vamos criar a matriz, que deve ter a matrícula como índice associativo. Forma 1
  $matrizAlunos[$matric1][0] = $aluno1;
  $matrizAlunos[$matric1][1] = $media1;
  $matrizAlunos[$matric2][0] = $aluno2;
  $matrizAlunos[$matric2][1] = $media2;
  $matrizAlunos[$matric3][0] = $aluno3;
  $matrizAlunos[$matric3][1] = $media3;

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