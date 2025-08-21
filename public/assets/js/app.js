document.addEventListener("DOMContentLoaded", function () {
  const campoBusca = document.getElementById("campo-busca");
  const itens = document.querySelectorAll(".item-produto");
  function filtrarLista() {
    const q = (campoBusca && campoBusca.value ? campoBusca.value : "")
      .trim()
      .toLowerCase();
    itens.forEach(function (el) {
      const t = (el.dataset.titulo || "").toLowerCase();
      const d = (el.dataset.descricao || "").toLowerCase();
      const exibe = !q || t.includes(q) || d.includes(q);
      el.classList.toggle("d-none", !exibe);
    });
  }
  if (campoBusca) {
    campoBusca.addEventListener("input", filtrarLista);
  }

  const imagemPrincipal = document.getElementById("imagem-principal");
  const miniaturas = document.querySelectorAll("#lista-miniaturas button");
  const botaoAnterior = document.getElementById("anterior");
  const botaoProximo = document.getElementById("proximo");
  const pontos = document.getElementById("pontos-carrossel");
  let indiceAtual = 0;

  function trocarImagem(indice) {
    const btn = miniaturas[indice];
    if (!btn) return;
    const img = btn.querySelector("img");
    if (img && imagemPrincipal) {
      imagemPrincipal.src = img.src;
    }
    miniaturas.forEach(function (b, i) {
      b.classList.toggle("border-primary", i === indice);
    });
    if (pontos) {
      const marcadores = pontos.querySelectorAll("button");
      marcadores.forEach(function (m, i) {
        m.classList.toggle("btn-primary", i === indice);
        m.classList.toggle("btn-outline-secondary", i !== indice);
      });
    }
    indiceAtual = indice;
  }

  function criarPontos() {
    if (!pontos) return;
    pontos.innerHTML = "";
    miniaturas.forEach(function (_, i) {
      const m = document.createElement("button");
      m.type = "button";
      m.className = "btn btn-outline-secondary btn-sm";
      m.textContent = i + 1;
      m.addEventListener("click", function () {
        trocarImagem(i);
      });
      pontos.appendChild(m);
    });
  }

  miniaturas.forEach(function (btn, i) {
    btn.addEventListener("click", function () {
      trocarImagem(i);
    });
  });

  if (botaoAnterior) {
    botaoAnterior.addEventListener("click", function () {
      const novo =
        indiceAtual - 1 < 0 ? miniaturas.length - 1 : indiceAtual - 1;
      trocarImagem(novo);
    });
  }
  if (botaoProximo) {
    botaoProximo.addEventListener("click", function () {
      const novo = indiceAtual + 1 >= miniaturas.length ? 0 : indiceAtual + 1;
      trocarImagem(novo);
    });
  }

  document.addEventListener("keydown", function (e) {
    if (!imagemPrincipal) return;
    if (e.key === "ArrowLeft") {
      const novo =
        indiceAtual - 1 < 0 ? miniaturas.length - 1 : indiceAtual - 1;
      trocarImagem(novo);
    } else if (e.key === "ArrowRight") {
      const novo = indiceAtual + 1 >= miniaturas.length ? 0 : indiceAtual + 1;
      trocarImagem(novo);
    }
  });

  let toqueX = null;
  if (imagemPrincipal) {
    imagemPrincipal.addEventListener("touchstart", function (e) {
      const t = e.touches[0];
      toqueX = t.clientX;
    });
    imagemPrincipal.addEventListener("touchend", function (e) {
      if (toqueX === null) return;
      const dx = e.changedTouches[0].clientX - toqueX;
      if (Math.abs(dx) > 30) {
        if (dx < 0) {
          const novo =
            indiceAtual + 1 >= miniaturas.length ? 0 : indiceAtual + 1;
          trocarImagem(novo);
        } else {
          const novo =
            indiceAtual - 1 < 0 ? miniaturas.length - 1 : indiceAtual - 1;
          trocarImagem(novo);
        }
      }
      toqueX = null;
    });
  }

  if (miniaturas.length > 0) {
    criarPontos();
    trocarImagem(0);
  }

  const blocoAvaliacao = document.getElementById("avaliacao");
  function lerNotas(id) {
    try {
      const bruto = localStorage.getItem("avaliacoes:" + id);
      if (!bruto) return [];
      const arr = JSON.parse(bruto);
      return Array.isArray(arr) ? arr : [];
    } catch (_) {
      return [];
    }
  }

  function salvarNotas(id, arr) {
    try {
      localStorage.setItem("avaliacoes:" + id, JSON.stringify(arr));
    } catch (_) {}
  }
 
  function desenharEstrelas(qtd, ativo) {
    const frag = document.createDocumentFragment();
    for (let i = 1; i <= qtd; i++) {
      const b = document.createElement("button");
      b.type = "button";
      b.className = "btn btn-link p-0 fs-3 lh-1 text-decoration-none";
      b.dataset.valor = String(i);
      b.textContent = i <= ativo ? "★" : "☆";
      frag.appendChild(b);
    }
    return frag;
  }
  function renderizarAvaliacao() {
    if (!blocoAvaliacao) return;
    const id = blocoAvaliacao.dataset.produtoId;
    const notas = lerNotas(id);
    const m = calcularMedia(notas);
    blocoAvaliacao.innerHTML = "";
    const linha = document.createElement("div");
    linha.className = "d-flex align-items-center gap-3";
    const estrelas = document.createElement("div");
    estrelas.id = "estrelas";
    estrelas.appendChild(desenharEstrelas(5, Math.round(m)));
    const info = document.createElement("div");
    info.id = "info-avaliacao";
    info.textContent =
      (m > 0 ? m.toFixed(1).replace(".", ",") : "0,0") +
      " (" +
      notas.length +
      ")";
    linha.appendChild(estrelas);
    linha.appendChild(info);
    const legenda = document.createElement("div");
    legenda.className = "text-muted small";
    legenda.textContent = "Avalie clicando nas estrelas";
    blocoAvaliacao.appendChild(linha);
    blocoAvaliacao.appendChild(legenda);
    estrelas.addEventListener("click", function (e) {
      const alvo = e.target;
      if (!(alvo instanceof HTMLElement)) return;
      const v = Number(alvo.dataset.valor || 0);
      if (!v) return;
      const atual = lerNotas(id);
      atual.push(v);
      salvarNotas(id, atual);
      renderizarAvaliacao();
    });
  }
  renderizarAvaliacao();
});
