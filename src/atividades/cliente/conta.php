<?php
class Conta {
  private float $saldo = 0;

  public function getSaldo(): float { return $this->saldo; }

  public function depositar(float $valor): void {
    if ($valor <= 0) {
      throw new InvalidArgumentException("Valor de depósito inválido");
    }
    $this->saldo += $valor;
  }

  public function sacar(float $valor): void {
    if ($valor <= 0) {
      throw new InvalidArgumentException("Valor de saque inválido");
    }
    if ($valor > $this->saldo) {
      throw new RuntimeException("Saldo insuficiente");
    }
    $this->saldo -= $valor;
  }
}
