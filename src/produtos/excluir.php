<?php require __DIR__ . '/../autoload.php'; 
use App\Database\Conexao;
$pdo = Conexao::get();
$pdo ->prepare('DELETE FROM produtos WHERE id = :id')
    ->execute([':id' => (int)($_GET['id'] ?? 0)]);
header('Location: index.php'); exit;