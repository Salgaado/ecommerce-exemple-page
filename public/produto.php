<?php
$arquivoJson = __DIR__ . '/../data/produtos.json';
$conteudo = file_get_contents($arquivoJson);
$dados = json_decode($conteudo, true);
$lista = $dados['produtos'] ?? [];
$id = $_GET['id'] ?? '';
$produto = null;
foreach ($lista as $p) {
  if ((string)$p['id'] === (string)$id) {
    $produto = $p;
    break;
  }
} if (!$produto) {
  http_response_code(404);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $produto ? htmlspecialchars($produto['titulo']) . ' — ' . htmlspecialchars($produto['descricaoCurta']) : 'Produto não encontrado' ?>">
  <title><?= $produto ? htmlspecialchars($produto['titulo']) : 'Produto não encontrado' ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
  <a href="#conteudo-produto" class="visually-hidden-focusable position-absolute top-0 start-0 m-2 btn btn-outline-secondary">Pular para conteúdo</a>

  <header class="border-bottom mb-4" role="banner">
    <div class="container py-3 d-flex align-items-center justify-content-between gap-3">
      <a href="index.php" class="btn btn-secundario" aria-label="Voltar para a lista">Voltar</a>
      <h1 class="h5 m-0 nome-loja">SpiritShop</h1>
      <div></div>
    </div>
  </header>

  <main id="conteudo-produto" class="container" role="main">
    <?php if (!$produto): ?>
      <p class="lead">Produto não encontrado.</p>
    <?php else: ?>
      <div class="row g-4">
        <div class="col-12 col-lg-6">
          <div id="carrossel-imagens" class="position-relative d-flex flex-column gap-3" aria-label="Galeria de imagens do produto">
            <div class="border rounded overflow-hidden position-relative">
              <img id="imagem-principal" src="<?= htmlspecialchars($produto['imagens'][0]) ?>" class="w-100" alt="<?= htmlspecialchars($produto['titulo']) ?>" decoding="async">
              <button id="anterior" class="btn btn-seta position-absolute top-50 start-0 translate-middle-y ms-2" aria-label="Imagem anterior">
                <span class="material-symbols-outlined">keyboard_arrow_left</span>
              </button>
              <button id="proximo" class="btn btn-seta position-absolute top-50 end-0 translate-middle-y me-2" aria-label="Próxima imagem">
                <span class="material-symbols-outlined">keyboard_arrow_right</span>
              </button>
            </div>
            <div id="pontos-carrossel" class="d-flex gap-2 flex-wrap" role="tablist" aria-label="Indicadores de imagem"></div>
            <div id="lista-miniaturas" class="d-flex gap-2 flex-wrap">
              <?php foreach ($produto['imagens'] as $i => $img): ?>
                <button class="btn btn-light p-0 borda-miniatura" data-indice="<?= $i ?>" aria-label="Miniatura <?= $i + 1 ?>">
                  <img src="<?= htmlspecialchars($img) ?>" alt="Miniatura <?= $i + 1 ?>" style="width:80px;height:60px;object-fit:cover;" loading="lazy" decoding="async">
                </button>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <h2 class="h4 mb-2"><?= htmlspecialchars($produto['titulo']) ?></h2>
          <p class="text-muted"><?= htmlspecialchars($produto['descricao']) ?></p>
          <div class="h5 mb-4">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></div>
          <div id="avaliacao" class="my-3" data-produto-id="<?= htmlspecialchars($produto['id']) ?>" aria-live="polite"></div>
          <button class="btn btn-acao">Adicionar ao carrinho</button>
        </div>
      </div>
    <?php endif; ?>
  </main>

  <footer class="py-4 mt-5">
    <div class="container text-center">
      <p class="mb-2">© 2025 SpiritShop - Todos os direitos reservados</p>
      <nav class="nav-rodape d-flex justify-content-center">
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos de Uso</a>
        <a href="#">Contato</a>
      </nav>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/calc-media.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>
