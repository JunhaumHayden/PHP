<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> POO com PHP </title> 
  <link rel="stylesheet" href="formata-form.css">
</head> 

<body>
  <h1> Fundamentos do PHP com POO - atividade 3 reformulada </h1>

  <?php
   require_once "atividade3-reformulada.inc.php";

   $saldoInicial = $_POST['saldo-inicial'];
   $deposito     = $_POST['deposito'];
   $saque        = $_POST['saque'];

   $conta1       = new ContaBancaria($saldoInicial);
   $conta1->depositar($deposito);
   $conta1->sacar($saque);
   $saldoAtual = $conta1->mostrarSaldo();

   echo "<p> Resultado da transação bancária: <br>
         Saldo inicial da conta = <span> R$$saldoInicial </span> <br>
         Valor do depósito = <span> R$$deposito </span> <br>
         Valor do saque = <span> R$$saque </span> <br>
         Saldo atual = <span> R$$saldoAtual </span> </p>";

  ?>
</body>
</html>