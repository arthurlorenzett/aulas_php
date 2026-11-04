<?php
require __DIR__ . '/../autoload.php';
use App\DAO\ProdutoDAO; use App\Model\{ProdutoFisico, ProdutoDigital}; use App\Database\Conexao;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $n = trim($_POST['nome']);
  $pr = (float)$_POST['preco']; $e = (int)$_POST['estoque'];
  $p = $_POST['tipo'] === 'digital' ? new ProdutoDigital(null, $n, $pr, $e, trim($_POST['link']))
                                    : new ProdutoFisico(null, $n, $pr, $e, (float)$_POST['peso']);

  // imagem é opcional: só processa se um arquivo foi escolhido
  $f = $_FILES['imagem'] ?? null;
  if ($f && $f['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($f['error'] !== UPLOAD_ERR_OK) exit('Falha no upload');
    if ($f['size'] > 2 * 1024 * 1024) exit('Máximo 2 MB');
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);
    $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'][$mime] ?? null;
    if (!$ext) exit('Formato não permitido');

    $novoNome = bin2hex(random_bytes(8)) . '.' . $ext;     // nome aleatório
    if (!move_uploaded_file($f['tmp_name'], __DIR__ . '/../uploads/' . $novoNome)) exit('Erro ao salvar');
    $p->setImagem($novoNome);
  }

  (new ProdutoDAO(Conexao::get()))->inserir($p); header('Location: index.php'); exit;
}
?>
<form method="post" enctype="multipart/form-data">
  Nome <input name="nome" required>
  Tipo <select name="tipo">
    <option value="fisico">Físico</option>
    <option value="digital">Digital</option>
  </select>
  Peso <input name="peso" type="number" step="0.001">
  Link <input name="link" type="text">
  Preço <input name="preco" type="number" step="0.01" required>
  Estoque <input name="estoque" type="number" required>
  Imagem <input name="imagem" type="file" accept="image/*">
  <button>Salvar</button>
</form>
