<?php
$arquivoJson = __DIR__ . '/../data/produtos.json';
$conteudo = file_get_contents($arquivoJson);
$dados = json_decode($conteudo, true);
$lista = $dados['produtos'] ?? [];
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Lista de produtos da loja com busca e navegação por detalhes.">
  <title>Loja — Lista de Produtos</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward_ios" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
  <a href="#conteudo-principal" class="visually-hidden-focusable position-absolute top-0 start-0 m-2 btn btn-outline-secondary">Pular para conteúdo</a>

  <header class="border-bottom mb-4 header-border" role="banner">
    <div class="container py-3 d-flex align-items-center justify-content-between gap-3">
      <h1 class="h4 m-0 nome-loja">SpiritShop</h1>
      <label for="campo-busca" class="visually-hidden">Buscar produtos</label>
      <input id="campo-busca" type="search" class="form-control input-busca" placeholder="Buscar produtos" aria-label="Buscar produtos">
    </div>
  </header>

  <main id="conteudo-principal" class="container" role="main">
    <div id="grade-produtos" class="row g-4">
      <?php foreach ($lista as $p): ?>
        <div class="col-12 col-sm-6 col-lg-4 item-produto" data-titulo="<?= htmlspecialchars($p['titulo']) ?>" data-descricao="<?= htmlspecialchars($p['descricaoCurta']) ?>">
          <div class="card h-100">
            <img src="<?= htmlspecialchars($p['imagens'][0]) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['titulo']) ?>" loading="lazy" decoding="async">
            <div class="card-body d-flex flex-column">
              <h2 class="h6 mb-2"><?= htmlspecialchars($p['titulo']) ?></h2>
              <p class="small text-muted mb-3"><?= htmlspecialchars($p['descricaoCurta']) ?></p>
              <strong class="mb-3">R$ <?= number_format($p['preco'], 2, ',', '.') ?></strong>
              <a href="produto.php?id=<?= urlencode($p['id']) ?>" class="btn btn-acao mt-auto">Ver Mais</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
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
  <script src="assets/js/app.js"></script>
</body>
</html>
