<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Modularização de código em PHP </title> 
  <link rel="stylesheet" href="exerc5.css">
</head> 

<body> 
 <h1> Funções de usuário em PHP - listaL6 - exercício 1 </h1>
 <?php
  //indicando ao PHP o nome da include onde ele irá encontrar a declaração das duas funções utilizadas  
  require_once "exerc5.inc.php";
 
  //script principal
  //receber os dados do formulário
  $nota1 = $_POST['nota1'];
  $nota2 = $_POST['nota2'];

  //vamos invocar cada função, passando a lista de argumentos, se necessário
  $media = calcularMedia($nota1, $nota2);
  verificarAprovado($media);  

  echo "<form action='exerc5.html' method='post'>
          <button> Retornar ao início </button>
         </form>";
 ?> 
</body> 
</html> 