# ecommerce-exemple-page — Loja Exemplo


## Como rodar
1. Instale o PHP 8+ no seu computador e adicione ao PATH.
2. Clone o repositório e entre na pasta.
3. Execute no terminal: php -S localhost:8000 -t public
4. Abra o navegador e acesse: http://localhost:8000


# Estrutura

/data/produtos.json -> BD estático em JSON
/public/index.php -> Listagens de produtos com busca
/public/produto.php -> Detalhes com carrossel e avaliação
/public/assets/js/app.js -> Lógica JS (busca, carrossel e avaliação)



# Decisões técnicas

Bootstrap 5: grid e utilitários de responsividade.

PHP: leitura de JSON estático, sem backend adicional.

JS Vanilla: busca, carrossel, avaliação e persistência em localStorage.
Não usei framework e sim o JavaScript puro porque, pelo tamanho e pela proposta do teste, não fazia sentido carregar um framework. Assim, o código fica leve, direto e sem dependências externas. Além disso, consigo mostrar bem meu domínio da linguagem base, já que ela é o núcleo de qualquer framework moderno.

Imagens: Postimages para hospedagem de imagens.

A11Y: labels, roles implícitos, foco visível, suporte a teclado e swipe.

Perf: lazy-loading de imagens, bundle enxuto (sem libs extras).