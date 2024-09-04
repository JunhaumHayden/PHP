<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Vetores em PHP </title> 
  <link rel="stylesheet" href="exerc2.css">
</head> 

<body> 
 <h1> Tratamento de matrizes em PHP - listaL5 - exercício 2 - resposta do servidor </h1>
 <?php
  $aluno1 = $_POST['aluno1'];
  $aluno2 = $_POST['aluno2'];
  $aluno3 = $_POST['aluno3'];

  $matric1 = $_POST["matric1"];
  $matric2 = $_POST["matric2"];
  $matric3 = $_POST["matric3"];

  $media1  = $_POST['media1'];
  $media2  = $_POST['media2'];
  $media3  = $_POST['media3'];

  //vamos criar a matriz, que deve ter a matrícula como índice associativo. Forma 2
  $matrizAlunos = [$matric1 => [$aluno1, $media1],
                   $matric2 => [$aluno2, $media2],
                   $matric3 => [$aluno3, $media3]];

  //vamos percorrer a matriz, criar um vetor temporário somente com as médias dos alunos e aplicar o comando array_sum sobre este vetor
  foreach($matrizAlunos as $matric => $vetorInterno)
   {
   $vetorTemp[] = $vetorInterno[1];
   }

   $media = array_sum($vetorTemp) / count($vetorTemp);
   $mediaFormatada = number_format($media, 1, ",", ".");

   echo "<script>
          alert('A média geral da turma é $mediaFormatada');
         </script>";
 
  echo "<form action='exerc2.html' method='post'>
          <button> Retornar ao início </button>
        </form>";
 ?> 
</body> 
</html> 