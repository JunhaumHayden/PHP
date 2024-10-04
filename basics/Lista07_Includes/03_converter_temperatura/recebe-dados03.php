<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Modularização de código em PHP </title> 
  <link rel="stylesheet" href="exerc3.css">
</head> 

<body> 
 <h1> Funções de usuário em PHP - listaL6 - exercício 3 </h1>
 <?php
  function converterDeFparaC($temp)
   {
   $tempConvertida = ($temp - 32) * 5/9;

   $tempConvertidaFormatada = number_format($tempConvertida, 1, ",", ".");
   $tempFormatada = number_format($temp, 1, ",", ".");
   echo "<p> Resultado da conversão: <br>
             Temperatura original em ºF = <span> {$tempFormatada}ºF </span> <br>
             Temperatura convertida para ºC = <span> {$tempConvertidaFormatada}ºC </span> </p>";
   }

  //====================================================================

  function converterDeCparaF($temp)
   {
   $tempConvertida = ($temp * 9/5) + 32;

   echo "<p> Resultado da conversão: <br>
             Temperatura original em ºC = <span> {$temp}ºC </span> <br>
             Temperatura convertida para ºF = <span> {$tempConvertida}ºF </span> </p>";
   }

  $temp = $_POST['temp'];
  $escala = $_POST['escala'];

  if($escala == "deFparaC")
   {
   converterDeFparaC($temp);
   }
  else
   {
   converterDeCparaF($temp);
   }  

  echo "<form action='exerc3.html' method='post'>
          <button> Retornar ao início </button>
         </form>";
 ?> 
</body> 
</html> 