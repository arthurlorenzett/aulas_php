<?php

session_start();
if (!isset($_SESSION['usuario'])){
    header('Location: login.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <main class="container">
    <h1>Painel</h1>
    <p>Olá, <?= $_SESSION['usuario']['nome'] ?></p>
    <a class="botao" href="sair.php">Sair</a>
  </main>
</body>
</html>
