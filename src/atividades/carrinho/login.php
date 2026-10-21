<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  if ($email === 'admin@loja.com' && $senha === '123456') {
    session_regenerate_id(true);   // evita fixação de sessão
    $_SESSION['usuario'] = ['nome' => 'Admin', 'email' => $email];
    header('Location: painel.php'); exit;
  }
  $erro = 'Credenciais inválidas';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <main class="container">
    <h1>Entrar</h1>
    <?php if (isset($erro)): ?>
      <p class="erro"><?= $erro ?></p>
    <?php endif; ?>
    <form method="post">
      <label>E-mail <input name="email" type="email" required></label>
      <label>Senha <input name="senha" type="password" required></label>
      <button>Entrar</button>
    </form>
    <a href="index.php">Voltar</a>
  </main>
</body>
</html>
