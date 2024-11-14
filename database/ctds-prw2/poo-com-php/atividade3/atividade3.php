<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> POO com PHP </title> 
  <link rel="stylesheet" href="desafio.css">
</head> 

<body>
  <h1> Fundamentos do PHP com POO - atividade 3 </h1>
  <?php
   class ContaBancaria
    {
    public $saldo;

    function __construct($inicializaSaldo)
     {
     $this->saldo = $inicializaSaldo;
     }

    function depositar($valor)
     {
     $this->saldo = $this->saldo + $valor;
     }

    function sacar($valor)
     {
     $this->saldo = $this->saldo - $valor;
     }

    //método getter
    function mostrarSaldo()
     {
     return $this->saldo;
     }     
    }
    
  $conta1 = new ContaBancaria(2521.12);
  $saldoAtual = $conta1->mostrarSaldo();
  echo "<p> Caro usuário, neste momento seu saldo atual é de R$$saldoAtual </p>";

  $conta1->depositar(10000);
  $conta1->sacar(500);

  $saldoAtual = $conta1->mostrarSaldo();
  echo "<p> Caro usuário, após as movimentações, o saldo atual de sua conta é de R$$saldoAtual </p>";
  ?>
</body>
</html>