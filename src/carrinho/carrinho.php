<?php

require __DIR__ . '/autoload.php';
use App\Support\CarrinhoSessao;
$c = new CarrinhoSessao();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <main class="container">
    <h1>Carrinho</h1>
    <?php if (empty($c->itens())): ?>
      <p class="info">Seu carrinho está vazio.</p>
    <?php else: ?>
      <table>
        <tr><th>Produto</th><th>Quantidade</th></tr>
        <?php foreach ($c->itens() as $id => $qtd): ?>
          <tr><td>Produto <?= $id ?></td><td><?= $qtd ?></td></tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
    <a href="index.php">Voltar</a>
  </main>
</body>
</html>
