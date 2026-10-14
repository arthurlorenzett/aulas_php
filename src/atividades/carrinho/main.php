<?php
require 'produto.php';
require 'carrinho.php';

$produto1 = new Produto(1, "Notebook", 3000.0, 10);
$produto2 = new Produto(2, "Mouse", 100.0, 50);

$carrinho = new Carrinho();
$carrinho->adicionar($produto1, 2);
$carrinho->adicionar($produto2, 5);

echo "Total do carrinho: R$ " . $carrinho->total();