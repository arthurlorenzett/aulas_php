<?php
require '../cliente.php';

$cliente = new Cliente("Arthur", "arthur@email.com");
echo "Nome: " . $cliente->getNome() . "<br>";
echo "E-mail: " . $cliente->getEmail() . "<br>";

$cliente->setNome("Arthur Henrique");
$cliente->setEmail("arthur.henrique@email.com");
echo "Novo nome: " . $cliente->getNome() . "<br>";
echo "Novo e-mail: " . $cliente->getEmail() . "<br>";

try {
  $cliente->setEmail("email-invalido");
} catch (InvalidArgumentException $e) {
  echo "Erro: " . $e->getMessage() . "<br>";
}
