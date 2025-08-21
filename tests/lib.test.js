const { calcularMedia } = require("../public/assets/js/calc-media.js");

test("calcula média de notas inteiras", () => {
  expect(calcularMedia([5, 4, 3])).toBe(4);
});

test("calcula média com floats e ignora inválidos", () => {
  expect(calcularMedia([4.5, "3", null, 2])).toBeCloseTo(3.1666667, 5);
});

test("lista vazia retorna 0", () => {
  expect(calcularMedia([])).toBe(0);
});