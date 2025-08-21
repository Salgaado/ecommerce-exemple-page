function calcularMedia(arr) {
  if (!Array.isArray(arr)) return 0;
  let soma = 0;
  let qtd = 0;

  for (let i = 0; i < arr.length; i++) {
    const v = arr[i];
    if (v == null) continue; 

    const bruto = typeof v === "string" ? v.trim() : v;
    if (bruto === "") continue; 

    const n = Number(bruto);
    if (!Number.isNaN(n)) { 
      soma += n;
      qtd++;
    }
  }

  return qtd === 0 ? 0 : soma / qtd;
}

if (typeof module !== "undefined") module.exports = { calcularMedia };
if (typeof window !== "undefined") window.calcularMedia = calcularMedia;
