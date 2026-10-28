<?php
require 'produto.php';
require 'pagar.php';

$produto1 = new ProdutoFisico("Tênis", 249.9, 1.2);
$produto2 = new ProdutoDigital("E-book PHP", 49.9, "ebooktopzeradasgalaxia.com/php.pdf");
$produto3 = new ProdutoComDesconto("Notebook", 3000, 2.5, 10);

$soma = $produto1->total() + $produto2->total() + $produto3->total();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista mista</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <main class="container">
    <h1>Lista mista</h1>
    <table>
      <tr><th>Produto</th><th>Total</th></tr>
      <?php foreach ([$produto1, $produto2, $produto3] as $item): ?>
        <tr><td><?= $item->descricao() ?></td><td>R$ <?= $item->total() ?></td></tr>
      <?php endforeach; ?>
    </table>
    <p class="total">Total geral: R$ <?= $soma ?></p>
    <p class="aviso"><?php (new Boleto)->pagar($soma); ?></p>
    <a href="index.php">Voltar</a>
  </main>
</body>
</html>
