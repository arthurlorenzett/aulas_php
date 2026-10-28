<?php
require 'produto.php';
require 'carrinhoClasse.php';

trait Loggable {
    public function log(string $msg): void {
        echo "[" . static::class . "] $msg<br>";
    }
}

class Pedido { use Loggable; }

$produto1 = new ProdutoFisico("Tênis", 249.9, 1.2);
$produto2 = new ProdutoDigital("E-book PHP", 49.9, "ebooktopzeradasgalaxia.com/php.pdf");

$carrinho = new Carrinho();
$carrinho->adicionar($produto1, 2);
$carrinho->adicionar($produto2, 1);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho de produtos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <main class="container">
    <h1>Carrinho de produtos</h1>
    <table>
      <tr><th>Produto</th></tr>
      <tr><td><?= $produto1->descricao() ?></td></tr>
      <tr><td><?= $produto2->descricao() ?></td></tr>
    </table>
    <p class="total">Total do carrinho: R$ <?= $carrinho->total() ?></p>
    <p class="aviso"><?php (new Pedido)->log("criado"); ?></p>
    <a href="index.php">Voltar</a>
  </main>
</body>
</html>
