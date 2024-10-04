<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Modularização de código em PHP </title> 
  <link rel="stylesheet" href="exerc4.css">
</head> 

<body> 
 <h1> Funções de usuário em PHP - listaL6 - exercício 4 </h1>
 <?php

 function calcularComissaoVendedor($valorVenda, $percentComissao)
  {
  $comissao = $valorVenda * ($percentComissao/100);
  return $comissao;
  }


 function calcularDescontoCliente($valorVenda)
  {
  define("PERCENT_DESCONTO", 5/100);

  $desconto = 0;

  if(isset($_POST['forma-pagamento']))
   {
   $desconto = $valorVenda * PERCENT_DESCONTO;
   }
  return $desconto;
  }


 function calcularValorFinalVenda($valorVenda, $valorDescontoCliente)
  {
  $valorFinalVenda = $valorVenda - $valorDescontoCliente;
  return $valorFinalVenda;
  }


 function mostrarResultados($valorVenda, $percentComissao, $valorComissao, $valorDescontoCliente, $valorFinalVenda)
  {
  echo "<p> Resultado do processamento da venda: <br>
            Valor inicial da venda: <span> R$$valorVenda </span> <br>
            Percentual de comissão do vendedor: <span> {$percentComissao}% </span> <br>
            Valor da comissão do vendedor: <span> R$$valorComissao </span> <br>
            Valor do desconto do cliente: <span> R$$valorDescontoCliente </span> <br>
            Valor final da compra: <span> R$$valorFinalVenda </span> </p>";
  }

 //----------------------------------------------------------------------------------------- 

 $valorVenda = $_POST['valor-venda'];
 $percentComissao = $_POST['percentual-comissao'];

 $valorComissao = calcularComissaoVendedor($valorVenda, $percentComissao);
 $valorDescontoCliente = calcularDescontoCliente($valorVenda);
 $valorFinalVenda = calcularValorFinalVenda($valorVenda, $valorDescontoCliente);
 mostrarResultados($valorVenda, $percentComissao, $valorComissao, $valorDescontoCliente, $valorFinalVenda);
  

 echo "<form action='exerc4.html' method='post'>
          <button> Retornar ao início </button>
       </form>";
 ?> 
</body> 
</html> 