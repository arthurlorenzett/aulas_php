<?php
require '../conta.php';

$conta = new Conta();

$conta->depositar(500);
echo "Saldo após depósito: R$ " . $conta->getSaldo() . "<br>";

$conta->sacar(200);
echo "Saldo após saque: R$ " . $conta->getSaldo() . "<br>";

try {
  $conta->sacar(1000);
} catch (RuntimeException $e) {
  echo "Erro: " . $e->getMessage() . "<br>";
}

echo "Saldo final: R$ " . $conta->getSaldo() . "<br>";
