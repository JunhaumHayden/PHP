<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Vetores em PHP </title> 
  <link rel="stylesheet" href="exerc4.css">
</head> 

<body> 
 <h1> ListaL4 - exercício 4 - simulando um carrinho de compras vetores em PHP - resposta do servidor </h1>
 <?php
  //vamos, inicialmente, criar o vetor de preços de cada mercadoria
  $vetorPrecos = ["Impressora" => 600.00,
                  "Placa de vídeo" => 2700.00,
                  "Mouse" => 80.00];

  //testamos, a seguir se nenhum produto foi comprado
  if(!isset($_POST['produtos']))
   {
   exit("<p> Caro usuário, você não adquiriu nenhum de nossos produtos. O valor final da sua compra é de <span> R$0,00 </span>. Volte sempre! </p>
   
   <form action='exerc4.html' method='post'>
           <button> Retornar ao formulário </button>
   </form>");
   }

  //receber os dados do checkbox, vindos do formulário. Lembrar  que o PHP já armazena os dados de um checkbox em um vetor
  $vetorProdutosComprados = $_POST['produtos'];

  //vamos criar um laço de repetição sobre o vetor de produtos comprados. A seguir, com o nome de cada produto comprado, iremos até o vetor de preços e guardaremos o respectivo preço do produto adquirido, em uma variável somatória
  $soma = 0;

  foreach($vetorProdutosComprados as $prod)
   {
   $soma += $vetorPrecos[$prod];
   }
  echo "<p> Caro usuário, o valor total da sua compra é de <span> R$$soma </span> </p>";

  echo "<p> Relação de produtos adquiridos: <br>";

  foreach($vetorProdutosComprados as $prod)
   {
    echo "$prod <br>";
   }
  echo "</p>";
 ?> 
</body> 
</html> 