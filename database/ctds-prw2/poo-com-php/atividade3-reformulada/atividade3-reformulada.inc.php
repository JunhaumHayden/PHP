<?php
 //neste exemplo, a classe estará em uma include e pode ser chamada em qualquer projeto que necessitar de seus objetos
 class ContaBancaria
  {
  public $saldo;

  function __construct($saldoInicial)
   {
   $this->saldo = $saldoInicial; 
   }

  function depositar($valor)
   {
   $this->saldo = $this->saldo + $valor;
   }

  function sacar($valor)
   {
   $this->saldo = $this->saldo - $valor;
   }

  function mostrarSaldo()
   {
   return $this->saldo;
   }
  }
